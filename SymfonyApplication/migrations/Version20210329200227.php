<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329200227 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande_produitservice DROP FOREIGN KEY FK_2AA7B9B124575617');
        $this->addSql('ALTER TABLE commande_produitservice DROP FOREIGN KEY FK_2AA7B9B182EA2E54');
        $this->addSql('ALTER TABLE commande_produitservice ADD CONSTRAINT FK_2AA7B9B124575617 FOREIGN KEY (produitservice_id) REFERENCES produit_service (id)');
        $this->addSql('ALTER TABLE commande_produitservice ADD CONSTRAINT FK_2AA7B9B182EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande_produitservice DROP FOREIGN KEY FK_2AA7B9B182EA2E54');
        $this->addSql('ALTER TABLE commande_produitservice DROP FOREIGN KEY FK_2AA7B9B124575617');
        $this->addSql('ALTER TABLE commande_produitservice ADD CONSTRAINT FK_2AA7B9B182EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_produitservice ADD CONSTRAINT FK_2AA7B9B124575617 FOREIGN KEY (produitservice_id) REFERENCES produit_service (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
