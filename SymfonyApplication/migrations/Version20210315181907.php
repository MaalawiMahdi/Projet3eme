<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315181907 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notesujet (id INT AUTO_INCREMENT NOT NULL, sujet_id INT DEFAULT NULL, user_id INT DEFAULT NULL, value INT DEFAULT NULL, INDEX IDX_D34C38DE7C4D497E (sujet_id), INDEX IDX_D34C38DEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notesujet ADD CONSTRAINT FK_D34C38DE7C4D497E FOREIGN KEY (sujet_id) REFERENCES sujet (id)');
        $this->addSql('ALTER TABLE notesujet ADD CONSTRAINT FK_D34C38DEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE notesujet');
    }
}
