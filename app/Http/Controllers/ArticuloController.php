<?php

namespace App\Http\Controllers;

use App\DataTables\ArticuloDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Repositories\ArticuloRepository;
use App\Repositories\ProveedorRepository;
use App\Repositories\MarcaRepository;
use App\Repositories\CategoriaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\Storage;
use App\Notifications\BajoStockArticulo;
use App\Models\User;
class ArticuloController extends AppBaseController

{
    /** @var  ArticuloRepository */
    private $articuloRepository;
    private $categoriaRepository;
    private $proveedorRepository;
    private $marcaRepository;

    public function __construct(ArticuloRepository $articuloRepo,
                                ProveedorRepository $proveedorRepo,
                                CategoriaRepository $categoriaRepo,
                                MarcaRepository $marcaRepo)
    {
        $this->articuloRepository = $articuloRepo;
        $this->marcaRepository = $marcaRepo;
        $this->categoriaRepository = $categoriaRepo;
        $this->proveedorRepository = $proveedorRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Articulo.
     *
     * @param ArticuloDataTable $articuloDataTable
     * @return Response
     */
    public function index(ArticuloDataTable $articuloDataTable)
    {
        return $articuloDataTable->render('articulos.index');
    }

    /**
     * Show the form for creating a new Articulo.
     *
     * @return Response
     */
    public function create()
    {
        $marcas = $this->marcaRepository->pluck('nombre', 'id');
        $categorias = $this->categoriaRepository->pluck('nombre','id');
        $proveedores =$this->proveedorRepository->pluck('nombre','id');
        return view('articulos.create', compact('marcas','categorias','proveedores'));
    }

    /**
     * Store a newly created Articulo in storage.
     *
     * @param CreateArticuloRequest $request
     *
     * @return Response
     */

    public function store(CreateArticuloRequest $request)
    {
        $input = $request->all();

        if($request->hasFile('foto')){
            $input['foto'] = $request->file('foto')->store('public');
        }
        $articulo = $this->articuloRepository->create($input);
        
        $articulo->proveedores()->sync($request->proveedores);

        Flash::success('Articulo guardado exitosamente.');

        return redirect(route('articulos.index'));
    }

    /**
     * Display the specified Articulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('articulos.index'));
        }

        return view('articulos.show')->with('articulo', $articulo);
    }

    /**
     * Show the form for editing the specified Articulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('articulos.index'));
        }
        $marcas = $this->marcaRepository->pluck('nombre', 'id');
        $categorias = $this->categoriaRepository->pluck('nombre','id');
        $proveedores =$this->proveedorRepository->pluck('nombre','id');

        return view('articulos.edit', compact('articulo','proveedores','categorias','marcas'));
    }

    /**
     * Update the specified Articulo in storage.
     *
     * @param  int              $id
     * @param UpdateArticuloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticuloRequest $request)
    {
        
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('articulos.index'));
        }

        $input = $request->all();

        if($request->hasFile('foto')){
            if(Storage::disk('local')->exists($articulo->foto))
            {
                Storage::delete($articulo->foto);
            }
            $input['foto'] = $request->file('foto')->store('public');
        }

        $articulo = $this->articuloRepository->update($input, $id);

        $articulo->proveedores()->sync($request->proveedores);

        Flash::success('Articulo actualizado exitosamente.');

        return redirect(route('articulos.index'));
    }

    /**
     * Remove the specified Articulo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('articulos.index'));
        }

        $this->articuloRepository->delete($id);

        Flash::success('Articulo eliminado exitosamente.');

        return redirect(route('articulos.index'));
    }

    public function notificar()
    {
        $art = $this->articuloRepository->find(1);
        $u = User::where('id','!=',auth()->user()->id)->get();
        return $u;
        $u->notify(new BajoStockArticulo($art));
        return $art::requireStock(1);
    }
}
