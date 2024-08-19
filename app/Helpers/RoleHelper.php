<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class RoleHelper
{
    public static function isOwner()
    {
        return Auth::check() && Auth::user()->role_id == '1';
    }

    public static function isAdmin()
    {
        return Auth::check() && Auth::user()->role_id == '2';
    }

    public static function isUser()
    {
        return Auth::check() && Auth::user()->role_id == '3';
    }
}
