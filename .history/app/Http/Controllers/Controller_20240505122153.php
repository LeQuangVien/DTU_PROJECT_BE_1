<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function isUserKhachHang()
    {
        $user = Auth::guard('sanctum')->user();

        if ($user instanceof \App\Models\KhachHang) {
            return $user;
        }
        return false;
    }
}
