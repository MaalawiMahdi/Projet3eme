<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210225194934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
      //  $this->addSql('CREATE TABLE aide (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, titre VARCHAR(30) NOT NULL, description VARCHAR(250) NOT NULL, adresse VARCHAR(50) DEFAULT NULL, num_tell VARCHAR(20) DEFAULT NULL, lien_image VARCHAR(50) DEFAULT NULL, INDEX IDX_D99184A1BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE board (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, titre VARCHAR(20) NOT NULL, INDEX IDX_58562B47BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_aide (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(20) NOT NULL, lien_icon VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_board (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(20) NOT NULL, lien_icon VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_produit_service (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, produit_service_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_6EEAA67D446490EB (produit_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, sujet_id INT NOT NULL, com VARCHAR(250) NOT NULL, INDEX IDX_67F068BCA76ED395 (user_id), INDEX IDX_67F068BC7C4D497E (sujet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moderator (user_id INT NOT NULL, board_id INT NOT NULL, INDEX IDX_6A30B268A76ED395 (user_id), INDEX IDX_6A30B268E7EC5785 (board_id), PRIMARY KEY(user_id, board_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (produit_service_id INT NOT NULL, user_id INT NOT NULL, qt INT NOT NULL, INDEX IDX_24CC0DF2446490EB (produit_service_id), INDEX IDX_24CC0DF2A76ED395 (user_id), PRIMARY KEY(produit_service_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_service (id INT AUTO_INCREMENT NOT NULL, board_id INT NOT NULL, categorie_id INT NOT NULL, titre VARCHAR(20) NOT NULL, description VARCHAR(50) DEFAULT NULL, lien_image VARCHAR(50) DEFAULT NULL, type VARCHAR(20) NOT NULL, INDEX IDX_276611ABE7EC5785 (board_id), INDEX IDX_276611ABBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, useraccount_id INT NOT NULL, numregistre VARCHAR(50) NOT NULL, adresse VARCHAR(30) NOT NULL, type VARCHAR(20) NOT NULL, etat TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_19653DBDD6177343 (useraccount_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sujet (id INT AUTO_INCREMENT NOT NULL, board_id INT NOT NULL, titre VARCHAR(20) NOT NULL, description VARCHAR(500) DEFAULT NULL, lien_image VARCHAR(50) DEFAULT NULL, INDEX IDX_2E13599DE7EC5785 (board_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, password VARCHAR(20) NOT NULL, type VARCHAR(20) NOT NULL, mail VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aide ADD CONSTRAINT FK_D99184A1BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_aide (id)');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_board (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D446490EB FOREIGN KEY (produit_service_id) REFERENCES panier (produit_service_id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC7C4D497E FOREIGN KEY (sujet_id) REFERENCES sujet (id)');
        $this->addSql('ALTER TABLE moderator ADD CONSTRAINT FK_6A30B268A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE moderator ADD CONSTRAINT FK_6A30B268E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2446490EB FOREIGN KEY (produit_service_id) REFERENCES produit_service (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit_service ADD CONSTRAINT FK_276611ABE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE produit_service ADD CONSTRAINT FK_276611ABBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_produit_service (id)');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBDD6177343 FOREIGN KEY (useraccount_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sujet ADD CONSTRAINT FK_2E13599DE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE moderator DROP FOREIGN KEY FK_6A30B268E7EC5785');
        $this->addSql('ALTER TABLE produit_service DROP FOREIGN KEY FK_276611ABE7EC5785');
        $this->addSql('ALTER TABLE sujet DROP FOREIGN KEY FK_2E13599DE7EC5785');
        $this->addSql('ALTER TABLE aide DROP FOREIGN KEY FK_D99184A1BCF5E72D');
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B47BCF5E72D');
        $this->addSql('ALTER TABLE produit_service DROP FOREIGN KEY FK_276611ABBCF5E72D');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D446490EB');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2446490EB');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC7C4D497E');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE moderator DROP FOREIGN KEY FK_6A30B268A76ED395');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2A76ED395');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBDD6177343');
        $this->addSql('DROP TABLE aide');
        $this->addSql('DROP TABLE board');
        $this->addSql('DROP TABLE categorie_aide');
        $this->addSql('DROP TABLE categorie_board');
        $this->addSql('DROP TABLE categorie_produit_service');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE moderator');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE produit_service');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE sujet');
        $this->addSql('DROP TABLE user');
    }
}
