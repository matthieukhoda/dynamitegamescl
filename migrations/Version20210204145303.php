<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204145303 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_games (category_id INT NOT NULL, games_id INT NOT NULL, INDEX IDX_1710647812469DE2 (category_id), INDEX IDX_1710647897FFC673 (games_id), PRIMARY KEY(category_id, games_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_games ADD CONSTRAINT FK_1710647812469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_games ADD CONSTRAINT FK_1710647897FFC673 FOREIGN KEY (games_id) REFERENCES games (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE games CHANGE price price INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE ean_code ean_code INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_games DROP FOREIGN KEY FK_1710647812469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_games');
        $this->addSql('ALTER TABLE games CHANGE price price INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE ean_code ean_code INT DEFAULT NULL');
    }
}
