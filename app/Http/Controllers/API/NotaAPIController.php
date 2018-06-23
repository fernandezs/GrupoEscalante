<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNotaAPIRequest;
use App\Http\Requests\API\UpdateNotaAPIRequest;
use App\Models\Nota;
use App\Repositories\NotaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class NotaController
 * @package App\Http\Controllers\API
 */

class NotaAPIController extends AppBaseController
{
    /** @var  NotaRepository */
    private $notaRepository;

    public function __construct(NotaRepository $notaRepo)
    {
        $this->notaRepository = $notaRepo;
    }

    /**
     * Display a listing of the Nota.
     * GET|HEAD /notas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->notaRepository->pushCriteria(new RequestCriteria($request));
        $this->notaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $notas = $this->notaRepository->all();

        return $this->sendResponse($notas->toArray(), 'Notas recuperado con éxito');
    }

    /**
     * Store a newly created Nota in storage.
     * POST /notas
     *
     * @param CreateNotaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNotaAPIRequest $request)
    {
        $input = $request->all();

        $notas = $this->notaRepository->create($input);

        return $this->sendResponse($notas->toArray(), 'Nota guardado exitosamente');
    }

    /**
     * Display the specified Nota.
     * GET|HEAD /notas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Nota $nota */
        $nota = $this->notaRepository->findWithoutFail($id);

        if (empty($nota)) {
            return $this->sendError('Nota no encontrado');
        }

        return $this->sendResponse($nota->toArray(), 'Nota recuperado con éxito');
    }

    /**
     * Update the specified Nota in storage.
     * PUT/PATCH /notas/{id}
     *
     * @param  int $id
     * @param UpdateNotaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Nota $nota */
        $nota = $this->notaRepository->findWithoutFail($id);

        if (empty($nota)) {
            return $this->sendError('Nota no encontrado');
        }

        $nota = $this->notaRepository->update($input, $id);

        return $this->sendResponse($nota->toArray(), 'Nota actualizado exitosamente');
    }

    /**
     * Remove the specified Nota from storage.
     * DELETE /notas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Nota $nota */
        $nota = $this->notaRepository->findWithoutFail($id);

        if (empty($nota)) {
            return $this->sendError('Nota no encontrado');
        }

        $nota->delete();

        return $this->sendResponse($id, 'Nota eliminado exitosamente');
    }
}
