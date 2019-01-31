<?php

namespace App\Infrastructure\ApiParser;

use App\Domain\Projet;

abstract class DsApiParser
{
    public function parseResponse($responseBody): Projet
    {
    }
}
