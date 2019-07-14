<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190714111052 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE emploi_du_temps DROP FOREIGN KEY FK_F86B32C1F8370AB1');
        $this->addSql('DROP INDEX IDX_F86B32C1F8370AB1 ON emploi_du_temps');
        $this->addSql('ALTER TABLE emploi_du_temps CHANGE semstre_id semestre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE emploi_du_temps ADD CONSTRAINT FK_F86B32C15577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id)');
        $this->addSql('CREATE INDEX IDX_F86B32C15577AFDB ON emploi_du_temps (semestre_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE emploi_du_temps DROP FOREIGN KEY FK_F86B32C15577AFDB');
        $this->addSql('DROP INDEX IDX_F86B32C15577AFDB ON emploi_du_temps');
        $this->addSql('ALTER TABLE emploi_du_temps CHANGE semestre_id semstre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE emploi_du_temps ADD CONSTRAINT FK_F86B32C1F8370AB1 FOREIGN KEY (semstre_id) REFERENCES semestre (id)');
        $this->addSql('CREATE INDEX IDX_F86B32C1F8370AB1 ON emploi_du_temps (semstre_id)');
    }
}
