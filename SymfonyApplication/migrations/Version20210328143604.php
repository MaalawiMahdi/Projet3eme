<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328143604 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_produit_service ADD board_id INT NOT NULL');
        $this->addSql('ALTER TABLE categorie_produit_service ADD CONSTRAINT FK_FAFD6705E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('CREATE INDEX IDX_FAFD6705E7EC5785 ON categorie_produit_service (board_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_produit_service DROP FOREIGN KEY FK_FAFD6705E7EC5785');
        $this->addSql('DROP INDEX IDX_FAFD6705E7EC5785 ON categorie_produit_service');
        $this->addSql('ALTER TABLE categorie_produit_service DROP board_id');
    }
}
