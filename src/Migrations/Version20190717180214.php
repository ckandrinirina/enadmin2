<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190717180214 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scolarite ADD niveau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scolarite ADD CONSTRAINT FK_276250ABB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_276250ABB3E9C81 ON scolarite (niveau_id)');
        $this->addSql('ALTER TABLE scolarite_image DROP FOREIGN KEY FK_A8E0A9C8B3E9C81');
        $this->addSql('DROP INDEX UNIQ_A8E0A9C8B3E9C81 ON scolarite_image');
        $this->addSql('ALTER TABLE scolarite_image DROP niveau_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scolarite DROP FOREIGN KEY FK_276250ABB3E9C81');
        $this->addSql('DROP INDEX UNIQ_276250ABB3E9C81 ON scolarite');
        $this->addSql('ALTER TABLE scolarite DROP niveau_id');
        $this->addSql('ALTER TABLE scolarite_image ADD niveau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scolarite_image ADD CONSTRAINT FK_A8E0A9C8B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A8E0A9C8B3E9C81 ON scolarite_image (niveau_id)');
    }
}
