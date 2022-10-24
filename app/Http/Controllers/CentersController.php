<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CentersController extends Controller
{
    public function show($id)
{
    $center = \App\Models\Center::findOrFail($id);
    return view('center/center', compact('center'));
}
}
