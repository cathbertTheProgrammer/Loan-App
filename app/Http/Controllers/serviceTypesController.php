<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\serviceTypes;
use Illuminate\Http\Response;

class serviceTypesController extends Controller
{
    public function index()
    {
        $serviceTypes  = ServiceTypes::orderBy('id','DESC')->paginate(6);
        return view('admin.serviceType.service-types', compact('serviceTypes'));
    }

    public function addServiceTypes()
    {
        return view('admin.serviceType.add-service-type');
    }

    public function storeServiceTypes(Request $request)
    {
        try {
            // validate request data
            $create_service_type_form = $request->validate([
                'service_type' => 'required|string',
                'status' => 'required|string',
            ]);


            $create_service_type_form['created-by'] = auth()->user()->id;

            serviceTypes::create($create_service_type_form);

            return response()->json(['message' => 'Service Type Added Successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Error adding service types: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function editServiceTypes(ServiceTypes $serviceType)
    {
        return view('admin.serviceType.edit-service-type', compact('serviceType'));
    }



    public function updateServiceTypes(Request $request, ServiceTypes $serviceType)
    {
        try {

            // validate request data
            $update_service_types =  $request->validate([
                'service_type' => 'required|string',
                'status' => 'required|string',
            ]);
            // update service types
            $serviceType->update($update_service_types);

            // return JSON response indicating success
            return response()->json(['message' => 'Service Types Updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error updating Service Types: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
