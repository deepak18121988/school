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
        Schema::create('sm_photo_galleries', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('gallery_image')->nullable();
            $table->boolean('is_publish')->default(true);
            $table->integer('position')->default(0);
            $table->integer('school_id')->nullable()->default(1)->unsigned();
            $table->foreign('school_id')->references('id')->on('sm_schools')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('sm_photo_galleries')->insert([
            [
                'parent_id' => Null,
                'name' => 'Pre-Primary',
                'description' => "Explore joyful moments of school life — from classrooms to cultural events, captured in our photo gallery.",
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-1.jpg",
                'gallery_image' => Null,
            ],
            [
                'parent_id' => Null,
                'name' => 'Kindergarden',
                'description' => "Explore joyful moments of school life — from classrooms to cultural events, captured in our photo gallery.",
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-1.jpg",
                'gallery_image' => Null,
            ],
            [
                'parent_id' => Null,
                'name' => 'Celebration',
                'description' => "Explore joyful moments of school life — from classrooms to cultural events, captured in our photo gallery.",
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-1.jpg",
                'gallery_image' => Null,
            ],
            [
                'parent_id' => Null,
                'name' => 'Recreation Centre',
                'description' => "Explore joyful moments of school life — from classrooms to cultural events, captured in our photo gallery.",
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-1.jpg",
                'gallery_image' => Null,
            ],
            [
                'parent_id' => Null,
                'name' => 'Facilities',
                'description' => "Explore joyful moments of school life — from classrooms to cultural events, captured in our photo gallery.",
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-1.jpg",
                'gallery_image' => Null,
            ],
            [
                'parent_id' => Null,
                'name' => 'Activities',
                'description' => "Explore joyful moments of school life — from classrooms to cultural events, captured in our photo gallery.",
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-1.jpg",
                'gallery_image' => Null,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sm_photo_galleries');
    }
};
