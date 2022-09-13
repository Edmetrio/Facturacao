<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\Entidade;
use Illuminate\Http\Request;

class EntidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Entidade::orderBy('created_at', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $entidade = Entidade::create($request->all());
        if($entidade){
            return ["resultado"=>"Entidade criada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
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
        return Entidade::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entidade $entidade)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $entidade->update($request->all());
        if($entidade){
            return ["resultado"=>"Entidade actualizado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entidade $entidade)
    {
        $entidade->delete();
        if($entidade){
            return ["resultado"=>"Entidade apagada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }
}
