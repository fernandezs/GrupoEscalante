<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmpleadoAPIRequest;
use App\Http\Requests\API\UpdateEmpleadoAPIRequest;
use App\Models\Empleado;
use App\Repositories\EmpleadoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers\API
 */

class EmpleadoAPIController extends AppBaseController
{
    /** @var  EmpleadoRepository */
    private $empleadoRepository;

    public function __construct(EmpleadoRepository $empleadoRepo)
    {
        $this->empleadoRepository = $empleadoRepo;
    }

    /**
     * Display a listing of the Empleado.
     * GET|HEAD /empleados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->empleadoRepository->pushCriteria(new RequestCriteria($request));
        $this->empleadoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $empleados = $this->empleadoRepository->all();

        return $this->sendResponse($empleados->toArray(), 'Empleados recuperado con éxito');
    }

    /**
     * Store a newly created Empleado in storage.
     * POST /empleados
     *
     * @param CreateEmpleadoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpleadoAPIRequest $request)
    {
        $input = $request->all();

        $empleados = $this->empleadoRepository->create($input);

        return $this->sendResponse($empleados->toArray(), 'Empleado guardado exitosamente');
    }

    /**
     * Display the specified Empleado.
     * GET|HEAD /empleados/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Empleado $empleado */
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            return $this->sendError('Empleado no encontrado');
        }

        return $this->sendResponse($empleado->toArray(), 'Empleado recuperado con éxito');
    }

    /**
     * Update the specified Empleado in storage.
     * PUT/PATCH /empleados/{id}
     *
     * @param  int $id
     * @param UpdateEmpleadoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpleadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Empleado $empleado */
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            return $this->sendError('Empleado no encontrado');
        }

        $empleado = $this->empleadoRepository->update($input, $id);

        return $this->sendResponse($empleado->toArray(), 'Empleado actualizado exitosamente');
    }

    /**
     * Remove the specified Empleado from storage.
     * DELETE /empleados/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Empleado $empleado */
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            return $this->sendError('Empleado no encontrado');
        }

        $empleado->delete();

        return $this->sendResponse($id, 'Empleado eliminado exitosamente');
    }
}
