
<?php require_once SITE_ROOT . 'partials/head.php'?>
<?php $current_page = basename($_SERVER['PHP_SELF']);
?>

<header>
            
            <div class="wrapper">
                <div class="id1">
                <p>The Power of Memory</p>
                </div>
                <div class = "id2">
                    <nav>
                        <ul>
                            <li>
                            <a href="<?=PROJECT_FOLDER ?>index.php" <?php if ($current_page == 'index.php') : ?> style="color:orange;" <?php endif;?> >ACCUEIL</a>
                            </li>
                            <li>
                                <a href="<?=PROJECT_FOLDER ?>games/memory/index1.php"<?php if ($current_page == 'index1.php') : ?> style="color:orange;" <?php endif;?>>JEU</a>
                            </li>
                            <li>
                                <a href="<?=PROJECT_FOLDER ?>games/memory/scores.php"<?php if ($current_page == 'scores.php') : ?> style="color:orange;" <?php endif;?>>SCORES</a>
                            </li>
                            <li>
                                <a href="<?=PROJECT_FOLDER ?>contact.php"<?php if ($current_page == 'contact.php') : ?> style="color:orange;" <?php endif;?>>NOUS CONTACTER</a>
                            </li>
                            <li>
                                <a href="<?=PROJECT_FOLDER ?>login.php"<?php if ($current_page == 'login.php') : ?> style="color:orange;" <?php endif;?>>SE CONNECTER</a>
                            </li>
                            <li>
                            <a href="<?=PROJECT_FOLDER ?>register.php"<?php if ($current_page == 'register.php') : ?> style="color:orange;" <?php endif;?>>S'INSCRIRE</a>
                            </li>
                            <li>
                                <a href="<?=PROJECT_FOLDER ?>myAccount.php"<?php if ($current_page == 'myAccount.php') : ?> style="color:orange;" <?php endif;?>>MON PROFIL</a>
                            </li>
                        </ul>
                    </nav>		
                </div>
            </div>
            
        </header>