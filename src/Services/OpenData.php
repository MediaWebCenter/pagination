<?php
namespace Src\Services;


class OpenData extends ServiceAbstract

{

    public function get($limit=20){

      $response= $this->client->request('GET','http://opendata.euskadi.eus/contenidos/ds_recursos_turisticos/restaurantes_asador_sidrerias/opendata/restaurantes.json?limit='.$limit
        );

      return json_decode($response->getBody());
    }
}