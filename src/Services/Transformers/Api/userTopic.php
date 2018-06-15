<?php
namespace Src\Services\Transformers\Api;
use Src\Services\Transformers\TransformerAbstract;

class userTopic extends TransformerAbstract
{
    
    public function transform($payload){

            /*dump($payload['topics']);
            die();*/
           
            return [

            'identificador'=> $payload['id'],
            'nombre_usuario'=> $payload['username'],
            'correo_electronico'=> $payload['mail'],
            'contenido'=>$payload['topics'],
                
            
            
               ];
   }

}
