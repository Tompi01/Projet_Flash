/* Story 1 */

CREATE DATABASE services_db CHARACTER SET 'utf8';

USE services_db;

/* Story 1*/

CREATE TABLE utilisateurs (
  id                INT UNSIGNED NOT NULL AUTO_INCREMENT,
  pseudo            VARCHAR(40) UNIQUE NOT NULL,
  email             VARCHAR(90) UNIQUE NOT NULL,
  mot_de_passe      VARCHAR(191) NOT NULL,
  adresse           VARCHAR(80) DEFAULT NULL,
  code_postal       VARCHAR(80) DEFAULT NULL,
  ville             VARCHAR(80) DEFAULT NULL,
  pays              VARCHAR(80) DEFAULT NULL,
  portable          VARCHAR(30) DEFAULT NULL,
  fixe              VARCHAR(30) DEFAULT NULL,
  date_inscription  DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
) ENGINE = INNODB;

CREATE TABLE services (
  id                INT UNSIGNED NOT NULL AUTO_INCREMENT,
  id_utilisateur    INT UNSIGNED NOT NULL,
  nom               VARCHAR(80) NOT NULL,
  description       VARCHAR(80) NOT NULL,
  adresse           VARCHAR(80) NOT NULL,
  code_postal       VARCHAR(80) NOT NULL,
  ville             VARCHAR(80) NOT NULL,
  pays              VARCHAR(80) NOT NULL,
  date_service      DATETIME NOT NULL,
  informations      TEXT DEFAULT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (id_utilisateur)  REFERENCES utilisateurs(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE TABLE services_utilisateurs (
  id                INT UNSIGNED NOT NULL AUTO_INCREMENT,
  id_service        INT UNSIGNED NOT NULL,
  id_utilisateur    INT UNSIGNED NOT NULL,
  date_inscription  DATETIME NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (id_service)      REFERENCES services(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_utilisateur)  REFERENCES utilisateurs(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE TABLE messages (
  id              INT UNSIGNED NOT NULL AUTO_INCREMENT,
  id_expediteur   INT UNSIGNED NOT NULL,
  id_receveur     INT UNSIGNED NOT NULL,
  contenu         TEXT,
  date_envoie     DATETIME NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (id_expediteur)   REFERENCES utilisateurs(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_receveur)     REFERENCES utilisateurs(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB;

/* Story 3 */

INSERT INTO utilisateurs (pseudo, email, mot_de_passe, date_inscription)
VALUES ('Pseudo1', 'hello@free.fr', '123456', NOW());

INSERT INTO utilisateurs (pseudo, email, mot_de_passe, adresse, code_postal, ville, pays, portable, fixe, date_inscription)
VALUES
('Pseudo2', 'hello2@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo3', 'hello3@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo4', 'hello4@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo5', 'hello5@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo6', 'hello6@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo7', 'hello7@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo8', 'hello8@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo9', 'hello9@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo10', 'hello10@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo11', 'hello11@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW());

/* Story 4 */

UPDATE utilisateurs set adresse = '2 rue du lac', code_postal = '75019', ville = 'Paris', pays = 'France', portable = '0602030405', fixe = '0102030405'
WHERE id = 1;

/* Story 5 */

INSERT INTO services (id_utilisateur, nom, description, adresse, code_postal, ville, pays, date_service)
VALUES
(1, 'Laver ma vaisselle', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-28 15:01'),
(7, 'Laver ma voiture', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-18 13:01'),
(5, 'Peindre mes murs', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-18 15:01'),
(4, 'Chasser les pokemons', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-16 15:01'),
(3, 'Monter mon lave vaisselle', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-13 15:01'),
(3, 'Repasser mes chemises', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-12 12:01'),
(9, 'M''aider à trouver une idée de service', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-09 15:01'),
(11, 'Sortir mes chiens', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-02 11:01'),
(1, 'Dire bonjour à mes chats', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-25 12:22'),
(7, 'Aller se promener', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-01 09:01');

/* Story 6 */

INSERT INTO services_utilisateurs (id_service, id_utilisateur, date_inscription)
VALUES
(1, 5, '2019-11-15 11:18'),
(2, 6, '2019-11-15 11:18'),
(3, 8, '2019-11-15 11:18'),
(4, 2, '2019-11-15 11:18'),
(5, 4, '2019-11-15 11:18'),
(6, 9, '2019-11-15 11:18'),
(7, 10, '2019-11-15 11:18'),
(8, 11, '2019-11-15 11:18'),
(3, 8, '2019-11-15 11:18'),
(10, 3, '2019-11-15 11:18'),
(6, 2, '2019-11-15 11:18'),
(7, 10, '2019-11-15 11:18');



/* Story 7 */

ALTER TABLE messages
MODIFY date_envoie DATETIME DEFAULT CURRENT_TIMESTAMP;

INSERT INTO messages(id_expediteur, id_receveur, contenu) 
VALUES (1, 2, "Salut"),
(2, 1, "Salut"),
(1, 2, "ça va ?"),
(2, 1, "Bien et toi ?"),
(1, 2, "Bien"),
(2, 1, "ça fait quoi là ?"),
(1, 2, "ça fait des base de données tranquille"),
(2, 1, "Ah ouais je vois"),
(1, 3, "Qu'est ce qui me veut"),
(5, 9, "Je sais pas c'est à qu'elle heure mon prochain rdv"),
(9, 4, "C'était comment ton rdv ?"),
(10, 3, "T'as parlé aux chats de paul ?"),
(2, 1, "Salut"),
(1, 2, "ça va ?"),
(2, 1, "Bien et toi ?"),
(1, 2, "Bien"),
(2, 1, "ça fait quoi là ?"),
(1, 2, "ça fait des base de données tranquille"),
(2, 1, "Ah ouais je vois"),
(1, 3, "Qu'est ce qui me veut"),
(5, 9, "Je sais pas c'est à qu'elle heure mon prochain rdv"),
(9, 4, "C'était comment ton rdv ?"),
(10, 3, "T'as parlé aux chats de paul ?"),
(9, 4, "C'était comment ton rdv ?"),
(10, 3, "T'as parlé aux chats de paul ?");

/* Story 8 */


SELECT u1.pseudo AS expediteur, u2.pseudo AS receveur,contenu,date_envoie
FROM messages
INNER JOIN utilisateurs AS u1 ON messages.id_expediteur = u1.id
INNER JOIN utilisateurs AS u2 ON messages.id_receveur = u2.id
WHERE id_expediteur = 1
ORDER BY date_envoie DESC;

/* Story 9 */

SELECT u1.pseudo AS expediteur, u2.pseudo AS receveur,messages.contenu,messages.date_envoie
FROM messages
RIGHT JOIN utilisateurs AS u1 ON messages.id_expediteur = u1.id
RIGHT JOIN utilisateurs AS u2 ON messages.id_receveur = u2.id
WHERE (id_expediteur = 1 AND id_receveur = 2) OR (id_expediteur = 2 AND id_receveur = 1)
ORDER BY date_envoie DESC;


/* Story 10 */


SELECT s.nom, s.description, s.adresse, s.code_postal,s.ville,s.pays,s.date_service,s.informations, u1.pseudo AS createur , u2.pseudo AS inscrit
FROM services AS s
LEFT JOIN utilisateurs AS u1 ON s.id_utilisateur = u1.id /* information createur */
LEFT JOIN services_utilisateurs AS su ON s.id_utilisateur = su.id_service /* information SU pour obtenir les id utilisateur */
LEFT JOIN utilisateurs AS u2 ON su.id_utilisateur = u2.id/* Grace au jointure precedente on peut recuperee les information des id des utilisateurs comme la case des inscrits*/
WHERE su.id IS NULL : /* u2.pseudo marchaus aussi comme condition nul*/
AND (
    s.nom LIKE '%vaisselle%'
    OR s.code_postal = '75001'
    OR s.ville = 'Paris'
    OR s.pays = 'France'
)
AND date_service > NOW()
ORDER BY s.date_service DESC, s.ville ASC;




/* Story 11 */

SELECT services.*, u1.pseudo AS createur,u1.portable,u2.pseudo AS receveur
FROM services
INNER JOIN services_utilisateurs ON services.id = services_utilisateurs.id_service
INNER JOIN utilisateurs AS u1 ON services.id_utilisateur = u1.id
INNER JOIN utilisateurs AS u2 ON services_utilisateurs.id_utilisateur = u2.id;
/* les deux dernieres Inner permettre de relier table pour ovtenir les pseudos */

/* Story 12 */

delete from services
where id = 4

/*  Story 13 */

DELETE FROM services_utilisateurs
WHERE id_service = 6 AND id_utilisateur = 9

/* Story 14 */

DELETE FROM utilisateurs
WHERE id = 7

/* Story 15 */

DELETE FROM messages
WHERE id = 7


/* Story 16 */

SELECT u.pseudo AS pseudo_createur_service,
s.nom AS nom_service,
s.description AS descritpion_service,
s.adresse AS adresse_service,
s.code_postal AS code_postal_service,
s.ville AS ville_service, 
s.pays AS pays_service, 
s.date_service,
 s.informations AS informations_service,
 us.pseudo AS pseudo_utilisateur,
 u.email AS mail_utilisateur,
u.adresse AS adresse_utilisateur,
u.code_postal AS code_postal_utilisateur,
u.ville AS ville_utilisateur,
u.pays AS pays_utilisateur,
u.portable AS portable_utlisateur,
u.fixe AS fixe_utilisateur,
su.date_inscription AS date_inscription_utilisateur, 
    
(SELECT COUNT(su.id_utilisateur) FROM services_utilisateurs AS su WHERE id_utilisateur = us.id) AS nombre_services_participes /* compte le nombre de fois qu'on voit l'id d'un utilisateur*/
FROM services AS s
INNER JOIN utilisateurs u ON s.id_utilisateur = u.id  /* information createur */
INNER JOIN services_utilisateurs AS su ON s.id = su.id_service /* information SU pour obtenir les id utilisateur */
INNER JOIN utilisateurs AS us ON su.id_utilisateur = us.id /* Grace au jointure precedente on peut recuperee les information des id des utilisateurs */
ORDER BY s.date_service DESC, s.ville ASC, s.nom ASC;


/* Story 17 */


SELECT u.pseudo AS pseudo_createur_service,
s.nom AS nom_service,
s.description AS descritpion_service,
s.adresse AS adresse_service,
s.code_postal AS code_postal_service,
s.ville AS ville_service,
s.pays AS pays_service,
s.date_service,
s.informations AS informations_service,
us.pseudo AS pseudo_utilisateur,
u.email AS mail_utilisateur,
u.adresse AS adresse_utilisateur,
u.code_postal AS code_postal_utilisateur,
u.ville AS ville_utilisateur,
u.pays AS pays_utilisateur,
u.portable AS portable_utlisateur,
u.fixe AS fixe_utilisateur,
su.date_inscription AS date_inscription_utilisateur


FROM services s
INNER JOIN utilisateurs AS u ON s.id_utilisateur = u.id /* information createur */
INNER JOIN services_utilisateurs AS su ON s.id = su.id_service /* information SU pour obtenir les id utilisateur */
INNER JOIN utilisateurs AS us ON su.id_utilisateur = us.id/* Grace au jointure precedente on peut recuperee les information des id des utilisateurs */
WHERE su.id_utilisateur = 
ORDER BY s.date_service ASC
LIMIT 1;



/* Story 18 */


SELECT M.*, (
    
    SELECT U.pseudo FROM utilisateurs AS U WHERE id = 5
) as Pseudo, 
    
  ( SELECT COUNT(SU.id) 
    FROM services_utilisateurs as SU
    LEFT JOIN services as S
    ON SU.id_service = S.id
    WHERE SU.id_utilisateur = 5
    AND M.mois = MONTH(S.date_service)
) as Participations_total
FROM (
    SELECT 1 as mois 
    union 
    SELECT 2 as mois 
    union
    SELECT 3 as mois 
    union 
    SELECT 4 as mois 
    union 
    SELECT 5 as mois 
    union 
    SELECT 6 as mois 
    union 
    SELECT 7 as mois 
    union 
    SELECT 8 as mois 
    union 
    SELECT 9 as mois 
    union 
    SELECT 10 as mois 
    union 
    SELECT 11 as mois 
    union 
    SELECT 12 as mois 
    
    
) as M