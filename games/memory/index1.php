<!DOCTYPE html>
<html lang="en">

<?php 
require_once '../../utils/common.php';
require_once SITE_ROOT. 'partials/head.php';
require_once SITE_ROOT. 'partials/header.php';
?>

<section class="theme">
  <body>
    <section class="theme">

      <!-------------------------------------------BANNER---------------------------------------------------->

      <div class="banner">
        <h1>JEU</h1>
      </div>

      <!-------------------------------------------FIN BANNER---------------------------------------------------->


<div id="background-theme" class="theme-background">
      <div id="themeCarte">
        <div id="themeClassique">
          <span>Sélectionnez le niveau :</span>
          <select id="levelSelect">
            <option value="4">4x4</option>
            <option value="8">8x8</option>
            <option value="12">12x12</option>
          </select>
          <span>Sélectionnez le thème :</span>
          <select id="themeSelect">
            <option value="Default">Thème League of Legends</option>
            <option value="Pokemon">Thème Pokemon</option>
            <option value="ClashRoyale">Thème ClashRoyale</option>
          </select>






        </div>
     <br><br><button id="generateGrid">Jouer !</button>
        <div id="victoryMessage" style="display: none;">
            <br> <br><h1>Félicitations ! Vous avez gagné !</h1>
          </div>
      </div>

      <div id="timeDisplay">
        <span>Temps : </span>
        <span id="hours">0</span> h
        <span id="minutes">0</span> min
        <span id="seconds">0</span> s
      </div>



      <div class="grid-container">

      <table id="memoryGrid"></table> 

      </div>

</div>




    </section>

    <script src="../../styles/script.js"></script>
  </body>
</html>
