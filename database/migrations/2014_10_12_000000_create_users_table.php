<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->date('date_of_birth');
            $table->string('type');
            $table->string('phone');
            $table->string('created_by');
            $table->string('verify');
            $table->string('email')->unique;
            $table->string('password');
            $table->string('first_password')->nullable();
            $table->string('gender');
            $table->string('address');
            $table->string('profile_image');
            $table->string('postalcode');
            $table->string('total_members');
            $table->string('total_price');
            $table->string('membership_number');
            $table->string('verifytoken');
            $table->boolean('status');
	        $table->date('expiration_date');
	        $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
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
