<!DOCTYPE html>
<html lang="en">


<?php 
require_once 'utils/common.php';
require_once SITE_ROOT. 'partials/head.php';
require_once SITE_ROOT. 'partials/header.php';
?>

<section class="theme">
    <body>




    <!-------------------------------------------BANNER---------------------------------------------------->

    <div class="banner">
        <h1>Memory Classique Level 1</h1>
    </div>

    <!-------------------------------------------FIN BANNER---------------------------------------------------->



    <!-------------------------------------------DIFFERENT LEVEL---------------------------------------------------->
    <div class="different-level">
        <div class="level1"><p><a href="chooseTheme.html"><strong>THEME</strong></a></p></div>
        <div class="level2"><p><a href="memory2T1.html"><strong>LEVEL II</strong></a></p></div>
        <div class="level3"><p><a href="memory3T1.html"><strong>LEVEL III</strong></a></p></div>
    </div>
    <!-------------------------------------------FIN DIFFERENT LEVEL ---------------------------------------------------->


    <!-------------------------------------------SCORE MEMORY---------------------------------------------------->
    <div class="score-memory">

        <p><strong>Votre Score :  </strong>200 Points </p>
        <p><strong>Temps écoulé : </strong>00:05</p>
    </div>
    <!-------------------------------------------FIN SCORE MEMORY---------------------------------------------------->


    <!-------------------------------------------GAME---------------------------------------------------->
    <center>
    <table class="card-memory">
        
        <tr>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
        </tr>
        <tr>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
        </tr>
        <tr>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
        </tr>
        <tr>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
            <td><img src="<?php PROJECT_FOLDER ?> assets/carte.jpg"></td>
        </tr>


    </table>
    </center>

    <!-------------------------------------------FIN GAME ---------------------------------------------------->


    
    </body>
    <!-------------------------------------------FOOTER---------------------------------------------------->

<?php 
require_once SITE_ROOT. 'partials/footer.php';
?>

    <!-------------------------------------------FIN FOOTER---------------------------------------------------->

</section>
</html>