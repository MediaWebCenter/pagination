<?php
use Src\Phinx\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MyFirstMigration extends Migration
{

    public function up(){

        $this->schema->create('users', function(Blueprint $table){

            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('mail');
            $table->timestamps();
            $table->softDeletes();
        });

       


    }

    public function down(){
         
        
        $this->schema->drop('users');

    }
}

