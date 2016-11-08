<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->index()->unique();
            $table->string('base_url');
            $table->string('token', 60)->nullable()->default(null);
            $table->string('refresh_token', 60)->nullable()->default(null);
//            $table->enum('')
            $table->timestamps();
        });

        // Update "token" to be binary, so it's case sensitive
        DB::statement('ALTER TABLE `services` CHANGE `token` `token` VARCHAR(60) BINARY CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL, CHANGE `refresh_token` `refresh_token` VARCHAR(60) BINARY CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
