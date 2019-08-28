<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190828094403 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, race_user_id INT NOT NULL, race_car_id INT NOT NULL, race_circuit_id INT NOT NULL, race_date DATETIME NOT NULL, INDEX IDX_DA6FBBAFB8DE06E5 (race_user_id), INDEX IDX_DA6FBBAFA990E84C (race_car_id), INDEX IDX_DA6FBBAFACFE6851 (race_circuit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAFB8DE06E5 FOREIGN KEY (race_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAFA990E84C FOREIGN KEY (race_car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAFACFE6851 FOREIGN KEY (race_circuit_id) REFERENCES circuit (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE race');
    }
}
