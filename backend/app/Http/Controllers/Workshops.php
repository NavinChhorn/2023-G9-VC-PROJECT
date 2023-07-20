<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\WorkShop;


class Workshops extends Controller
{
    

    public function getWorkshops()
    {
        $workshops = Workshop::all();
        if(count($workshops)==0){
         return response()->json(['success'=>true,],200);

        }else{
            return response()->json(['success'=>true,'data'=>$workshops],200);
        }
    }
    
    public function getWorkshop($id)
    {
        $workshops = Workshop::join('addresses', 'addresses.id', '=', 'work_shops.address_id')
            ->join('schools', 'schools.id', '=', 'work_shops.school_id')
            ->select('work_shops.id','work_shops.name', 'work_shops.img', 'addresses.link', 'schools.name as school_name', 'work_shops.description', 'work_shops.start_date', 'work_shops.expired_date', 'work_shops.time')
            ->where('work_shops.id', $id)
            ->first();
        return response()->json(['success'=>true,'data'=>$workshops],200);


    }
}
