# AP-FFBSQ

Un site de gestion de bowling

## Le contenu

- [MCD](#MCD)
- [MLDR](#MLDR)

## MCD

Entités :

Club (numeroaffiliation, designationclub, adresse_siege, adr_cp_siege, adr_ville_siege, annee_affiliation, tel_siege, mail_siege, adresse_courrier, adr_cp_courrier, numero_prefecture)

Licencie (numlicencie, nomlicencie, prenomlicencie, sexelicencie, datedenaissance, photolicencie, categorielicencie, positionlicencie, adr_licencie, adr_ville_licencie, tel_licencie, mail_licencie, nationalite_licencie, validite_CM, annee_reprise, premiere_licence)

Categorie (id_categorie, libelle_categorie, age_min, age_max)

Relations :

Correspondre (Licencie -> Categorie)


## MLDR

Table Club (PK: numeroaffiliation)
Table Licencie (PK: numlicencie, FK: categorielicencie REFERENCES Categorie(id_categorie))
Table Categorie (PK: id_categorie)


## Schéma de la Base de Données

Club (numeroaffiliation, designationclub, adresse_siege, adr_cp_siege, adr_ville_siege, annee_affiliation, tel_siege, mail_siege, adresse_courrier, adr_cp_courrier, numero_prefecture)

Licencie (numlicencie, nomlicencie, prenomlicencie, sexelicencie, datedenaissance, photolicencie, categorielicencie, positionlicencie, adr_licencie, adr_ville_licencie, tel_licencie, mail_licencie, nationalite_licencie, validite_CM, annee_reprise, premiere_licence)

Categorie (id_categorie, libelle_categorie, age_min, age_max)


## Liaisons entre les Tables et les Applications

Les applications devraient utiliser des requêtes SQL pour interagir avec la base de données.
Les requêtes devraient être préparées pour éviter les injections SQL.
Les procédures stockées peuvent être utilisées pour encapsuler la logique métier dans la base de données.

## Actions sur la Base de Données dans les Applications

Actions pour le Club :

Création d'un Club :
Requête : INSERT INTO Club (...) VALUES (...)

Mise à jour d'un Club :
Requête : UPDATE Club SET ... WHERE numeroaffiliation = :numeroaffiliation

Suppression d'un Club :
Requête : DELETE FROM Club WHERE numeroaffiliation = :numeroaffiliation

Actions pour les Licenciés :

Ajout d'un Licencié :
Requête : INSERT INTO Licencie (...) VALUES (...)

Mise à jour d'un Licencié :
Requête : UPDATE Licencie SET ... WHERE numlicencie = :numlicencie

Suppression d'un Licencié :
Requête : DELETE FROM Licencie WHERE numlicencie = :numlicencie

Actions pour les Catégories :

Ajout d'une Catégorie :
Requête : INSERT INTO Categorie (...) VALUES (...)

Mise à jour d'une Catégorie :
Requête : UPDATE Categorie SET ... WHERE id_categorie = :id_categorie

Suppression d'une Catégorie :
Requête : DELETE FROM Categorie WHERE id_categorie = :id_categorie