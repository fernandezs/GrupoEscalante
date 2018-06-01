<?php

namespace App\Http\Controllers;

use App\DataTables\DeudaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDeudaRequest;
use App\Http\Requests\UpdateDeudaRequest;
use App\Http\Requests\StoreSetupDeudaRequest;
use App\Repositories\DeudaRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\ArticuloRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Deuda;
use Carbon\Carbon;

class DeudaController extends AppBaseController
{
    /** @var  DeudaRepository */
    private $deudaRepository;
    private $clienteRepository;
    private $articuloRepository;

    public function __construct(DeudaRepository $deudaRepo, 
                                ClienteRepository $clienteRepo, 
                                ArticuloRepository $articuloRepo)
    {
        $this->deudaRepository = $deudaRepo;
        $this->clienteRepository = $clienteRepo;
        $this->articuloRepository = $articuloRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Deuda.
     *
     * @param DeudaDataTable $deudaDataTable
     * @return Response
     */
    public function index(DeudaDataTable $deudaDataTable)
    {
        return $deudaDataTable->render('deudas.index');
    }

    /**
     * Show the form for creating a new Deuda.
     *
     * @return Response
     */
    public function create()
    {
        $articulos = $this->articuloRepository->pluck('nombre','id');
        $clientes = $this->clienteRepository->pluck('nombre','id');
        return view('deudas.create', compact('clientes','articulos'));
    }

    /**
     * Store a newly created Deuda in storage.
     *
     * @param CreateDeudaRequest $request
     *
     * @return Response
     */
    public function store(CreateDeudaRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $deuda = $this->deudaRepository->create($input);

        Flash::success('Deuda guardado exitosamente.');

        return redirect(route('deudas.setup', $deuda->id));
    }

    /**
     * Display the specified Deuda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deuda = $this->deudaRepository->findWithoutFail($id);

        if (empty($deuda)) {
            Flash::error('Deuda no encontrado');

            return redirect(route('deudas.index'));
        }

        return view('deudas.show')->with('deuda', $deuda);
    }

    /**
     * Show the form for editing the specified Deuda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deuda = $this->deudaRepository->findWithoutFail($id);

        if (empty($deuda)) {
            Flash::error('Deuda no encontrado');

            return redirect(route('deudas.index'));
        }

        return view('deudas.edit')->with('deuda', $deuda);
    }

    /**
     * Update the specified Deuda in storage.
     *
     * @param  int              $id
     * @param UpdateDeudaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeudaRequest $request)
    {
        $deuda = $this->deudaRepository->findWithoutFail($id);
        if (empty($deuda)) {
            Flash::error('Deuda no encontrado');

            return redirect(route('deudas.index'));
        }
        $input = $request->all();
        $subtotal = $deuda->detalles->sum('subtotal');
        if($request->interes != 0)
        {
            $interes = $request->interes*0.01;
            $importe_total = ($subtotal*$interes) + $subtotal;
        }
        else{
            $importe_total = $subtotal;
        }
        $input['importe_total'] = $importe_total;
        if($deuda->fecha_cobro == null && $request->estado == 'PAGADO' )
        {
            $input['fecha_cobro'] = Carbon::now();
        }
        if($deuda->fecha_cobro != null && $request->estado == 'INPAGO')
        {
            $input['fecha_cobro'] = null;
        }
        $deuda = $this->deudaRepository->update($input, $id);
        Flash::success('Deuda actualizado exitosamente.');

        return redirect(route('deudas.index'));
    }


    /**
     * Remove the specified Deuda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deuda = $this->deudaRepository->findWithoutFail($id);

        if (empty($deuda)) {
            Flash::error('Deuda no encontrado');

            return redirect(route('deudas.index'));
        }

        $this->deudaRepository->delete($id);

        Flash::success('Deuda eliminado exitosamente.');

        return redirect(route('deudas.index'));
    }

    public function setup(Deuda $deuda)
    {
        return view('deudas.setup', compact('deuda'));
    }


    public function importeSubTotal($id)
    {
        $deuda = $this->deudaRepository->findWithoutFail($id);
        $subtotal = $deuda->detalles()->sum('subtotal');
        return $subtotal;
    }
    public function importeTotal($id)
    {
        $deuda = $this->deudaRepository->findWithoutFail($id);
        $subtotal = $deuda->detalles()->sum('subtotal');
        $total = $deuda->importe_total;
        $deuda->interes ? $total = $subtotal + (($deuda->interes*0.01)*$subtotal) : $subtotal;
        return $total;
    }
}
