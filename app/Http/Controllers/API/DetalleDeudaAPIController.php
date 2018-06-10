<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDetalleDeudaAPIRequest;
use App\Http\Requests\API\UpdateDetalleDeudaAPIRequest;
use App\Models\DetalleDeuda;
use App\Models\Deuda;
use App\Repositories\ArticuloRepository;
use App\Repositories\DetalleDeudaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DetalleDeudaController
 * @package App\Http\Controllers\API
 */

class DetalleDeudaAPIController extends AppBaseController
{
    /** @var  DetalleDeudaRepository */
    private $detalleDeudaRepository;
    private $articuloRepository;

    public function __construct(DetalleDeudaRepository $detalleDeudaRepo, ArticuloRepository $articuloRepo)
    {
        $this->detalleDeudaRepository = $detalleDeudaRepo;
        $this->articuloRepository = $articuloRepo;
    }

    /**
     * Display a listing of the DetalleDeuda.
     * GET|HEAD /detalleDeudas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detalleDeudaRepository->pushCriteria(new RequestCriteria($request));
        $this->detalleDeudaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $detalleDeudas = $this->detalleDeudaRepository->all();

        return $this->sendResponse($detalleDeudas->toArray(), 'Detalle Deudas recuperado con éxito');
    }

    public function detallesByDeudaID($id)
    {
        $detalles = DetalleDeuda::where('deuda_id', '=', $id)->get();
        return $detalles;
    }

    /**
     * Store a newly created DetalleDeuda in storage.
     * POST /detalleDeudas
     *
     * @param CreateDetalleDeudaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDetalleDeudaAPIRequest $request)
    {
        $input = $request->all();

        $detalleDeudas = $this->detalleDeudaRepository->create($input);
        $articulo = $this->articuloRepository->with('marca')->findWithoutFail($detalleDeudas->articulo_id);
        $articulo->cantidad = $articulo->cantidad - $detalleDeudas->cantidad;
        $articulo->save();
        $detalleDeudas['articulo'] = $articulo;

        $deuda = $detalleDeudas->deuda;
        $subtotal = $detalleDeudas->sum('subtotal');
        $deuda->interes ? $importe_interes = ($deuda->interes*0.01) * $subtotal : $importe_interes= 0;
        $deuda->importe_total = $subtotal + $importe_interes;
        $deuda->save();
        return $this->sendResponse($detalleDeudas->toArray(), 'Detalle Deuda guardado exitosamente');
    }

    /**
     * Display the specified DetalleDeuda.
     * GET|HEAD /detalleDeudas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DetalleDeuda $detalleDeuda */
        $detalleDeuda = $this->detalleDeudaRepository->findWithoutFail($id);

        if (empty($detalleDeuda)) {
            return $this->sendError('Detalle Deuda no encontrado');
        }

        return $this->sendResponse($detalleDeuda->toArray(), 'Detalle Deuda recuperado con éxito');
    }

    /**
     * Update the specified DetalleDeuda in storage.
     * PUT/PATCH /detalleDeudas/{id}
     *
     * @param  int $id
     * @param UpdateDetalleDeudaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetalleDeudaAPIRequest $request)
    {
        $input = $request->all();

        /** @var DetalleDeuda $detalleDeuda */
        $detalleDeuda = $this->detalleDeudaRepository->findWithoutFail($id);

        if (empty($detalleDeuda)) {
            return $this->sendError('Detalle Deuda no encontrado');
        }

        $detalleDeuda = $this->detalleDeudaRepository->update($input, $id);

        return $this->sendResponse($detalleDeuda->toArray(), 'DetalleDeuda actualizado exitosamente');
    }

    /**
     * Remove the specified DetalleDeuda from storage.
     * DELETE /detalleDeudas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DetalleDeuda $detalleDeuda */
        $detalleDeuda = $this->detalleDeudaRepository->findWithoutFail($id);

        if (empty($detalleDeuda)) {
            return $this->sendError('Detalle Deuda no encontrado');
        }

        $detalleDeuda->delete();
        $articulo = $this->articuloRepository->findWithoutFail($detalleDeuda->articulo_id);
        $articulo->cantidad = $articulo->cantidad + $detalleDeuda->cantidad;
        $articulo->save();
        $articulo['marca'] = $articulo->marca;
        $deuda = $detalleDeuda->deuda;
        $subtotal = $detalleDeuda->sum('subtotal');
        $deuda->interes ? $importe_interes = ($deuda->interes*0.01) * $subtotal : $importe_interes= 0;
        $deuda->importe_total = $subtotal + $importe_interes;
        $deuda->save();

        return $this->sendResponse($articulo->toArray(), 'Detalle Deuda eliminado exitosamente');
    }
}
