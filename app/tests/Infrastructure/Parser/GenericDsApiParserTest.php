<?php

use App\Infrastructure\ApiParser\GenericDsApiParser;
use PHPUnit\Framework\TestCase;

class GenericDsApiParserTest extends TestCase
{
    public function testParser(){

        $content = file_get_contents(__DIR__.'/generic-api-response.json');
        $parser = new GenericDsApiParser();
        $projet = $parser->parseResponse($content);

        $this->assertEquals('M.', $projet->getDemandeur()->getCivilite());
        $this->assertEquals('COSTE', $projet->getDemandeur()->getNom());
        $this->assertEquals('Jean Michel', $projet->getDemandeur()->getPrenom());
    }
}
