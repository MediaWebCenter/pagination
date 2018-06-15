<?php
namespace Src\Services\Transformers;
use Src\Services\Transformers\TransformerAbstract;



class HackerNewsTransformer extends TransformerAbstract

{

    public function transform($payload){

         return [
             
             'title'=> $payload->title,
             'link' => isset($payload->url) ? $payload->url : 'https://news.ycombinator.com/item?id=' . $payload->id,
             'timestamp' => $payload->time,
             'service'=> 'Hacker News'


         ];
    }


}