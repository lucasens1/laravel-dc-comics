<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Prelevo tutti i comics
        $comicsList = Comic::all();
        // Restituisco la page index, allego array
        return view('comics.index', compact('comicsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Restituisco la view
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComicRequest $request)
    {
        // Implemento il salvataggio dei dati
        $data = $request->all();
        $comic = new Comic();
        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        $comic->save();

        // Rindirizzo alla pagina del relativo nuovo comic tramite il suo id
        return redirect()->route("comics.show", ["comic" => $comic->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        // Restituisco la view in dettaglio del fumetto, passando l'intero oggetto
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        $data = $request->all();
        # Nella variabile $comic abbiamo i dati vecchi da aggiornare
        /* dd($comic, $data); */ // Così vediamo i dati a confronto

        $comic->update($data); // Per fare operazione serve $fillable nel model
        return redirect()->route('comics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        // Elimino il record dalla tabella
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
