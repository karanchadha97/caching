<?php 

namespace App\Services;

class Paginator
{
    public function pagination($data, $offset, $length)
    {
        return array_slice($data, $offset, $length);
    }
}