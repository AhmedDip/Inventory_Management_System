<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddSuperadmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin =
        [
            'name' => 'Ahmed Rasidun Bari Dip',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '01998663117',
            'status' =>1,
            'group_id'=>1

        ];
        User::create($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
