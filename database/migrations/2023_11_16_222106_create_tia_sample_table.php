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
        Schema::create('tia_sample', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receival_id');
            $table->string('inspection_no')->nullable();
            $table->date('date')->nullable();
            $table->string('grower_name')->nullable();
            $table->string('seed_variet')->nullable();
            $table->string('seed_generation')->nullable();
            $table->string('grower_docket')->nullable();
            $table->string('cool_store')->nullable();
            $table->string('paddock_no')->nullable();
            $table->string('processor')->nullable();
            $table->string('size')->nullable();
            $table->string('tonnes')->nullable();
            $table->string('destination')->nullable();
            $table->string('field_rating')->nullable();
            $table->string('labels')->nullable();
            $table->integer('tubers_qty')->nullable();
            $table->integer('dry_rot')->nullable();
            $table->float('dry_rot_percent')->nullable();
            $table->integer('black_scruf_2mm')->nullable();
            $table->float('black_scruf_2mm_percent')->nullable();
            $table->integer('powdery_scab')->nullable();
            $table->float('powdery_scab_percent')->nullable();
            $table->integer('rootnot_nema')->nullable();
            $table->float('rootnot_nema_percent')->nullable();
            $table->integer('soft_rots')->nullable();
            $table->float('soft_rots_percent')->nullable();
            $table->integer('pink_rot')->nullable();
            $table->float('pink_rot_percent')->nullable();
            $table->float('sub_total_percentage')->nullable();
            $table->integer('common_scab')->nullable();
            $table->float('common_scab_percent')->nullable();
            $table->float('total_disease_percent')->nullable();
            $table->integer('black_scurf_scatter')->nullable();
            $table->float('black_scurf_scatter_percent')->nullable();
            $table->integer('insect_damage')->nullable();
            $table->float('insect_damage_percent')->nullable();
            $table->integer('malformed_tuber')->nullable();
            $table->float('malformed_tuber_percent')->nullable();
            $table->integer('mechanical_damage')->nullable();
            $table->float('mechanical_damage_percent')->nullable();
            $table->integer('stem_end_discolour')->nullable();
            $table->float('stem_end_discolour_percent')->nullable();
            $table->integer('foreign_cultivars')->nullable();
            $table->float('foreign_cultivars_percent')->nullable();
            $table->integer('misc_frost')->nullable();
            $table->float('misc_frost_percent')->nullable();
            $table->float('total_defects')->nullable();
            $table->integer('minimal_insect_feeding')->nullable();
            $table->float('minimal_insect_feeding_percent')->nullable();
            $table->integer('oversize')->nullable();
            $table->float('oversize_percent')->nullable();
            $table->float('undersize')->nullable();
            $table->float('undersize_percent')->nullable();
            $table->tinyInteger('disease_score')->nullable();
            $table->integer('powdery_scab_2')->nullable();
            $table->enum('excessive_dirt', ['no', 'yes'])->default('no')->nullable();
            $table->tinyInteger('rootknot_nematode_2')->nullable();
            $table->enum('minor_skin_cracking', ['no', 'yes'])->default('no')->nullable();
            $table->tinyInteger('common_scab_2')->nullable();
            $table->enum('skining', ['no', 'yes'])->default('no')->nullable();
            $table->enum('regrading', ['no', 'yes'])->default('no')->nullable();
            $table->tinyText('comment')->nullable();
            $table->string('result', 30)->nullable();
            $table->string('tia_image')->nullable();
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
        Schema::dropIfExists('tia_sample');
    }
};
