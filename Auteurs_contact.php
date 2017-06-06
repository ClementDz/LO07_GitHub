<html>
    <head>
        <title>Gestion de cursus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <h1><a href="#">Testeur de cursus</a></h1>
                </div>
                <div id="slogan">
                    <h2>Design by TEMPLATED</h2>
                </div>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="Accueil.php">Accueil</a></li>
                    <li><a href="Cursus/Liste_cursus.php">Futurs cours</a></li>
                    <li><a href="Etudiant/Ajout_etu.php"> Etudiants </a></li>
                    <li><a href="Etudiant/Liste_etudiants.php"> Associer étu/cursus</a></li>
                    <li><a href="Cursus/cours_enregistres.php">Cours enregistres</a></li>
                    <li><a href="Auteurs_contact.php">Auteurs </a></li>
                    <li><a href="Sources.php">Sources </a></li>
                    <li><a href="Reglement/Les reglements.php">Règlements</a></li>
                </ul>
                <br class="clearfix" />
            </div>
            <p><h1>Les créateurs de ce site</h1></p>
        <div id="splash">
            <img class="pic" src="images/Durnez.jpg" width="100" height="150" title="Clément Durnez" />
            <a href="https://www.linkedin.com/in/clement-durnez" class="fa fa-linkedin"></a>
            <img class="pic" src="images/dubois.jpg" width="100" height="150" title="Sir Dubois" />
        </div>

        <p><h1>Notre école</h1></p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2655.742597559738!2d4.0632969158150285!3d48.269327849954216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ee99a0cb4a3a57%3A0x42148ce859fa2d02!2sUniversit%C3%A9+de+Technologie+de+Troyes!5e0!3m2!1sfr!2sfr!4v1493472184108" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>



    <p><h1>Nous contacter</h1></p>
<!-- Voir sur internet comment ajouter ajouter formulaire qui envoie 
2 mails -->
<form id="contact" method="post" action="form_contact_action.php">
    <fieldset>
        <legend>Vos coordonnées</legend>
        <p><label for="nom">Nom :</label><input type="text" id="nom" name="nom" tabindex="1" /></p>
        <p><label for="email">Email :</label><input type="email" id="email" name="email" tabindex="2" /></p>
    </fieldset>

    <fieldset>
        <legend>Votre message :</legend>
        <p><label for="objet">Objet :</label><input type="text" id="objet" name="objet" tabindex="3" /></p>
        <p><label for="message">Message :</label><textarea id="message" name="message" tabindex="4" cols="30" rows="8"></textarea></p>
    </fieldset>

    <div><input type="submit" name="envoi" value="Envoyer le formulaire !" /></div>
</form>

</body>
</html>

<?php
?>
