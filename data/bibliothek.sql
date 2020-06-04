CREATE DATABASE IF NOT EXISTS bibliothek1;

USE bibliothek1;

CREATE TABLE IF NOT EXISTS books
(
id INT(7) PRIMARY KEY AUTO_INCREMENT,
titel VARCHAR(60) NOT NULL,
beschreibung TEXT NOT NULL,
genre_id INT(2) NOT NULL,
land VARCHAR(30) NOT NULL,
jahr INT(4) NOT NULL,
autor VARCHAR(40) NOT NULL
);

INSERT INTO books (titel,beschreibung,genre_id,land,jahr,autor) VALUES 
('Der Pate', 'Beschreibung id 1',2,'USA',1971,'Mario Puso'),
('Buch2', 'Beschreibung id 2', 2,'USA',1997,'Autor2'),
('Buch3', 'Beschreibung id 3', 3,'Deutschland',2011,'Autor3'),
('Buch4', 'Beschreibung id 4', 1,'Japan',1995,'Autor4'),
('Buch5', 'Beschreibung id 5', 3,'Frankreich',2015,'Autor5');


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