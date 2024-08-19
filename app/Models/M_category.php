<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UserActivityLog;
use App\Traits\GeneratesUuid;

class M_category extends Model
{
    use HasFactory, UserActivityLog, GeneratesUuid;

    protected $table = 'categories';

    protected $guarded = [];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'categories_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(M_product::class, 'categories_id', 'id');
    }
}
