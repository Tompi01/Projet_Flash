<?php
require_once SITE_ROOT . 'partials/head.php';
?>





<div class="chat-container">
    <div class="chat-header">Messagerie</div>
    <div class="chat-messages">

        <?php
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
                    <div class="message-statu2">Aujourd'hui à <strong>15h18</strong> vu </div>
                </div>
            <?php
            else :
            ?>
                <div class="message">
                    <div class="message-sender"> <?= $result->pseudo ?></div>
                    <div class="message-content"><?= $result->message ?></div>
                    <div class="message-statu">Aujourd'hui à <strong>15h16</strong> vu </div>
                </div>
        <?php
            endif;
        }


        ?>


    </div>
    <div class="chat-input">
        <form method="post">
            <input type="text" id="message-input" name="envoie_msg" placeholder="Saisissez votre message...">
            <button id="send-button">Envoyer</button>
        </from>
            <?php
            if (isset($_POST["envoie_msg"])) {
                $insertionDonnee = $pdo->prepare('INSERT INTO message (id_jeu, id_expediteur, message) 
            VALUES (:jeu, :expediteur, :message)');
                $insertionDonnee->execute([':jeu' => 1, ':expediteur' => $_SESSION['userId'], ':message' => $_POST['envoie_msg']]);
            }
            ?>
    </div>
</div>