<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190730171807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE anne_universitaire (id INT AUTO_INCREMENT NOT NULL, anne_universitaire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE droit (id INT AUTO_INCREMENT NOT NULL, valeur INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ec (id INT AUTO_INCREMENT NOT NULL, uc_id INT DEFAULT NULL, enseignant_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, coefficient DOUBLE PRECISION NOT NULL, code VARCHAR(255) NOT NULL, credit INT NOT NULL, INDEX IDX_8DE8BDFF4783DC6D (uc_id), INDEX IDX_8DE8BDFFE455FCC0 (enseignant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emploi_du_temps (id INT AUTO_INCREMENT NOT NULL, jour_id INT DEFAULT NULL, heure_id INT DEFAULT NULL, niveau_id INT DEFAULT NULL, ec_id INT DEFAULT NULL, semestre_id INT DEFAULT NULL, INDEX IDX_F86B32C1220C6AD0 (jour_id), INDEX IDX_F86B32C1F2A733EB (heure_id), INDEX IDX_F86B32C1B3E9C81 (niveau_id), INDEX IDX_F86B32C127634BEF (ec_id), INDEX IDX_F86B32C15577AFDB (semestre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, login_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, lieux_naissance VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, INDEX IDX_81A72FA1C54C8C93 (type_id), UNIQUE INDEX UNIQ_81A72FA15CB2E05D (login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, sexe_id INT NOT NULL, niveaux_id INT NOT NULL, anne_universitaire_id INT NOT NULL, login_id INT DEFAULT NULL, parcour_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, photo VARCHAR(255) NOT NULL, pere VARCHAR(255) NOT NULL, profession_pere VARCHAR(255) NOT NULL, mere VARCHAR(255) NOT NULL, profession_mere VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, lieux_naissance VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, anne_entre VARCHAR(255) NOT NULL, is_sortant TINYINT(1) DEFAULT NULL, INDEX IDX_717E22E3448F3B3C (sexe_id), INDEX IDX_717E22E3AAC4B70E (niveaux_id), INDEX IDX_717E22E3E7D48F5 (anne_universitaire_id), UNIQUE INDEX UNIQ_717E22E35CB2E05D (login_id), INDEX IDX_717E22E39A561E99 (parcour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_individuel (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT NOT NULL, ec_id INT NOT NULL, semestre_id INT NOT NULL, anne_universitaire_id INT NOT NULL, INDEX IDX_4DA93DE4DDEAB1A3 (etudiant_id), INDEX IDX_4DA93DE427634BEF (ec_id), INDEX IDX_4DA93DE45577AFDB (semestre_id), INDEX IDX_4DA93DE4E7D48F5 (anne_universitaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE heures (id INT AUTO_INCREMENT NOT NULL, heures VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jours (id INT AUTO_INCREMENT NOT NULL, jours VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE login_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveaux (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, niveau VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_56F771A0C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveaux_uc (niveaux_id INT NOT NULL, uc_id INT NOT NULL, INDEX IDX_D2D77FF0AAC4B70E (niveaux_id), INDEX IDX_D2D77FF04783DC6D (uc_id), PRIMARY KEY(niveaux_id, uc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT NOT NULL, ec_id INT NOT NULL, semestre_id INT NOT NULL, anne_universitaire_id INT DEFAULT NULL, niveaux_id INT NOT NULL, note_uc_id INT DEFAULT NULL, valeur DOUBLE PRECISION NOT NULL, is_ratrapage TINYINT(1) NOT NULL, is_valide TINYINT(1) NOT NULL, value_coeff DOUBLE PRECISION NOT NULL, INDEX IDX_CFBDFA14DDEAB1A3 (etudiant_id), INDEX IDX_CFBDFA1427634BEF (ec_id), INDEX IDX_CFBDFA145577AFDB (semestre_id), INDEX IDX_CFBDFA14E7D48F5 (anne_universitaire_id), INDEX IDX_CFBDFA14AAC4B70E (niveaux_id), INDEX IDX_CFBDFA1422937FBA (note_uc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note_uc (id INT AUTO_INCREMENT NOT NULL, uc_id INT DEFAULT NULL, etudiant_id INT DEFAULT NULL, semestre_id INT DEFAULT NULL, anne_universitaire_id INT DEFAULT NULL, niveaux_id INT DEFAULT NULL, value_coeff DOUBLE PRECISION NOT NULL, is_ratarapage TINYINT(1) NOT NULL, is_valide TINYINT(1) NOT NULL, credit INT NOT NULL, INDEX IDX_5EFEC0AB4783DC6D (uc_id), INDEX IDX_5EFEC0ABDDEAB1A3 (etudiant_id), INDEX IDX_5EFEC0AB5577AFDB (semestre_id), INDEX IDX_5EFEC0ABE7D48F5 (anne_universitaire_id), INDEX IDX_5EFEC0ABAAC4B70E (niveaux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repartition_ec (id INT AUTO_INCREMENT NOT NULL, ec_id INT DEFAULT NULL, niveaux_id INT DEFAULT NULL, semestre_id INT DEFAULT NULL, INDEX IDX_B0B7DF0927634BEF (ec_id), INDEX IDX_B0B7DF09AAC4B70E (niveaux_id), INDEX IDX_B0B7DF095577AFDB (semestre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, niveau_id INT DEFAULT NULL, semestre_id INT DEFAULT NULL, parcour_id INT DEFAULT NULL, salle_class_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_4E977E5CB3E9C81 (niveau_id), INDEX IDX_4E977E5C5577AFDB (semestre_id), INDEX IDX_4E977E5C9A561E99 (parcour_id), INDEX IDX_4E977E5CF6415C1E (salle_class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_class (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school (id INT AUTO_INCREMENT NOT NULL, begin_at DATETIME NOT NULL, end_at DATETIME DEFAULT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarite (id INT AUTO_INCREMENT NOT NULL, niveau_id INT DEFAULT NULL, etudiant_id INT DEFAULT NULL, numero_inscription VARCHAR(255) NOT NULL, date_inscription DATE NOT NULL, UNIQUE INDEX UNIQ_276250ABB3E9C81 (niveau_id), INDEX IDX_276250ABDDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarite_image (id INT AUTO_INCREMENT NOT NULL, scolarites_id INT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, INDEX IDX_A8E0A9C8C5D9C0B6 (scolarites_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semestre (id INT AUTO_INCREMENT NOT NULL, semestre VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semestre_niveaux (semestre_id INT NOT NULL, niveaux_id INT NOT NULL, INDEX IDX_FDAD8D665577AFDB (semestre_id), INDEX IDX_FDAD8D66AAC4B70E (niveaux_id), PRIMARY KEY(semestre_id, niveaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semestre_uc (semestre_id INT NOT NULL, uc_id INT NOT NULL, INDEX IDX_2D6467255577AFDB (semestre_id), INDEX IDX_2D6467254783DC6D (uc_id), PRIMARY KEY(semestre_id, uc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sexe (id INT AUTO_INCREMENT NOT NULL, sexe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_parcours (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE uc (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, coefficient DOUBLE PRECISION NOT NULL, credit INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ec ADD CONSTRAINT FK_8DE8BDFF4783DC6D FOREIGN KEY (uc_id) REFERENCES uc (id)');
        $this->addSql('ALTER TABLE ec ADD CONSTRAINT FK_8DE8BDFFE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE emploi_du_temps ADD CONSTRAINT FK_F86B32C1220C6AD0 FOREIGN KEY (jour_id) REFERENCES jours (id)');
        $this->addSql('ALTER TABLE emploi_du_temps ADD CONSTRAINT FK_F86B32C1F2A733EB FOREIGN KEY (heure_id) REFERENCES heures (id)');
        $this->addSql('ALTER TABLE emploi_du_temps ADD CONSTRAINT FK_F86B32C1B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE emploi_du_temps ADD CONSTRAINT FK_F86B32C127634BEF FOREIGN KEY (ec_id) REFERENCES ec (id)');
        $this->addSql('ALTER TABLE emploi_du_temps ADD CONSTRAINT FK_F86B32C15577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id)');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT FK_81A72FA1C54C8C93 FOREIGN KEY (type_id) REFERENCES enseignant_type (id)');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT FK_81A72FA15CB2E05D FOREIGN KEY (login_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3448F3B3C FOREIGN KEY (sexe_id) REFERENCES sexe (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3AAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3E7D48F5 FOREIGN KEY (anne_universitaire_id) REFERENCES anne_universitaire (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E35CB2E05D FOREIGN KEY (login_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E39A561E99 FOREIGN KEY (parcour_id) REFERENCES type_parcours (id)');
        $this->addSql('ALTER TABLE fiche_individuel ADD CONSTRAINT FK_4DA93DE4DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE fiche_individuel ADD CONSTRAINT FK_4DA93DE427634BEF FOREIGN KEY (ec_id) REFERENCES ec (id)');
        $this->addSql('ALTER TABLE fiche_individuel ADD CONSTRAINT FK_4DA93DE45577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id)');
        $this->addSql('ALTER TABLE fiche_individuel ADD CONSTRAINT FK_4DA93DE4E7D48F5 FOREIGN KEY (anne_universitaire_id) REFERENCES anne_universitaire (id)');
        $this->addSql('ALTER TABLE niveaux ADD CONSTRAINT FK_56F771A0C54C8C93 FOREIGN KEY (type_id) REFERENCES type_parcours (id)');
        $this->addSql('ALTER TABLE niveaux_uc ADD CONSTRAINT FK_D2D77FF0AAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE niveaux_uc ADD CONSTRAINT FK_D2D77FF04783DC6D FOREIGN KEY (uc_id) REFERENCES uc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1427634BEF FOREIGN KEY (ec_id) REFERENCES ec (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA145577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14E7D48F5 FOREIGN KEY (anne_universitaire_id) REFERENCES anne_universitaire (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14AAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1422937FBA FOREIGN KEY (note_uc_id) REFERENCES note_uc (id)');
        $this->addSql('ALTER TABLE note_uc ADD CONSTRAINT FK_5EFEC0AB4783DC6D FOREIGN KEY (uc_id) REFERENCES uc (id)');
        $this->addSql('ALTER TABLE note_uc ADD CONSTRAINT FK_5EFEC0ABDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE note_uc ADD CONSTRAINT FK_5EFEC0AB5577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id)');
        $this->addSql('ALTER TABLE note_uc ADD CONSTRAINT FK_5EFEC0ABE7D48F5 FOREIGN KEY (anne_universitaire_id) REFERENCES anne_universitaire (id)');
        $this->addSql('ALTER TABLE note_uc ADD CONSTRAINT FK_5EFEC0ABAAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE repartition_ec ADD CONSTRAINT FK_B0B7DF0927634BEF FOREIGN KEY (ec_id) REFERENCES ec (id)');
        $this->addSql('ALTER TABLE repartition_ec ADD CONSTRAINT FK_B0B7DF09AAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE repartition_ec ADD CONSTRAINT FK_B0B7DF095577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5CB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5C5577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5C9A561E99 FOREIGN KEY (parcour_id) REFERENCES type_parcours (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5CF6415C1E FOREIGN KEY (salle_class_id) REFERENCES salle_class (id)');
        $this->addSql('ALTER TABLE scolarite ADD CONSTRAINT FK_276250ABB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE scolarite ADD CONSTRAINT FK_276250ABDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE scolarite_image ADD CONSTRAINT FK_A8E0A9C8C5D9C0B6 FOREIGN KEY (scolarites_id) REFERENCES scolarite (id)');
        $this->addSql('ALTER TABLE semestre_niveaux ADD CONSTRAINT FK_FDAD8D665577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semestre_niveaux ADD CONSTRAINT FK_FDAD8D66AAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semestre_uc ADD CONSTRAINT FK_2D6467255577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semestre_uc ADD CONSTRAINT FK_2D6467254783DC6D FOREIGN KEY (uc_id) REFERENCES uc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C54C8C93 FOREIGN KEY (type_id) REFERENCES login_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3E7D48F5');
        $this->addSql('ALTER TABLE fiche_individuel DROP FOREIGN KEY FK_4DA93DE4E7D48F5');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14E7D48F5');
        $this->addSql('ALTER TABLE note_uc DROP FOREIGN KEY FK_5EFEC0ABE7D48F5');
        $this->addSql('ALTER TABLE emploi_du_temps DROP FOREIGN KEY FK_F86B32C127634BEF');
        $this->addSql('ALTER TABLE fiche_individuel DROP FOREIGN KEY FK_4DA93DE427634BEF');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1427634BEF');
        $this->addSql('ALTER TABLE repartition_ec DROP FOREIGN KEY FK_B0B7DF0927634BEF');
        $this->addSql('ALTER TABLE ec DROP FOREIGN KEY FK_8DE8BDFFE455FCC0');
        $this->addSql('ALTER TABLE enseignant DROP FOREIGN KEY FK_81A72FA1C54C8C93');
        $this->addSql('ALTER TABLE fiche_individuel DROP FOREIGN KEY FK_4DA93DE4DDEAB1A3');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14DDEAB1A3');
        $this->addSql('ALTER TABLE note_uc DROP FOREIGN KEY FK_5EFEC0ABDDEAB1A3');
        $this->addSql('ALTER TABLE scolarite DROP FOREIGN KEY FK_276250ABDDEAB1A3');
        $this->addSql('ALTER TABLE emploi_du_temps DROP FOREIGN KEY FK_F86B32C1F2A733EB');
        $this->addSql('ALTER TABLE emploi_du_temps DROP FOREIGN KEY FK_F86B32C1220C6AD0');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C54C8C93');
        $this->addSql('ALTER TABLE emploi_du_temps DROP FOREIGN KEY FK_F86B32C1B3E9C81');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3AAC4B70E');
        $this->addSql('ALTER TABLE niveaux_uc DROP FOREIGN KEY FK_D2D77FF0AAC4B70E');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14AAC4B70E');
        $this->addSql('ALTER TABLE note_uc DROP FOREIGN KEY FK_5EFEC0ABAAC4B70E');
        $this->addSql('ALTER TABLE repartition_ec DROP FOREIGN KEY FK_B0B7DF09AAC4B70E');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5CB3E9C81');
        $this->addSql('ALTER TABLE scolarite DROP FOREIGN KEY FK_276250ABB3E9C81');
        $this->addSql('ALTER TABLE semestre_niveaux DROP FOREIGN KEY FK_FDAD8D66AAC4B70E');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1422937FBA');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5CF6415C1E');
        $this->addSql('ALTER TABLE scolarite_image DROP FOREIGN KEY FK_A8E0A9C8C5D9C0B6');
        $this->addSql('ALTER TABLE emploi_du_temps DROP FOREIGN KEY FK_F86B32C15577AFDB');
        $this->addSql('ALTER TABLE fiche_individuel DROP FOREIGN KEY FK_4DA93DE45577AFDB');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA145577AFDB');
        $this->addSql('ALTER TABLE note_uc DROP FOREIGN KEY FK_5EFEC0AB5577AFDB');
        $this->addSql('ALTER TABLE repartition_ec DROP FOREIGN KEY FK_B0B7DF095577AFDB');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5C5577AFDB');
        $this->addSql('ALTER TABLE semestre_niveaux DROP FOREIGN KEY FK_FDAD8D665577AFDB');
        $this->addSql('ALTER TABLE semestre_uc DROP FOREIGN KEY FK_2D6467255577AFDB');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3448F3B3C');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E39A561E99');
        $this->addSql('ALTER TABLE niveaux DROP FOREIGN KEY FK_56F771A0C54C8C93');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5C9A561E99');
        $this->addSql('ALTER TABLE ec DROP FOREIGN KEY FK_8DE8BDFF4783DC6D');
        $this->addSql('ALTER TABLE niveaux_uc DROP FOREIGN KEY FK_D2D77FF04783DC6D');
        $this->addSql('ALTER TABLE note_uc DROP FOREIGN KEY FK_5EFEC0AB4783DC6D');
        $this->addSql('ALTER TABLE semestre_uc DROP FOREIGN KEY FK_2D6467254783DC6D');
        $this->addSql('ALTER TABLE enseignant DROP FOREIGN KEY FK_81A72FA15CB2E05D');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E35CB2E05D');
        $this->addSql('DROP TABLE anne_universitaire');
        $this->addSql('DROP TABLE droit');
        $this->addSql('DROP TABLE ec');
        $this->addSql('DROP TABLE emploi_du_temps');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE enseignant_type');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE fiche_individuel');
        $this->addSql('DROP TABLE heures');
        $this->addSql('DROP TABLE jours');
        $this->addSql('DROP TABLE login_type');
        $this->addSql('DROP TABLE niveaux');
        $this->addSql('DROP TABLE niveaux_uc');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE note_uc');
        $this->addSql('DROP TABLE repartition_ec');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE salle_class');
        $this->addSql('DROP TABLE school');
        $this->addSql('DROP TABLE scolarite');
        $this->addSql('DROP TABLE scolarite_image');
        $this->addSql('DROP TABLE semestre');
        $this->addSql('DROP TABLE semestre_niveaux');
        $this->addSql('DROP TABLE semestre_uc');
        $this->addSql('DROP TABLE sexe');
        $this->addSql('DROP TABLE type_parcours');
        $this->addSql('DROP TABLE uc');
        $this->addSql('DROP TABLE user');
    }
}
