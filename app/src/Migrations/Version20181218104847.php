<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181218104847 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE projet_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reference_cadastrale_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE dossier_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE adresse_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE projet (id INT NOT NULL, est_nouvelle_construction BOOLEAN NOT NULL, est_nouvelle_construction_piscine BOOLEAN NOT NULL, est_nouvelle_construction_garage BOOLEAN NOT NULL, est_nouvelle_construction_veranda BOOLEAN NOT NULL, est_nouvelle_construction_abri_jardin BOOLEAN NOT NULL, nouvelle_construction_autres VARCHAR(255) DEFAULT NULL, est_travaux_sur_existant BOOLEAN NOT NULL, est_travaux_sur_existant_extension BOOLEAN NOT NULL, est_travaux_sur_existant_surrelevation BOOLEAN NOT NULL, est_travaux_sur_existant_creation_niveaux BOOLEAN NOT NULL, travaux_sur_existant_autres VARCHAR(255) DEFAULT NULL, est_cloture BOOLEAN NOT NULL, courte_description VARCHAR(255) DEFAULT NULL, est_pour_residence_principale BOOLEAN NOT NULL, est_pour_residence_secondaire BOOLEAN NOT NULL, surface_plancher_existante DOUBLE PRECISION DEFAULT NULL, surface_plancher_creee DOUBLE PRECISION DEFAULT NULL, surface_plancher_supprimee DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE reference_cadastrale (id INT NOT NULL, prefixe VARCHAR(10) NOT NULL, section VARCHAR(10) NOT NULL, numero VARCHAR(10) NOT NULL, superficie DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE dossier (id INT NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE adresse (id INT NOT NULL, numero VARCHAR(255) DEFAULT NULL, voie VARCHAR(255) DEFAULT NULL, lieudit VARCHAR(255) DEFAULT NULL, localite VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, boite_postale VARCHAR(255) DEFAULT NULL, cedex VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE projet_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reference_cadastrale_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE dossier_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE adresse_id_seq CASCADE');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE reference_cadastrale');
        $this->addSql('DROP TABLE dossier');
        $this->addSql('DROP TABLE adresse');
    }
}
