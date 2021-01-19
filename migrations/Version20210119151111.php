<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210119151111 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EE1170724E');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EEA9CC152B');
        $this->addSql('DROP INDEX IDX_E2E2D1EE1170724E ON commune');
        $this->addSql('DROP INDEX IDX_E2E2D1EEA9CC152B ON commune');
        $this->addSql('ALTER TABLE commune DROP codepostal2_id, DROP codepostal3_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commune ADD codepostal2_id INT DEFAULT NULL, ADD codepostal3_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EE1170724E FOREIGN KEY (codepostal2_id) REFERENCES codepostaux (id)');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EEA9CC152B FOREIGN KEY (codepostal3_id) REFERENCES codepostaux (id)');
        $this->addSql('CREATE INDEX IDX_E2E2D1EE1170724E ON commune (codepostal2_id)');
        $this->addSql('CREATE INDEX IDX_E2E2D1EEA9CC152B ON commune (codepostal3_id)');
    }
}
