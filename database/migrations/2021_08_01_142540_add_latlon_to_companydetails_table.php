<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatlonToCompanydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companydetails', function (Blueprint $table) {
            //
            $table->string('longitude')->default('#');
            $table->string('latitude')->default('#');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companydetails', function (Blueprint $table) {
          
                $table->dropColumn('longitude');
                $table->dropColumn('latitude');
          
        });
    }
}
