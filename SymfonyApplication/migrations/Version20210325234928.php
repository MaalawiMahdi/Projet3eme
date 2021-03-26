<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325234928 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE board ADD societe_id INT NOT NULL');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_58562B47FCF77503 ON board (societe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B47FCF77503');
        $this->addSql('DROP INDEX UNIQ_58562B47FCF77503 ON board');
        $this->addSql('ALTER TABLE board DROP societe_id');
    }
}
