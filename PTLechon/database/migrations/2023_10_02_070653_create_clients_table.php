<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('clientId');
            $table->string('name', 255)->notNull();
            $table->string('address', 255)->nullable();
            $table->string('contact', 255)->nullable();
            $table->datetime('dateCreated')->default(DB::raw('CURRENT_TIMESTAMP'))->notNull();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

