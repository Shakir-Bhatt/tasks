<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shifts = [
            [ 0,8],
            [8,16],
            [ 16,24]
        ];

        foreach($shifts as $shift){
            Shift::insert([
                'from' => $shift[0],
                'to' => $shift[1],
            ]);
        }
        
    }
}
