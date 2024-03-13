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
        Schema::create('wallboards', function (Blueprint $table) {
            $table->id();
            $table->string('tm_trx_id', 20);
            $table->dateTime('tm_created_date')->nullable();
            $table->string('campaign_name', 200)->nullable();
            $table->decimal('user_id', 10,0)->nullable();
            $table->string('user_name', 255)->nullable();
            $table->string('status', 5);
            $table->integer('login_time')->nullable();
            $table->integer('total_call');
            $table->string('talks_time', 5);
            $table->string('agent_name', 255)->nullable();
            $table->string('supervisor_name', 255)->nullable();
            $table->integer('deal')->nullable();
            $table->integer('premi')->nullable();
            $table->string('partner', 20)->nullable();
            $table->timestamps();

            // $table->id();
            // $table->string('tm_trx_id', 20)->nullable(false);
            // $table->dateTime('tm_created_date')->nullable(true);
            // $table->string('campaign_name', 200)->nullable(true);
            // $table->decimal('user_id', 10,0)->nullable(true);
            // $table->string('user_name', 255)->nullable(true);
            // $table->string('status', 5)->nullable(false);
            // $table->integer('login_time')->nullable(true);
            // $table->integer('total_call')->nullable(false);
            // $table->string('talks_time', 5)->nullable(false);
            // $table->string('agent_name', 255)->nullable(true);
            // $table->string('supervisor_name', 255)->nullable(true);
            // $table->string('deal', 3)->nullable(false);
            // $table->integer('premi', 255)->nullable(false);
            // $table->string('partner', 20)->nullable(true);
            // $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallboards');
    }
};
