<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateArticuloAPIRequest;
use App\Http\Requests\API\UpdateArticuloAPIRequest;
use App\Models\Articulo;
use App\Repositories\ArticuloRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ArticuloController
 * @package App\Http\Controllers\API
 */

class ArticuloAPIController extends AppBaseController
{
    /** @var  ArticuloRepository */
    private $articuloRepository;

    public function __construct(ArticuloRepository $articuloRepo)
    {
        $this->articuloRepository = $articuloRepo;
    }

    /**
     * Display a listing of the Articulo.
     * GET|HEAD /articulos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->articuloRepository->pushCriteria(new RequestCriteria($request));
        $this->articuloRepository->pushCriteria(new LimitOffsetCriteria($request));
        $articulos = Articulo::with('marca')->get();

        return $this->sendResponse($articulos, 'Articulos recuperado con éxito');
    }

    /**
     * Store a newly created Articulo in storage.
     * POST /articulos
     *
     * @param CreateArticuloAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateArticuloAPIRequest $request)
    {
        $input = $request->all();

        $articulos = $this->articuloRepository->create($input);

        return $this->sendResponse($articulos->toArray(), 'Articulo guardado exitosamente');
    }

    /**
     * Display the specified Articulo.
     * GET|HEAD /articulos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Articulo $articulo */
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            return $this->sendError('Articulo no encontrado');
        }

        return $this->sendResponse($articulo->toArray(), 'Articulo recuperado con éxito');
    }

    /**
     * Update the specified Articulo in storage.
     * PUT/PATCH /articulos/{id}
     *
     * @param  int $id
     * @param UpdateArticuloAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticuloAPIRequest $request)
    {
        $input = $request->all();

        /** @var Articulo $articulo */
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            return $this->sendError('Articulo no encontrado');
        }

        $articulo = $this->articuloRepository->update($input, $id);

        return $this->sendResponse($articulo->toArray(), 'Articulo actualizado exitosamente');
    }

    /**
     * Remove the specified Articulo from storage.
     * DELETE /articulos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Articulo $articulo */
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            return $this->sendError('Articulo no encontrado');
        }

        $articulo->delete();

        return $this->sendResponse($id, 'Articulo eliminado exitosamente');
    }
}
