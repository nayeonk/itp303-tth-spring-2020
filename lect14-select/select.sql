-- This is a comment
/*
	Multi-ine comments
*/

SELECT * FROM  tracks;
SELECT * FROM genres;

-- Display tracks that cost more than 0.99
-- Sort them from shortest to longest (in length)
-- Show only the track_id, name, price, and length
SELECT track_id, name, milliseconds, unit_price
FROM tracks
WHERE unit_price > 0.99
ORDER BY milliseconds DESC;

-- Display tracks that have a composer
-- only show the track's id, name, composer, and price
SELECT track_id, name, composer
FROM tracks
WHERE composer IS NOT NULL;

-- Display tracks that have 'you' or 'day' in the track name
SELECT * FROM tracks
WHERE name LIKE '%you%' OR name LIKE '%day%';

-- Display tracks that have 'you' or 'day' in the track name
SELECT * FROM tracks
WHERE (name LIKE '%you%' OR name LIKE '%day%') AND composer LIKE '%u2%';

SELECT * FROM albums;
SELECT * FROM artists;
-- Display all albums and artists corresponding to each album
-- Only show album name and artist name
SELECT album_id, title, name
FROM albums
JOIN artists
	ON albums.artist_id = artists.artist_id;

-- Display all Jazz tracks
SELECT * FROM tracks
WHERE genre_id = 2;

-- Display all Jazz tracks
-- Only show track name (as track_name), genre name (as genre_name),
-- album title (as album_name), and artist name (as artist_name) columns. 
SELECT tracks.name AS track_name, 
albums.title AS album_name, 
genres.name AS genre_name, 
artists.name AS artist_name
FROM tracks
JOIN genres
	ON tracks.genre_id = genres.genre_id
JOIN albums
	ON tracks.album_id = albums.album_id
JOIN artists
	ON albums.artist_id = artists.artist_id

-- WHERE genres.genre_ = 'Jazzkjkfdls';
WHERE genres.genre_id = 2;

SELECT * FROM genres;





