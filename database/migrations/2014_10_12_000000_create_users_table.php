<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->string('phone',15);
            $table->string('address',200)->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(2)->comment("0=suspend, 1=active, 2=pending");
            $table->foreignId('group_id');
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('group_id')
            // ->references('id')
            // ->on('groups');

    


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
