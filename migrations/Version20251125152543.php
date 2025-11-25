<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251125152543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chantier (id INT AUTO_INCREMENT NOT NULL, localisation VARCHAR(45) NOT NULL, description VARCHAR(100) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE chantier_ouvrier (chantier_id INT NOT NULL, ouvrier_id INT NOT NULL, INDEX IDX_8D383695D0C0049D (chantier_id), INDEX IDX_8D3836954E853A9E (ouvrier_id), PRIMARY KEY (chantier_id, ouvrier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE chantier_ouvrier ADD CONSTRAINT FK_8D383695D0C0049D FOREIGN KEY (chantier_id) REFERENCES chantier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chantier_ouvrier ADD CONSTRAINT FK_8D3836954E853A9E FOREIGN KEY (ouvrier_id) REFERENCES ouvrier (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chantier_ouvrier DROP FOREIGN KEY FK_8D383695D0C0049D');
        $this->addSql('ALTER TABLE chantier_ouvrier DROP FOREIGN KEY FK_8D3836954E853A9E');
        $this->addSql('DROP TABLE chantier');
        $this->addSql('DROP TABLE chantier_ouvrier');
    }
}
