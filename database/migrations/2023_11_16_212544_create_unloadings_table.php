<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unloadings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receival_id');
            $table->string('seed_bin_weight')->nullable();
            $table->string('weight_bins')->nullable();
            $table->string('weighed_weight')->nullable();
            $table->string('no_oversize_bins')->nullable();
            $table->string('weight_oversize_bins')->nullable();

            $table->foreign('receival_id')->references('id')->on('receivals')->onDelete('cascade');
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
        Schema::dropIfExists('unloadings');
    }
};
