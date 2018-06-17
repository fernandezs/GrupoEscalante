<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Catalogo;
use Flash;
class CatalogoController extends Controller
{
	public function show(Catalogo $catalogo)
	{
		return Storage::download($catalogo->url);
	}
    public function store(Request $request)
    {
    	$input['proveedor_id'] = $request->proveedor_id;
    	$input['name'] = $request->file('archivo')->getClientOriginalName();
    	$input['type'] = $request->file('archivo')->getClientMimeType();
        $input['url'] =  $request->file('archivo')->store('public');
 		$catalogo = Catalogo::create($input); 

    	return response()->json(['uploaded' => Storage::url($catalogo->url)]);
    }

    public function destroy($id)
    {
        $catalogo = Catalogo::find($id);
        $catalogo->delete();
        Storage::delete($catalogo->url);
        return redirect(route('proveedores.catalogos', $catalogo->proveedor_id));
    }
}
