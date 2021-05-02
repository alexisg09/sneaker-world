<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210502154255 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment_sneaker (id INT AUTO_INCREMENT NOT NULL, id_sneaker_id INT NOT NULL, id_user_id INT NOT NULL, commentaire VARCHAR(255) NOT NULL, INDEX IDX_B12ADA9A11C21613 (id_sneaker_id), INDEX IDX_B12ADA9A79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE like_sneaker (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_sneaker_id INT NOT NULL, publish_date DATE NOT NULL, INDEX IDX_11D4F2A979F37AE5 (id_user_id), INDEX IDX_11D4F2A911C21613 (id_sneaker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permission (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_permission (id INT AUTO_INCREMENT NOT NULL, id_permission_id INT NOT NULL, id_role_id INT NOT NULL, INDEX IDX_6F7DF88640F1DDAF (id_permission_id), UNIQUE INDEX UNIQ_6F7DF88689E8BDC (id_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_user (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_role_id INT NOT NULL, UNIQUE INDEX UNIQ_332CA4DD79F37AE5 (id_user_id), INDEX IDX_332CA4DD89E8BDC (id_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sneaker (id INT AUTO_INCREMENT NOT NULL, date_publish DATE DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, marque VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment_sneaker ADD CONSTRAINT FK_B12ADA9A11C21613 FOREIGN KEY (id_sneaker_id) REFERENCES sneaker (id)');
        $this->addSql('ALTER TABLE comment_sneaker ADD CONSTRAINT FK_B12ADA9A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE like_sneaker ADD CONSTRAINT FK_11D4F2A979F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE like_sneaker ADD CONSTRAINT FK_11D4F2A911C21613 FOREIGN KEY (id_sneaker_id) REFERENCES sneaker (id)');
        $this->addSql('ALTER TABLE role_permission ADD CONSTRAINT FK_6F7DF88640F1DDAF FOREIGN KEY (id_permission_id) REFERENCES permission (id)');
        $this->addSql('ALTER TABLE role_permission ADD CONSTRAINT FK_6F7DF88689E8BDC FOREIGN KEY (id_role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DD89E8BDC FOREIGN KEY (id_role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role_permission DROP FOREIGN KEY FK_6F7DF88640F1DDAF');
        $this->addSql('ALTER TABLE role_permission DROP FOREIGN KEY FK_6F7DF88689E8BDC');
        $this->addSql('ALTER TABLE role_user DROP FOREIGN KEY FK_332CA4DD89E8BDC');
        $this->addSql('ALTER TABLE comment_sneaker DROP FOREIGN KEY FK_B12ADA9A11C21613');
        $this->addSql('ALTER TABLE like_sneaker DROP FOREIGN KEY FK_11D4F2A911C21613');
        $this->addSql('ALTER TABLE comment_sneaker DROP FOREIGN KEY FK_B12ADA9A79F37AE5');
        $this->addSql('ALTER TABLE like_sneaker DROP FOREIGN KEY FK_11D4F2A979F37AE5');
        $this->addSql('ALTER TABLE role_user DROP FOREIGN KEY FK_332CA4DD79F37AE5');
        $this->addSql('DROP TABLE comment_sneaker');
        $this->addSql('DROP TABLE like_sneaker');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_permission');
        $this->addSql('DROP TABLE role_user');
        $this->addSql('DROP TABLE sneaker');
        $this->addSql('DROP TABLE user');
    }
}
