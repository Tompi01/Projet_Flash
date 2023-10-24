



<?php 
require_once SITE_ROOT. 'partials/head.php';
?>





<div class="chat-container">
            <div class="chat-header">
                Messagerie
            </div>
            <div class="chat-messages">

                <div class="message">
                    <div class="message-sender">Temayoo</div>
                    <div class="message-content">Salut ! Comment ça va ?</div>
                    <div class="message-statu">Aujourd'hui à <strong>15h16</strong> vu  </div>
                </div>
                <div class="message">
                    <div class="message-sender2">Tom</div>
                    <div class="message-content2">Ça va bien, merci  et toi ?</div>
                    <div class="message-statu2">Aujourd'hui à <strong>15h18</strong> vu   </div>
                </div>
                <div class="message">
                    <div class="message-sender">Temayoo</div>
                    <div class="message-content"> Très bien aussi, tu fais quoi ?</div>
                    <div class="message-statu">Aujourd'hui à <strong>15h22</strong>  vu  </div>
                </div>

                <div class="message">
                    <div class="message-sender2">Tom</div>
                    <div class="message-content2">Je joue à League of Legend et toi ? </div>
                    <div class="message-statu2">Aujourd'hui à <strong>15h24</strong>  vu  </div>
                </div>

                <div class="message">
                    <div class="message-sender">Temayoo</div>
                    <div class="message-content"> je fais une partie de memory, il est trop bien ! </div>
                    <div class="message-statu">Aujourd'hui à <strong>15h26</strong> vu </div>
                </div>

                <div class="message">
                    <div class="message-sender2"> Tom </div>
                    <div class="message-content2">Salut ça va Aurelien  </div>
                    <div class="message-statu2">Aujourd'hui à <strong>15h28</strong>  vu  </div>
                </div>

                <div class="message">
                    <div class="message-sender2"> Aurelien </div>
                    <div class="message-content2">Nickel et toi Tom ?  </div>
                    <div class="message-statu2">Aujourd'hui à <strong>15h30</strong>  remis  </div>
                </div>

                </div>
            <div class="chat-input">
                <input type="text" id="message-input" placeholder="Saisissez votre message...">
                <button id="send-button">Envoyer</button>
            </div>
        </div>



<?php 
require_once SITE_ROOT. 'partials/footer.php';
?>
