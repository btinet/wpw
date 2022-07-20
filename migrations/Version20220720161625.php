<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720161625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE portfolio (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, alt VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_A9ED1062989D9B62 (slug), INDEX IDX_A9ED1062727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE portfolio_tag (portfolio_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_8731A46CB96B5643 (portfolio_id), INDEX IDX_8731A46CBAD26311 (tag_id), PRIMARY KEY(portfolio_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_389B783989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE portfolio ADD CONSTRAINT FK_A9ED1062727ACA70 FOREIGN KEY (parent_id) REFERENCES portfolio (id)');
        $this->addSql('ALTER TABLE portfolio_tag ADD CONSTRAINT FK_8731A46CB96B5643 FOREIGN KEY (portfolio_id) REFERENCES portfolio (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE portfolio_tag ADD CONSTRAINT FK_8731A46CBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE portfolio DROP FOREIGN KEY FK_A9ED1062727ACA70');
        $this->addSql('ALTER TABLE portfolio_tag DROP FOREIGN KEY FK_8731A46CB96B5643');
        $this->addSql('ALTER TABLE portfolio_tag DROP FOREIGN KEY FK_8731A46CBAD26311');
        $this->addSql('DROP TABLE portfolio');
        $this->addSql('DROP TABLE portfolio_tag');
        $this->addSql('DROP TABLE tag');
    }
}
