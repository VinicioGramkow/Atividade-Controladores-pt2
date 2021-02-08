<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consulta', ['agenda' => session('agenda')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criacao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = session()->increment('id');

        session()->push('agenda', [
            'id'       => $id,
            'nome'     => $request['nome'],
            'dataNasc' => $request['dataNasc'],
            'celular'  => $request['celular'],
            'telefone' => $request['telefone']
        ]);

        return view('consulta', ['agenda' => session()->get('agenda')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = session()->get('agenda');
        $contato = $agenda[$this->search($id, $agenda)];

        return view('detalhamento', ['contato' => $contato]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = session()->get('agenda');
        $contato = $agenda[$this->search($id, $agenda)];
        return view('edicao', ['contato' => $contato]);
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
        $agenda = session()->get('agenda');

        unset($agenda[$this->search($id, $agenda)]);
        array_push($agenda, [
            'id'       => $id,
            'nome'     => $request['nome'],
            'dataNasc' => $request['dataNasc'],
            'celular'  => $request['celular'],
            'telefone' => $request['telefone']
        ]);
        session()->put('agenda', array_values($agenda));

        return view('consulta', ['agenda' => session()->get('agenda')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = session()->get('agenda');

        unset($agenda[$this->search($id, $agenda)]);
        session()->pull('agenda');
        session()->put('agenda', array_values($agenda));

        return view('consulta', ['agenda' => session()->get('agenda')]);
    }

    /**
     * @param int $id id do registro a ser buscado
     * @param array[] $agenda array contendo os registros
     *
     * @return int- retorna a posição do elemento passado como parametro no array
     */
    private function search($id, $agenda){
        return array_search($id, array_column($agenda, 'id'));
    }
}
