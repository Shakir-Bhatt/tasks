<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignedShift extends Model
{

    public function getShift(){
        $shift =  Shift::find($this->shift_id);
        if($shift){
            return $shift->from .' to '.$shift->to;
        } 
        return 'N/A';
    }
}
