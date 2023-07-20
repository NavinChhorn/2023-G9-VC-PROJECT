<?php

namespace App\Http\Controllers;

use App\Models\WorkShop;
use App\Models\WorkshopUser;

class WorkShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function workshops()
    {
        $workshop = WorkShop::all();
        return response()->json(['Get success'=>true, 'data'=>$workshop],200);
    }

    /**
     * Create user for count user
     */
    public function countUsersInWorkshop($workshopId)
    {
        if (!is_numeric($workshopId) || $workshopId <= 0) {
            return response()->json(['error' => 'Invalid workshop ID'], 400);
        }
    
        // Check if the workshop with the specified ID exists
        $workshop = Workshop::find($workshopId);
    
        if (!$workshop) {
            return response()->json(['error' => 'Workshop not found'], 404);
        }
        $userCount = WorkshopUser::where('workshop_id', $workshopId)->count();

        return response()->json(['user_count' => $userCount]);
    }
}
