<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Comment;


use Illuminate\Http\Request;

class ComplaintAdminController extends Controller
{

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $complaints = Complaint::all();
        error_log($complaints);
        return view('complaintsAdmin.index', compact('complaints'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('complaintsAdmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        Complaint::create($input);
        return redirect('AdminComplaint')->with('flash_message',' Complaint Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::find($id);
        $comments = Comment::where('complaintId','=',$complaint->id)->first();
        error_log($complaint);
        error_log($comments);
        return view('complaintsAdmin.show',compact('complaint','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $complaint = Complaint::find($id);
        return view('complaintsAdmin.edit')->with('complaints',$complaint);
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
        //
        $complaint = Complaint::find($id);
        $input = $request->all();
        $complaint->update($input);
        return redirect('AdminComplaint')->with('flash_mssage','Complaint updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Complaint::destroy($id);
        return redirect('AdminComplaint')->with('flash_message','Complaint deleted !');
    }

}
