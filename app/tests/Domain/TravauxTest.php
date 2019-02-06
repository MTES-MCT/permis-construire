<?php


use App\Domain\Travaux;
use PHPUnit\Framework\TestCase;

class TravauxTest extends TestCase
{

    /**
     * @dataProvider validTypesProvider
     */
    public function testIsValidType($type, $expectedValidity){
        $this->assertEquals($expectedValidity, Travaux::isValidType($type));
    }

    public function validTypesProvider()
    {
        return [
            [Travaux::TYPE_ANNEXE, true],
            [Travaux::TYPE_AGRANDISSEMENT, true],
            [Travaux::TYPE_CLOTURE, true],
            [Travaux::TYPE_CHANGEMENT_EXTERIEUR, true],
            [Travaux::TYPE_DIVISION, true],
            [Travaux::TYPE_MULTI, true],
            ['pouet', false],
            ['', false],
        ];
    }
}
