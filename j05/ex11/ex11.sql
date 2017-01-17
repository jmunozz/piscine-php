SELECT UPPER(fiche_personne.nom) NOM, fiche_personne.prenom, abonnement.prix 
FROM membre 
INNER JOIN abonnement ON membre.id_abo = abonnement.id_abo 
INNER JOIN fiche_personne ON membre.id_fiche_perso = fiche_personne.id_perso 
WHERE abonnement.prix > 42
ORDER BY fiche_personne.nom ASC, fiche_personne.prenom ASC;
