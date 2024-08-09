<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240809055258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habitat ADD CONSTRAINT FK_3B37B2E83DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_3B37B2E83DA5256D ON habitat (image_id)');
        $this->addSql('ALTER TABLE image CHANGE image_data image_data VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE habitat DROP FOREIGN KEY FK_3B37B2E83DA5256D');
        $this->addSql('DROP INDEX IDX_3B37B2E83DA5256D ON habitat');
        $this->addSql('ALTER TABLE image CHANGE image_data image_data LONGBLOB NOT NULL');
    }
}
