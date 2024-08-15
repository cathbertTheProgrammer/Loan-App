<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Service.php (Model)
public function serviceType()
{
    return $this->belongsTo(ServiceTypes::class);
}

public function serviceRequests()
{
    return $this->belongsToMany(ServiceRequest::class, 'service_request_service');
}

}
