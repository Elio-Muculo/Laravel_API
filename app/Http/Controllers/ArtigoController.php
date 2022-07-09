<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;
use App\Http\Resources\ArtigoResource;


class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigos = Artigo::paginate(15);
        return ArtigoResource::collection($artigos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artigos = new Artigo();

        $artigos->titulo = $request->input('titulo');
        $artigos->conteudo = $request->input('conteudo');

        if ($artigos->save()) {
            return new ArtigoResource($artigos);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artigo = Artigo::findOrFail($id);
        return new ArtigoResource($artigo);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artigos = Artigo::findOrFail($id);

        $artigos->titulo = $request->input('titulo');
        $artigos->conteudo = $request->input('conteudo');

        if ($artigos->save()) {
            return new ArtigoResource($artigos);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artigos = Artigo::findOrFail($id);

        if ($artigos->save()) {
            return new ArtigoResource($artigos);
        }
    }
}
