<!DOCTYPE html>
<html lang="en">

<?php
require_once 'utils/common.php';
require_once SITE_ROOT . 'partials/head.php';
require_once SITE_ROOT . 'partials/header.php';
require_once 'utils/database.php'
?>

<?php
$pdoScores = $pdo->prepare('SELECT score_jeu FROM score ORDER BY score_jeu ASC LIMIT 1');
    $pdoScores->execute([]);
    $meilleurScore = $pdoScores->fetch();
    echo $meilleurScore -> score_jeu
?>

<section class="ind">
    <body>
        <div class="container">

            <img class="image" src="<?php PROJECT_FOLDER ?> assets/pictureMain1.jpeg" alt="Image">

            

            <div class="texte-sur-image">

                <h1>BIENVENUE DANS <br> NOTRE STUDIO ! </h1>

                <span class="challenger-text">Venez challenger les cerveaux les plus agiles !</span>

                <br> <br>

                <a class="jouer-text" href="chooseTheme.html">Jouer !</a>
            </div>
        </div>






        <div class="games3">

            <div class="image-games3">
                <img src="<?php PROJECT_FOLDER ?> assets/OrdinateurNeon.png" alt="Image 1">

            </div>

            <div class="image-games3">
                <img src="<?php PROJECT_FOLDER ?> assets/trotinette.png" alt="Image 2">

            </div>

            <div class="image-games3">
                <img src="<?php PROJECT_FOLDER ?> assets/pokerpicture.jpeg" alt="Image 3">

            </div>

        </div>


        <div id="textepresent">
            <div class="box">
                <span>
                    <p class="nombre"><strong>01</strong></p>
                </span>
                <span>
                    <p class="titre3images"> <span class="gros"><strong>Lorem ipsum</strong> </span> <br>dolor sit amet, consectetur adipiscing elit. Morbi luctus ipsum auctor mattis placerat. Vivamus consequat convallis luctus. Interdum et malesuada fames ac ante ipsum primis in faucibus. In fermentum tristique vestibulum. Sed pulvinar purus nec.</p>
                </span>
            </div>
            <div class="box">
                <span>
                    <p class="nombre"><strong>02</strong></p>
                </span>
                <span>
                    <p class="titre3images"> <span class="gros"><strong>Lorem ipsum</strong> </span> <br>dolor sit amet, consectetur adipiscing elit. Morbi luctus ipsum auctor mattis placerat. Vivamus consequat convallis luctus. Interdum et malesuada fames ac ante ipsum primis in faucibus. In fermentum tristique vestibulum. Sed pulvinar purus nec.</p>
                </span>
            </div>
            <div class="box">
                <span>
                    <p class="nombre"><strong>03</strong></p>
                </span>
                <span>
                    <p class="titre3images"> <span class="gros"><strong>Lorem ipsum</strong> </span> <br>dolor sit amet, consectetur adipiscing elit. Morbi luctus ipsum auctor mattis placerat. Vivamus consequat convallis luctus. Interdum et malesuada fames ac ante ipsum primis in faucibus. In fermentum tristique vestibulum. Sed pulvinar purus nec.</p>
                </span>
            </div>

        </div>









        <div id="carre">

            <div class="imag">
                <img src="<?php PROJECT_FOLDER ?> assets/WatchDog.png" alt="Image 4">
            </div>


            <div class="container1">

                <div class="row">

                    <div class="carre1">
                        <p><span>310</span></p>
                        <p>Parties Jouées</p>
                    </div>

                    <div class="carre1">
                        <p><span>1020</span></p>
                        <p>Joueur Connectés</p>
                    </div>
                </div>


                <div class="row">

                    <div class="carre2">
                        <p><span>10sec</span></p>
                        <p>Temp Record</p>
                    </div>

                    <div class="carre2">
                        <p><span>21 300</span></p>
                        <p>Joueur Inscrits</p>
                    </div>

                </div>
            </div>
        </div>



        <div class="transition">
            <span class="equipe">Notre Equipe</span>
            <p>Quisque commodo facilisis Durus. terouum volutnat arcu viverra s</p>
            <img src="<?php PROJECT_FOLDER ?> assets/transition-jaune.jpg">

        </div>








        <section class="container2">

            <div class="item-equipe">
                <img src="<?php PROJECT_FOLDER ?> assets/Hamilton.jpeg" alt="Image 5">
                <h2 class="title">HAMILTON</h2>
                <p class="text-equipe"> Games Developer </p>

                <p class="logo"><a href="https://facebook.com" class="fa fa-facebook"></a><a href="https://twitter.com/" class="fa fa-twitter"></a><a href="https://www.pinterest.fr/" class="fa fa-pinterest"></a></p>
            </div>

            <div class="item-equipe">
                <img src="<?php PROJECT_FOLDER ?> assets/Marion.jpeg" alt="Image 6">
                <h2 class="title">MARION</h2>
                <p class="text-equipe">Game Designer</p>

                <p class="logo"><a href="https://facebook.com" class="fa fa-facebook"></a><a href="https://twitter.com/" class="fa fa-twitter"></a><a href="https://www.pinterest.fr/" class="fa fa-pinterest"></a></p>
            </div>

            <div class="item-equipe">
                <img src="<?php PROJECT_FOLDER ?> assets/picArnold.jpeg" alt="Image 4">
                <h2 class="title"> ARNOLD</h2>
                <p class="text-equipe">Game Developer</p>

                <p class="logo"><a href="https://facebook.com" class="fa fa-facebook"></a><a href="https://twitter.com/" class="fa fa-twitter"></a><a href="https://www.pinterest.fr/" class="fa fa-pinterest"></a></p>


            </div>

        </section>














    </body>



    <?php
    require_once SITE_ROOT . 'partials/footer.php';
    ?>
</section>




</html>