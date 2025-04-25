SELECT count() nombre_de_vente, SUM(qte*prix_vente) Montant_des_ventes
FROM vente, magasin
WHERE (vente.NUM_M = magasin.NUM_M)
GROUP BY (loc);

