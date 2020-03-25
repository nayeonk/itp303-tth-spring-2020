-- Add album 'Fight On' by artist Spirit of Troy

-- First check that the album doesn't exist already
SELECT * FROM albums
WHERE title LIKE '%fight%';

-- Look for 'Spirit of Troy's artist_id
SELECT * FROM artists
WHERE name LIKE '%spirit%';

-- Add 'Spirit of Troy' as a new artist
INSERT INTO artists (name)
VALUES ('Spirit of Troy');

-- Double check that artist has been added
SELECT * FROM artists
ORDER BY artist_id DESC;

-- Finally, add the 'Fight On' Album
INSERT INTO albums (title, artist_id)
VALUES('Fight On', 276);

-- Double check that album has been added
SELECT * FROM albums
ORDER BY album_id DESC;
-- Check tracks table for 'All My Love'
SELECT * FROM tracks
WHERE name = 'All My Love';

-- Update 'All My Love' track composed by E.Schrody to composer Tommy Trojan
-- Add this song to the 'Fight On' album
UPDATE tracks
SET composer = 'Tommy Trojan', album_id = 349
WHERE track_id = 3316;

-- NULL the track that refers to 'Fight On' album
UPDATE tracks
SET album_id = null
WHERE track_id = 3316;

-- Delete the 'Fight On' album
-- Can't delete because 'All My Love' is a track of 'Fight On'
DELETE FROM albums
WHERE album_id = 349;

-- Display all albums and their artist name
CREATE OR REPLACE VIEW album_artists AS
SELECT title as album_title, name as artist_name
FROM albums
JOIN artists
	ON albums.artist_id = artists.artist_id;
    
SELECT * FROM album_artists;

-- AGGREGATE FUNCTIONS
SELECT COUNT(*), COUNT(composer)
FROM tracks;

-- in tracks table, what's the longest song? shortest? average?
SELECT MAX(milliseconds), MIN(milliseconds), AVG(milliseconds), SUM(milliseconds) 
FROM tracks;

-- A little more specific - How long is one album?
SELECT SUM(milliseconds)
FROM tracks
WHERE album_id = 2;

-- Find the shortest track for EACH album
SELECT album_id, MIN(milliseconds)
FROM tracks
GROUP BY album_id;

-- How many albums for each artist?
SELECT artist_id, COUNT(*)
FROM albums
GROUP BY artist_id;

SELECT artists.artist_id, artists.name, COUNT(*)
FROM albums
JOIN artists
	ON artists.artist_id = albums.artist_id
GROUP BY albums.artist_id;


