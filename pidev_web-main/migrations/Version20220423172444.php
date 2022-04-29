<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220423172444 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendar (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, start DATETIME NOT NULL, end DATETIME NOT NULL, description LONGTEXT NOT NULL, all_day TINYINT(1) NOT NULL, background_color VARCHAR(7) NOT NULL, border_color VARCHAR(7) NOT NULL, text_color VARCHAR(7) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande CHANGE id_utilisateur id_utilisateur INT DEFAULT NULL, CHANGE id_produit id_produit INT DEFAULT NULL, CHANGE date_commande date_commande DATE DEFAULT \'CURRENT_TIMESTAMP\'');
        $this->addSql('ALTER TABLE commentaire CHANGE id_news id_news INT DEFAULT NULL, CHANGE id_utilisateur id_utilisateur INT DEFAULT NULL, CHANGE date_pub date_pub DATE DEFAULT \'CURRENT_TIMESTAMP\'');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY fk_equipemanager');
        $this->addSql('DROP INDEX fk_equipemanager ON equipe');
        $this->addSql('ALTER TABLE equipe DROP id_manager, CHANGE total_winnings total_winnings INT NOT NULL');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY fk_equipejoueur');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY fk_utilisateurjoueur');
        $this->addSql('DROP INDEX fk_utilisateurjoueur ON joueur');
        $this->addSql('DROP INDEX fk_equipejoueur ON joueur');
        $this->addSql('ALTER TABLE joueur ADD nom_equipe VARCHAR(255) NOT NULL, DROP id_utilisateur, DROP id_equipe');
        $this->addSql('ALTER TABLE likedislike CHANGE id_ld id_ld INT AUTO_INCREMENT NOT NULL, CHANGE id_utilisateur id_utilisateur INT DEFAULT NULL, CHANGE id_news id_news INT DEFAULT NULL');
        $this->addSql('ALTER TABLE likedislike ADD CONSTRAINT FK_39D118DB96F38552 FOREIGN KEY (id_news) REFERENCES news (id_news)');
        $this->addSql('ALTER TABLE likedislike ADD CONSTRAINT FK_39D118DB50EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE manager DROP FOREIGN KEY fk_manager');
        $this->addSql('DROP INDEX fk_manager ON manager');
        $this->addSql('ALTER TABLE manager ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(200) NOT NULL, ADD email VARCHAR(200) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD date_naissance VARCHAR(200) NOT NULL, DROP id_utlisateur');
        $this->addSql('ALTER TABLE match_ DROP FOREIGN KEY fk_matchtournoi');
        $this->addSql('ALTER TABLE match_ ADD score1 INT DEFAULT NULL, ADD score2 INT DEFAULT NULL, CHANGE id_equipe1 id_equipe1 INT DEFAULT NULL, CHANGE id_equipe2 id_equipe2 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE match_ ADD CONSTRAINT FK_59C60CA2C63270AF FOREIGN KEY (id_tournoi) REFERENCES tournoi (id_tournoi)');
        $this->addSql('ALTER TABLE match_pari DROP FOREIGN KEY fk_matchpari');
        $this->addSql('ALTER TABLE match_pari DROP FOREIGN KEY fk_matchpari1');
        $this->addSql('DROP INDEX fk_matchpari1 ON match_pari');
        $this->addSql('DROP INDEX fk_matchpari ON match_pari');
        $this->addSql('ALTER TABLE match_pari ADD id_match INT DEFAULT NULL, ADD montant_t INT DEFAULT NULL, ADD valide INT DEFAULT NULL, DROP id_equipe1, DROP id_equipe2, DROP gagnat, DROP pourcentage, DROP classe, DROP qt_supplementaire, DROP date_MP');
        $this->addSql('ALTER TABLE match_pari ADD CONSTRAINT FK_4B66AD6D94DE8435 FOREIGN KEY (id_match) REFERENCES equipe (id_equipe)');
        $this->addSql('CREATE INDEX fk_matchpari ON match_pari (id_match)');
        $this->addSql('ALTER TABLE news ADD nb_commentaire INT NOT NULL, ADD nb_likes INT NOT NULL, CHANGE date_pub date_pub DATE DEFAULT \'CURRENT_TIMESTAMP\'');
        $this->addSql('DROP INDEX fk_parimatch ON pari');
        $this->addSql('ALTER TABLE pari ADD reponse_supp VARCHAR(300) NOT NULL, ADD type INT NOT NULL, CHANGE id_matchpari id_MP INT NOT NULL');
        $this->addSql('CREATE INDEX fk_parimatch ON pari (id_MP)');
        $this->addSql('ALTER TABLE participants_evenement CHANGE id_evenement id_evenement INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id_evenement)');
        $this->addSql('ALTER TABLE participants_tournoi CHANGE id_tournoi id_tournoi INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id_tournoi)');
        $this->addSql('ALTER TABLE produit CHANGE date_ajout date_ajout DATE DEFAULT \'CURRENT_TIMESTAMP\'');
        $this->addSql('ALTER TABLE reponse CHANGE date_pub date_pub DATE DEFAULT \'CURRENT_TIMESTAMP\'');
        $this->addSql('ALTER TABLE sponsor CHANGE num_contact num_contact INT NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD nom_tournoi VARCHAR(50) DEFAULT NULL, ADD date_tournoi DATE DEFAULT NULL, DROP nom-tournoi, DROP pos1, DROP pos2, DROP pos3, CHANGE nb_participants heure INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD prenom VARCHAR(200) NOT NULL, DROP image, CHANGE date_de_naissance date_de_naissance VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE calendar');
        $this->addSql('ALTER TABLE commande CHANGE id_utilisateur id_utilisateur INT NOT NULL, CHANGE id_produit id_produit INT NOT NULL, CHANGE date_commande date_commande DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire CHANGE id_news id_news INT NOT NULL, CHANGE id_utilisateur id_utilisateur INT NOT NULL, CHANGE date_pub date_pub DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE equipe ADD id_manager INT NOT NULL, CHANGE total_winnings total_winnings INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT fk_equipemanager FOREIGN KEY (id_manager) REFERENCES manager (id_manager)');
        $this->addSql('CREATE INDEX fk_equipemanager ON equipe (id_manager)');
        $this->addSql('ALTER TABLE joueur ADD id_utilisateur INT NOT NULL, ADD id_equipe INT NOT NULL, DROP nom_equipe');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT fk_equipejoueur FOREIGN KEY (id_equipe) REFERENCES equipe (id_equipe)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT fk_utilisateurjoueur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('CREATE INDEX fk_utilisateurjoueur ON joueur (id_utilisateur)');
        $this->addSql('CREATE INDEX fk_equipejoueur ON joueur (id_equipe)');
        $this->addSql('ALTER TABLE likedislike DROP FOREIGN KEY FK_39D118DB96F38552');
        $this->addSql('ALTER TABLE likedislike DROP FOREIGN KEY FK_39D118DB50EAE44');
        $this->addSql('ALTER TABLE likedislike CHANGE id_ld id_ld INT NOT NULL, CHANGE id_news id_news INT NOT NULL, CHANGE id_utilisateur id_utilisateur INT NOT NULL');
        $this->addSql('ALTER TABLE manager ADD id_utlisateur INT DEFAULT NULL, DROP nom, DROP prenom, DROP email, DROP password, DROP date_naissance');
        $this->addSql('ALTER TABLE manager ADD CONSTRAINT fk_manager FOREIGN KEY (id_utlisateur) REFERENCES utilisateur (id_utilisateur) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX fk_manager ON manager (id_utlisateur)');
        $this->addSql('ALTER TABLE match_ DROP FOREIGN KEY FK_59C60CA2C63270AF');
        $this->addSql('ALTER TABLE match_ DROP score1, DROP score2, CHANGE id_equipe1 id_equipe1 INT NOT NULL, CHANGE id_equipe2 id_equipe2 INT NOT NULL');
        $this->addSql('ALTER TABLE match_ ADD CONSTRAINT fk_matchtournoi FOREIGN KEY (id_tournoi) REFERENCES tournoi (id_tournoi) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE match_pari DROP FOREIGN KEY FK_4B66AD6D94DE8435');
        $this->addSql('DROP INDEX fk_matchpari ON match_pari');
        $this->addSql('ALTER TABLE match_pari ADD id_equipe1 INT NOT NULL, ADD id_equipe2 INT NOT NULL, ADD gagnat VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ADD pourcentage DOUBLE PRECISION DEFAULT NULL, ADD classe INT NOT NULL, ADD qt_supplementaire DOUBLE PRECISION NOT NULL, ADD date_MP DATE DEFAULT NULL, DROP id_match, DROP montant_t, DROP valide');
        $this->addSql('ALTER TABLE match_pari ADD CONSTRAINT fk_matchpari FOREIGN KEY (id_equipe1) REFERENCES equipe (id_equipe)');
        $this->addSql('ALTER TABLE match_pari ADD CONSTRAINT fk_matchpari1 FOREIGN KEY (id_equipe2) REFERENCES equipe (id_equipe)');
        $this->addSql('CREATE INDEX fk_matchpari1 ON match_pari (id_equipe2)');
        $this->addSql('CREATE INDEX fk_matchpari ON match_pari (id_equipe1)');
        $this->addSql('ALTER TABLE news DROP nb_commentaire, DROP nb_likes, CHANGE date_pub date_pub DATE DEFAULT NULL');
        $this->addSql('DROP INDEX fk_parimatch ON pari');
        $this->addSql('ALTER TABLE pari ADD id_matchpari INT NOT NULL, DROP id_MP, DROP reponse_supp, DROP type');
        $this->addSql('CREATE INDEX fk_parimatch ON pari (id_matchpari)');
        $this->addSql('ALTER TABLE participants_evenement MODIFY id_evenement INT NOT NULL');
        $this->addSql('ALTER TABLE participants_evenement DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE participants_evenement CHANGE id_evenement id_evenement INT NOT NULL');
        $this->addSql('ALTER TABLE participants_tournoi MODIFY id_tournoi INT NOT NULL');
        $this->addSql('ALTER TABLE participants_tournoi DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE participants_tournoi CHANGE id_tournoi id_tournoi INT NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE date_ajout date_ajout DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse CHANGE date_pub date_pub DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE sponsor CHANGE num_contact num_contact INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tournoi ADD pos1 VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ADD pos2 VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, ADD pos3 VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, DROP date_tournoi, CHANGE nom_tournoi nom-tournoi VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, CHANGE heure nb_participants INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD image VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, DROP prenom, CHANGE date_de_naissance date_de_naissance DATE DEFAULT NULL');
    }
}
