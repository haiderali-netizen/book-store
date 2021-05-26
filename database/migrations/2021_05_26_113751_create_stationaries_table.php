<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stationaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->float('stock');
            $table->foreignId('stationary_category_id')->constrained('stationary_categories');
            $table->string('image');
            $table->mediumText('short_description');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stationaries');
    }
}
