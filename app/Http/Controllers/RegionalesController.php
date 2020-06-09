<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class RegionalesController extends Controller
{
    public function darCentros(Request $request, $regional)
    {
        // if($request->ajax())
        {
            $centros = App\Gicenfor::where('cfregion', $regional)->get();
            return response()->json($centros);
        }
    }
}
