<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploaded_files', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('original_filename');
            $table->string('mime_type');
            $table->timestamp('uploaded_at');
            $table->string('uploaded_by');
            $table->string('medium_path')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->string('ext', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploaded_files');
    }
}
