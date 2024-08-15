<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\serviceTypes;
use App\Models\ServiceRequest;
use Illuminate\Http\Response;
use App\Mail\ClientServiceRequest;
use App\Mail\InfoServiceRequest;
use Illuminate\Support\Facades\Mail;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $service_types = serviceTypes::where('status','ACTIVE')->get();
        $services = Service::where('status','ACTIVE')->get();
        return view('client.services.index', compact('service_types','services'));
    }

    public function store(Request $request)
    {
        try {
            // validate request data
            $request->validate([
                'service_type' => 'required|exists:service_types,id',
                'services' => 'required|array',
                'services.*' => 'exists:services,id',
                'description' => 'nullable|string',
                'email' => 'required|email',
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'country_code' => 'required',
                'phone' => 'required',
                'address' => 'nullable|string',
                'urgent' => 'required|boolean',
                'deadline' => 'required|date',
            ]);

            // create new service request
            $serviceRequest = new ServiceRequest();
            $serviceRequest->service_type_id = $request->service_type;
            $serviceRequest->description = $request->description;
            $serviceRequest->email = $request->email;
            $serviceRequest->firstname = $request->firstname;
            $serviceRequest->lastname = $request->lastname;
            $serviceRequest->phone = $request->country_code . $request->phone;
            $serviceRequest->address = $request->address;
            $serviceRequest->urgent = $request->urgent;
            $serviceRequest->deadline = $request->deadline;
            $serviceRequest->status = 'PENDING';
            $serviceRequest->save();
        
            $serviceRequest->services()->sync($request->services);

            // Send emails
            Mail::to('cathbertbusiku@gmail.com')->send(new InfoServiceRequest($serviceRequest));
            Mail::to($serviceRequest->email)->send(new ClientServiceRequest($serviceRequest));
     

            // return JSON response indicating success
            return response()->json(['message' => 'Request sent Successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error sending your request: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function viewRequests()
    {
        $pending_requests = ServiceRequest::with('serviceType','services')->where('status', 'PENDING')->get();

        return view('admin.serviceRequests.pending-requests', ['pendingRequests'=>$pending_requests]);
    }

    public function requestsHistory()
    {
        $requests_history = ServiceRequest::with('serviceType','services')->orderBy('id','DESC')->paginate(10);
        return view('admin.serviceRequests.requests-history', ['requestsHistory'=>$requests_history]);
    }

    public function markCompleted   (Request $request, ServiceRequest $serviceRequest)
    {
        try {
           
            $form_data_update = [
                'status' => 'COMPLETED',
            ];

            // update service 
            $serviceRequest->update($form_data_update);

            // return JSON response indicating success
            return response()->json(['message' => 'Service Request Updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error updating Service Request: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    


}
