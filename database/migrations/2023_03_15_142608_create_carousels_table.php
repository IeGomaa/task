<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousels', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->text('video');
            $table->integer('pub_num')->nullable();
            $table->boolean('is_ad');
            $table->text('see_more');
            $table->integer('slot_num')->nullable();
            $table->string('ad_script')->nullable();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('carousels');
    }
}
