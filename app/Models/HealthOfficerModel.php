<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterHealthOfficer extends Model
{
    use HasFactory;
    protected $fillable = [
        'OfficerName',
        'OfficerUserName',
        'HospitalCategory',
        'HospitalId'
    ];
}
