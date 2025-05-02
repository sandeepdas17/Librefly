-- Drop the existing users table if needed (optional, backup your data first)
DROP TABLE IF EXISTS users;

-- Create a new users table with improvements
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Passwords will be hashed
    role ENUM('admin', 'read', 'write', 'update', 'delete', 'user') DEFAULT 'user'
);


-- Insert admin and user records with hashed passwords
INSERT INTO users (email, password, role) VALUES
('admin@admin.com', '$2y$10$KbPjl6JfpDzO8F1GrRFS0e.IgQC8FQL2F8ftDUu.Gp01Z3yq5mRTq', 'admin'), -- Password: admin
('user@123.com', '$2y$10$Z8IhRQU3wB4BrcUpl5LFmO5Z9IrfvDW2dLMmrAvGrAh/kUcqHni7a', 'user');      -- Password: user123

-- Create the `ebooks` table
CREATE TABLE ebooks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    description TEXT,
    file_path VARCHAR(255) NOT NULL,
    cover_image VARCHAR(255) NOT NULL,
    upload_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert data into the `ebooks` table
INSERT INTO ebooks (title, author, description, file_path, cover_image) VALUES
('The Power of Now', 'Eckhart Tolle', '\"The Power of Now\" is a spiritual guidebook that encourages readers to free themselves from the mental traps of past and future thoughts, and instead, to experience the power of the present moment.', 'pdfs/thepowerofnow.pdf', 'images/tolle.jpg'),

('The 7 Habits of Highly Effective People', 'Stephen R. Covey', 'The 7 Habits of Highly Effective People is one of the most influential self-help books of all time. It offers timeless principles for personal growth and leadership.', 'pdfs/thesevenhabitsofhighlyeffectivepeople.pdf', 'images/7-habits-of-highly-effective-people-9781416502494_hr.jpg'),

('Atomic Habits', 'James Clear', '\"Atomic Habits\" is a groundbreaking book that explores the science of habits and how small changes can lead to remarkable results.', 'pdfs/atomichabits.pdf', 'images/OIP.jpg');
