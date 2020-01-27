<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200127090259 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login_naam VARCHAR(255) NOT NULL, wachtwoord VARCHAR(255) NOT NULL, voornaam VARCHAR(255) NOT NULL, pre_provision VARCHAR(255) NOT NULL, achternaam VARCHAR(255) NOT NULL, geboorte_datum DATE NOT NULL, geslacht VARCHAR(100) NOT NULL, email_adres VARCHAR(255) NOT NULL, rol LONGTEXT DEFAULT NULL, huur_datum DATETIME NOT NULL, salaris NUMERIC(5, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registratie CHANGE betaling betaling NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE registratie CHANGE betaling betaling NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
