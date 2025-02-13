<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UserActivityLog;

class M_menu_first extends Model
{
    use HasFactory, UserActivityLog;

    protected $table = 'menu_firsts';

    protected $guarded = [];

    public $timestamps = true;

    public function menu_seconds()
    {
        return $this->hasMany(M_menu_second::class, 'first_menu_id', 'id');
    }

    public function menu_accesses()
    {
        return $this->hasMany(M_menu_access::class, 'first_menu_id', 'id');
    }
}
