<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210119151802 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EE3C5DDA0');
        $this->addSql('CREATE TABLE code_postal (id INT AUTO_INCREMENT NOT NULL, commune_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, INDEX IDX_CC94AC37131A4F72 (commune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE code_postal ADD CONSTRAINT FK_CC94AC37131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('DROP TABLE codepostaux');
        $this->addSql('DROP INDEX IDX_E2E2D1EE3C5DDA0 ON commune');
        $this->addSql('ALTER TABLE commune DROP codepostal1_id, DROP codepostaux');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE codepostaux (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE code_postal');
        $this->addSql('ALTER TABLE commune ADD codepostal1_id INT NOT NULL, ADD codepostaux INT NOT NULL');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EE3C5DDA0 FOREIGN KEY (codepostal1_id) REFERENCES codepostaux (id)');
        $this->addSql('CREATE INDEX IDX_E2E2D1EE3C5DDA0 ON commune (codepostal1_id)');
    }
}
