<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMikrotiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mikrotiks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ipaddress');
            $table->string('user');
            $table->string('pass');
            $table->string('is_active');
            $table->timestamps();
        });
        DB::table('mikrotiks')->insert(
            array(
                'name' => 'Router Name',
                'ipaddress' => '',
                'user' => '',
                'is_active' => 'true',
                'pass' => \Hash::make('admin'),
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mikrotiks');
    }
}
