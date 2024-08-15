<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    // Define the relationship to the service type
    public function serviceType()
    {
        return $this->belongsTo(ServiceTypes::class);
    }

    // Define the relationship to the services
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_request_service');
    }

    // Define the relationship to the user who created the request
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
