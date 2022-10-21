<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialist;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addview()
    {
        return view('admin.add_specialist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $specialist = new Specialist;

        $image = $request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('specialistimage', $imagename);
        $specialist->image = $imagename;

        $specialist->name = $request->specialistname;
        $specialist->phone = $request->phonenumber;
        $specialist->speciality = $request->speciality;

        $specialist->save();

        return redirect('/show_specialist_view')->with('message', 'Specialist Added Seccessfully !');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showview()
    {
        $specialists = Specialist::all();
        return view('admin.show_specialist', compact('specialists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editspecialist($id)
    {
        $specialist = Specialist::find($id);
        return view('admin.edit_specialist', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatespecialist(Request $request, $id)
    {
        $specialist = Specialist::find($id);
        $specialist->name = $request->specialistname;
        $specialist->phone = $request->phonenumber;
        $specialist->speciality = $request->speciality;

        $image = $request->file;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('specialistimage', $imagename);
            $specialist->image = $imagename;
        }

        $specialist->save();

        return redirect('/show_specialist_view')->with('message', 'Specialist Edited Seccessfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletespecialist($id)
    {
        $specialist = Specialist::find($id);
        $specialist->delete();
        return redirect()->back();
    }
}