<?php

namespace App\Http\Controllers;

use Auth;
use App\Carona;
use App\Feedback;
use Illuminate\Http\Request;


class FeedbackController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Carona $carona)
    {
        return view('CRUDS.Feedback.create')->with('carona', $carona);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Carona $carona
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Carona $carona)
    {
        try {


            if (!$carona->getProcura->contains('id', Auth::user()->id)) {
                throw new \Exception('Você não pode dar feedback para uma carona que não realizou!!!');
            }
            if ($carona->data < date('Y-m-d')) {
                throw new \Exception('Você não pode dar feedback para uma carona que ainda não aconteceu!!!');
            }

            $validatedData = $this->validation($request);
            $all = $request->all();
            $all['carona'] = $carona->id;
            $all['autor'] = Auth::user()->id;
            $feedback = Feedback::create($all);
            return redirect()->route('carona.show', $carona)->with('msg', 'Feedback enviado com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }


    private function validation($request, $edit = false)
    {
        $complete = $edit ? '' : '|required';
        $validatedData = $request->validate([
            'conteudo' => 'required|max:1000'
        ], [
            'conteudo.required' => 'Você deve inserir um texto para o feedback!',
            'conteudo.max' => 'Máximo de 1000 caracteres no feedback!!!'
        ]);
        return $validatedData;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        try {
            $carona = $feedback->getCarona;
            $feedback->delete();
            return redirect()->route('carona.show', $carona);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
