<?php

namespace App\Http\Controllers;

use App\Models\WorkshopUser;
use Illuminate\Http\Request;

class RegisterWorkShopController extends Controller
{
    /**
     * This function for user reigster in the workshop
     */
    public function registerWorkShop(Request $request)
    {
        $joinWorkShop = WorkshopUser::create([
            'user_id' => $request->user_id,
            'workshop_id' => $request->workshop_id,
        ]);
        return response()->json(['message' => 'Workshop registration successful', 'data' => $joinWorkShop]);
    } 
}
