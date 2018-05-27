<?php

namespace App\Http\Controllers;

use App\DataTables\DetalleDeudaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDetalleDeudaRequest;
use App\Http\Requests\UpdateDetalleDeudaRequest;
use App\Repositories\DetalleDeudaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\DetalleDeuda;
use App\Models\Deuda;
class DetalleDeudaController extends AppBaseController
{
    /** @var  DetalleDeudaRepository */
    private $detalleDeudaRepository;

    public function __construct(DetalleDeudaRepository $detalleDeudaRepo)
    {
        $this->detalleDeudaRepository = $detalleDeudaRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the DetalleDeuda.
     *
     * @param DetalleDeudaDataTable $detalleDeudaDataTable
     * @return Response
     */
    public function index(DetalleDeudaDataTable $detalleDeudaDataTable)
    {
        return $detalleDeudaDataTable->render('detalle_deudas.index');
    }

    /**
     * Show the form for creating a new DetalleDeuda.
     *
     * @return Response
     */
    public function create()
    {
        return view('detalle_deudas.create');
    }

    /**
     * Store a newly created DetalleDeuda in storage.
     *
     * @param CreateDetalleDeudaRequest $request
     *
     * @return Response
     */
    public function store(CreateDetalleDeudaRequest $request)
    {
        $input = $request->all();

        $detalleDeuda = $this->detalleDeudaRepository->create($input);

        Flash::success('Detalle Deuda guardado exitosamente.');

        return redirect(route('detalleDeudas.index'));
    }

    /**
     * Display the specified DetalleDeuda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detalleDeuda = $this->detalleDeudaRepository->findWithoutFail($id);

        if (empty($detalleDeuda)) {
            Flash::error('Detalle Deuda no encontrado');

            return redirect(route('detalleDeudas.index'));
        }

        return view('detalle_deudas.show')->with('detalleDeuda', $detalleDeuda);
    }

    /**
     * Show the form for editing the specified DetalleDeuda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detalleDeuda = $this->detalleDeudaRepository->findWithoutFail($id);

        if (empty($detalleDeuda)) {
            Flash::error('Detalle Deuda no encontrado');

            return redirect(route('detalleDeudas.index'));
        }

        return view('detalle_deudas.edit')->with('detalleDeuda', $detalleDeuda);
    }

    /**
     * Update the specified DetalleDeuda in storage.
     *
     * @param  int              $id
     * @param UpdateDetalleDeudaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetalleDeudaRequest $request)
    {
        $detalleDeuda = $this->detalleDeudaRepository->findWithoutFail($id);

        if (empty($detalleDeuda)) {
            Flash::error('Detalle Deuda no encontrado');

            return redirect(route('detalleDeudas.index'));
        }

        $detalleDeuda = $this->detalleDeudaRepository->update($request->all(), $id);

        Flash::success('Detalle Deuda actualizado exitosamente.');

        return redirect(route('detalleDeudas.index'));
    }

    /**
     * Remove the specified DetalleDeuda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detalleDeuda = $this->detalleDeudaRepository->findWithoutFail($id);

        if (empty($detalleDeuda)) {
            Flash::error('Detalle Deuda no encontrado');

            return redirect(route('detalleDeudas.index'));
        }

        $this->detalleDeudaRepository->delete($id);

        Flash::success('Detalle Deuda eliminado exitosamente.');

        return redirect(route('detalleDeudas.index'));
    }

    public function detallesByDeudaID($id)
    {
        $detalles = DetalleDeuda::with('articulo','articulo.marca')->where('deuda_id', '=', $id)->get();
        return $this->sendResponse($detalles, 'Articulos recuperado con éxito');
    }

    
}
