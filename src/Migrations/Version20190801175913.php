<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190801175913 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_29791883DDEAB1A3');
        $this->addSql('DROP INDEX IDX_29791883DDEAB1A3 ON information');
        $this->addSql('ALTER TABLE information DROP etudiant_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE information ADD etudiant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_29791883DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_29791883DDEAB1A3 ON information (etudiant_id)');
    }
}
