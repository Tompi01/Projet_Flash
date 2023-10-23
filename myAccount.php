<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/main.css" >
        <link rel="stylesheet" href="assets/footer.css" >
        <link rel="stylesheet" href="assets/header.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>account</title>
    </head>
<section class="acc">
    <body>

        <!-------------------------------------------CHAT---------------------------------------------------->
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
    
        <!-------------------------------------------FIN CHAT---------------------------------------------------->
        <header>
            
            <div class="wrapper">
                <div class="id1">
                <p>The Power of Memory</p>
                </div>
                <div class = "id2">
                    <nav>
                        <ul>
                            <li>
                                <a href="index.html">ACCUEIL</a>
                            </li>
                            <li>
                                <a href="chooseTheme.html">JEU</a>
                            </li>
                            <li>
                                <a href="scores.html">SCORES</a>
                            </li>
                            <li>
                                <a href="contact.html">NOUS CONTACTER</a>
                            </li>
                            <li>
                                <a href="login.html">SE CONNECTER</a>
                            </li>
                            <li>
                            <a href="register.html">S'INSCRIRE</a>
                            </li>
                            <li>
                                <a href="myAccount.html">MON PROFIL</a>
                            </li>
                        </ul>
                    </nav>		
                </div>
            </div>
            
        </header>
        <div class="banner">
            <h1>Mon profil</h1>
        </div>
        <section class="d-flex">
            <div class="wrrapper">
                <form>
                    <h2>Changer d'Email</h2>
                    <input class="en" type="email" placeholder="Ancien Email" name="email">
                    <input class="en" type="email" placeholder="Nouveau Email" name="email">
                    <input class="en" type="password" placeholder="Mot De Passe" name="password">
                    <button type="submit" class="button">valider</button>
                </form>

            </div>
            <div>
                <form>
                    <h2>Changer de mot de passe</h2>
                    <input class="en" type="password" placeholder="Ancien mot de passe" name="email">
                    <input class="en" type="password" placeholder="Nouveau mot de passe" name="email">
                    <input class="en" type="password" placeholder="Confirmer le nouveau mot de passe" name="password">
                    <button type="submit" class="button">valider</button>
                </form>
            </div>
        </section>
        <footer class="foo"> 
            <section class="d-flex">
                <div class="wrrapper">
                    <h2>Information</h2>
                    <h6>Quisque commodo facilisis purus,interdum volutpat arcu viverra sed.</h6>
                    <p> <span class="orange">Tel:</span> 06 05 04 03 02</p>
                    <br>
                    <p><span class="orange"> Email :</span>:support@powerofmemory.com</p>
                    <br>
                    <p><span class="orange">Location :</span> Paris</p>
                    <br>
                    <a href="https://facebook.com"><img src="pics/facebook2.png" alt="facebook" class="image1"></a>
                    <a href="https://twitter.com"><img src="pics/tweeter2.png" alt="twitter" class="image1"></a>
                    <a href="https://google.com"><img src="pics/google2.png" alt="google" class="image1"></a>
                    <a href="https://pinterest.fr"><img src="pics/pinterest2.png" alt="pinterest" class="image1"></a>
                    <a href="https://instagram.com"><img src="pics/instagram2.png" alt="instagram" class="image1"></a>
                    <div class="copyright">Copyright © 2022 Tous droits réservés.</div>
                </div>
                <div class="wrrapper">
                    <h2 class="droits">Power of memory</h2>
                    <p><span class="orangep">.</span>  <a href="chooseTheme.html">Jouer !</a> </p>
                    <p><span class="orangep">.</span> <a href="scores.html">Les Scores</a> </p>
                    <p><span class="orangep">.</span>  <a href="contact.html">Nous Contacter</a> </p>
                </div>
            </section>
        </footer>
        </body>
</section>
</html>