<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231230225535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, action VARCHAR(255) NOT NULL, text LONGTEXT DEFAULT NULL, images JSON DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE backlog (id INT AUTO_INCREMENT NOT NULL, user_id BIGINT NOT NULL, chat_id BIGINT NOT NULL, target VARCHAR(255) NOT NULL, property VARCHAR(255) NOT NULL, old_value LONGTEXT DEFAULT NULL, new_value LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, user_id BIGINT NOT NULL, chat_id BIGINT NOT NULL, timestamp DATETIME DEFAULT NULL, room LONGTEXT NOT NULL, fio LONGTEXT DEFAULT NULL, phone LONGTEXT DEFAULT NULL, email LONGTEXT DEFAULT NULL, date DATE DEFAULT NULL, time TIME DEFAULT NULL, status LONGTEXT DEFAULT NULL, reason LONGTEXT DEFAULT NULL, equipment LONGTEXT DEFAULT NULL, persons INT DEFAULT NULL, name LONGTEXT DEFAULT NULL, anounce LONGTEXT DEFAULT NULL, link LONGTEXT DEFAULT NULL, cancelled TINYINT(1) DEFAULT NULL, cancelled_reason LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chat (id INT AUTO_INCREMENT NOT NULL, user_id BIGINT NOT NULL, chat_id BIGINT NOT NULL, text LONGTEXT DEFAULT NULL, timestamp DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE finding (id INT AUTO_INCREMENT NOT NULL, user_id BIGINT NOT NULL, chat_id BIGINT NOT NULL, fio LONGTEXT DEFAULT NULL, email LONGTEXT DEFAULT NULL, category LONGTEXT DEFAULT NULL, place_of_study LONGTEXT DEFAULT NULL, subject LONGTEXT DEFAULT NULL, subject_eng LONGTEXT DEFAULT NULL, keywords LONGTEXT DEFAULT NULL, keywords_eng LONGTEXT DEFAULT NULL, source_types LONGTEXT DEFAULT NULL, source_years LONGTEXT DEFAULT NULL, reason LONGTEXT DEFAULT NULL, cancelled TINYINT(1) DEFAULT NULL, cancelled_reason LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_mapping (id INT AUTO_INCREMENT NOT NULL, user_id BIGINT NOT NULL, chat_id BIGINT NOT NULL, message_id BIGINT NOT NULL, target VARCHAR(255) NOT NULL, property VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE online_resource (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, images JSON DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE backlog');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE chat');
        $this->addSql('DROP TABLE finding');
        $this->addSql('DROP TABLE message_mapping');
        $this->addSql('DROP TABLE online_resource');
        $this->addSql('DROP TABLE room');
    }
}
