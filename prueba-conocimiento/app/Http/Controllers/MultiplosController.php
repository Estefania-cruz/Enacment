<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiplosController extends Controller
{
    // primero coloco la funcion principal que el index donde se manda a llamar la vista
    public function index()
    {
        return view('multiplos');
    }

    //funcion de carcular los multiplos
    public function calcularMultiplos(Request $request)
    {
        $numero = $request->input('numero'); //variable de numero
        $resultados = $this->calcularResultados($numero); //para guardar resultados

        // Guardar en la base de datos
        // Aquí deberías usar un modelo Eloquent para interactuar con la base de datos.

        return view('multiplos', ['numero' => $numero, 'resultados' => $resultados]);
    }


    private function calcularResultados($numero)
    {
        $resultados = [];

        for ($i = 1; $i <= $numero; $i++) {
            $multiplos = [];

            if ($i % 3 === 0) {
                $multiplos[] = ['valor' => $i, 'color' => 'green'];
            }
            if ($i % 5 === 0) {
                $multiplos[] = ['valor' => $i, 'color' => 'red'];
            }
            if ($i % 7 === 0) {
                $multiplos[] = ['valor' => $i, 'color' => 'blue'];
            }

            $resultados[] = ['numero' => $i, 'multiplos' => $multiplos];
        }

        return $resultados;
    }
}

