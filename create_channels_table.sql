USE u845457687_net_you_stream;

CREATE TABLE channels (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    subscribers INT DEFAULT 0,
    videos INT DEFAULT 0,
    views INT DEFAULT 0
);