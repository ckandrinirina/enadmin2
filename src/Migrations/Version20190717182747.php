<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190717182747 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scolarite DROP INDEX UNIQ_276250ABDDEAB1A3, ADD INDEX IDX_276250ABDDEAB1A3 (etudiant_id)');
        $this->addSql('ALTER TABLE scolarite CHANGE etudiant_id etudiant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scolarite_image DROP FOREIGN KEY FK_A8E0A9C881CFDAE7');
        $this->addSql('DROP INDEX IDX_A8E0A9C881CFDAE7 ON scolarite_image');
        $this->addSql('ALTER TABLE scolarite_image ADD url VARCHAR(255) DEFAULT NULL, CHANGE url_id scolarites_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scolarite_image ADD CONSTRAINT FK_A8E0A9C8C5D9C0B6 FOREIGN KEY (scolarites_id) REFERENCES scolarite (id)');
        $this->addSql('CREATE INDEX IDX_A8E0A9C8C5D9C0B6 ON scolarite_image (scolarites_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scolarite DROP INDEX IDX_276250ABDDEAB1A3, ADD UNIQUE INDEX UNIQ_276250ABDDEAB1A3 (etudiant_id)');
        $this->addSql('ALTER TABLE scolarite CHANGE etudiant_id etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE scolarite_image DROP FOREIGN KEY FK_A8E0A9C8C5D9C0B6');
        $this->addSql('DROP INDEX IDX_A8E0A9C8C5D9C0B6 ON scolarite_image');
        $this->addSql('ALTER TABLE scolarite_image DROP url, CHANGE scolarites_id url_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scolarite_image ADD CONSTRAINT FK_A8E0A9C881CFDAE7 FOREIGN KEY (url_id) REFERENCES scolarite (id)');
        $this->addSql('CREATE INDEX IDX_A8E0A9C881CFDAE7 ON scolarite_image (url_id)');
    }
}
