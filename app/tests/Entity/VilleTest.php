<?php


use App\Domain\Travaux;
use App\Entity\Ville;
use PHPUnit\Framework\TestCase;

class VilleTest extends TestCase
{

    public function testHasLinks()
    {
        $ville = new Ville();
        $this->assertFalse($ville->hasLinks());
        $ville->setUrlAgrandissement("http://some.url");
        $this->assertTrue($ville->hasLinks());
    }

    public function testHasRedirectionUrlByType()
    {
        $ville = new Ville();
        $this->assertFalse($ville->hasRedirectionUrlByType(Travaux::TYPE_AGRANDISSEMENT));
        $this->assertFalse($ville->hasRedirectionUrlByType(Travaux::TYPE_ANNEXE));
        $this->assertFalse($ville->hasRedirectionUrlByType(Travaux::TYPE_CHANGEMENT_EXTERIEUR));
        $this->assertFalse($ville->hasRedirectionUrlByType(Travaux::TYPE_CLOTURE));
        $this->assertFalse($ville->hasRedirectionUrlByType(Travaux::TYPE_DIVISION));
        $this->assertFalse($ville->hasRedirectionUrlByType(Travaux::TYPE_MULTI));

        $ville->setUrlAgrandissement("http://some.url");
        $this->assertTrue($ville->hasRedirectionUrlByType(Travaux::TYPE_AGRANDISSEMENT));

        $ville->setUrlAnnexe("http://some.url");
        $this->assertTrue($ville->hasRedirectionUrlByType(Travaux::TYPE_ANNEXE));

        $ville->setUrlCloture("http://some.url");
        $this->assertTrue($ville->hasRedirectionUrlByType(Travaux::TYPE_CLOTURE));

        $ville->setUrlDivisionLotissements("http://some.url");
        $this->assertTrue($ville->hasRedirectionUrlByType(Travaux::TYPE_DIVISION));

        $ville->setUrlModificationExterieur("http://some.url");
        $this->assertTrue($ville->hasRedirectionUrlByType(Travaux::TYPE_CHANGEMENT_EXTERIEUR));

        $ville->setUrlMultiTravaux("http://some.url");
        $this->assertTrue($ville->hasRedirectionUrlByType(Travaux::TYPE_MULTI));
    }

    public function testGetRedirectionUrlByType()
    {
        $ville = new Ville();
        $this->assertNull($ville->getRedirectionUrlByType(Travaux::TYPE_AGRANDISSEMENT));
        $this->assertNull($ville->getRedirectionUrlByType(Travaux::TYPE_ANNEXE));
        $this->assertNull($ville->getRedirectionUrlByType(Travaux::TYPE_CHANGEMENT_EXTERIEUR));
        $this->assertNull($ville->getRedirectionUrlByType(Travaux::TYPE_CLOTURE));
        $this->assertNull($ville->getRedirectionUrlByType(Travaux::TYPE_DIVISION));
        $this->assertNull($ville->getRedirectionUrlByType(Travaux::TYPE_MULTI));

        $ville->setUrlAgrandissement("http://some.url");
        $this->assertNotNull($ville->getRedirectionUrlByType(Travaux::TYPE_AGRANDISSEMENT));

        $ville->setUrlAnnexe("http://some.url");
        $this->assertNotNull($ville->getRedirectionUrlByType(Travaux::TYPE_ANNEXE));

        $ville->setUrlCloture("http://some.url");
        $this->assertNotNull($ville->getRedirectionUrlByType(Travaux::TYPE_CLOTURE));

        $ville->setUrlDivisionLotissements("http://some.url");
        $this->assertNotNull($ville->getRedirectionUrlByType(Travaux::TYPE_DIVISION));

        $ville->setUrlModificationExterieur("http://some.url");
        $this->assertNotNull($ville->getRedirectionUrlByType(Travaux::TYPE_CHANGEMENT_EXTERIEUR));

        $ville->setUrlMultiTravaux("http://some.url");
        $this->assertNotNull($ville->getRedirectionUrlByType(Travaux::TYPE_MULTI));
    }
}
