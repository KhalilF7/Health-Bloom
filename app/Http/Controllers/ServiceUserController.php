<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; 

class ServiceUserController extends Controller
{
    
    public function index()
    {
        $services = Service::all();
        return view ('services.index')->with('services', $services);
    }

    public function show($id)
    {
        $service = Service::find($id);
        return view('services.show')->with('services', $service);
    }


    public function approve($id)
    {
        $service = Service::find($id);
        $service->status = 'inprogress';
        $service->save();
        return redirect()->back();
    }

    public function like($id)
    {
        $service = Service::find($id);
        $service->status = 'like';
        $service->save();
        return redirect()->back();
    }

    public function dislike($id)
    {
        $service = Service::find($id);
        $service->status = 'dislike';
        $service->save();
        return redirect()->back();
    }

    // public function update(Request $request, $id)
    // {
    //     // $service = Service::find($id);
    //     // $serviceapproved=$service;
    //     // $serviceapproved->status='inprogress';
    //     // $service->update($serviceapproved);
    //     // return redirect('serviceAdmin')->with('flash_message', 'service Approved!');
    //     // $service = Service::find($id);
    //     Service::where('id', $id)->update(array('status' => 'inprogress'));
    //     return redirect('service')->with('flash_message', 'service Approved!');
    // }
}
