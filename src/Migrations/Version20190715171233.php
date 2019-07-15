<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190715171233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salle DROP INDEX UNIQ_4E977E5C5577AFDB, ADD INDEX IDX_4E977E5C5577AFDB (semestre_id)');
        $this->addSql('ALTER TABLE salle DROP INDEX UNIQ_4E977E5CB3E9C81, ADD INDEX IDX_4E977E5CB3E9C81 (niveau_id)');
        $this->addSql('ALTER TABLE salle ADD parcour_id INT DEFAULT NULL, DROP nom');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5C9A561E99 FOREIGN KEY (parcour_id) REFERENCES type_parcours (id)');
        $this->addSql('CREATE INDEX IDX_4E977E5C9A561E99 ON salle (parcour_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salle DROP INDEX IDX_4E977E5CB3E9C81, ADD UNIQUE INDEX UNIQ_4E977E5CB3E9C81 (niveau_id)');
        $this->addSql('ALTER TABLE salle DROP INDEX IDX_4E977E5C5577AFDB, ADD UNIQUE INDEX UNIQ_4E977E5C5577AFDB (semestre_id)');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5C9A561E99');
        $this->addSql('DROP INDEX IDX_4E977E5C9A561E99 ON salle');
        $this->addSql('ALTER TABLE salle ADD nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP parcour_id');
    }
}
