<?php
use Src\Phinx\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TopicUsers extends Migration
{

    public function up(){

        $this->schema->create('topics', function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();


        });

      


    }

    public function down(){
         
        

        $this->schema->drop('topics');

    }
}

