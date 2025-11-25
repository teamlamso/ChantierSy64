<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251125150428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ouvrier ADD specialite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ouvrier ADD CONSTRAINT FK_ED5E7D252195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('CREATE INDEX IDX_ED5E7D252195E0F0 ON ouvrier (specialite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ouvrier DROP FOREIGN KEY FK_ED5E7D252195E0F0');
        $this->addSql('DROP INDEX IDX_ED5E7D252195E0F0 ON ouvrier');
        $this->addSql('ALTER TABLE ouvrier DROP specialite_id');
    }
}
