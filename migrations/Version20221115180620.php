<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221115180620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, loan_id INT DEFAULT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL, summary VARCHAR(255) DEFAULT NULL, publication_date DATE NOT NULL, INDEX IDX_CBE5A331CE73868F (loan_id), INDEX IDX_CBE5A331F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(15) DEFAULT NULL, postal_code VARCHAR(10) NOT NULL, house_number VARCHAR(35) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loan (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, INDEX IDX_C5D30D039395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE loan ADD CONSTRAINT FK_C5D30D039395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331CE73868F');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331F675F31B');
        $this->addSql('ALTER TABLE loan DROP FOREIGN KEY FK_C5D30D039395C3F3');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE loan');
    }
}
