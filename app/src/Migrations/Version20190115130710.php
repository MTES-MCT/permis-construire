<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190115130710 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE ville ADD url_extension VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_modification_exterieur VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_annexe VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville DROP url_piscine_abf');
        $this->addSql('ALTER TABLE ville DROP url_piscine_non_abf');
        $this->addSql('ALTER TABLE ville DROP url_fenetres');
        $this->addSql('ALTER TABLE ville DROP url_terrassement');
        $this->addSql('ALTER TABLE ville DROP url_surrelevation');
        $this->addSql('ALTER TABLE ville DROP url_ravalement');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ville ADD url_piscine_abf VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_piscine_non_abf VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_fenetres VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_terrassement VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_surrelevation VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_ravalement VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville DROP url_extension');
        $this->addSql('ALTER TABLE ville DROP url_modification_exterieur');
        $this->addSql('ALTER TABLE ville DROP url_annexe');
    }
}
