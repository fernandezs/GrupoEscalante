<?php

namespace App\Http\Controllers;

use App\DataTables\DetalleReparacionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDetalleReparacionRequest;
use App\Http\Requests\UpdateDetalleReparacionRequest;
use App\Repositories\DetalleReparacionRepository;
use App\Models\Articulo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DetalleReparacionController extends AppBaseController
{
    /** @var  DetalleReparacionRepository */
    private $detalleReparacionRepository;

    public function __construct(DetalleReparacionRepository $detalleReparacionRepo)
    {
        $this->detalleReparacionRepository = $detalleReparacionRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the DetalleReparacion.
     *
     * @param DetalleReparacionDataTable $detalleReparacionDataTable
     * @return Response
     */
    public function index(DetalleReparacionDataTable $detalleReparacionDataTable)
    {
        return $detalleReparacionDataTable->render('detalle_reparacion.index');
    }

    /**
     * Show the form for creating a new DetalleReparacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('detalle_reparacion.create');
    }

    /**
     * Store a newly created DetalleReparacion in storage.
     *
     * @param CreateDetalleReparacionRequest $request
     *
     * @return Response
     */
    public function store(CreateDetalleReparacionRequest $request)
    {
        $input = $request->all();
        if($request->ajax()) {
            $detalleReparacion = $this->detalleReparacionRepository->create($input);
            $articulo = Articulo::with('marca')->find($detalleReparacion->articulo_id);
            $detalleReparacion['articulo'] = $articulo;
            return $this->sendResponse($detalleReparacion->toArray(), 'Detalle guardado exitosamente.');
        };
        

        Flash::success('Detalle Reparacion guardado exitosamente.');

        return redirect(route('detalleReparacion.index'));
    }

    /**
     * Display the specified DetalleReparacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detalleReparacion = $this->detalleReparacionRepository->findWithoutFail($id);

        if (empty($detalleReparacion)) {
            Flash::error('Detalle Reparacion no encontrado');

            return redirect(route('detalleReparacion.index'));
        }

        return view('detalle_reparacion.show')->with('detalleReparacion', $detalleReparacion);
    }

    /**
     * Show the form for editing the specified DetalleReparacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detalleReparacion = $this->detalleReparacionRepository->findWithoutFail($id);

        if (empty($detalleReparacion)) {
            Flash::error('Detalle Reparacion no encontrado');

            return redirect(route('detalleReparacion.index'));
        }

        return view('detalle_reparacions.edit')->with('detalleReparacion', $detalleReparacion);
    }

    /**
     * Update the specified DetalleReparacion in storage.
     *
     * @param  int              $id
     * @param UpdateDetalleReparacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetalleReparacionRequest $request)
    {
        $detalleReparacion = $this->detalleReparacionRepository->findWithoutFail($id);

        if (empty($detalleReparacion)) {
            Flash::error('Detalle Reparacion no encontrado');

            return redirect(route('detalleReparacion.index'));
        }

        $detalleReparacion = $this->detalleReparacionRepository->update($request->all(), $id);

        Flash::success('Detalle Reparacion actualizado exitosamente.');

        return redirect(route('detalleReparacion.index'));
    }

    /**
     * Remove the specified DetalleReparacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detalleReparacion = $this->detalleReparacionRepository->findWithoutFail($id);

        if (empty($detalleReparacion)) {
            Flash::error('Detalle Reparacion no encontrado');

            return redirect(route('detalleReparacion.index'));
        }
        $this->detalleReparacionRepository->delete($id);
        return $this->sendResponse([], 'Detalle eliminado exitosamente.');
        

    }
}
