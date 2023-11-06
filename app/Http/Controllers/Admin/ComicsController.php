<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     * mostra lista fumetti
     */
    public function index()
    {

        $comics = Comics::all();
        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     * mostra il form per creare un nuovo fumetto
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     * memorizza un nuovo fumetto nel database
     */
    public function store(Request $request)
    {
        // Validazione dei dati in entrata
        $validatedData = $request->validate([
            'title' => 'required|bail|min:3|max:150',
            'price' => 'required|min:3|max:7',
            'thumb' => 'nullable|image|max:150',
        ]);

        // Gestione upload immagine
        if ($request->has('thumb')) {
            $file_path = Storage::put('public/comics_img', $request->file('thumb'));
            $validatedData['thumb'] = $file_path; // Aggiorna i dati validati con il percorso del file
        }

        // Crea un nuovo fumetto con i dati validati
        $new_comic = Comics::create($validatedData);

        // Reindirizza l'utente
        return to_route('comics.index')->with('success', 'Comic created successfully!');
    }

    /**
     * Display the specified resource.
     * mostra solo un fumetto
     */
    public function show(Comics $comic)
    {
        return view('admin.comics.show', ['comic' => $comic]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comics $comic)
    {
        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comics $comic)
    {
        //data raccoglie tutti i dati (non con validation però)
        // $data = $request->all();

        $validatedData = $request->validate([
            'title' => 'required|bail|min:3|max:150',
            'price' => 'required|min:3|max:7',
            'thumb' => 'nullable|image|max:150',
        ]);

        // Gestione dell'immagine caricata
        if ($request->hasFile('thumb')) {
            // Se esiste già un'immagine, la eliminiamo
            if ($comic->thumb && Storage::exists($comic->thumb)) {
                Storage::delete($comic->thumb);
            }

            // Carica la nuova immagine e ottiene il percorso del file
            $file_path = Storage::put('comics_img', $request->file('thumb'));
            $validatedData['thumb'] = $file_path;
        }

        // Aggiorna il fumetto con i dati validati
        $comic->update($validatedData);

        // Reindirizza l'utente 
        return to_route('comics.show', $comic)->with('message', 'Comic updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comics $comic)
    {

        // if(!is_null($comic->comics_img)) {
        //     Storage::delete($comic->comics_img);
        // }

        $comic->delete();

        //post redirect get
        return to_route('comics.index')->with('message', 'Well done! Comic deleted successfully');
    }
}
