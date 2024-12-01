<?php

namespace App\Http\Controllers;

use App\Models\Rekammedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function show($id)
    {
        $rekamMedis = Rekammedis::findOrFail($id);
        return view('rekammedis', compact('rekamMedis'));
    }
    
}
