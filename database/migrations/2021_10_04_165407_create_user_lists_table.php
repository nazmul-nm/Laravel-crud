<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('user_lists', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('status')->default(0);
            $table->longText('about_us')->nullable();
            $table->timestamps();
        });
    
        Schema::create('user_informations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->text('address')->nullable();
            $table->string('profile_img')->nullable();
            $table->json('images')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user_lists')->onDelete('cascade');
        });
        
       
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_lists');
    }
}
