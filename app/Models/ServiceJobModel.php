<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceJobModel extends Model
{
    public $table="service_job";
    public $timestamps = false;
    use HasFactory;

    static function getRecord()
    {
        $return = ServiceJobModel::select('service_job.*','clients.name as customer','clients.mobile as mobile')
                    ->join('clients','clients.id', 'service_job.customer_id')
                    ->orderBy('service_job.customer_id','desc')
                    ->get();
        return $return;
    }

    static function getpdfRecord($id)
    {
        $return = ServiceJobModel::select('service_job.*','clients.name as customer','clients.mobile as mobile','clients.address as address')
                    ->leftjoin('clients','clients.id', 'service_job.customer_id')
                    ->where('service_job.id', $id)
                    ->orderBy('service_job.customer_id','desc')
                    ->get();
        return $return;
    }
} 
