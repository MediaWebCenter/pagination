<?php
namespace Src\Services;


class Reddit extends ServiceAbstract

{

    public function get($limit=20){

      $response= $this->client->request('GET','https://www.reddit.com/r/popular.json?limit='.$limit,[

              'headers'=>['User-Agent'=>'Distract']
      ]);

      return json_decode($response->getBody())->data->children;
    }
}