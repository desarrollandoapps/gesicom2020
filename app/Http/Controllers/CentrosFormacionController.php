<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CentrosFormacionController extends Controller
{
    public function darSemileros(Request $request, $grupo)
    {
        {
            $semilleros = App\Gisemill::where('segruinv', $grupo)->get();
            return response()->json($semilleros);
        }
    }
}
