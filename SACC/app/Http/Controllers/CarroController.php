<?php

namespace App\Http\Controllers;

use Auth;
use App\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Auth::user()->carros;
        return view('CRUDS.Carro.index')->with(['carros' => $carros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUDS.Carro.create');
    }
    private function validation($request, $edit = false)
    {
        $complete = $edit ? '' : 'required';
        $validatedData = $request->validate([
            'nome' => 'max:190',
            'marca' => 'required|max:190',
            'ano' => 'required|integer|min:1900',
            'lugares' => 'required|max:100|min:1',
            'modelo' => 'required|max:190',
            'airbag' => '',
            'foto' => 'image|' . $complete
        ], [
            'nome.required' => 'Você não preencheu o nome!',
            'modelo.required' => 'Você não preencheu o modelo!',
            'marca.required' => 'Você não preencheu a marca!',
            'ano.required' => 'Preencha um ano válido! (maior que 1900)',
            'lugares.required' => 'Você não preencheu quantos lugares tem o carro!',
            'foto.required' => 'Você não colocou uma foto!',
            'foto.image' => 'O arquivo que você enviou não é uma foto!'
        ]);
        return $validatedData;
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
            $all['user_id'] = Auth::user()->id;
            $all['airbag'] = $request->has('airbag') ? true : false;
            $all['foto'] = " ";
            $carro = Carro::create($all);

            $file = $request->file('foto');
            $extension = strtolower($file->getClientOriginalExtension());
            $path = $this->uploadPhoto($file, '/public_images/Carro/' . $carro->id . "/foto." . $extension);
            $carro->fill(['foto' => $path])->save();
            return redirect()->route('carro.show', $carro)->with('msg', 'Criado com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function show(Carro $carro)
    {
        if ($carro->user->id == Auth::user()->id)
            return view('CRUDS.Carro.show')->with('carro', $carro);
        else
            return back()->withErrors("Você não é dono desse carro!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function edit(Carro $carro)
    {
        if ($carro->user->id == Auth::user()->id)
            return view('CRUDS.Carro.edit')->with('carro', $carro);
        else
            return back()->withErrors("Você não é dono desse carro!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carro $carro)
    {

        try {
            if ($carro->user->id != Auth::user()->id)
                return new \Exception("Você não é dono desse carro!");
            $validatedData = $this->validation($request, true);


            $all = $request->all();
            $all['user_id'] = Auth::user()->id;
            $all['airbag'] = $request->has('airbag') ? true : false;

            if ($request->has('foto')) {
                $this->removePhoto('/public_images/Carro/' . $carro->id);
                $file = $request->file('foto');
                $extension = strtolower($file->getClientOriginalExtension());
                $path = $this->uploadPhoto($file, '/public_images/Carro/' . $carro->id . "/foto." . $extension);
                $all['foto'] = $path;
            }


            $carro->fill($all)->save();
            return back()->with('msg', 'Editado com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carro $carro)
    {
        try {
            $msg = "Deletado com sucesso!";
            if ($carro->user->id != Auth::user()->id)
                throw new Exception("Você não é dono desse carro!");
            try {
                $this->removePhoto('/public_images/Carro/' . $carro->id);
            } catch (\Spatie\Dropbox\Exceptions\BadRequest $e) {
                $msg .= " (Obs.: Imagem já não existia!)";
            }
            $carro->delete();
            return back()->with('msg', $msg);
        } catch (\Exception $e) {
            return back()->withErrors('Erro ao apagar: ' . $e->getMessage());
        }
    }
}
