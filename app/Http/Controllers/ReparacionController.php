<?php

namespace App\Http\Controllers;

use App\DataTables\ReparacionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateReparacionRequest;
use App\Http\Requests\UpdateReparacionRequest;
use App\Repositories\ReparacionRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\ArticuloRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\EmpleadoRepository;
use Flash;
use App\Models\DetalleReparacion;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use App\Models\EstadoReparacion;
use Carbon\Carbon;
class ReparacionController extends AppBaseController
{
    /** @var  ReparacionRepository */
    private $reparacionRepository;
    private $clienteRepository;
    private $articuloRepository;
    private $estadoRepository;
    private $empleadoRepository;
    public function __construct(ReparacionRepository $reparacionRepo,
                                ClienteRepository $clienteRepository,
                                ArticuloRepository $articuloRepository,
                                EstadoRepository $estadoRepository,
                                EmpleadoRepository $empleadoRepository)
    {
        $this->reparacionRepository = $reparacionRepo;
        $this->clienteRepository = $clienteRepository;
        $this->articuloRepository = $articuloRepository;
        $this->estadoRepository = $estadoRepository;
        $this->empleadoRepository = $empleadoRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Reparacion.
     *
     * @param ReparacionDataTable $reparacionDataTable
     * @return Response
     */
    public function index(ReparacionDataTable $reparacionDataTable)
    {
        return $reparacionDataTable->render('reparaciones.index');
    }

    /**
     * Show the form for creating a new Reparacion.
     *
     * @return Response
     */
    public function create()
    {
        $clientes         = $this->clienteRepository->pluck('nombre','id');
        $articulos        = $this->articuloRepository->pluck('nombre','id');
        $ultimo_registro = $this->reparacionRepository->withTrashed()->orderBy('cod_factura','DESC')->first();
        $ult_cod_factura = ($ultimo_registro != null) ? ($ultimo_registro->cod_factura + 1) : 1;
        return view('reparaciones.create', compact('clientes','articulos','ult_cod_factura'));
    }

    /**
     * Store a newly created Reparacion in storage.
     *
     * @param CreateReparacionRequest $request
     *
     * @return Response
     */
    public function store(CreateReparacionRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $reparacion = $this->reparacionRepository->create($input);
        $estado = new EstadoReparacion();
        $estado->reparacion_id = $reparacion->id;
        $estado->estado_id = 1;
        $estado->user_id = auth()->user()->id;
        $estado->fecha = Carbon::now();
        $estado->detalle = 'Estado Inicial en la reparacion';
        $estado->save();
        return redirect(route('reparaciones.revision', $reparacion->id));
    }

    /**
     * Display the specified Reparacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reparacion = $this->reparacionRepository->findWithoutFail($id);

        if (empty($reparacion)) {
            Flash::error('Reparacion no encontrado');

            return redirect(route('reparaciones.index'));
        }

        return view('reparaciones.show')->with('reparacion', $reparacion);
    }

    /**
     * Show the form for editing the specified Reparacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reparacion = $this->reparacionRepository->findWithoutFail($id);

        if (empty($reparacion)) {
            Flash::error('Reparacion no encontrado');

            return redirect(route('reparaciones.index'));
        }

        return view('reparaciones.edit')->with('reparacion', $reparacion);
    }

    /**
     * Update the specified Reparacion in storage.
     *
     * @param  int              $id
     * @param UpdateReparacionRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {   
        $reparacion = $this->reparacionRepository->findWithoutFail($id);
        if (empty($reparacion)) {
            Flash::error('Reparacion no encontrado');

            return redirect(route('reparaciones.index'));
        }
        $input = $request->all();
        $input['costo_reparacion'] = $reparacion->detalles->sum('subtotal');
        $reparacion = $this->reparacionRepository->update($input, $id);

        Flash::success('Reparacion actualizado exitosamente.');

        return redirect(route('reparaciones.index'));
    }

    /**
     * Remove the specified Reparacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reparacion = $this->reparacionRepository->findWithoutFail($id);

        if (empty($reparacion)) {
            Flash::error('Reparacion no encontrado');

            return redirect(route('reparaciones.index'));
        }

        $this->reparacionRepository->delete($id);

        Flash::success('Reparacion eliminado exitosamente.');

        return redirect(route('reparaciones.index'));
    }

    public function revision($id)
    {
        $reparacion = $this->reparacionRepository->with('articulo.marca','cliente','estados.estado')->findWithoutFail($id);
        $estadosReparacion = EstadoReparacion::with('estado','user','empleado')->where('reparacion_id','=', $reparacion->id)->get();
        if (empty($reparacion)) {
            Flash::error('Reparacion no encontrado');

            return redirect(route('reparaciones.index'));
        }
        $estados = $this->estadoRepository->all();
        $empleados = $this->empleadoRepository->all();
        $articulos = $this->articuloRepository->with('marca')->get();
        $detalles = DetalleReparacion::with('articulo.marca')->where('reparacion_id', '=', $id)->get();
        return view('reparaciones.revision.create', compact('reparacion','estados', 'empleados','estadosReparacion','articulos','detalles'));
    }
}
