<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; 
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view ('services.indexAdmin')->with('services', $services);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $data = new Service;
        $data->name = $request->name;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->duration = $request->duration;
        $data->price = $request->price;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect('serviceAdmin')->with('flash_message', 'Service Addedd!'); 
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
        return redirect('serviceAdmin')->with('flash_message', 'service Updated!');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return redirect('serviceAdmin')->with('flash_message', 'Service deleted!'); 
    }
}
