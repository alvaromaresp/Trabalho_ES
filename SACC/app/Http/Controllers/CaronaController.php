<?php

namespace App\Http\Controllers;

use Auth;
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
            'data' => 'required|date',
            'local' => 'required|max:190',
            'duracao' => 'required|integer|max:900',
            'horario' => 'required',
            'carro' => 'required|exists:carros,id'
        ], [
            'local.max' => 'Local não deve ter mais que 190 caracteres!',
            'duracao.integer' => 'Duração deve ser um inteiro!',
            'duracao.max' => 'Máximo de 900 de duração!',
            'carro.exists' => 'Carro deve ser um carro seu, válido e registrado!',
            'data.required' => 'Insira uma data válida!',
            'local.required' => 'Insira um local!',
            'duracao.required' => 'Insira a duração da viagem!',
            'horario.required' => 'Insira um horario válido!',
            'carro.required' => 'Selecione um carro válido!',
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
        try {
            $validatedData = $this->validation($request);
            $all = $request->all();
            $all['oferece'] = Auth::user()->id;
            $carona = Carona::create($all);
            return redirect()->route('carona.show', $carona)->with('msg', "Criado com sucesso!");
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
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
        try {
            if ($carona->oferece->id != Auth::user()->id)
                throw new \Exception("Você não é dono dessa carona!");
            return view('CRUDS.Carona.edit')->with(['carona' => $carona]);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
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
        try {
            if ($carona->oferece->id != Auth::user()->id)
                throw new \Exception("Você não é dono dessa carona!");
            $validatedData = $this->validation($request);
            $carona->fill($request->all)->save();
            return redirect()->route('carona.show', $carona)->with('msg', "Editado com sucesso!");
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carona  $carona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carona $carona)
    {


        try {
            if ($carona->oferece->id != Auth::user()->id)
                throw new \Exception("Você não é dono dessa carona!");
            $carona->delete();
            return redirect()->route('carona.index')->with('msg', 'Deletado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors('Erro ao apagar: ' . $e->getMessage());
        }
    }
}
