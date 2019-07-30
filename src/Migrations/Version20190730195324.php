<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190730195324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, contenu LONGTEXT NOT NULL, add_at DATETIME NOT NULL, INDEX IDX_29791883DDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_niveaux (information_id INT NOT NULL, niveaux_id INT NOT NULL, INDEX IDX_4BC6D1312EF03101 (information_id), INDEX IDX_4BC6D131AAC4B70E (niveaux_id), PRIMARY KEY(information_id, niveaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_29791883DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE information_niveaux ADD CONSTRAINT FK_4BC6D1312EF03101 FOREIGN KEY (information_id) REFERENCES information (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE information_niveaux ADD CONSTRAINT FK_4BC6D131AAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE information_niveaux DROP FOREIGN KEY FK_4BC6D1312EF03101');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE information_niveaux');
    }
}
