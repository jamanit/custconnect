<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UserActivityLog;

class M_menu_second extends Model
{
    use HasFactory, UserActivityLog;

    protected $table = 'menu_seconds';

    protected $guarded = [];

    public $timestamps = true;

    public function menu_first()
    {
        return $this->belongsTo(M_menu_first::class, 'first_menu_id', 'id');
    }

    public function menu_accesses()
    {
        return $this->hasMany(M_menu_access::class, 'second_menu_id', 'id');
    }
}
