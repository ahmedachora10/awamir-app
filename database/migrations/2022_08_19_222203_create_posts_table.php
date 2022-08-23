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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('jobtype_id')->constrained('job_types'); // full time or part time

            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->string('image');
            $table->string('submission'); // submission path

            $table->string('company');
            $table->integer('views')->default(0);
            $table->string('source'); // Job Source URL
            $table->tinyInteger('status')->default(1);
            $table->string('url')->nullable();
            $table->text('keywords');
            $table->string('tls');

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
        Schema::dropIfExists('posts');
    }
};
