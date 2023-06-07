<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up()
    {
        Schema::create('services_service_packs', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->integer('service_packs_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services_service_packs');
    }
};
