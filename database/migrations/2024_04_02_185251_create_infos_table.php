<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phoneNumber')->unique();
            $table->string('zipCode');
            $table->string('address');
            $table->string('province');
            $table->string('city');
            $table->string('secondaryPhone')->nullable();
            $table->string('secondaryPhoneTwo')->nullable();
            $table->date('dob');
            $table->string('business');
            $table->string('socialDate');
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
        Schema::dropIfExists('infos');
    }
}
