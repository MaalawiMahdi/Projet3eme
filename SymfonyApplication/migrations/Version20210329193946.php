<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329193946 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande_produitservice (commande_id INT NOT NULL, produitservice_id INT NOT NULL, INDEX IDX_2AA7B9B182EA2E54 (commande_id), INDEX IDX_2AA7B9B124575617 (produitservice_id), PRIMARY KEY(commande_id, produitservice_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande_produitservice ADD CONSTRAINT FK_2AA7B9B182EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_produitservice ADD CONSTRAINT FK_2AA7B9B124575617 FOREIGN KEY (produitservice_id) REFERENCES produit_service (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commande_produitservice');
    }
}
