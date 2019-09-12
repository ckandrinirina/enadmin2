<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190813193347 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE semestre_niveaux (semestre_id INT NOT NULL, niveaux_id INT NOT NULL, INDEX IDX_FDAD8D665577AFDB (semestre_id), INDEX IDX_FDAD8D66AAC4B70E (niveaux_id), PRIMARY KEY(semestre_id, niveaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE semestre_niveaux ADD CONSTRAINT FK_FDAD8D665577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semestre_niveaux ADD CONSTRAINT FK_FDAD8D66AAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semestre DROP FOREIGN KEY FK_71688FBCAAC4B70E');
        $this->addSql('DROP INDEX IDX_71688FBCAAC4B70E ON semestre');
        $this->addSql('ALTER TABLE semestre DROP niveaux_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE semestre_niveaux');
        $this->addSql('ALTER TABLE semestre ADD niveaux_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE semestre ADD CONSTRAINT FK_71688FBCAAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id)');
        $this->addSql('CREATE INDEX IDX_71688FBCAAC4B70E ON semestre (niveaux_id)');
    }
}
