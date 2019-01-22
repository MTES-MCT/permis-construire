<?php

use App\Infrastructure\ApiParser\GenericDsApiParser;
use PHPUnit\Framework\TestCase;

class GenericDsApiParserTest extends TestCase
{
    public function testParser(){
        $content = file_get_contents('generic-api-response.json');
        $parser = new GenericDsApiParser();
        $projet = $parser->parseResponse($content);

        $this->assertEquals('Mr', $projet->getDemandeur()->getCivilite());
    }
}
