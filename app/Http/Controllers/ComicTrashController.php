<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicTrashController extends Controller
{
    // Visualizza gli elementi nel cestino
    public function index()
    {
        // Comic::onlyTrash() è un metodo che recupera i record soft deleted || deleted_at != NULL
        $trashedComics = Comic::onlyTrashed()->get();
        return view('comics.trash', compact('trashedComics'));
    }

    // Ripristina un elemento
    public function restore($id)
    {   
        // Funzione ::withTrashed() che prende l'elemento all'$id dal softDeletes (colonna deleted_at)
        $comic = Comic::withTrashed()->findOrFail($id);
        // restore() -> ripristina
        $comic->restore();
        // Una volta ripristinato torno in index
        return redirect()->route('comics.index');
    }

    // Elimina definitivamente un elemento
    public function forceDelete($id)
    {   
        $comic = Comic::withTrashed()->findOrFail($id);
        $comic->forceDelete();

        return redirect()->route('comics.trash');
    }
}
