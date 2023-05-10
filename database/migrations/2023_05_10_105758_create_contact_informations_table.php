<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_informations', function (Blueprint $table) {
            $table->id();
            $table->string("object_type");
            $table->unsignedInteger("object_id");
            $table->string('name');
            $table->string('email');
            $table->string('company_name')->nullable();
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('zip');
            $table->string('phone')->nullable();
            $table->timestamps();

            $table->index(["object_type", "object_id"], "object");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_informations');
    }
};
