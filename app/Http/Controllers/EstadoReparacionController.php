<?php

namespace App\Http\Controllers;

use App\DataTables\EstadoReparacionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEstadoReparacionRequest;
use App\Http\Requests\UpdateEstadoReparacionRequest;
use App\Repositories\EstadoReparacionRepository;
use App\Models\Reparacion;
use App\Models\Estado;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EstadoReparacionController extends AppBaseController
{
    /** @var  EstadoReparacionRepository */
    private $estadoReparacionRepository;

    public function __construct(EstadoReparacionRepository $estadoReparacionRepo)
    {
        $this->estadoReparacionRepository = $estadoReparacionRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the EstadoReparacion.
     *
     * @param EstadoReparacionDataTable $estadoReparacionDataTable
     * @return Response
     */
    public function index(EstadoReparacionDataTable $estadoReparacionDataTable)
    {
        return $estadoReparacionDataTable->render('estado_reparacion.index');
    }

    /**
     * Show the form for creating a new EstadoReparacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('estado_reparacion.create');
    }

    /**
     * Store a newly created EstadoReparacion in storage.
     *
     * @param CreateEstadoReparacionRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoReparacionRequest $request)
    {
        $input = $request->all();
        if($request->ajax())
        {
            $input['fecha'] = Carbon::now();
            $input['user_id'] = auth()->user()->id;
            $estadoReparacion = $this->estadoReparacionRepository->create($input);
            $reparacion = $estadoReparacion->reparacion;
            $estado = Estado::find($request->estado_id);
            $reparacion->estado = $estado->estado;
            if($request->estado_id == 5){
                $reparacion->fecha_egreso = Carbon::now();
            }
            $reparacion->save();
            $estadoReparacion['user'] = $estadoReparacion->user;
            $estadoReparacion['estado'] = $estadoReparacion->estado;
            $estadoReparacion['empleado'] = $estadoReparacion->empleado;
            return $this->sendResponse($estadoReparacion->toArray(),'Estado agregado correctamente!');
        }
        /*$estadoReparacion = $this->estadoReparacionRepository->create($input);

        Flash::success('Estado Reparacion guardado exitosamente.');

        return redirect(route('estadoReparacions.index'));*/
    }

    /**
     * Display the specified EstadoReparacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoReparacion = $this->estadoReparacionRepository->findWithoutFail($id);

        if (empty($estadoReparacion)) {
            Flash::error('Estado Reparacion no encontrado');

            return redirect(route('estadoReparacions.index'));
        }

        return view('estado_reparacion.show')->with('estadoReparacion', $estadoReparacion);
    }

    /**
     * Show the form for editing the specified EstadoReparacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoReparacion = $this->estadoReparacionRepository->findWithoutFail($id);

        if (empty($estadoReparacion)) {
            Flash::error('Estado Reparacion no encontrado');

            return redirect(route('estadoReparacions.index'));
        }

        return view('estado_reparacion.edit')->with('estadoReparacion', $estadoReparacion);
    }

    /**
     * Update the specified EstadoReparacion in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoReparacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoReparacionRequest $request)
    {
        $estadoReparacion = $this->estadoReparacionRepository->findWithoutFail($id);

        if (empty($estadoReparacion)) {
            Flash::error('Estado Reparacion no encontrado');

            return redirect(route('estadoReparacions.index'));
        }
        if($request->ajax()) {
            $estadoReparacion = $this->estadoReparacionRepository->update($request->all(), $id);
            $estadoReparacion['user'] = $estadoReparacion->user;
            $estadoReparacion['estado'] = $estadoReparacion->estado;
            $estadoReparacion['empleado'] = $estadoReparacion->empleado;
            return $this->sendResponse($estadoReparacion->toArray(), 'Estado Reparacion actualizado exitosamente!');
        }

       

        Flash::success('');

        return redirect(route('estadoReparacions.index'));
    }

    /**
     * Remove the specified EstadoReparacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoReparacion = $this->estadoReparacionRepository->findWithoutFail($id);

        if (empty($estadoReparacion)) {
            Flash::error('Estado Reparacion no encontrado');

            return redirect(route('estadoReparacions.index'));
        }

        $this->estadoReparacionRepository->delete($id);

        Flash::success('Estado Reparacion eliminado exitosamente.');

        return redirect(route('estadoReparacions.index'));
    }
}
