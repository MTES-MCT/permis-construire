<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190110073410 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE ville ADD url_terrassement VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_surrelevation VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_ravalement VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_cloture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD url_geoportail VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ville DROP url_terrassement');
        $this->addSql('ALTER TABLE ville DROP url_surrelevation');
        $this->addSql('ALTER TABLE ville DROP url_ravalement');
        $this->addSql('ALTER TABLE ville DROP url_cloture');
        $this->addSql('ALTER TABLE ville DROP url_geoportail');
    }
}
