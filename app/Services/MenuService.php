<?php

namespace App\Services;

use App\Models\M_menu_access;

class MenuService
{
    public function getMenus($role_id)
    {
        return M_menu_access::with(['menu_first.menu_seconds'])
            ->where('role_id', $role_id)
            ->get()
            ->groupBy('first_menu_id')
            ->map(function ($group) {
                return [
                    'id' => $group->first()->menu_first->id ?? null,
                    'link' => $group->first()->menu_first->first_menu_link ?? null,
                    'name' => $group->first()->menu_first->first_menu_name ?? null,
                    'icon' => $group->first()->menu_first->first_menu_icon ?? null,
                    'children' => $group->first()->menu_first->menu_seconds->map(function ($second_menu) {
                        return [
                            'link' => $second_menu->second_menu_link ?? null,
                            'name' => $second_menu->second_menu_name ?? null,
                            'icon' => $second_menu->second_menu_icon ?? null,
                        ];
                    })->toArray(),
                ];
            })->values();
    }
}
