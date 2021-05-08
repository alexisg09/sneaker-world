<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210505141429 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE like_sneaker DROP FOREIGN KEY FK_11D4F2A911C21613');
        $this->addSql('DROP INDEX IDX_11D4F2A911C21613 ON like_sneaker');
        $this->addSql('ALTER TABLE like_sneaker CHANGE id_sneaker_id sneaker_id INT NOT NULL');
        $this->addSql('ALTER TABLE like_sneaker ADD CONSTRAINT FK_11D4F2A9B44896C4 FOREIGN KEY (sneaker_id) REFERENCES sneaker (id)');
        $this->addSql('CREATE INDEX IDX_11D4F2A9B44896C4 ON like_sneaker (sneaker_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE like_sneaker DROP FOREIGN KEY FK_11D4F2A9B44896C4');
        $this->addSql('DROP INDEX IDX_11D4F2A9B44896C4 ON like_sneaker');
        $this->addSql('ALTER TABLE like_sneaker CHANGE sneaker_id id_sneaker_id INT NOT NULL');
        $this->addSql('ALTER TABLE like_sneaker ADD CONSTRAINT FK_11D4F2A911C21613 FOREIGN KEY (id_sneaker_id) REFERENCES sneaker (id)');
        $this->addSql('CREATE INDEX IDX_11D4F2A911C21613 ON like_sneaker (id_sneaker_id)');
    }
}
