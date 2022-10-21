<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; 

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view ('services.indexAdmin')->with('services', $services);
    }

    public function indexUser()
    {
        $services = Service::all();
        return view ('services.index')->with('services', $services);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Service::create($input);
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
