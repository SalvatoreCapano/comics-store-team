<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use Faker\Generator as Faker;



class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComicRequest $request, Faker $faker)
    {
        /*$request->validate([
        ]);
        */

        $data = $request->all();
        $newComic = new Comic();
        $newComic->name = $faker->word();
        $newComic->description = $faker->sentence(10);
        $newComic->image = 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.amazon.it%2FBatman-Detective-Comics-Scott-Snyder%2Fdp%2F1401294197&psig=AOvVaw3qIy3zK99cSby5anNedncT&ust=1680097050308000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCKio17zf_v0CFQAAAAAdAAAAABAE';
        $newComic->price = $faker->randomFloat(2, 1, 999);
        $newComic->quantity = $faker->numberBetween(0, 1000);;
        $newComic->save();
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComicRequest  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComicRequest $request, $id)
    {
        $comic = Comic::findOrFail($id);

        // Prendo i dati
        $data = $request->all();

        // Richiamo la funzione validateData() per validate i dati
        $this->validateData($data);

        $comic->update($data);

        return redirect()->route('admin.comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //
    }
}
