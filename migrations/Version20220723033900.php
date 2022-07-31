<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220723033900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_media_image (article_id INT NOT NULL, media_image_id INT NOT NULL, INDEX IDX_40A7AA897294869C (article_id), INDEX IDX_40A7AA8932C40BDF (media_image_id), PRIMARY KEY(article_id, media_image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_image (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, alt VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, slug VARCHAR(128) NOT NULL, is_published TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_DA24C0EE989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_media_image ADD CONSTRAINT FK_40A7AA897294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_media_image ADD CONSTRAINT FK_40A7AA8932C40BDF FOREIGN KEY (media_image_id) REFERENCES media_image (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_media_image DROP FOREIGN KEY FK_40A7AA8932C40BDF');
        $this->addSql('DROP TABLE article_media_image');
        $this->addSql('DROP TABLE media_image');
    }
}
