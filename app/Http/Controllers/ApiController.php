<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ScheduleInterview;

use App\Models\Employee;


class ApiController extends Controller{


    /**
     * 
     * select interviwer_id from  schedule_interviews 
      *  where 
      *      slot_start in not 
      *          between start_time and end_time 
      *          
     *           and 
                
      *          slot_end in not between start_time and end_time

     */
    public function getAvailablePanelists($startTime,$endTime){

        try{
        
            $availablePanelistIds = Employee::select('panalist_id')->whereNotBetween($startTime,['start_time','end_time'])
                                ->whereNotBetween($endTime,['start_time','end_time'])
                                ->get();

            /**
             * Guard condition first
             */                    
            if(!$availablePanelistIds->count()){
                return response()->json([
                    'status' => true,
                    'data' => null
        
                ],400);  
            } 

            $availablePanelists = Panalist::whereIn('id',$availablePanelistIds->pluck('panalist_id')->toArray())->get();

            return response()->json([
                'status' => true,
                'data'  => $availablePanelists
            ],200);                          
        } catch(\Exception $e){
            // log $e for exception
            return response()->json([
                'status' => false,
                'data'  => "Something went wrong!. Contact site admin"
            ],500); 
        }
    }
}
