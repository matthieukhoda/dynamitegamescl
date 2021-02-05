<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204145907 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plateform (id INT AUTO_INCREMENT NOT NULL, plateforme VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateform_games (plateform_id INT NOT NULL, games_id INT NOT NULL, INDEX IDX_3DE3A3E1CCAA542F (plateform_id), INDEX IDX_3DE3A3E197FFC673 (games_id), PRIMARY KEY(plateform_id, games_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plateform_games ADD CONSTRAINT FK_3DE3A3E1CCAA542F FOREIGN KEY (plateform_id) REFERENCES plateform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plateform_games ADD CONSTRAINT FK_3DE3A3E197FFC673 FOREIGN KEY (games_id) REFERENCES games (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE games CHANGE price price INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE ean_code ean_code INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plateform_games DROP FOREIGN KEY FK_3DE3A3E1CCAA542F');
        $this->addSql('DROP TABLE plateform');
        $this->addSql('DROP TABLE plateform_games');
        $this->addSql('ALTER TABLE games CHANGE price price INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE ean_code ean_code INT DEFAULT NULL');
    }
}
