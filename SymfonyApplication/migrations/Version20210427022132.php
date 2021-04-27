<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427022132 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE unwantedwords');
        $this->addSql('ALTER TABLE produticommanderepository DROP FOREIGN KEY FK_FE907B9E24575617');
        $this->addSql('ALTER TABLE produticommanderepository DROP FOREIGN KEY FK_FE907B9E82EA2E54');
        $this->addSql('ALTER TABLE produticommanderepository ADD CONSTRAINT FK_FE907B9E24575617 FOREIGN KEY (produitservice_id) REFERENCES produit_service (id)');
        $this->addSql('ALTER TABLE produticommanderepository ADD CONSTRAINT FK_FE907B9E82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE aide DROP FOREIGN KEY FK_D99184A1BCF5E72D');
        $this->addSql('ALTER TABLE aide ADD CONSTRAINT FK_D99184A1BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_aide (id)');
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B47BCF5E72D');
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B47FCF77503');
        $this->addSql('ALTER TABLE board DROP nbr_vue');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_board (id)');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE categorie_produit_service DROP FOREIGN KEY FK_FAFD6705E7EC5785');
        $this->addSql('ALTER TABLE categorie_produit_service ADD CONSTRAINT FK_FAFD6705E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D8E54FB25');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('ALTER TABLE commande ADD adresse VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D8E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC7C4D497E');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC7C4D497E FOREIGN KEY (sujet_id) REFERENCES sujet (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432A76ED395');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432E7EC5785');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE informations_supplementaires DROP FOREIGN KEY FK_478DBED9A76ED395');
        $this->addSql('ALTER TABLE informations_supplementaires ADD CONSTRAINT FK_478DBED9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ld DROP FOREIGN KEY FK_C24E9315A76ED395');
        $this->addSql('ALTER TABLE ld DROP FOREIGN KEY FK_C24E9315BA9CD190');
        $this->addSql('ALTER TABLE ld ADD CONSTRAINT FK_C24E9315A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ld ADD CONSTRAINT FK_C24E9315BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE moderator DROP FOREIGN KEY FK_6A30B268A76ED395');
        $this->addSql('ALTER TABLE moderator DROP FOREIGN KEY FK_6A30B268E7EC5785');
        $this->addSql('ALTER TABLE moderator ADD CONSTRAINT FK_6A30B268A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE moderator ADD CONSTRAINT FK_6A30B268E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14661C0C23');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A76ED395');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14661C0C23 FOREIGN KEY (aide_id) REFERENCES aide (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notesujet DROP FOREIGN KEY FK_D34C38DE7C4D497E');
        $this->addSql('ALTER TABLE notesujet DROP FOREIGN KEY FK_D34C38DEA76ED395');
        $this->addSql('ALTER TABLE notesujet ADD CONSTRAINT FK_D34C38DE7C4D497E FOREIGN KEY (sujet_id) REFERENCES sujet (id)');
        $this->addSql('ALTER TABLE notesujet ADD CONSTRAINT FK_D34C38DEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit_service DROP FOREIGN KEY FK_276611ABBCF5E72D');
        $this->addSql('ALTER TABLE produit_service DROP FOREIGN KEY FK_276611ABE7EC5785');
        $this->addSql('ALTER TABLE produit_service ADD CONSTRAINT FK_276611ABBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_produit_service (id)');
        $this->addSql('ALTER TABLE produit_service ADD CONSTRAINT FK_276611ABE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBDD6177343');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBDD6177343 FOREIGN KEY (useraccount_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sujet DROP FOREIGN KEY FK_2E13599DE7EC5785');
        $this->addSql('ALTER TABLE sujet ADD CONSTRAINT FK_2E13599DE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE unwantedwords (idmot INT AUTO_INCREMENT NOT NULL, mot VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(idmot)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE aide DROP FOREIGN KEY FK_D99184A1BCF5E72D');
        $this->addSql('ALTER TABLE aide ADD CONSTRAINT FK_D99184A1BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_aide (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B47BCF5E72D');
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B47FCF77503');
        $this->addSql('ALTER TABLE board ADD nbr_vue INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_board (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_produit_service DROP FOREIGN KEY FK_FAFD6705E7EC5785');
        $this->addSql('ALTER TABLE categorie_produit_service ADD CONSTRAINT FK_FAFD6705E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D8E54FB25');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('ALTER TABLE commande DROP adresse');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D8E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC7C4D497E');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC7C4D497E FOREIGN KEY (sujet_id) REFERENCES sujet (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432E7EC5785');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432A76ED395');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE informations_supplementaires DROP FOREIGN KEY FK_478DBED9A76ED395');
        $this->addSql('ALTER TABLE informations_supplementaires ADD CONSTRAINT FK_478DBED9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ld DROP FOREIGN KEY FK_C24E9315BA9CD190');
        $this->addSql('ALTER TABLE ld DROP FOREIGN KEY FK_C24E9315A76ED395');
        $this->addSql('ALTER TABLE ld ADD CONSTRAINT FK_C24E9315BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ld ADD CONSTRAINT FK_C24E9315A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE moderator DROP FOREIGN KEY FK_6A30B268A76ED395');
        $this->addSql('ALTER TABLE moderator DROP FOREIGN KEY FK_6A30B268E7EC5785');
        $this->addSql('ALTER TABLE moderator ADD CONSTRAINT FK_6A30B268A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE moderator ADD CONSTRAINT FK_6A30B268E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A76ED395');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14661C0C23');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14661C0C23 FOREIGN KEY (aide_id) REFERENCES aide (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notesujet DROP FOREIGN KEY FK_D34C38DE7C4D497E');
        $this->addSql('ALTER TABLE notesujet DROP FOREIGN KEY FK_D34C38DEA76ED395');
        $this->addSql('ALTER TABLE notesujet ADD CONSTRAINT FK_D34C38DE7C4D497E FOREIGN KEY (sujet_id) REFERENCES sujet (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notesujet ADD CONSTRAINT FK_D34C38DEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_service DROP FOREIGN KEY FK_276611ABE7EC5785');
        $this->addSql('ALTER TABLE produit_service DROP FOREIGN KEY FK_276611ABBCF5E72D');
        $this->addSql('ALTER TABLE produit_service ADD CONSTRAINT FK_276611ABE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_service ADD CONSTRAINT FK_276611ABBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_produit_service (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ProdutiCommandeRepository DROP FOREIGN KEY FK_FE907B9E82EA2E54');
        $this->addSql('ALTER TABLE ProdutiCommandeRepository DROP FOREIGN KEY FK_FE907B9E24575617');
        $this->addSql('ALTER TABLE ProdutiCommandeRepository ADD CONSTRAINT FK_FE907B9E82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ProdutiCommandeRepository ADD CONSTRAINT FK_FE907B9E24575617 FOREIGN KEY (produitservice_id) REFERENCES produit_service (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBDD6177343');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBDD6177343 FOREIGN KEY (useraccount_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sujet DROP FOREIGN KEY FK_2E13599DE7EC5785');
        $this->addSql('ALTER TABLE sujet ADD CONSTRAINT FK_2E13599DE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
