<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329210929 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ProdutiCommandeRepository (id INT AUTO_INCREMENT NOT NULL, commande_id INT DEFAULT NULL, produitservice_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_FE907B9E82EA2E54 (commande_id), INDEX IDX_FE907B9E24575617 (produitservice_id), UNIQUE INDEX Produit_commande (produitservice_id, commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ProdutiCommandeRepository ADD CONSTRAINT FK_FE907B9E82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ProdutiCommandeRepository ADD CONSTRAINT FK_FE907B9E24575617 FOREIGN KEY (produitservice_id) REFERENCES produit_service (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ProdutiCommandeRepository');
    }
}
