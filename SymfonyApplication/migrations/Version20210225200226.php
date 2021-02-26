<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210225200226 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D446490EB');
        $this->addSql('DROP INDEX UNIQ_6EEAA67D446490EB ON commande');
        $this->addSql('ALTER TABLE commande DROP produit_service_id');
        $this->addSql('ALTER TABLE panier ADD commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF282EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_24CC0DF282EA2E54 ON panier (commande_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande ADD produit_service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D446490EB FOREIGN KEY (produit_service_id) REFERENCES panier (produit_service_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6EEAA67D446490EB ON commande (produit_service_id)');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF282EA2E54');
        $this->addSql('DROP INDEX IDX_24CC0DF282EA2E54 ON panier');
        $this->addSql('ALTER TABLE panier DROP commande_id');
    }
}
