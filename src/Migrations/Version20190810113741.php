<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190810113741 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE moyenne (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT NOT NULL, semestre_id INT NOT NULL, niveau_id INT NOT NULL, anne_universitaire_id INT NOT NULL, value DOUBLE PRECISION NOT NULL, is_ratrapage TINYINT(1) NOT NULL, is_valide TINYINT(1) NOT NULL, credit DOUBLE PRECISION NOT NULL, INDEX IDX_F27AFF8FDDEAB1A3 (etudiant_id), INDEX IDX_F27AFF8F5577AFDB (semestre_id), INDEX IDX_F27AFF8FB3E9C81 (niveau_id), INDEX IDX_F27AFF8FE7D48F5 (anne_universitaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE moyenne ADD CONSTRAINT FK_F27AFF8FDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE moyenne ADD CONSTRAINT FK_F27AFF8F5577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id)');
        $this->addSql('ALTER TABLE moyenne ADD CONSTRAINT FK_F27AFF8FB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE moyenne ADD CONSTRAINT FK_F27AFF8FE7D48F5 FOREIGN KEY (anne_universitaire_id) REFERENCES anne_universitaire (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE moyenne');
    }
}
