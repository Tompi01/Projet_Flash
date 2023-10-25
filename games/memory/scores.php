<!DOCTYPE html>
<html lang="en">

<?php
require_once '../../utils/common.php';
require_once SITE_ROOT . 'partials/head.php';
require_once SITE_ROOT . 'partials/header.php';
require_once SITE_ROOT . 'utils/database.php';
if (!isset($_GET['filtre'])) {
    $_GET['filtre'] = '';
    $pdo = connectToDbAndGetPdo();
    $getScoreFromSQL = $pdo->prepare("SELECT jeu.nom_jeu, utilisateur.pseudo, score.difficulte, score.score_jeu, score.date_heure_partie, game_time
        FROM score
        INNER JOIN jeu 
        ON score.id_jeu = jeu.id 
        INNER JOIN utilisateur 
        ON score.id_joueur = utilisateur.id "); //
    $getScoreFromSQL->execute(); // 
    $scores = $getScoreFromSQL->fetchAll();
} else {
    $pdo = connectToDbAndGetPdo();
    $getScoreFromSQL = $pdo->prepare("SELECT jeu.nom_jeu, utilisateur.pseudo, score.difficulte, score.score_jeu, game_time, score.date_heure_partie
        FROM score
        INNER JOIN jeu 
        ON score.id_jeu = jeu.id 
        INNER JOIN utilisateur 
        ON score.id_joueur = utilisateur.id 
        WHERE utilisateur.pseudo like :pseudo "); //
    echo $_GET['filtre'];
    $getScoreFromSQL->execute([':pseudo' => '%'. $_GET['filtre'] .'%']); 
    $scores = $getScoreFromSQL->fetchAll();
}
    
?>


<section class="sco">

    <body>

        <div class="banner">
            <h1>Page de Score</h1>
        </div>

            <center>


                <div class="recherche">
                    <form method='get'>
                        <input class="search" type="text" placeholder="Recherche" name="filtre">
                    </form>
                </div>

                <table class="score-table">
                    <tr>
                        <th>Jeu</th>
                        <th>Pseudo</th>
                        <th>Difficulté</th>
                        <th>Score</th>
                        <th>Temps_en_jeu</th>
                        <th>Date_Partie</th>
                    </tr>
                    <?php
                    
                    
                    for ($i = 0; $i <sizeof($scores); $i++) { ?>
                    <tr>
                        <td><?php echo $scores[$i]->nom_jeu ?> </td>
                        <td><?php echo $scores[$i]->pseudo ?> </td>
                        <td><?php echo $scores[$i]->difficulte ?> </td>
                        <td><?php echo $scores[$i]->score_jeu ?> </td>
                        <td><?php echo $scores[$i]->game_time ?> </td>
                        <td><?php echo $scores[$i]->date_heure_partie ?> </td>
                    </tr>
                    
                       


                    <?php } ?>
                </table>


                <?php
                require_once SITE_ROOT . 'partials/footer.php';
                ?>
            </center>




            </div>













    </body>


    <?php
    require_once SITE_ROOT . 'partials/footer.php';
    ?>


</section>

</html>