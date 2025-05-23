<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sm_video_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('video_link')->nullable();
            $table->boolean('is_publish')->default(true);
            $table->integer('position')->default(0);
            $table->integer('school_id')->nullable()->default(1)->unsigned();
            $table->foreign('school_id')->references('id')->on('sm_schools')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('sm_video_galleries')->insert([
            [
                'name' => "Annual Science Exhibition",
                'description' => "Discover how our students bring science to life through hands-on experiments and innovative ideas.",
                'video_link' => "",
                'position' => 1,
            ],
            [
                'name' => "Cultural Day Highlights",
                'description' => "A vibrant display of student performances celebrating culture, tradition, and school spirit.",
                'video_link' => "",
                'position' => 2,
            ],
            [
                'name' => "Student Council Meet",
                'description' => "Showcasing student leadership, teamwork, and the voices that shape our school community.",
                'video_link' => "",
                'position' => 3,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sm_video_galleries');
    }
};
