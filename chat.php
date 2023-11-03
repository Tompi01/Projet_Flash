<?php
require_once SITE_ROOT . 'partials/head.php';
?>



<div class="chat-container">
    <div class="chat-header">Messagerie</div>
    <div class="chat-messages">

        <?php
        if (isset($_SESSION['pseudo'])) {
            $db = connectToDbAndGetPdo();
            $sqlrequest = $db->prepare('SELECT * FROM message
        INNER JOIN utilisateur AS u1 ON message.id_expediteur = u1.id order by message.id ASC');
            $sqlrequest->execute();
            $results = $sqlrequest->fetchAll();

            foreach ($results as $result) {
                if ($result->id_expediteur != $_SESSION['userId']) :
        ?>
                    <div class="message">
                        <div class="message-sender2"><?= $result->pseudo ?></div>
                        <div class="message-content2"><?= $result->message ?></div>
                        <div class="message-statu2"> <?= $result->date_heure_message ?></div>
                    </div>
                <?php
                else :
                ?>
                    <div class="message">
                        <div class="message-sender"> <?= $result->pseudo ?></div>
                        <div class="message-content"><?= $result->message ?></div>
                        <div class="message-statu"><?= $result->date_heure_message ?></div>
                    </div>
        <?php
                endif;
            }
        }

        ?>


    </div>
    <div class="chat-input">
        <form id="formMessage">
            <input type="text" id="message-input" name="envoie_msg" placeholder="Saisissez votre message...">
            <button id="send-button">Envoyer</button>
        </form>
    </div>
</div>
<script>
    var pseudo = '<?= $_SESSION['pseudo'] ?>';
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./styles/chat.js">
</script>