<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReparacionAPIRequest;
use App\Http\Requests\API\UpdateReparacionAPIRequest;
use App\Models\Reparacion;
use App\Repositories\ReparacionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ReparacionController
 * @package App\Http\Controllers\API
 */

class ReparacionAPIController extends AppBaseController
{
    /** @var  ReparacionRepository */
    private $reparacionRepository;

    public function __construct(ReparacionRepository $reparacionRepo)
    {
        $this->reparacionRepository = $reparacionRepo;
    }

    /**
     * Display a listing of the Reparacion.
     * GET|HEAD /reparaciones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reparacionRepository->pushCriteria(new RequestCriteria($request));
        $this->reparacionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $reparaciones = $this->reparacionRepository->all();

        return $this->sendResponse($reparaciones->toArray(), 'reparaciones recuperado con éxito');
    }

    /**
     * Store a newly created Reparacion in storage.
     * POST /reparaciones
     *
     * @param CreateReparacionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReparacionAPIRequest $request)
    {
        return $this->sendResponse([], 'Ebtri che');
        $input = $request->all();

        $reparaciones = $this->reparacionRepository->create($input);

        return $this->sendResponse($reparaciones->toArray(), 'Reparacion guardado exitosamente');
    }

    /**
     * Display the specified Reparacion.
     * GET|HEAD /reparaciones/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Reparacion $reparacion */
        $reparacion = $this->reparacionRepository->findWithoutFail($id);

        if (empty($reparacion)) {
            return $this->sendError('Reparacion no encontrado');
        }

        return $this->sendResponse($reparacion->toArray(), 'Reparacion recuperado con éxito');
    }

    /**
     * Update the specified Reparacion in storage.
     * PUT/PATCH /reparaciones/{id}
     *
     * @param  int $id
     * @param UpdateReparacionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReparacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Reparacion $reparacion */
        $reparacion = $this->reparacionRepository->findWithoutFail($id);

        if (empty($reparacion)) {
            return $this->sendError('Reparacion no encontrado');
        }

        $reparacion = $this->reparacionRepository->update($input, $id);

        return $this->sendResponse($reparacion->toArray(), 'Reparacion actualizado exitosamente');
    }

    /**
     * Remove the specified Reparacion from storage.
     * DELETE /reparaciones/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Reparacion $reparacion */
        $reparacion = $this->reparacionRepository->findWithoutFail($id);

        if (empty($reparacion)) {
            return $this->sendError('Reparacion no encontrado');
        }

        $reparacion->delete();

        return $this->sendResponse($id, 'Reparacion eliminado exitosamente');
    }
}
