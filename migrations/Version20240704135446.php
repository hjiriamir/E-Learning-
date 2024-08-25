<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704135446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contributor (id INT AUTO_INCREMENT NOT NULL, cin INT DEFAULT NULL, id_user INT NOT NULL, description VARCHAR(255) DEFAULT NULL, cv VARCHAR(255) DEFAULT NULL, Video_descriptif VARCHAR(255) DEFAULT NULL, domaine VARCHAR(255) DEFAULT NULL, is_verified TINYINT(1) DEFAULT NULL, date_verification DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', verifier_par VARCHAR(255) DEFAULT NULL, appartien_a_ecole INT DEFAULT NULL, describtion_teaching_experience VARCHAR(255) DEFAULT NULL, head_line VARCHAR(255) DEFAULT NULL, motivate_students_to_read VARCHAR(255) DEFAULT NULL, video_thumbnail VARCHAR(255) DEFAULT NULL, years_of_experience INT DEFAULT NULL, matiere_enseignee VARCHAR(255) DEFAULT NULL, enseignement_experience VARCHAR(255) DEFAULT NULL, id_current_situation VARCHAR(255) DEFAULT NULL, receive_notifications TINYINT(1) DEFAULT NULL, preferred_age_group VARCHAR(255) DEFAULT NULL, Student_proficiency_level VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contributor_certification (id_certif INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, titre VARCHAR(255) NOT NULL, domaine VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, issued_by VARCHAR(255) NOT NULL, date_deb VARCHAR(7) NOT NULL, date_fin VARCHAR(7) NOT NULL, date_operation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id_certif)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contributor_current_situation (id_current_situation INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id_current_situation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contributor_education (id_education INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, universite VARCHAR(255) NOT NULL, diplome VARCHAR(255) NOT NULL, type_diplome VARCHAR(255) NOT NULL, domaine VARCHAR(255) NOT NULL, date_deb VARCHAR(7) NOT NULL, date_fin VARCHAR(7) NOT NULL, diplome_path VARCHAR(255) NOT NULL, date_operation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id_education)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contributor_preferred_age_group (id_preferred_age_group INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id_preferred_age_group)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_Quiz_question_option (id_option INT AUTO_INCREMENT NOT NULL, id_question INT NOT NULL, reponse_option VARCHAR(200) NOT NULL, reponse_true_or_false INT NOT NULL, ordre INT NOT NULL, date_operation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id_option)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_Quiz_question_reponse (id_reponse INT AUTO_INCREMENT NOT NULL, id_question INT NOT NULL, id_user INT NOT NULL, tentative INT NOT NULL, reponse VARCHAR(100) DEFAULT NULL, reponse_text_redaction VARCHAR(100) DEFAULT NULL, date_operation DATETIME DEFAULT NULL, PRIMARY KEY(id_reponse)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_categorie (id_categorie INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id_categorie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_categorie_2 (id_categ2 INT AUTO_INCREMENT NOT NULL, id_categ INT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id_categ2)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_categorie_3 (id_categ3 INT AUTO_INCREMENT NOT NULL, id_categ2 INT DEFAULT NULL, label VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id_categ3)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_categorie_4 (id_categ4 INT AUTO_INCREMENT NOT NULL, id_categ3 INT DEFAULT NULL, label VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id_categ4)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_final (id INT AUTO_INCREMENT NOT NULL, code_cours BIGINT DEFAULT NULL, titre VARCHAR(200) DEFAULT NULL, sous_titre VARCHAR(200) DEFAULT NULL, description LONGTEXT DEFAULT NULL, what_to_learn TEXT DEFAULT NULL, requirement_prerequis TEXT DEFAULT NULL, for_who_is_this_cours TEXT DEFAULT NULL, certification INT DEFAULT NULL, image_cours VARCHAR(200) DEFAULT NULL, video_descriptive VARCHAR(200) DEFAULT NULL, id_contributor INT DEFAULT NULL, langue INT DEFAULT NULL, level INT DEFAULT NULL, categorie INT DEFAULT NULL, sous_categorie INT DEFAULT NULL, sous_categorie3 VARCHAR(255) DEFAULT NULL, sous_categorie4 VARCHAR(255) DEFAULT NULL, skills VARCHAR(50) DEFAULT NULL, highlights VARCHAR(50) DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, prix_unite VARCHAR(50) DEFAULT NULL, pricing VARCHAR(50) DEFAULT NULL, discount DOUBLE PRECISION DEFAULT NULL, date_debut_discount DATETIME DEFAULT NULL, date_fin_discount DATETIME DEFAULT NULL, id_niveau INT DEFAULT NULL, type_cours INT DEFAULT NULL, full_time_acce INT DEFAULT NULL, published INT DEFAULT NULL, published_date_debut DATETIME DEFAULT NULL, published_date_fin DATETIME DEFAULT NULL, promotion_link VARCHAR(200) DEFAULT NULL, coupon INT DEFAULT NULL, Enrollment VARCHAR(100) DEFAULT NULL, Enrollment_password VARCHAR(100) DEFAULT NULL, message_felicitation VARCHAR(200) DEFAULT NULL, message_welcom VARCHAR(200) DEFAULT NULL, date_insertion DATETIME DEFAULT NULL, date_last_update DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, date_operation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_langues (id_Langue INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id_Langue)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_lecture (id_lecture INT AUTO_INCREMENT NOT NULL, id_section INT NOT NULL, titre VARCHAR(200) NOT NULL, description LONGTEXT NOT NULL, ordre INT NOT NULL, etape_obligatoir INT DEFAULT NULL, date_operation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id_lecture)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_niveau (id_niveau INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id_niveau)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_section (id_section INT AUTO_INCREMENT NOT NULL, id_cours INT NOT NULL, titre_section VARCHAR(200) NOT NULL, description LONGTEXT NOT NULL, What_will_students_be_able_to VARCHAR(200) DEFAULT NULL, ordre INT NOT NULL, random INT DEFAULT NULL, etape_obligatoir INT DEFAULT NULL, date_operation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id_section)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_test_question (id_question INT AUTO_INCREMENT NOT NULL, id_content INT NOT NULL, bareme VARCHAR(200) DEFAULT NULL, question VARCHAR(200) NOT NULL, QA_Reponse_text LONGTEXT DEFAULT NULL, explanation VARCHAR(200) NOT NULL, skils VARCHAR(200) NOT NULL, ordre INT NOT NULL, true_false INT NOT NULL, random_option INT NOT NULL, reponse_ture VARCHAR(100) NOT NULL, type_test INT DEFAULT NULL, date_operation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id_question)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_test_resultat (id_res INT AUTO_INCREMENT NOT NULL, id_content INT NOT NULL, id_user INT NOT NULL, score VARCHAR(200) NOT NULL, note VARCHAR(100) NOT NULL, id_tentative INT NOT NULL, date_operation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id_res)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_test_start (id_start INT AUTO_INCREMENT NOT NULL, id_tentative INT NOT NULL, id_content INT NOT NULL, id_user INT NOT NULL, date_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, date_operation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id_start)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_type (id_type INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id_type)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langages (id_langage INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id_langage)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langages_niveau (id_niveau INT AUTO_INCREMENT NOT NULL, id_langage INT NOT NULL, label VARCHAR(4) NOT NULL, PRIMARY KEY(id_niveau)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lecture_content (id_content INT AUTO_INCREMENT NOT NULL, id_lecture INT NOT NULL, titre VARCHAR(200) NOT NULL, description LONGTEXT NOT NULL, dure INT NOT NULL, min_score DOUBLE PRECISION NOT NULL, ordre INT NOT NULL, random INT NOT NULL, show_correction INT NOT NULL, preview_document INT NOT NULL, id_type INT NOT NULL, date_operation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id_content)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lecture_content_type (id_type INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(id_type)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_country (contributor_id_country INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(contributor_id_country)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_langages (id INT AUTO_INCREMENT NOT NULL, id_langage INT NOT NULL, id_user INT NOT NULL, id_niveau INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_time_zone (id_timezone INT AUTO_INCREMENT NOT NULL, label VARCHAR(200) NOT NULL, PRIMARY KEY(id_timezone)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(100) NOT NULL, firstname VARCHAR(100) NOT NULL, address VARCHAR(255) NOT NULL, zipcode VARCHAR(5) NOT NULL, city VARCHAR(150) NOT NULL, is_verified TINYINT(1) NOT NULL, reset_token VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, contributeur INT DEFAULT NULL, code_user VARCHAR(255) DEFAULT NULL, linkedin VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, siteweb VARCHAR(255) DEFAULT NULL, langue VARCHAR(255) DEFAULT NULL, langue_niveau VARCHAR(255) DEFAULT NULL, gmail_compte VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, cv VARCHAR(255) DEFAULT NULL, video_descriptive VARCHAR(255) DEFAULT NULL, imageVideo VARCHAR(255) DEFAULT NULL, psoeudo VARCHAR(255) DEFAULT NULL, id_country INT DEFAULT NULL, id_time_zone INT DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contributor');
        $this->addSql('DROP TABLE contributor_certification');
        $this->addSql('DROP TABLE contributor_current_situation');
        $this->addSql('DROP TABLE contributor_education');
        $this->addSql('DROP TABLE contributor_preferred_age_group');
        $this->addSql('DROP TABLE cours_Quiz_question_option');
        $this->addSql('DROP TABLE cours_Quiz_question_reponse');
        $this->addSql('DROP TABLE cours_categorie');
        $this->addSql('DROP TABLE cours_categorie_2');
        $this->addSql('DROP TABLE cours_categorie_3');
        $this->addSql('DROP TABLE cours_categorie_4');
        $this->addSql('DROP TABLE cours_final');
        $this->addSql('DROP TABLE cours_langues');
        $this->addSql('DROP TABLE cours_lecture');
        $this->addSql('DROP TABLE cours_niveau');
        $this->addSql('DROP TABLE cours_section');
        $this->addSql('DROP TABLE cours_test_question');
        $this->addSql('DROP TABLE cours_test_resultat');
        $this->addSql('DROP TABLE cours_test_start');
        $this->addSql('DROP TABLE cours_type');
        $this->addSql('DROP TABLE langages');
        $this->addSql('DROP TABLE langages_niveau');
        $this->addSql('DROP TABLE lecture_content');
        $this->addSql('DROP TABLE lecture_content_type');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP TABLE user_country');
        $this->addSql('DROP TABLE user_langages');
        $this->addSql('DROP TABLE user_time_zone');
        $this->addSql('DROP TABLE users');
    }
}
