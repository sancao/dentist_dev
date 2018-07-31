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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->enum('role',['user','admin','super_admin'])->default('user');
            $table->enum('user_type',['client', 'company', 'staff', 'owner'])->default('client');
            $table->enum('status',['active','suspend','inactive'])->default('inactive');
            $table->string('avatar')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender',['Nam','Nữ','Khác']);
            $table->string('yeu_cau')->nullable();
            $table->string('chuan_benh')->nullable();
            $table->string('dieu_tri')->nullable();
            $table->string('ky_hieu_rang')->nullable();
            $table->dateTime('ngay_hen')->nullable();
            $table->decimal('tong_tien')->default(0);
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
