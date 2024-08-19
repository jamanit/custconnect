<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UserActivityLog;
use App\Traits\GeneratesUuid;

class M_product extends Model
{
    use HasFactory, UserActivityLog, GeneratesUuid;

    protected $table = 'products';

    protected $guarded = [];

    public $timestamps = true;
}
