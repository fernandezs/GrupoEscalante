<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEstadoAPIRequest;
use App\Http\Requests\API\UpdateEstadoAPIRequest;
use App\Models\Estado;
use App\Repositories\EstadoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EstadoController
 * @package App\Http\Controllers\API
 */

class EstadoAPIController extends AppBaseController
{
    /** @var  EstadoRepository */
    private $estadoRepository;

    public function __construct(EstadoRepository $estadoRepo)
    {
        $this->estadoRepository = $estadoRepo;
    }

    /**
     * Display a listing of the Estado.
     * GET|HEAD /estados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadoRepository->pushCriteria(new RequestCriteria($request));
        $this->estadoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $estados = $this->estadoRepository->all();

        return $this->sendResponse($estados->toArray(), 'Estados recuperado con éxito');
    }

    /**
     * Store a newly created Estado in storage.
     * POST /estados
     *
     * @param CreateEstadoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoAPIRequest $request)
    {
        $input = $request->all();

        $estados = $this->estadoRepository->create($input);

        return $this->sendResponse($estados->toArray(), 'Estado guardado exitosamente');
    }

    /**
     * Display the specified Estado.
     * GET|HEAD /estados/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Estado $estado */
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            return $this->sendError('Estado no encontrado');
        }

        return $this->sendResponse($estado->toArray(), 'Estado recuperado con éxito');
    }

    /**
     * Update the specified Estado in storage.
     * PUT/PATCH /estados/{id}
     *
     * @param  int $id
     * @param UpdateEstadoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Estado $estado */
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            return $this->sendError('Estado no encontrado');
        }

        $estado = $this->estadoRepository->update($input, $id);

        return $this->sendResponse($estado->toArray(), 'Estado actualizado exitosamente');
    }

    /**
     * Remove the specified Estado from storage.
     * DELETE /estados/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Estado $estado */
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            return $this->sendError('Estado no encontrado');
        }

        $estado->delete();

        return $this->sendResponse($id, 'Estado eliminado exitosamente');
    }
}
