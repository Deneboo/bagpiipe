<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191215195707 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adress (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, adress_street_number VARCHAR(16) DEFAULT NULL, adress_street_name VARCHAR(255) NOT NULL, adress_information VARCHAR(255) DEFAULT NULL, INDEX IDX_5CECC7BE8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, city_name VARCHAR(55) NOT NULL, city_postcode VARCHAR(10) DEFAULT NULL, city_country VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, event_title VARCHAR(55) NOT NULL, event_subtitle VARCHAR(255) DEFAULT NULL, event_description VARCHAR(5000) NOT NULL, event_date_start DATETIME NOT NULL, event_date_end DATETIME DEFAULT NULL, event_story LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_adress (event_id INT NOT NULL, adress_id INT NOT NULL, INDEX IDX_6E75B0EC71F7E88B (event_id), INDEX IDX_6E75B0EC8486F9AC (adress_id), PRIMARY KEY(event_id, adress_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adress ADD CONSTRAINT FK_5CECC7BE8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE event_adress ADD CONSTRAINT FK_6E75B0EC71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_adress ADD CONSTRAINT FK_6E75B0EC8486F9AC FOREIGN KEY (adress_id) REFERENCES adress (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_adress DROP FOREIGN KEY FK_6E75B0EC8486F9AC');
        $this->addSql('ALTER TABLE adress DROP FOREIGN KEY FK_5CECC7BE8BAC62AF');
        $this->addSql('ALTER TABLE event_adress DROP FOREIGN KEY FK_6E75B0EC71F7E88B');
        $this->addSql('DROP TABLE adress');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_adress');
    }
}
