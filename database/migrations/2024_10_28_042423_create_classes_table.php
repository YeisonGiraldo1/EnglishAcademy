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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('level'); 
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade'); // Teacher
            $table->date('date'); // Date
            $table->time('start_time'); // Start time
            $table->time('end_time')->nullable(); // End time
            $table->string('headquarters'); // Place/Site
            $table->string('classroom'); // Classroom
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }

};
