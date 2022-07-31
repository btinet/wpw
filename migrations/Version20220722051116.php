<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220722051116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_item ADD page_slug_id INT DEFAULT NULL, ADD has_page TINYINT(1) DEFAULT NULL, ADD has_article TINYINT(1) DEFAULT NULL, ADD has_link TINYINT(1) DEFAULT NULL, ADD link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE menu_item ADD CONSTRAINT FK_D754D550CB798D5B FOREIGN KEY (page_slug_id) REFERENCES page (id)');
        $this->addSql('CREATE INDEX IDX_D754D550CB798D5B ON menu_item (page_slug_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_item DROP FOREIGN KEY FK_D754D550CB798D5B');
        $this->addSql('DROP INDEX IDX_D754D550CB798D5B ON menu_item');
        $this->addSql('ALTER TABLE menu_item DROP page_slug_id, DROP has_page, DROP has_article, DROP has_link, DROP link');
    }
}
