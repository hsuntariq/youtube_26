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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            
            

            // Core video file (usually just the path/filename)
            $table->string('video');           // e.g. "videos/2026/03/abc123.mp4"

            // Thumbnail (cover image)
            $table->string('thumbnail')->nullable();

            // Metadata from the upload form
            $table->string('title', 100);      // YouTube max title ~100 chars
            $table->string('description')->nullable();

            // Visibility / status
            $table->enum('visibility', ['private', 'unlisted', 'public', 'scheduled'])
                  ->default('public');

            // For scheduled publishing
            $table->timestamp('published_at')->nullable();  // null = not scheduled/published yet

            // Audience / COPPA
            $table->boolean('made_for_kids')->default(false);

            // Premiere / live-like feature (optional)
            $table->boolean('is_premiere')->default(false);

            // Stats (updated later via jobs/controllers)
            $table->unsignedBigInteger('views_count')->default(0);
            $table->unsignedInteger('likes_count')->default(0);
            $table->unsignedInteger('dislikes_count')->default(0); // optional — some keep it
            $table->unsignedInteger('comments_count')->default(0);

            // Processing / readiness status
            $table->enum('status', [
                'uploaded',      // just uploaded, not processed
                'processing',    // ffmpeg / thumbnail generation running
                'ready',         // ready to publish/watch
                'failed'
            ])->default('uploaded');

            // Duration (after processing) - very useful
            $table->unsignedInteger('duration_seconds')->nullable(); // e.g. 125 = 2:05

            // Optional extras
            // $table->string('slug')->unique()->nullable();           // friendly URL: my-vacation-2026
            // $table->string('video_url')->nullable();                // public watching URL if needed
            // $table->json('tags')->nullable();                       // ["travel", "vlog", "2026"]

            // Who can see it if private/unlisted (advanced)
            // $table->json('allowed_users')->nullable();              // array of user ids (very optional)

            $table->timestamps();
            $table->softDeletes();   // many platforms soft-delete videos instead of hard delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};