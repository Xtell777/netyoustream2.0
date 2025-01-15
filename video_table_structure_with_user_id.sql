publish_date DATE,                     -- Data de publicação
age_rating VARCHAR(10),                -- Classificação etária
duration TIME,                         -- Duração do vídeo
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
channel_id INT,                        -- ID do canal associado ao vídeo
user_id INT,                           -- ID do usuário associado ao vídeo
FOREIGN KEY (channel_id) REFERENCES channels(id) ON DELETE CASCADE,
FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE