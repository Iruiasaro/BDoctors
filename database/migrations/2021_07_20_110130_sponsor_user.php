<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SponsorUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_user', function (Blueprint $table) {

            $table->unsignedBigInteger("sponsor_id");
            $table->foreign("sponsor_id")
                ->references("id")
                ->on("sponsors");

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
                ->references("id")
                ->on("users");

            //quali sono le chiavi primarie?
            $table->primary(["sponsor_id", "user_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsor_user');
    }
}
