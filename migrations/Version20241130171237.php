<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241130171237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal_type (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, created INT UNSIGNED NOT NULL, modified INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pets (id INT UNSIGNED AUTO_INCREMENT NOT NULL, animal_type_id INT UNSIGNED NOT NULL, name VARCHAR(45) NOT NULL, info VARCHAR(255) DEFAULT NULL, created INT UNSIGNED NOT NULL, modified INT UNSIGNED NOT NULL, INDEX IDX_8638EA3F4A93E3A9 (animal_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pets ADD CONSTRAINT FK_8638EA3F4A93E3A9 FOREIGN KEY (animal_type_id) REFERENCES animal_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pets DROP FOREIGN KEY FK_8638EA3F4A93E3A9');
        $this->addSql('DROP TABLE animal_type');
        $this->addSql('DROP TABLE pets');
    }
}
