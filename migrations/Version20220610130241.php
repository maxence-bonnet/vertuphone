<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610130241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE imie (id INT AUTO_INCREMENT NOT NULL, phone_id INT DEFAULT NULL, number INT NOT NULL, INDEX IDX_AE827ADF3B7323CB (phone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE imie ADD CONSTRAINT FK_AE827ADF3B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id)');
        $this->addSql('ALTER TABLE phone DROP imies, CHANGE stock limit_stock INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE imie');
        $this->addSql('ALTER TABLE phone ADD imies LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE limit_stock stock INT NOT NULL');
    }
}
