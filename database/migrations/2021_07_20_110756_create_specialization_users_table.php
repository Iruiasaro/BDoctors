<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecializationUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialization_users', function (Blueprint $table) {

            $table->unsignedBigInteger("specialization_id");
            $table->foreign("specialization_id")
                ->references("id")
                ->on("specializations")
                ->onDelete('cascade');

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete('cascade');

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
        Schema::dropIfExists('specialization_users');
    }
}