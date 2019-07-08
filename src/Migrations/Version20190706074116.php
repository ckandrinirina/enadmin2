<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190706074116 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE note_uc (id INT AUTO_INCREMENT NOT NULL, uc_id INT DEFAULT NULL, etudiant_id INT DEFAULT NULL, semestre_id INT DEFAULT NULL, anne_universitaire_id INT DEFAULT NULL, niveaux_id INT DEFAULT NULL, value DOUBLE PRECISION NOT NULL, value_coeff DOUBLE PRECISION NOT NULL, is_ratarapage TINYINT(1) NOT NULL, is_valide TINYINT(1) NOT NULL, INDEX IDX_5EFEC0AB4783DC6D (uc_id), INDEX IDX_5EFEC0ABDDEAB1A3 (etudiant_id), INDEX IDX_5EFEC0AB5577AFDB (semestre_id), INDEX IDX_5EFEC0ABE7D48F5 (anne_universitaire_id), INDEX IDX_5EFEC0ABAAC4B70E (niveaux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE note_uc ADD CONSTRAINT FK_5EFEC0AB4783DC6D FOREIGN KEY (uc_id) REFERENCES uc (id)');
        $this->addSql('ALTER TABLE note_uc ADD CONSTRAINT FK_5EFEC0ABDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE note_uc ADD CONSTRAINT FK_5EFEC0AB5577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id)');
        $this->addSql('ALTER TABLE note_uc ADD CONSTRAINT FK_5EFEC0ABE7D48F5 FOREIGN KEY (anne_universitaire_id) REFERENCES anne_universitaire (id)');
        $this->addSql('ALTER TABLE note_uc ADD CONSTRAINT FK_5EFEC0ABAAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE note ADD note_uc_id INT DEFAULT NULL, ADD value_coeff DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1422937FBA FOREIGN KEY (note_uc_id) REFERENCES note_uc (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA1422937FBA ON note (note_uc_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1422937FBA');
        $this->addSql('DROP TABLE note_uc');
        $this->addSql('DROP INDEX IDX_CFBDFA1422937FBA ON note');
        $this->addSql('ALTER TABLE note DROP note_uc_id, DROP value_coeff');
    }
}
