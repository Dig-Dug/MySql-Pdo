CREATE DATABASE IF NOT EXISTS videothek;

USE videothek;

CREATE TABLE IF NOT EXISTS filme
(
id INT(7) PRIMARY KEY AUTO_INCREMENT,
titel VARCHAR(60) NOT NULL,
genre_id INT(2) NOT NULL,
land VARCHAR(30) NOT NULL,
jahr INT(4) NOT NULL,
regie VARCHAR(40) NOT NULL
);

INSERT INTO filme (titel,genre_id,land,jahr,regie) VALUES 
('Der Pate', 2,'USA',1971,'Francis Ford Coppola'),
('Film2', 2,'USA',1997,'Regie2'),
('Film3', 3,'Deutschland',2011,'Regie3'),
('Film4', 1,'Japan',1995,'Regie4'),
('Film5', 3,'Frankreich',2015,'Regie5');


CREATE TABLE IF NOT EXISTS genres
(
id INT(2) PRIMARY KEY AUTO_INCREMENT,
genre VARCHAR(30) NOT NULL
);

INSERT INTO genres (genre) VALUES
('action'),
('krimi'),
('scifi'),
('fantasy');



SELECT filme.id,titel,land,regie,genres.genre,jahr
FROM filme 
JOIN genres
ON
filme.genre_id=genres.id
;