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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('repository_id'); //Foreign key to repositories
            $table->string('html_url');
            $table->unsignedBigInteger('issue_id');
            $table->integer('number');
            $table->string('title');
            $table->string('user_login'); //Reference to the login field in the user array in the JSON response from the issues API.
            $table->string('user_avatar_url'); //Reference to the avatar_url field in the user array in the JSON response from the issues API.
            $table->string('state');
            $table->integer('comments');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->text('body')->nullable();

            // Define a foreign key constraint for repository_id
            $table->foreign('repository_id')->references('id')->on('repositories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
