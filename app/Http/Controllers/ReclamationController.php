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

         if(Auth::user()->usertype==1)
        {
            return view('reclamation.index', compact('complaints'));
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          if(Auth::user()->usertype==1)
        {
        return view('reclamation.create');
        }
        else
        {
            return redirect()->back();
        }
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
        if(Auth::user()->usertype==1)
        {
            return redirect()->route('reclamation.index');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::find($id);
        if(Auth::user()->usertype==1)
        {
            return view('reclamation.show', compact('complaint'));
        }
        else
        {
            return redirect()->back();
        }
    }
}
