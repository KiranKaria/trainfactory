<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200128114558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE les ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE les ADD CONSTRAINT FK_6F0A5432A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6F0A5432A76ED395 ON les (user_id)');
        $this->addSql('ALTER TABLE registratie CHANGE betaling betaling NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE huur_datum huur_datum DATETIME DEFAULT NULL, CHANGE salaris salaris NUMERIC(5, 0) DEFAULT NULL, CHANGE straat straat VARCHAR(255) DEFAULT NULL, CHANGE postcode postcode VARCHAR(255) DEFAULT NULL, CHANGE plaats plaats VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE les DROP FOREIGN KEY FK_6F0A5432A76ED395');
        $this->addSql('DROP INDEX IDX_6F0A5432A76ED395 ON les');
        $this->addSql('ALTER TABLE les DROP user_id');
        $this->addSql('ALTER TABLE registratie CHANGE betaling betaling NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE huur_datum huur_datum DATETIME DEFAULT \'NULL\', CHANGE salaris salaris NUMERIC(5, 0) DEFAULT \'NULL\', CHANGE straat straat VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE postcode postcode VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE plaats plaats VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
