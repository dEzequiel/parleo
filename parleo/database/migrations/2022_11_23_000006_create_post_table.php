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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('media')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->foreignId('user_id')
                ->constrained('user')
                ->nullOnDelete();

            $table->foreignId('community_id')
                ->constrained('community')
                ->nullOnDelete();

            $table->foreignId('tag_id')
                ->constrained('tag')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
};
