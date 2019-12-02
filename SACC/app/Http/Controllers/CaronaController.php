<?php

namespace App\Http\Controllers;

use App\Carona;
use Illuminate\Http\Request;

class CaronaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caronas = Carona::all();
        return view('CRUDS.Carona.index')->with(['caronas' => $caronas]);
    }

    private function validation($request, $edit = false)
    {
        $complete = $edit ? '' : 'required';
        $validatedData = $request->validate([
            'nome' => 'required|max:190',
            'marca' => 'required|max:190',
            'ano' => 'required|integer|min:1900',
            'lugares' => 'required|max:100|min:1',
            'airbag' => '',
            'foto' => 'image|' . $complete
        ], [
            'nome.required' => 'Você não preencheu o nome!',
            'marca.required' => 'Você não preencheu a marca!',
            'ano.required' => 'Preencha um ano válido! (maior que 1900)',
            'lugares.required' => 'Você não preencheu quantos lugares tem o carro!',
            'foto.required' => 'Você não colocou uma foto!',
            'foto.image' => 'O arquivo que você enviou não é uma foto!'
        ]);
        return $validatedData;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUDS.Carona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carona  $carona
     * @return \Illuminate\Http\Response
     */
    public function show(Carona $carona)
    {
        return view('CRUDS.Carona.show')->with(['carona' => $carona]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carona  $carona
     * @return \Illuminate\Http\Response
     */
    public function edit(Carona $carona)
    {
        return view('CRUDS.Carona.edit')->with(['carona' => $carona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carona  $carona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carona $carona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carona  $carona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carona $carona)
    {
        //
    }
}
