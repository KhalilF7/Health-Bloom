<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; 
use App\Models\Center; 
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index($id)
    {
        $services = Service::where('center_id', $id)->get();
        return view ('services.indexAdmin')->with('services', $services);
    }

    public function create($id)
    {
        $center = Center::find($id);
        return view('services.create')->with('centers', $center);
    }

    public function store(Request $request)
    {
        $data = new Service;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->duration = $request->duration;
        $data->price = $request->price;
        $data->center_id = $request->center_id;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect('/center/serviceAdmin/'.$request->center_id)->with('flash_message', 'Service Addedd!'); 
    }

    public function show($id)
    {
        $service = Service::find($id);
        return view('services.show')->with('services', $service);
    }

    
    public function edit($id)
    {
        $service = Service::find($id);
        return view('services.edit')->with('services', $service);
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $input = $request->all();
        $service->update($input);
        return redirect('/center/serviceAdmin/'.$request->center_id)->with('flash_message', 'service Updated!');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return redirect('serviceAdmin')->with('flash_message', 'Service deleted!'); 
    }

    public function archive($id)
    {
        $service = Service::find($id);
        $service->status = 'Inactive';
        $service->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $service = Service::find($id);
        $service->status = 'Active';
        $service->save();
        return redirect()->back();
    }
}
