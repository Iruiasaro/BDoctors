<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("image");
            $table->string("lastname");
            $table->string("address");
            $table->string("city");
            $table->string("phone_number")->nullable();
            $table->string("curriculum")->nullable();
            $table->string("prestazione")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("image");
            $table->dropColumn("lastname");
            $table->dropColumn("address");
            $table->dropColumn("phone_number");
            $table->dropColumn("curriculum");
            $table->dropColumn("prestazione");
        });
    }
}
