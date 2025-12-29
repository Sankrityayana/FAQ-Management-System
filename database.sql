-- FAQ Management System Database
-- Create Database
CREATE DATABASE IF NOT EXISTS faq_management_system;
USE faq_management_system;

-- Create FAQ Table
CREATE TABLE IF NOT EXISTS faqs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    category VARCHAR(100) DEFAULT 'General',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Sample Data
INSERT INTO faqs (question, answer, category) VALUES
('What is FAQ Management System?', 'FAQ Management System is a web application built with PHP and MySQL that allows you to create, read, update, and delete frequently asked questions.', 'General'),
('How to install XAMPP?', 'Download XAMPP from apachefriends.org, run the installer, and follow the installation wizard. Start Apache and MySQL from the XAMPP Control Panel.', 'Technical'),
('What technologies are used?', 'This system uses PHP for backend logic, MySQL for database management, HTML/CSS for frontend, and JavaScript for interactive features.', 'Technical'),
('Is this system free to use?', 'Yes, this FAQ Management System is free and open-source. You can modify and use it according to your needs.', 'General'),
('How to add a new FAQ?', 'Click on the "Add New FAQ" button, fill in the question, answer, and category fields, then click submit.', 'Usage');
