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
        Schema::create('tasks', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string("title")->nullable();
            $table->text("description")->nullable();
            $table->enum("status",["pending","in_progress","completed"])->default("pending");
            $table->enum("priority",["low","medium","high"])->default("low");
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->date("date_task")->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            // $table->id();
            // $table->timestamps();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
