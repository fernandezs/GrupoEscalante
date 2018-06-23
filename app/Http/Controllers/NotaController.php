<?php

namespace App\Http\Controllers;

use App\DataTables\NotaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNotaRequest;
use App\Http\Requests\UpdateNotaRequest;
use App\Repositories\NotaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NotaController extends AppBaseController
{
    /** @var  NotaRepository */
    private $notaRepository;

    public function __construct(NotaRepository $notaRepo)
    {
        $this->notaRepository = $notaRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Nota.
     *
     * @param NotaDataTable $notaDataTable
     * @return Response
     */
    public function index(NotaDataTable $notaDataTable)
    {
        return $notaDataTable->render('notas.index');
    }

    /**
     * Show the form for creating a new Nota.
     *
     * @return Response
     */
    public function create()
    {
        return view('notas.create');
    }

    /**
     * Store a newly created Nota in storage.
     *
     * @param CreateNotaRequest $request
     *
     * @return Response
     */
    public function store(CreateNotaRequest $request)
    {
        $input = $request->all();

        $nota = $this->notaRepository->create($input);

        Flash::success('Nota guardado exitosamente.');

        return redirect(route('notas.index'));
    }

    /**
     * Display the specified Nota.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nota = $this->notaRepository->findWithoutFail($id);

        if (empty($nota)) {
            Flash::error('Nota no encontrado');

            return redirect(route('notas.index'));
        }

        return view('notas.show')->with('nota', $nota);
    }

    /**
     * Show the form for editing the specified Nota.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nota = $this->notaRepository->findWithoutFail($id);

        if (empty($nota)) {
            Flash::error('Nota no encontrado');

            return redirect(route('notas.index'));
        }

        return view('notas.edit')->with('nota', $nota);
    }

    /**
     * Update the specified Nota in storage.
     *
     * @param  int              $id
     * @param UpdateNotaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotaRequest $request)
    {
        $nota = $this->notaRepository->findWithoutFail($id);

        if (empty($nota)) {
            Flash::error('Nota no encontrado');

            return redirect(route('notas.index'));
        }

        $nota = $this->notaRepository->update($request->all(), $id);

        Flash::success('Nota actualizado exitosamente.');

        return redirect(route('notas.index'));
    }

    /**
     * Remove the specified Nota from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nota = $this->notaRepository->findWithoutFail($id);

        if (empty($nota)) {
            Flash::error('Nota no encontrado');

            return redirect(route('notas.index'));
        }

        $this->notaRepository->delete($id);

        Flash::success('Nota eliminado exitosamente.');

        return redirect(route('notas.index'));
    }
}
