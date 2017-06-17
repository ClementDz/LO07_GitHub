  <!--Page d'accueil du site-->
  <html>
  <head>
    <link href="../CSS/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../CSS/bootstrap/js/bootstrap.js"></script> 
  </head>

  <body>
    <div class="container">
      <header class="page-header">
        <div class="col-sm-12">
          <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="accueil.php">Testeur de Cursus</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="page_etudiant.php">Etudiants</a></li>
                <li><a href="page_UV.php">UEs</a></li>
                <li><a href="reglements.php">Reglements</a></li>
                <li><a href="a_propos.php">A propos de nous</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <section class="row">
        <div class="col-sm-12">
          <h1>Bienvenue sur le testeur de cursus de l'UTT</h1>
          <p class="lead">Vous pouvez ajouter vos cursus, c'est à a dire vos anciens cours à partir de l'onglet étudiant et calculer vos crédits manquants.
          </p>
          <div class="Photo_utt">
            <img src="../Images/utt.png" width="870" height="230"/>
          </div>
          <p class="lead"> Pour commencer, entrez un nouvel étudiant, en cliquant <a href="page_etudiant.php" class="button"> ici</a> </p>
        </div>
      </section>
    </div>
  </body>
  </html>