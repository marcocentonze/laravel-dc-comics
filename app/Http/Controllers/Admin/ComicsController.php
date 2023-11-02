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
        //crea un'istanza nel modello Comics
        $new_comic = new Comics();

        //gestione upload immagine
        if ($request->has('thumb')) {
            $file_path = Storage::put('public/comics_img', $request->thumb);
            $new_comic->thumb = $file_path;
        }

        $new_comic->title = $request->title;
        $new_comic->price = $request->price;

        $new_comic->save();

        return view('admin.comics.create');
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
           //data raccoglie tutti i dati 
           $data = $request->all();

           if ($request->has('thumb') && $comic->thumb) {
   
               $new_thumb = $request->thumb;
   
               Storage::delete($comic['thumb']);
   
               $file_path = Storage::put('comics_img', $new_thumb);
   
               $data['thumb'] = $file_path;
           }
   
           $comic->update($data);
   
           return to_route('comics.show', $comic);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comics $comic)
    {
        //
    }
}
