<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case', function (Blueprint $table) {
            $table->id();
            $table->string('customername')->nullable()->default('');
            $table->string('customerphone')->nullable()->default('');
            $table->string('remote')->nullable()->default('');
            $table->string('country')->nullable()->default('');
            $table->string('sale_status')->nullable()->default('');
            $table->string('addedby')->nullable()->default('');
            $table->string('amount')->nullable()->default('');
            $table->string('email')->nullable()->default('');
            $table->string('addressline1')->nullable()->default('');
            $table->string('addressline2')->nullable()->default('');
            $table->string('city')->nullable()->default('');
            $table->string('state')->nullable()->default('');
            $table->string('zip')->nullable()->default('');
            $table->string('bttr')->nullable()->default('');
            $table->string('issue')->nullable()->default('');
            $table->string('additionalissue')->nullable()->default('');
            $table->string('remarks')->nullable()->default('');
            $table->string('status')->nullable()->default('');            
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
        Schema::dropIfExists('case');
    }
}
