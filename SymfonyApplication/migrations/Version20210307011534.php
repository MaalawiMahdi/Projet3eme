<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307011534 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE note_aide');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE note_aide (note_id INT NOT NULL, aide_id INT NOT NULL, INDEX IDX_79EB95F926ED0855 (note_id), INDEX IDX_79EB95F9661C0C23 (aide_id), PRIMARY KEY(note_id, aide_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE note_aide ADD CONSTRAINT FK_79EB95F926ED0855 FOREIGN KEY (note_id) REFERENCES note (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note_aide ADD CONSTRAINT FK_79EB95F9661C0C23 FOREIGN KEY (aide_id) REFERENCES aide (id) ON DELETE CASCADE');
    }
}
