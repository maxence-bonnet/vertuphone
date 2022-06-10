<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610131723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE imei (id INT AUTO_INCREMENT NOT NULL, phone_id INT DEFAULT NULL, number INT NOT NULL, INDEX IDX_B8179F83B7323CB (phone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE imei ADD CONSTRAINT FK_B8179F83B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id)');
        $this->addSql('DROP TABLE imie');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE imie (id INT AUTO_INCREMENT NOT NULL, phone_id INT DEFAULT NULL, number INT NOT NULL, INDEX IDX_AE827ADF3B7323CB (phone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE imie ADD CONSTRAINT FK_AE827ADF3B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id)');
        $this->addSql('DROP TABLE imei');
    }
}
