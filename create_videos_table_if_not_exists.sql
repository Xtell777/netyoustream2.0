CREATE TABLE IF NOT EXISTS videos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    video_id INT NOT NULL UNIQUE,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    age_rating VARCHAR(10),
    views INT DEFAULT 0,
    subscribers INT DEFAULT 0,
    publish_date DATE,
    comments INT DEFAULT 0
);