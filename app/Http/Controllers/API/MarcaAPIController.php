<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMarcaAPIRequest;
use App\Http\Requests\API\UpdateMarcaAPIRequest;
use App\Models\Marca;
use App\Repositories\MarcaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MarcaController
 * @package App\Http\Controllers\API
 */

class MarcaAPIController extends AppBaseController
{
    /** @var  MarcaRepository */
    private $marcaRepository;

    public function __construct(MarcaRepository $marcaRepo)
    {
        $this->marcaRepository = $marcaRepo;
    }

    /**
     * Display a listing of the Marca.
     * GET|HEAD /marcas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->marcaRepository->pushCriteria(new RequestCriteria($request));
        $this->marcaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $marcas = $this->marcaRepository->all();

        return $this->sendResponse($marcas->toArray(), 'Marcas recuperado con éxito');
    }

    /**
     * Store a newly created Marca in storage.
     * POST /marcas
     *
     * @param CreateMarcaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMarcaAPIRequest $request)
    {
        $input = $request->all();

        $marcas = $this->marcaRepository->create($input);

        return $this->sendResponse($marcas->toArray(), 'Marca guardado exitosamente');
    }

    /**
     * Display the specified Marca.
     * GET|HEAD /marcas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Marca $marca */
        $marca = $this->marcaRepository->findWithoutFail($id);

        if (empty($marca)) {
            return $this->sendError('Marca no encontrado');
        }

        return $this->sendResponse($marca->toArray(), 'Marca recuperado con éxito');
    }

    /**
     * Update the specified Marca in storage.
     * PUT/PATCH /marcas/{id}
     *
     * @param  int $id
     * @param UpdateMarcaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarcaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Marca $marca */
        $marca = $this->marcaRepository->findWithoutFail($id);

        if (empty($marca)) {
            return $this->sendError('Marca no encontrado');
        }

        $marca = $this->marcaRepository->update($input, $id);

        return $this->sendResponse($marca->toArray(), 'Marca actualizado exitosamente');
    }

    /**
     * Remove the specified Marca from storage.
     * DELETE /marcas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Marca $marca */
        $marca = $this->marcaRepository->findWithoutFail($id);

        if (empty($marca)) {
            return $this->sendError('Marca no encontrado');
        }

        $marca->delete();

        return $this->sendResponse($id, 'Marca eliminado exitosamente');
    }
}
