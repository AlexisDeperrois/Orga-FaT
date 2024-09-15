<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240915180236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, phone_number VARCHAR(255) DEFAULT NULL, contact_date DATE DEFAULT NULL, sending_doc_date DATE DEFAULT NULL, comments VARCHAR(255) DEFAULT NULL, nb_metres INT DEFAULT NULL, has_portant TINYINT(1) NOT NULL, is_fcpemember TINYINT(1) NOT NULL, price_metrage INT DEFAULT NULL, nb_merguez INT DEFAULT NULL, nb_saucisse INT DEFAULT NULL, nb_panini_dinde INT DEFAULT NULL, nb_panini_fromage INT DEFAULT NULL, nb_panini_jambon INT DEFAULT NULL, price_food INT DEFAULT NULL, assurance_reçu TINYINT(1) NOT NULL, carte_id_reçu TINYINT(1) NOT NULL, inscription_checked_date DATE DEFAULT NULL, is_payed TINYINT(1) NOT NULL, moyen_paiement VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reservation');
    }
}
