<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240921140359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE emplacement (id INT AUTO_INCREMENT NOT NULL, rangée_id INT NOT NULL, reservation_id INT DEFAULT NULL, number INT NOT NULL, INDEX IDX_C0CF65F6AEEDE238 (rangée_id), INDEX IDX_C0CF65F6B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `table` (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emplacement ADD CONSTRAINT FK_C0CF65F6AEEDE238 FOREIGN KEY (rangée_id) REFERENCES `table` (id)');
        $this->addSql('ALTER TABLE emplacement ADD CONSTRAINT FK_C0CF65F6B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emplacement DROP FOREIGN KEY FK_C0CF65F6AEEDE238');
        $this->addSql('ALTER TABLE emplacement DROP FOREIGN KEY FK_C0CF65F6B83297E7');
        $this->addSql('DROP TABLE emplacement');
        $this->addSql('DROP TABLE `table`');
    }
}
