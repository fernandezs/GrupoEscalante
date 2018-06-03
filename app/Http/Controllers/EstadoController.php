<?php

namespace App\Http\Controllers;

use App\DataTables\EstadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEstadoRequest;
use App\Http\Requests\UpdateEstadoRequest;
use App\Repositories\EstadoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EstadoController extends AppBaseController
{
    /** @var  EstadoRepository */
    private $estadoRepository;

    public function __construct(EstadoRepository $estadoRepo)
    {
        $this->estadoRepository = $estadoRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Estado.
     *
     * @param EstadoDataTable $estadoDataTable
     * @return Response
     */
    public function index(EstadoDataTable $estadoDataTable)
    {
        return $estadoDataTable->render('estados.index');
    }

    /**
     * Show the form for creating a new Estado.
     *
     * @return Response
     */
    public function create()
    {
        return view('estados.create');
    }

    /**
     * Store a newly created Estado in storage.
     *
     * @param CreateEstadoRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoRequest $request)
    {
        $input = $request->all();

        $estado = $this->estadoRepository->create($input);

        Flash::success('Estado guardado exitosamente.');

        return redirect(route('estados.index'));
    }

    /**
     * Display the specified Estado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            Flash::error('Estado no encontrado');

            return redirect(route('estados.index'));
        }

        return view('estados.show')->with('estado', $estado);
    }

    /**
     * Show the form for editing the specified Estado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            Flash::error('Estado no encontrado');

            return redirect(route('estados.index'));
        }

        return view('estados.edit')->with('estado', $estado);
    }

    /**
     * Update the specified Estado in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoRequest $request)
    {
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            Flash::error('Estado no encontrado');

            return redirect(route('estados.index'));
        }

        $estado = $this->estadoRepository->update($request->all(), $id);

        Flash::success('Estado actualizado exitosamente.');

        return redirect(route('estados.index'));
    }

    /**
     * Remove the specified Estado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            Flash::error('Estado no encontrado');

            return redirect(route('estados.index'));
        }

        $this->estadoRepository->delete($id);

        Flash::success('Estado eliminado exitosamente.');

        return redirect(route('estados.index'));
    }
}
