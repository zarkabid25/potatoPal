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
        Schema::create('receivals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('grower_name');
            $table->string('grower_group');
            $table->string('paddock_name');
            $table->string('seed_variety');
            $table->string('seed_generation');
            $table->string('seed_class');
            $table->string('tia_sample_id')->nullable();
            $table->string('unloading_status');
            $table->string('unloading_ID')->nullable();
            $table->string('seed_type');
            $table->string('seed_bin_size');
            $table->string('oversize_bin_size');
            $table->string('transport_co');
            $table->string('delivery_type');
            $table->string('grower_docket_no')->nullable();
            $table->string('chc_docket_no')->nullable();
            $table->string('fungicide');
            $table->string('driver_name')->nullable();
            $table->tinyText('comments')->nullable();
            $table->tinyText('unloading_push_status')->default('0');
            $table->tinyText('tia_sample_push')->default('0');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receivals');
    }
};
