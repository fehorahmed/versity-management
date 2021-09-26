<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;

class CreateDefaultTwoAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        DB::table('admins')->insert(
            [  
                [
                    'name' => 'Masudur Rahman',
                    'email' => 'masud@gmail.com',
                    'password' => Hash::make(12345678),
                    'phone' => '017066376079',
                    'address'=>" Gaibandha",
                ],
                [
                    'name' => 'Fehor',
                    'email' => 'fehor@gmail.com',
                    'password' => Hash::make(12345678),
                    'phone' => '01155698574',
                    'address'=>"Bogura",
                ],
                
                
            ]);
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
