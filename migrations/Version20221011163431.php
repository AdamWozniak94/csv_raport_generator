<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221011163431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE data (id INT AUTO_INCREMENT NOT NULL, report_date DATE NOT NULL, order_id INT NOT NULL, order_number INT NOT NULL, order_date DATE NOT NULL, upgrade_from_order INT DEFAULT NULL, upgrade_to_order INT DEFAULT NULL, offer_id INT NOT NULL, offer_upgrade_from INT DEFAULT NULL, offer_upgrade_from_from INT DEFAULT NULL, first_name VARCHAR(63) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, offer_type VARCHAR(255) NOT NULL, sort_code INT NOT NULL, offer_name VARCHAR(255) NOT NULL, period VARCHAR(255) NOT NULL, subscription_activation_date DATE DEFAULT NULL, subscription_start_date DATE NOT NULL, planned_subscription_end_date DATE DEFAULT NULL, subscription_end_date DATE DEFAULT NULL, subscription_termination_date DATE DEFAULT NULL, order_status VARCHAR(255) NOT NULL, offer_price DOUBLE PRECISION NOT NULL, employer DOUBLE PRECISION NOT NULL, deduct_pension DOUBLE PRECISION NOT NULL, deduct_other DOUBLE PRECISION NOT NULL, deduct_other2 DOUBLE PRECISION NOT NULL, zfss DOUBLE PRECISION NOT NULL, personal DOUBLE PRECISION NOT NULL, special_employer DOUBLE PRECISION NOT NULL, special_motivizer DOUBLE PRECISION NOT NULL, payu DOUBLE PRECISION NOT NULL, subscription_points INT NOT NULL, deduct_b2_b DOUBLE PRECISION NOT NULL, supplier VARCHAR(255) NOT NULL, company_name VARCHAR(255) NOT NULL, income_branch VARCHAR(255) DEFAULT NULL, upgrade_same_offer TINYINT(1) NOT NULL, after_upgrade_same_offer TINYINT(1) NOT NULL, upgrade_same_configurable TINYINT(1) NOT NULL, after_upgrade_same_configurable TINYINT(1) NOT NULL, upgrade_different_offers TINYINT(1) NOT NULL, after_upgrade_different_offers TINYINT(1) NOT NULL, accessions_started_this_month TINYINT(1) NOT NULL, accessions_available_this_month TINYINT(1) NOT NULL, accessions_starting_next_month TINYINT(1) NOT NULL, accessions_available_next_month TINYINT(1) NOT NULL, ended_in_previous_month TINYINT(1) NOT NULL, ended_at_end_of_this_month TINYINT(1) NOT NULL, userdata_employee_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE data');
    }
}
