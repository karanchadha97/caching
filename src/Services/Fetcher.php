<?php

namespace App\Services;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class Fetcher
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getUsers()
    {
        $cache = new FilesystemAdapter();
        $posts = $cache->getItem("posts");
        if(!$posts->isHit()){
            $result = file_get_contents($this->url);
            $posts->set($result);
            $cache->save($posts);
        }
        $final = $posts->get();
        return $final;
    } 
}