<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210426194021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create players table';
    }

    public function up(Schema $schema): void
    {
        $this->skipIf($schema->hasTable('players'), 'Table players already exists!');

        $this->addSql('CREATE TABLE players (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', username VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_264E43A6F85E0677 (username), UNIQUE INDEX UNIQ_264E43A6E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->skipIf(!$schema->hasTable('players'), 'Table players not exists!');

        $this->addSql('DROP TABLE players');
    }
}
