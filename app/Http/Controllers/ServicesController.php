<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\serviceTypes;
use Illuminate\Http\Response;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::with('serviceType')->orderBy('id','DESC')->paginate(6);
        return view('admin.services.services', compact('services'));
    }

    public function addServices()
    {
        $service_types = serviceTypes::all();
        return view('admin.services.add-service', compact('service_types'));
    }

    public function storeServices(Request $request)
    {
        try {
            // validate request data
            $create_service_form = $request->validate([
                'service_type_id' => 'required|exists:service_types,id',
                'service' => 'required|string',
                'status' => 'required|string',
            ]);


            $create_service_form['created-by'] = auth()->user()->id;

            Service::create($create_service_form);

            return response()->json(['message' => 'Service Added Successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Error adding service: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function editServices(Service $service)
    {
        $service_types = serviceTypes::all();
        return view('admin.services.edit-service', compact('service','service_types'));
    }



    public function updateServices(Request $request, Service $service)
    {
        try {

            // validate request data
            $update_service =  $request->validate([
                'service_type_id' => 'required|exists:service_types,id',
                'service' => 'required|string',
                'status' => 'required|string',
            ]);
            // update service 
            $service->update($update_service);

            // return JSON response indicating success
            return response()->json(['message' => 'Service Updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error updating Service: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
