<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307011800 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note ADD aide_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14661C0C23 FOREIGN KEY (aide_id) REFERENCES aide (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14661C0C23 ON note (aide_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14661C0C23');
        $this->addSql('DROP INDEX IDX_CFBDFA14661C0C23 ON note');
        $this->addSql('ALTER TABLE note DROP aide_id');
    }
}
