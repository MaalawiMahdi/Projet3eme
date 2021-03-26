<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325231220 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE informations_supplementaires (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, nom VARCHAR(20) DEFAULT NULL, prenom VARCHAR(20) DEFAULT NULL, tell VARCHAR(20) DEFAULT NULL, image VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_478DBED9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maintenance (id INT AUTO_INCREMENT NOT NULL, etat TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE informations_supplementaires ADD CONSTRAINT FK_478DBED9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD active TINYINT(1) NOT NULL, ADD ban TINYINT(1) NOT NULL, CHANGE password password VARCHAR(72) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE informations_supplementaires');
        $this->addSql('DROP TABLE maintenance');
        $this->addSql('ALTER TABLE user DROP active, DROP ban, CHANGE password password VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
