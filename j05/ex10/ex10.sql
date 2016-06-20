SELECT titre Titre, resum Resume, annee_prod
FROM film
INNER JOIN genre
ON film.id_genre = genre.id_genre
WHERE genre.nom LIKE "action"
ORDER BY annee_prod DESC;
