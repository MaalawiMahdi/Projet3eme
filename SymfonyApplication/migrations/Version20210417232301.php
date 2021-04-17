<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210417232301 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ProdutiCommandeRepository (id INT AUTO_INCREMENT NOT NULL, commande_id INT DEFAULT NULL, produitservice_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_FE907B9E82EA2E54 (commande_id), INDEX IDX_FE907B9E24575617 (produitservice_id), UNIQUE INDEX Produit_commande (produitservice_id, commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aide (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, titre VARCHAR(50) NOT NULL, description VARCHAR(500) NOT NULL, adresse VARCHAR(100) DEFAULT NULL, num_tell VARCHAR(20) DEFAULT NULL, lien_image VARCHAR(50) DEFAULT NULL, INDEX IDX_D99184A1BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE board (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, societe_id INT DEFAULT NULL, titre VARCHAR(20) NOT NULL, pic VARCHAR(100) DEFAULT NULL, INDEX IDX_58562B47BCF5E72D (categorie_id), UNIQUE INDEX UNIQ_58562B47FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE captcha (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) NOT NULL, lien_image_captcha VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_aide (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, lien_icon VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_board (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(20) NOT NULL, lien_icon VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_produit_service (id INT AUTO_INCREMENT NOT NULL, board_id INT NOT NULL, nom VARCHAR(20) NOT NULL, INDEX IDX_FAFD6705E7EC5785 (board_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, livraison_id INT DEFAULT NULL, user_id INT NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_6EEAA67D8E54FB25 (livraison_id), INDEX IDX_6EEAA67DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, sujet_id INT NOT NULL, com VARCHAR(250) NOT NULL, INDEX IDX_67F068BCA76ED395 (user_id), INDEX IDX_67F068BC7C4D497E (sujet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, board_id INT NOT NULL, user_id INT DEFAULT NULL, INDEX IDX_8933C432E7EC5785 (board_id), INDEX IDX_8933C432A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE informations_supplementaires (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, nom VARCHAR(20) DEFAULT NULL, prenom VARCHAR(20) DEFAULT NULL, tell VARCHAR(20) DEFAULT NULL, image VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_478DBED9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ld (id INT AUTO_INCREMENT NOT NULL, commentaire_id INT DEFAULT NULL, user_id INT DEFAULT NULL, value VARCHAR(255) DEFAULT NULL, INDEX IDX_C24E9315BA9CD190 (commentaire_id), INDEX IDX_C24E9315A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(20) NOT NULL, prix DOUBLE PRECISION DEFAULT NULL, etat TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maintenance (id INT AUTO_INCREMENT NOT NULL, etat TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moderator (user_id INT NOT NULL, board_id INT NOT NULL, INDEX IDX_6A30B268A76ED395 (user_id), INDEX IDX_6A30B268E7EC5785 (board_id), PRIMARY KEY(user_id, board_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, aide_id INT DEFAULT NULL, valeur INT NOT NULL, avis VARCHAR(255) DEFAULT NULL, INDEX IDX_CFBDFA14A76ED395 (user_id), INDEX IDX_CFBDFA14661C0C23 (aide_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notesujet (id INT AUTO_INCREMENT NOT NULL, sujet_id INT DEFAULT NULL, user_id INT DEFAULT NULL, value INT DEFAULT NULL, INDEX IDX_D34C38DE7C4D497E (sujet_id), INDEX IDX_D34C38DEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_service (id INT AUTO_INCREMENT NOT NULL, board_id INT NOT NULL, categorie_id INT NOT NULL, titre VARCHAR(20) NOT NULL, description VARCHAR(50) DEFAULT NULL, lien_image VARCHAR(50) DEFAULT NULL, type VARCHAR(20) NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, INDEX IDX_276611ABE7EC5785 (board_id), INDEX IDX_276611ABBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, useraccount_id INT NOT NULL, numregistre VARCHAR(50) NOT NULL, adresse VARCHAR(30) NOT NULL, type VARCHAR(20) NOT NULL, etat TINYINT(1) NOT NULL, nom VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_19653DBDD6177343 (useraccount_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sujet (id INT AUTO_INCREMENT NOT NULL, board_id INT NOT NULL, titre VARCHAR(20) NOT NULL, description VARCHAR(255) DEFAULT NULL, lien_image VARCHAR(50) DEFAULT NULL, INDEX IDX_2E13599DE7EC5785 (board_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, password VARCHAR(72) NOT NULL, type VARCHAR(20) NOT NULL, mail VARCHAR(50) NOT NULL, active TINYINT(1) NOT NULL, ban TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ProdutiCommandeRepository ADD CONSTRAINT FK_FE907B9E82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ProdutiCommandeRepository ADD CONSTRAINT FK_FE907B9E24575617 FOREIGN KEY (produitservice_id) REFERENCES produit_service (id)');
        $this->addSql('ALTER TABLE aide ADD CONSTRAINT FK_D99184A1BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_aide (id)');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_board (id)');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE categorie_produit_service ADD CONSTRAINT FK_FAFD6705E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D8E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC7C4D497E FOREIGN KEY (sujet_id) REFERENCES sujet (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE informations_supplementaires ADD CONSTRAINT FK_478DBED9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ld ADD CONSTRAINT FK_C24E9315BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE ld ADD CONSTRAINT FK_C24E9315A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE moderator ADD CONSTRAINT FK_6A30B268A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE moderator ADD CONSTRAINT FK_6A30B268E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14661C0C23 FOREIGN KEY (aide_id) REFERENCES aide (id)');
        $this->addSql('ALTER TABLE notesujet ADD CONSTRAINT FK_D34C38DE7C4D497E FOREIGN KEY (sujet_id) REFERENCES sujet (id)');
        $this->addSql('ALTER TABLE notesujet ADD CONSTRAINT FK_D34C38DEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit_service ADD CONSTRAINT FK_276611ABE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE produit_service ADD CONSTRAINT FK_276611ABBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_produit_service (id)');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBDD6177343 FOREIGN KEY (useraccount_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sujet ADD CONSTRAINT FK_2E13599DE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14661C0C23');
        $this->addSql('ALTER TABLE categorie_produit_service DROP FOREIGN KEY FK_FAFD6705E7EC5785');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432E7EC5785');
        $this->addSql('ALTER TABLE moderator DROP FOREIGN KEY FK_6A30B268E7EC5785');
        $this->addSql('ALTER TABLE produit_service DROP FOREIGN KEY FK_276611ABE7EC5785');
        $this->addSql('ALTER TABLE sujet DROP FOREIGN KEY FK_2E13599DE7EC5785');
        $this->addSql('ALTER TABLE aide DROP FOREIGN KEY FK_D99184A1BCF5E72D');
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B47BCF5E72D');
        $this->addSql('ALTER TABLE produit_service DROP FOREIGN KEY FK_276611ABBCF5E72D');
        $this->addSql('ALTER TABLE ProdutiCommandeRepository DROP FOREIGN KEY FK_FE907B9E82EA2E54');
        $this->addSql('ALTER TABLE ld DROP FOREIGN KEY FK_C24E9315BA9CD190');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D8E54FB25');
        $this->addSql('ALTER TABLE ProdutiCommandeRepository DROP FOREIGN KEY FK_FE907B9E24575617');
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B47FCF77503');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC7C4D497E');
        $this->addSql('ALTER TABLE notesujet DROP FOREIGN KEY FK_D34C38DE7C4D497E');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432A76ED395');
        $this->addSql('ALTER TABLE informations_supplementaires DROP FOREIGN KEY FK_478DBED9A76ED395');
        $this->addSql('ALTER TABLE ld DROP FOREIGN KEY FK_C24E9315A76ED395');
        $this->addSql('ALTER TABLE moderator DROP FOREIGN KEY FK_6A30B268A76ED395');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A76ED395');
        $this->addSql('ALTER TABLE notesujet DROP FOREIGN KEY FK_D34C38DEA76ED395');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBDD6177343');
        $this->addSql('DROP TABLE ProdutiCommandeRepository');
        $this->addSql('DROP TABLE aide');
        $this->addSql('DROP TABLE board');
        $this->addSql('DROP TABLE captcha');
        $this->addSql('DROP TABLE categorie_aide');
        $this->addSql('DROP TABLE categorie_board');
        $this->addSql('DROP TABLE categorie_produit_service');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE favoris');
        $this->addSql('DROP TABLE informations_supplementaires');
        $this->addSql('DROP TABLE ld');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE maintenance');
        $this->addSql('DROP TABLE moderator');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE notesujet');
        $this->addSql('DROP TABLE produit_service');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE sujet');
        $this->addSql('DROP TABLE user');
    }
}
