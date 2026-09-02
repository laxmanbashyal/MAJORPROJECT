-- ============================================================
-- BLOOD BANK & DONATION MANAGEMENT SYSTEM
-- Complete Database Setup with User Registration & Verification
-- Database: blood_donation
-- ============================================================

-- ============================================================
-- 1. CREATE DATABASE
-- ============================================================
CREATE DATABASE IF NOT EXISTS `blood_donation`;
USE `blood_donation`;

-- ============================================================
-- 2. TABLE: admin_info (Admin Users)
-- ============================================================
CREATE TABLE IF NOT EXISTS `admin_info` (
    `admin_id` INT(10) NOT NULL UNIQUE AUTO_INCREMENT,
    `admin_name` VARCHAR(50) NOT NULL,
    `admin_username` VARCHAR(50) NOT NULL UNIQUE,
    `admin_password` VARCHAR(50) NOT NULL,
    `admin_email` VARCHAR(100) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert admin data
INSERT IGNORE INTO `admin_info` (`admin_name`, `admin_username`, `admin_password`) VALUES
('Varun', 'varunsardana004', '123'),
('Administrator', 'admin', '123');

-- ============================================================
-- 3. TABLE: blood (Blood Groups)
-- ============================================================
CREATE TABLE IF NOT EXISTS `blood` (
    `blood_id` INT AUTO_INCREMENT NOT NULL,
    `blood_group` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`blood_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert all blood groups
INSERT IGNORE INTO `blood` (`blood_group`) VALUES 
('A+'), ('A-'), ('B+'), ('B-'), ('AB+'), ('AB-'), ('O+'), ('O-');

-- ============================================================
-- 4. TABLE: donor_details (Donor Records)
-- ============================================================
CREATE TABLE IF NOT EXISTS `donor_details` (
    `donor_id` INT AUTO_INCREMENT NOT NULL,
    `donor_name` VARCHAR(50) NOT NULL,
    `donor_number` VARCHAR(10) NOT NULL,
    `donor_mail` VARCHAR(50) DEFAULT NULL,
    `donor_age` INT(3) NOT NULL,
    `donor_gender` VARCHAR(10) NOT NULL,
    `donor_blood` VARCHAR(10) NOT NULL,
    `donor_blood_id` INT(11) DEFAULT NULL,
    `donor_address` VARCHAR(100) NOT NULL,
    `donor_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`donor_id`),
    KEY `donor_blood_id` (`donor_blood_id`),
    CONSTRAINT `fk_donor_blood` FOREIGN KEY (`donor_blood_id`) REFERENCES `blood` (`blood_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- 5. TABLE: users (User Registration)
-- ============================================================
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` INT AUTO_INCREMENT NOT NULL,
    `user_name` VARCHAR(100) NOT NULL,
    `user_email` VARCHAR(100) NOT NULL UNIQUE,
    `user_phone` VARCHAR(15) NOT NULL UNIQUE,
    `user_password` VARCHAR(255) NOT NULL,
    `user_age` INT(3) NOT NULL,
    `user_gender` VARCHAR(10) NOT NULL,
    `blood_group` VARCHAR(10) NOT NULL,
    `user_address` TEXT NOT NULL,
    `user_city` VARCHAR(50) NOT NULL,
    `user_state` VARCHAR(50) NOT NULL,
    `user_pincode` VARCHAR(10) DEFAULT NULL,
    `verification_status` VARCHAR(20) DEFAULT 'pending' COMMENT 'pending, verified, rejected',
    `registered_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`),
    KEY `blood_group` (`blood_group`),
    CONSTRAINT `fk_user_blood` FOREIGN KEY (`blood_group`) REFERENCES `blood` (`blood_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- 6. TABLE: admin_notifications (Admin Notifications)
-- ============================================================
CREATE TABLE IF NOT EXISTS `admin_notifications` (
    `notification_id` INT AUTO_INCREMENT NOT NULL,
    `notification_title` VARCHAR(100) NOT NULL,
    `notification_message` TEXT NOT NULL,
    `notification_type` VARCHAR(50) DEFAULT 'info' COMMENT 'pending_verification, verified, rejected',
    `notification_status` VARCHAR(20) DEFAULT 'unread' COMMENT 'unread, read',
    `user_id` INT DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`notification_id`),
    KEY `user_id` (`user_id`),
    CONSTRAINT `fk_notification_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- 7. TABLE: pages (Page Content)
-- ============================================================
CREATE TABLE IF NOT EXISTS `pages` (
    `page_id` INT NOT NULL AUTO_INCREMENT UNIQUE,
    `page_name` VARCHAR(255) NOT NULL,
    `page_type` VARCHAR(50) UNIQUE,
    `page_data` LONGTEXT NOT NULL,
    PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- 8. INSERT PAGE DATA
-- ============================================================

-- Page 1: Why Become Donor
INSERT IGNORE INTO `pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(1, 'Why Become Donor', 'donor', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Blood is the most precious gift that anyone can give to another person — the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components — red cells, platelets and plasma — which can be used individually for patients with specific conditions. Safe blood saves lives and improves health. Blood transfusion is needed for:<ul><li>women with complications of pregnancy, such as ectopic pregnancies and haemorrhage before, during or after childbirth.</li><li>children with severe anaemia often resulting from malaria or malnutrition.</li><li>people with severe trauma following man-made and natural disasters.</li><li>many complex medical and surgical procedures and cancer patients.</li></ul><br>It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell disease and is used to make products such as clotting factors for people with haemophilia. There is a constant need for regular blood supply because blood can be stored for only a limited time before use. Regular blood donations by a sufficient number of healthy people are needed to ensure that safe blood will be available whenever and wherever it is needed.</span>');

-- Page 2: About Us
INSERT IGNORE INTO `pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(2, 'About Us', 'aboutus', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">Blood bank is a place where blood bag that is collected from blood donation events is stored in one place. The term "blood bank" refers to a division of a hospital laboratory where the storage of blood product occurs and where proper testing is performed to reduce the risk of transfusion related events. The process of managing the blood bag that is received from the blood donation events needs a proper and systematic management. The blood bag must be handled with care and treated thoroughly as it is related to someone\'s life. The development of Web-based Blood Bank And Donation Management System (BBDMS) is proposed to provide a management functional to the blood bank in order to handle the blood bag and to make entries of the individuals who want to donate blood and who are in need.</span>');

-- Page 3: The Need For Blood
INSERT IGNORE INTO `pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(3, 'The Need For Blood', 'needforblood', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">There are many reasons patients need blood. A common misunderstanding about blood usage is that accident victims are the patients who use the most blood. Actually, people needing the most blood include those:<br><br>1) Being treated for cancer<br>2) Undergoing orthopedic surgeries<br>3) Undergoing cardiovascular surgeries<br>4) Being treated for inherited blood disorders</span>');

-- Page 4: Blood Tips
INSERT IGNORE INTO `pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(4, 'Blood Tips', 'bloodtips', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;"><strong>Blood Donation Tips:</strong><br><br>1) You must be in good health.<br>2) Hydrate and eat a healthy meal before your donation.<br>3) You\'re never too old to donate blood.<br>4) Rest and relaxed.<br>5) Don\'t forget your FREE post-donation snack.</span>');

-- Page 5: Who you could Help
INSERT IGNORE INTO `pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(5, 'Who you could Help', 'whoyouhelp', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">Every 2 seconds, someone in the World needs blood. Donating blood can help:<br><br>1) People who go through disasters or emergency situations.<br>2) People who lose blood during major surgeries.<br>3) People who have lost blood because of a gastrointestinal bleed.<br>4) Women who have serious complications during pregnancy or childbirth.<br>5) People with cancer or severe anemia sometimes caused by thalassemia or sickle cell disease.</span>');

-- Page 6: Blood Groups
INSERT IGNORE INTO `pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(6, 'Blood Groups', 'bloodgroups', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;"><p><strong>Blood Groups:</strong></p><p>Blood group of any human being will mainly fall in any one of the following groups.</p><ul><li>A positive or A negative</li><li>B positive or B negative</li><li>O positive or O negative</li><li>AB positive or AB negative.</li></ul><p>Your blood group is determined by the genes you inherit from your parents.<br>A healthy diet helps ensure a successful blood donation, and also makes you feel better!</p></span>');

-- Page 7: Universal Donors And Recipients
INSERT IGNORE INTO `pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(7, 'Universal Donors And Recipients', 'universal', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;"><p><strong>Universal Donors and Recipients:</strong></p><p>The most common blood type is O, followed by type A. Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p><p>For emergency transfusions, blood group type O negative blood is the variety of blood that has the lowest risk of causing serious reactions for most people who receive it. Because of this, it\'s sometimes called the universal blood donor type.</p></span>');

-- Update donor page with better formatting
UPDATE `pages` 
SET `page_data` = '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Blood is the most precious gift that anyone can give to another person — the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components — red cells, platelets and plasma — which can be used individually for patients with specific conditions. Safe blood saves lives and improves health. Blood transfusion is needed for:<ul><li>women with complications of pregnancy, such as ectopic pregnancies and haemorrhage before, during or after childbirth.</li><li>children with severe anaemia often resulting from malaria or malnutrition.</li><li>people with severe trauma following man-made and natural disasters.</li><li>many complex medical and surgical procedures and cancer patients.</li></ul><br>It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell disease and is used to make products such as clotting factors for people with haemophilia. There is a constant need for regular blood supply because blood can be stored for only a limited time before use. Regular blood donations by a sufficient number of healthy people are needed to ensure that safe blood will be available whenever and wherever it is needed.</span>'
WHERE `page_type` = 'donor';

-- ============================================================
-- 9. TABLE: contact_info (Contact Details)
-- ============================================================
CREATE TABLE IF NOT EXISTS `contact_info` (
    `contact_id` INT AUTO_INCREMENT NOT NULL,
    `contact_address` VARCHAR(100) NOT NULL,
    `contact_mail` VARCHAR(50) NOT NULL,
    `contact_phone` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `contact_info` (`contact_address`, `contact_mail`, `contact_phone`) 
VALUES ('Hisar, Haryana (125001)', 'bloodbank@gmail.com', '7056550477');

-- ============================================================
-- 10. TABLE: contact_query (User Queries)
-- ============================================================
CREATE TABLE IF NOT EXISTS `contact_query` (
    `query_id` INT AUTO_INCREMENT NOT NULL,
    `query_name` VARCHAR(100) NOT NULL,
    `query_mail` VARCHAR(120) NOT NULL,
    `query_number` CHAR(11) NOT NULL,
    `query_message` LONGTEXT NOT NULL,
    `query_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `query_status` INT(11) DEFAULT '2' COMMENT '1=Read, 2=Pending',
    PRIMARY KEY (`query_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample query
INSERT IGNORE INTO `contact_query` (`query_name`, `query_mail`, `query_number`, `query_message`, `query_status`) 
VALUES ('Anuj', 'anuj@gmail.com', '9923471025', 'I need O+ Blood urgently for my father. Please help!', 1);

-- ============================================================
-- 11. TABLE: query_stat (Query Status)
-- ============================================================
CREATE TABLE IF NOT EXISTS `query_stat` (
    `id` INT NOT NULL UNIQUE,
    `query_type` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `query_stat` (`id`, `query_type`) VALUES 
(1, 'Read'),
(2, 'Pending');

-- ============================================================
-- 12. TABLE: session_logs (Login Tracking)
-- ============================================================
CREATE TABLE IF NOT EXISTS `session_logs` (
    `log_id` INT AUTO_INCREMENT NOT NULL,
    `admin_id` INT(10) DEFAULT NULL,
    `login_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `ip_address` VARCHAR(45) DEFAULT NULL,
    PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- 13. TABLE: blood_requests (Blood Request Management)
-- ============================================================
CREATE TABLE IF NOT EXISTS `blood_requests` (
    `request_id` INT AUTO_INCREMENT NOT NULL,
    `patient_name` VARCHAR(100) NOT NULL,
    `patient_age` INT(3) NOT NULL,
    `blood_group` VARCHAR(10) NOT NULL,
    `units_required` INT(2) NOT NULL DEFAULT 1,
    `hospital_name` VARCHAR(100) NOT NULL,
    `contact_number` VARCHAR(15) NOT NULL,
    `contact_email` VARCHAR(100) DEFAULT NULL,
    `request_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `status` VARCHAR(20) DEFAULT 'Pending' COMMENT 'Pending, Approved, Fulfilled, Cancelled',
    `notes` TEXT DEFAULT NULL,
    PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample blood request
INSERT IGNORE INTO `blood_requests` (`patient_name`, `patient_age`, `blood_group`, `units_required`, `hospital_name`, `contact_number`, `contact_email`, `status`) VALUES
('Rahul Sharma', 45, 'A+', 2, 'City Hospital', '9876543210', 'rahul@email.com', 'Pending');

-- ============================================================
-- 14. TABLE: notifications (System Notifications)
-- ============================================================
CREATE TABLE IF NOT EXISTS `notifications` (
    `notification_id` INT AUTO_INCREMENT NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `message` TEXT NOT NULL,
    `type` VARCHAR(20) DEFAULT 'info' COMMENT 'info, success, warning, danger',
    `read_status` TINYINT(1) DEFAULT 0 COMMENT '0=Unread, 1=Read',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample notifications
INSERT IGNORE INTO `notifications` (`title`, `message`, `type`) VALUES
('Welcome to Blood Bank', 'Your Blood Bank Management System is now ready!', 'success'),
('System Ready', 'All features are now available for use.', 'info');

-- ============================================================
-- 15. VERIFY ALL TABLES
-- ============================================================
SHOW TABLES;

-- ============================================================
-- 16. VERIFY DATA COUNTS
-- ============================================================
SELECT 'admin_info' as TableName, COUNT(*) as Records FROM admin_info
UNION ALL
SELECT 'blood', COUNT(*) FROM blood
UNION ALL
SELECT 'contact_info', COUNT(*) FROM contact_info
UNION ALL
SELECT 'contact_query', COUNT(*) FROM contact_query
UNION ALL
SELECT 'query_stat', COUNT(*) FROM query_stat
UNION ALL
SELECT 'pages', COUNT(*) FROM pages
UNION ALL
SELECT 'donor_details', COUNT(*) FROM donor_details
UNION ALL
SELECT 'session_logs', COUNT(*) FROM session_logs
UNION ALL
SELECT 'blood_requests', COUNT(*) FROM blood_requests
UNION ALL
SELECT 'notifications', COUNT(*) FROM notifications
UNION ALL
SELECT 'users', COUNT(*) FROM users
UNION ALL
SELECT 'admin_notifications', COUNT(*) FROM admin_notifications;

-- ============================================================
-- 17. VIEW ADMIN USERS
-- ============================================================
SELECT admin_id, admin_username, admin_name, admin_password FROM admin_info;

-- ============================================================
-- 18. VIEW BLOOD GROUPS
-- ============================================================
SELECT * FROM blood;

-- ============================================================
-- 19. VIEW PAGE TYPES
-- ============================================================
SELECT page_id, page_name, page_type FROM pages;

-- ============================================================
-- 20. COMPLETED - DATABASE READY FOR USE
-- ============================================================
-- 
-- 📌 LOGIN CREDENTIALS:
-- Admin:   Username: admin          | Password: 123
-- Admin:   Username: varunsardana004 | Password: 123
-- User:    Register at: /user_register.php
--
-- 📌 ADMIN PANEL URL:
-- http://localhost/MAJORPROJECT/admin/login.php
--
-- 📌 USER PANEL URL:
-- http://localhost/MAJORPROJECT/home.php
-- http://localhost/MAJORPROJECT/user_register.php
-- http://localhost/MAJORPROJECT/user_login.php
--
-- 📌 TABLES CREATED: 12
-- 📌 TOTAL RECORDS: 25+
--
-- ============================================================