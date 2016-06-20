INSERT INTO ft_table (login, groupe, date_de_creation)
SELECT (nom, 'other', date_naissance)
FROM fiche_personne
WHERE LENGTH(nom) < 8 AND LOCATE("a", nom)
ORDER BY nom ASC
LIMIT 10;
