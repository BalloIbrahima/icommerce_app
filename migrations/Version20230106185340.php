<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230106185340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alerts (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, details LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', traited_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F77AC06BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arrivals (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', closed_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_closed TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arrivals_details (id INT AUTO_INCREMENT NOT NULL, arrivals_id INT DEFAULT NULL, products_id INT DEFAULT NULL, quantity INT DEFAULT NULL, INDEX IDX_6CBBD8BCE9C84D80 (arrivals_id), INDEX IDX_6CBBD8BC6C8A81A9 (products_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coupons (id INT AUTO_INCREMENT NOT NULL, coupons_types_id_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, discount INT DEFAULT NULL, max_usage INT DEFAULT NULL, validity DATETIME DEFAULT NULL, is_valid TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F5641118E10A5A33 (coupons_types_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coupons_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deliveries (id INT AUTO_INCREMENT NOT NULL, delivery_by_id INT DEFAULT NULL, orders_id INT DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, zipcode VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, price INT DEFAULT NULL, state VARCHAR(255) DEFAULT NULL, INDEX IDX_6F078568BAECC696 (delivery_by_id), INDEX IDX_6F078568CFFE9AD6 (orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faqs (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, question LONGTEXT DEFAULT NULL, answer LONGTEXT DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, products_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, file LONGBLOB DEFAULT NULL, INDEX IDX_E01FBE6A6C8A81A9 (products_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE likes (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, liked TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_49CA4E7D4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, coupons_id INT DEFAULT NULL, users_id INT DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E52FFDEE6D72B15C (coupons_id), INDEX IDX_E52FFDEE67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders_details (id INT AUTO_INCREMENT NOT NULL, orders_id INT DEFAULT NULL, product_id INT DEFAULT NULL, quantity INT DEFAULT NULL, price INT DEFAULT NULL, INDEX IDX_835379F1CFFE9AD6 (orders_id), INDEX IDX_835379F14584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payements (id INT AUTO_INCREMENT NOT NULL, oreders_id INT DEFAULT NULL, ref VARCHAR(255) DEFAULT NULL, payed_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', mode VARCHAR(255) NOT NULL, details LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_866EB2DCC16024E7 (oreders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews (id INT AUTO_INCREMENT NOT NULL, products_id INT DEFAULT NULL, rate DOUBLE PRECISION DEFAULT NULL, comment LONGTEXT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6970EB0F6C8A81A9 (products_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alerts ADD CONSTRAINT FK_F77AC06BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE arrivals_details ADD CONSTRAINT FK_6CBBD8BCE9C84D80 FOREIGN KEY (arrivals_id) REFERENCES arrivals (id)');
        $this->addSql('ALTER TABLE arrivals_details ADD CONSTRAINT FK_6CBBD8BC6C8A81A9 FOREIGN KEY (products_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE coupons ADD CONSTRAINT FK_F5641118E10A5A33 FOREIGN KEY (coupons_types_id_id) REFERENCES coupons_types (id)');
        $this->addSql('ALTER TABLE deliveries ADD CONSTRAINT FK_6F078568BAECC696 FOREIGN KEY (delivery_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE deliveries ADD CONSTRAINT FK_6F078568CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A6C8A81A9 FOREIGN KEY (products_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7D4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE6D72B15C FOREIGN KEY (coupons_id) REFERENCES coupons (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F1CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F14584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE payements ADD CONSTRAINT FK_866EB2DCC16024E7 FOREIGN KEY (oreders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F6C8A81A9 FOREIGN KEY (products_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product ADD stock INT DEFAULT NULL, ADD active TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD lastname VARCHAR(255) DEFAULT NULL, ADD firstname VARCHAR(255) DEFAULT NULL, ADD avatar LONGBLOB DEFAULT NULL, ADD active TINYINT(1) DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD login_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerts DROP FOREIGN KEY FK_F77AC06BA76ED395');
        $this->addSql('ALTER TABLE arrivals_details DROP FOREIGN KEY FK_6CBBD8BCE9C84D80');
        $this->addSql('ALTER TABLE arrivals_details DROP FOREIGN KEY FK_6CBBD8BC6C8A81A9');
        $this->addSql('ALTER TABLE coupons DROP FOREIGN KEY FK_F5641118E10A5A33');
        $this->addSql('ALTER TABLE deliveries DROP FOREIGN KEY FK_6F078568BAECC696');
        $this->addSql('ALTER TABLE deliveries DROP FOREIGN KEY FK_6F078568CFFE9AD6');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A6C8A81A9');
        $this->addSql('ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7D4584665A');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE6D72B15C');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE67B3B43D');
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F1CFFE9AD6');
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F14584665A');
        $this->addSql('ALTER TABLE payements DROP FOREIGN KEY FK_866EB2DCC16024E7');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F6C8A81A9');
        $this->addSql('DROP TABLE alerts');
        $this->addSql('DROP TABLE arrivals');
        $this->addSql('DROP TABLE arrivals_details');
        $this->addSql('DROP TABLE coupons');
        $this->addSql('DROP TABLE coupons_types');
        $this->addSql('DROP TABLE deliveries');
        $this->addSql('DROP TABLE faqs');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE likes');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE orders_details');
        $this->addSql('DROP TABLE payements');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('ALTER TABLE product DROP stock, DROP active');
        $this->addSql('ALTER TABLE user DROP lastname, DROP firstname, DROP avatar, DROP active, DROP created_at, DROP login_at');
    }
}
