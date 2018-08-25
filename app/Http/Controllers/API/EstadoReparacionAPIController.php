<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEstadoReparacionAPIRequest;
use App\Http\Requests\API\UpdateEstadoReparacionAPIRequest;
use App\Models\EstadoReparacion;
use App\Repositories\EstadoReparacionRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Auth;


class EstadoReparacionAPIController extends AppBaseController
{
    /** @var  EstadoReparacionRepository */
    private $estadoReparacionRepository;

    public function __construct(EstadoReparacionRepository $estadoReparacionRepo)
    {
        $this->middleware('auth:api');
        $this->estadoReparacionRepository = $estadoReparacionRepo;
    }

    public function index(Request $request)
    {
        $this->estadoReparacionRepository->pushCriteria(new RequestCriteria($request));
        $this->estadoReparacionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $estadoReparacion = $this->estadoReparacionRepository->all();

        return $this->sendResponse($estadoReparacion->toArray(), 'Estado Reparacions recuperado con éxito');
    }

    /**
     * Store a newly created EstadoReparacion in storage.
     * POST /estadoReparacions
     *
     * @param CreateEstadoReparacionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoReparacionAPIRequest $request)
    {
        //return $this->sendResponse([], Auth::id());
        $input = $request->all();
        $input['fecha'] = Carbon::now();
        $input['user_id'] = Auth::user()->id;
        $estadoReparacion = $this->estadoReparacionRepository->create($input);

        event(new EstadoReparacionCreado($estadoReparacion));
        return $this->sendResponse($estadoReparacion->toArray(), 'Estado Reparacion guardado exitosamente');
    }

    /**
     * Display the specified EstadoReparacion.
     * GET|HEAD /estadoReparacions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EstadoReparacion $estadoReparacion */
        $estadoReparacion = $this->estadoReparacionRepository->findWithoutFail($id);

        if (empty($estadoReparacion)) {
            return $this->sendError('Estado Reparacion no encontrado');
        }

        return $this->sendResponse($estadoReparacion->toArray(), 'Estado Reparacion recuperado con éxito');
    }

    /**
     * Update the specified EstadoReparacion in storage.
     * PUT/PATCH /estadoReparacions/{id}
     *
     * @param  int $id
     * @param UpdateEstadoReparacionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoReparacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var EstadoReparacion $estadoReparacion */
        $estadoReparacion = $this->estadoReparacionRepository->findWithoutFail($id);

        if (empty($estadoReparacion)) {
            return $this->sendError('Estado Reparacion no encontrado');
        }

        $estadoReparacion = $this->estadoReparacionRepository->update($input, $id);

        return $this->sendResponse($estadoReparacion->toArray(), 'EstadoReparacion actualizado exitosamente');
    }

    /**
     * Remove the specified EstadoReparacion from storage.
     * DELETE /estadoReparacions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EstadoReparacion $estadoReparacion */
        $estadoReparacion = $this->estadoReparacionRepository->findWithoutFail($id);

        if (empty($estadoReparacion)) {
            return $this->sendError('Estado Reparacion no encontrado');
        }

        $estadoReparacion->delete();

        return $this->sendResponse($id, 'Estado Reparacion eliminado exitosamente');
    }
}
