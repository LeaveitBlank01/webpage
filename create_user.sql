CREATE USER IF NOT EXISTS 'mark'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON user_portal.* TO 'mark'@'localhost';
FLUSH PRIVILEGES;

