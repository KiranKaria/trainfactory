<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200128114242 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE registratie ADD les_id INT NOT NULL, CHANGE betaling betaling NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE registratie ADD CONSTRAINT FK_9A05E10A7FAC85EF FOREIGN KEY (les_id) REFERENCES les (id)');
        $this->addSql('CREATE INDEX IDX_9A05E10A7FAC85EF ON registratie (les_id)');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE huur_datum huur_datum DATETIME DEFAULT NULL, CHANGE salaris salaris NUMERIC(5, 0) DEFAULT NULL, CHANGE straat straat VARCHAR(255) DEFAULT NULL, CHANGE postcode postcode VARCHAR(255) DEFAULT NULL, CHANGE plaats plaats VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE registratie DROP FOREIGN KEY FK_9A05E10A7FAC85EF');
        $this->addSql('DROP INDEX IDX_9A05E10A7FAC85EF ON registratie');
        $this->addSql('ALTER TABLE registratie DROP les_id, CHANGE betaling betaling NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE huur_datum huur_datum DATETIME DEFAULT \'NULL\', CHANGE salaris salaris NUMERIC(5, 0) DEFAULT \'NULL\', CHANGE straat straat VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE postcode postcode VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE plaats plaats VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
