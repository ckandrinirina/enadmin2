<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190718182914 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scolarite DROP FOREIGN KEY FK_276250AB5AA93370');
        $this->addSql('DROP INDEX IDX_276250AB5AA93370 ON scolarite');
        $this->addSql('ALTER TABLE scolarite DROP droit_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scolarite ADD droit_id INT NOT NULL');
        $this->addSql('ALTER TABLE scolarite ADD CONSTRAINT FK_276250AB5AA93370 FOREIGN KEY (droit_id) REFERENCES droit (id)');
        $this->addSql('CREATE INDEX IDX_276250AB5AA93370 ON scolarite (droit_id)');
    }
}
