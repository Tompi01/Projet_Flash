/* ------------   Creation DATABASE ----------*/
CREATE DATABASE projet_flash;
USE projet_flash;
/* ------------   FIN Creation DATABASE ----------*/





/* ------------   TABLE DE L'UTILISATEUR ----------*/

CREATE TABLE IF NOT EXISTS utilisateur (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    mail VARCHAR(256) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(256) NOT NULL,
    pseudo VARCHAR(256)  UNIQUE NOT NULL,
    date_heure_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_heure_derniere_connexion DATETIME NULL,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8',
ENGINE = INNODB;




/* ------------     FIN TABLE DE L'UTILISATEUR ----------*/







/* ------------   TABLE DE SCORE ----------*/

CREATE TABLE IF NOT EXISTS score (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_jeu INT UNSIGNED NOT NULL ,
    id_joueur INT UNSIGNED NOT NULL ,
    difficulte ENUM('Level I', 'Level II','Level III'),
    score_jeu  INT UNSIGNED NOT NULL,
    date_heure_partie DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8',
ENGINE = INNODB;

/* ------------   FIN TABLE DE SCORE ----------*/








/* ------------   TABLE DE Message ----------*/

CREATE TABLE IF NOT EXISTS message (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_jeu INT UNSIGNED NOT NULL,
    id_expediteur INT UNSIGNED NOT NULL,
    messages TEXT NOT NULL,
    date_heure_message DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8',
ENGINE = INNODB;

/* ------------   FIN TABLE DE Message ----------*/







/* ------------   TABLE DE JEU ----------*/

CREATE TABLE IF NOT EXISTS jeu (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nom_jeu VARCHAR(40) NOT NULL,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8',
ENGINE = INNODB;

/* ------------   FIN TABLE DE JEU ----------*/






/* ------------   Clé Etrangeres  ----------*/


--- Score --- 
ALTER TABLE score
ADD CONSTRAINT fk_score_utilisateur FOREIGN KEY (id_joueur) REFERENCES utilisateur(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE score
ADD CONSTRAINT fk_score_jeu FOREIGN KEY (id_jeu) REFERENCES jeu(id) ON DELETE CASCADE ON UPDATE CASCADE;


--- Message ---

ALTER TABLE message
ADD CONSTRAINT fk_message_jeu FOREIGN KEY (id_jeu) REFERENCES jeu(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE message
ADD CONSTRAINT fk_message_utilisateur FOREIGN KEY (id_expediteur) REFERENCES utilisateur(id) ON DELETE CASCADE ON UPDATE CASCADE;


/* ------------   FIN Clé Etrangeres  ----------*/





/* ------------    Creation de donnés  ----------*/







        /*---------------    Creation donnés utilisateur   --------------*/
INSERT INTO utilisateur (mail,mot_de_passe,pseudo,date_heure_inscription,date_heure_derniere_connexion)
VALUES ('truc@gmail.com','pokemon','pika','2013-06-07 22:16:43.666', '2013-06-07 22:16:43'),
        ('machin@gmail.com','moi','toi','2013-06-08 22:16:43.666','2014-06-07 22:16:43'),
        ('bidule@gmail.com','95150','mal','2013-06-09 22:16:43.666','2015-06-07 22:16:43'),
        ('fo@gmail.com','vrai','fo','2013-06-10 22:16:43.666','2016-06-07 22:16:43'),
        ('li@gmail.com','lo','li','2013-06-11 22:16:43.666','2017-06-07 22:16:43');

         /*---------------    FIN Creation donnés utilisateur   --------------*/




         /*---------------    Creation donnés Jeu   --------------*/
            INSERT INTO jeu(nom_jeu)
            VALUES('Power of Memory');

         /*---------------    FIN Creation donnés Jeu   --------------*/




         /*---------------    Creation donnés Score   --------------*/

INSERT INTO score (id_joueur,id_jeu,difficulte,score_jeu,date_heure_partie)
VALUES (1,1,'Level III','4000','2019-02-07 22:16:43'),
        (2,1,'Level I','4004','2013-01-07 22:16:43'),
        (3,1,'Level III','4008','2018-06-07 22:16:43'),
        (4,1,'Level II','4012','2013-08-07 22:16:43'),
        (5,1,'Level II','4016','2014-06-07 22:16:43'),
        (1,1,'Level III','4020','2023-09-07 22:16:43'),
        (2,1,'Level I','4024','2013-06-07 22:16:43'),
        (3,1,'Level II','4028','2013-06-07 22:16:43'),
        (4,1,'Level III','4032','2013-06-07 22:16:43'),
        (5,1,'Level II','4036','2013-06-07 22:16:43'),
        (1,1,'Level III','4040','2013-06-07 22:16:43'),
        (2,1,'Level I','4044','2013-06-03 22:16:43'),
        (3,1,'Level III','4048','2019-06-07 22:16:43'),
        (4,1,'Level II','4052','2015-06-07 22:16:43'),
        (5,1,'Level III','4056','2013-06-04 22:16:43');

         /*---------------    Fin Creation donnés Score   --------------*/






        /*---------------     Creation donnés Message   --------------*/
         INSERT INTO message(id_jeu,id_expediteur,messages,date_heure_message)
VALUES  (1,2,"a",'2013-06-05 22:16:43'),
        (1,2,"b",'2013-06-06 22:16:43'),
        (1,3,"c",'2013-06-07 22:16:43'),
        (1,3,"d",'2013-06-08 22:16:43'),
        (1,4,"e",'2013-06-09 22:16:43'),
        (1,5,"f",'2013-06-10 22:16:43'),
        (1,1,"g",'2013-06-11 22:16:43'),
        (1,1,"h",'2013-06-12 22:16:43'),
        (1,2,"i",'2013-06-13 22:16:43'),
        (1,4,"j",'2013-06-14 22:16:43'),
        (1,5,"k",'2013-06-15 22:16:43'),
        (1,4,"l",'2013-06-15 22:16:43'),
        (1,1,"m",'2013-06-16 22:16:43'),
        (1,2,"n",'2013-06-17 22:16:43'),
        (1,3,"o",'2013-06-18 22:16:43'),
        (1,5,"p",'2013-06-19 22:16:43'),
        (1,1,"q",'2013-06-20 22:16:43'),
        (1,2,"r",'2013-06-21 22:16:43'),
        (1,3,"s",'2013-06-22 22:16:43'),
        (1,4,"t",'2013-06-23 22:16:43'),
        (1,5,"u",'2013-06-24 22:16:43'),
        (1,5,"v",'2013-06-15 22:16:43'),
        (1,5,"w",'2013-06-15 22:16:43'),
        (1,5,"x",'2017-06-15 22:16:43'),
        (1,4,"y",'2014-06-15 22:16:43');


        /*---------------     FIN Creation donnés Message   --------------*/




        /*----------------  Creation profil Story 3 ------------------*/

        INSERT INTO utilisateur(mail,mot_de_passe,pseudo,date_heure_inscription)
        VALUES ("toto@gmail.com","toto93","toto","2014-03-12 21:13:42");

        /*----------------  Fin Creation profil Story 3 ------------------*/


        
        /*----------------  Creation  Story 4 ------------------*/

        UPDATE utilisateur
        SET mot_de_passe = "nouveau_mdp_utilisateur"
        WHERE mot_de_passe = "toto93";

        UPDATE utilisateur
        SET mail = "nouvelle_adresse_mail_utilisateur@gmail.com"
        WHERE mail = "toto@gmail.com";

        /*----------------  Fin Creation Story 4 ------------------*/






        /*----------------  Creation  Story 5 ------------------*/

        SELECT *
        FROM utilisateur
        WHERE mot_de_passe = "pokemon"  AND mail = "truc@gmail.com"

        /*----------------  Fin Creation  Story 5 ------------------*/





        /*----------------  Creation  Story 7 ------------------*/

        SELECT jeu.nom_jeu, utilisateur.pseudo, score.difficulte, score.score_jeu
        FROM score
        INNER JOIN jeu ON score.id_jeu = jeu.id
        INNER JOIN utilisateur ON score.id_joueur = utilisateur.id
        ORDER BY jeu.nom_jeu ASC, difficulte ASC, score_jeu ASC;


        /*----------------  FIN Creation  Story 7 ------------------*/
        




        /*----------------  Creation  Story 8 ------------------*/

        SELECT jeu.nom_jeu, utilisateur.pseudo, score.difficulte, score.score_jeu
        FROM score
        INNER JOIN jeu ON score.id_jeu = jeu.id
        INNER JOIN utilisateur ON score.id_joueur = utilisateur.id
        WHERE nom_jeu = 'Power of Memory'
        OR pseudo="mal"
        OR difficulte='Level I'
        ORDER BY nom_jeu ASC, difficulte ASC, score_jeu ASC;


        SELECT jeu.nom_jeu, utilisateur.pseudo, score.difficulte, score.score_jeu
        FROM score
        INNER JOIN jeu ON score.id_jeu = jeu.id
        INNER JOIN utilisateur ON score.id_joueur = utilisateur.id
        WHERE nom_jeu = 'Power of Memory faux'
        OR pseudo="mal"
        OR difficulte='Level I'
        ORDER BY nom_jeu ASC, difficulte ASC, score_jeu ASC;
      
        /*----------------  Fin Creation  Story 8 ------------------*/


        /*----------------  Creation  Story 9 ------------------*/

            SELECT id_score, id_jeu, difficulte
            FROM score
            WHERE id_joueur = "id_joueur_gagnant"

            /* -- Si le SELECT ne renvoie rien ( n'a pas de parti deja faite) --*/
            INSERT INTO score (id_joueur,id_jeu,difficulte,score_jeu)
            VALUES ("joueur1", "Power of Memory", "Level I","4000")

            /* -- Si le SELECT  renvoie quelque chose on met a jour son score --*/
            UPDATE score 
            SET score_jeu = "nouveau_score"
            WHERE id_joueur = "id_joueur_gagnant" 


        /*----------------  FIN Creation  Story 9 ------------------*/



        /*----------------  Creation  Story 10 ------------------*/

        INSERT INTO message(id_jeu,id_expediteur,messages,date_heure_message)
        VALUES  (1,4,"yo",'2016-06-05 22:16:43');


        /*----------------  FIN Creation  Story 10 ------------------*/






        /*----------------  Creation  Story 11 ------------------*/


                    -- si aucune donné c'est qu'il n'y a pas eu de message dans les dernieres 24h --
        SELECT messages, pseudo, date_heure_message, utilisateur.id = 3 AS isSender
        FROM message
        INNER JOIN utilisateur ON message.id_expediteur = utilisateur.id
        WHERE date_heure_message >= NOW() - INTERVAL 1 DAY;

        /*----------------  FIN Creation  Story 11 ------------------*/





        /*----------------   Creation  Story 12 ------------------*/

        SELECT score.*, utilisateur.pseudo
        FROM score
        INNER JOIN utilisateur ON score.id_joueur = utilisateur.id
        WHERE utilisateur.pseudo LIKE "%i%";

        /*----------------  FIN Creation  Story 12 ------------------*/

        





/* ------------    FIN Creation de donnés  ----------*/
