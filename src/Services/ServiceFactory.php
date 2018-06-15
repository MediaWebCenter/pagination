<?php
namespace Src\Services;
use Src\Services\HackerNews;
use Src\Services\Reddit;
use Src\Cache\RedisAdapter;
use Src\Services\OpenData;
use Src\Services\Transformers\HackerNewsTransformer;
use Src\Services\Transformers\RedditTransformer;
use GuzzleHttp\Client as Guzzle;

class ServiceFactory
{

        protected $client;
        protected $cache;
        protected $enabledServices = [
              'hacknews',
              'reddit'
        ];

        public function __construct(Guzzle $client, RedisAdapter $cache){

                $this->client= $client;
                $this->cache= $cache;

        }
        protected function serviceIsEnabled($service){
            
            return in_array($service, $this->enabledServices);

        }
       

        public function get($service, $limit=20){

            if(method_exists($this, $service) && $this->serviceIsEnabled($service)){

                return $this->{$service}($limit);
            }

            return [];
        }

        protected function hacknews($limit=20){

            $data = $this->cache->remenber('hacknews', 10, function() use($limit){
                  
                return json_encode((new HackerNews($this->client))->get($limit));

            });

            return (new HackerNewsTransformer(json_decode($data)))->create();
        }

        protected function reddit($limit=20){

            $data = $this->cache->remenber('reddit', 10, function() use($limit){
                  
                return json_encode((new Reddit($this->client))->get($limit));

            });

            return (new RedditTransformer(json_decode($data)))->create();


            
        }

        protected function opendata($limit=20){

            $data= (new OpenData($this->client))->get($limit);

            return $data;
        }

        
        
}