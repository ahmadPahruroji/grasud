<?php

namespace App\Imports;

use App\Countribution;
use Maatwebsite\Excel\Concerns\ToModel;

class CountributionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Countribution([
            //
            // 'id' = $d[0];
            'user_id' => $row[1],
            'money' => $row[2],
            'payment' => $row[3],
            'month' => $row[4],
            'year' =>$row[5],
            'date' => $row[6],
            'status' => $row[7],
        ]);
    }
}

// $table->increments('id');
//             $table->integer('user_id')->unsigned();
//             $table->integer('money');
//             $table->string('payment');
//             $table->string('month');
//             $table->date('date');
//             $table->integer('status')->default(0);
//             $table->string('description')->nullable();