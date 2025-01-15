-- Inserir dados de exemplo na tabela videos
INSERT INTO videos (title, subscribers, views, comments, publish_date, age_rating, duration, embed_url, channel_name, channel_image)
VALUES ('XTELL 777 - "GANG DE PONTE" (Official Áudio)', 1000000, 1234567, 123, '2024-11-11', '🔞+', '00:01:37', 'https://www.youtube.com/embed/atLVRfmh9Ps', 'XTELL 777', 'https://github.com/Xtell777/xtvideos.com.br/assets/157428126/ea34eb68-011c-4c9e-b7c0-6281550e515a');

-- Inserir dados de exemplo na tabela comments
INSERT INTO comments (video_id, author_name, comment_text, likes)
VALUES (1, 'XTELL 777', 'PRIMEIRO COMENTÁRIO DO CEO XTELL 777...', 0);