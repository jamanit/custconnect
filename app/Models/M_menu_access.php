<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UserActivityLog;

class M_menu_access extends Model
{
    use HasFactory, UserActivityLog;

    protected $table = 'menu_accesses';

    protected $guarded = [];

    public $timestamps = true;

    public function role()
    {
        return $this->belongsTo(M_role::class, 'role_id', 'id');
    }

    public function menu_first()
    {
        return $this->belongsTo(M_menu_first::class, 'first_menu_id', 'id');
    }

    public function menu_second()
    {
        return $this->belongsTo(M_menu_second::class, 'second_menu_id', 'id');
    }
}
