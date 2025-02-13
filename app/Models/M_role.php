<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UserActivityLog;
use App\Traits\GeneratesUuid;

class M_role extends Model
{
    use HasFactory, UserActivityLog, GeneratesUuid;

    protected $table = 'roles';

    protected $guarded = [];

    public $timestamps = true;

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    public function menu_accesses()
    {
        return $this->hasMany(M_menu_access::class, 'role_id', 'id');
    }
}
