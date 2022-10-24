<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Center;
use App\Models\Categorycenter;
use Illuminate\Support\Facades\Auth;



class CenterController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::all();
        return view ('admin.center.centers')->with('centers',$centers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriescenter = Categorycenter::all();

        return view ('admin.center.createCenter', compact('categoriescenter'));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
        $data = new Center;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->categorycenter_id = $request->categorycenter;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect('center')->with('flash_message', 'Center Addedd!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $center = Center::find($id);
        return view('center.showcenter')->with('centers', $center);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $center = Center::find($id);
        return view('admin.center.editcenter')->with('centers', $center);
    
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
        $center = Center::find($id);
        $input = $request->all();
        $center->update($input);
        return redirect('center')->with('flash_message', 'center Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Center::destroy($id);
        return redirect('center')->with('flash_message', 'Center deleted!'); 
    }
}
