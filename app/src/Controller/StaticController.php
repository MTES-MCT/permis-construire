<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class StaticController
{
    public function homepage(){
        return new Response("Hello");
    }
}