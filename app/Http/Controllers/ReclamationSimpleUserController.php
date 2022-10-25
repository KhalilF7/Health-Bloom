<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Complaint;

class ReclamationSimpleUserController extends Controller
{
    //
        //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = auth()->user()->id;
        $complaints = Complaint::where('user_id','=',$id)->get();
        return view('reclamationSimpleUser.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reclamationSimpleUser.create');
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
            'description'=>'required|max:255',
            'status'=>'required',
            'classification'=>'required',
        ]);
          $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Complaint::create($input);
        return redirect()->route('complaint.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::find($id);
        return view('reclamationSimpleUser.show', compact('complaint'));
    }
}
