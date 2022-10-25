<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ReclamationController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::all();
        return view('reclamation.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reclamation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
            'classification'=>'required',
        ]);
          $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Complaint::create($input);

            return redirect()->route('reclamation.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::find($id);
        return view('reclamation.show', compact('complaint'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $complaint = Complaint::find($id);
        return view('reclamation.edit')->with('complaint', $complaint);;

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

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
            'classification'=>'required',
        ]);

        $complaint = Complaint::find($id);
        $complaint->title = $request->title;
        $complaint->description = $request->description;
        $complaint->status = $request->status;
        $complaint->classification = $request->classification;
        $complaint->save();
        return redirect()->route('reclamation.index')->with('flash_message', 'complaint Updated!');
    }
}
