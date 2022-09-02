<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span style="color:#123c61">Send</span><span style="color:#B18539">msg</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{ route('accueil') }}">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Documentation</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Recherche</button>
      </form>
    </div>
  </div>
</nav>

<br>

<div class="card text-center">
  <div class="card-header">
    <h2>Documentation</h2> 
  </div>
  <div class="card-body">
    <h5 class="card-title">Fonctionalités</h5>
        <div class="card-text"> 
            <p>Enregistrement des informations des élèves</p>
            <p>Modification des notes des élèves</p>
            <p>Supression des notes</p>
            <p>Envoi d'email</p>
        </div>
        <br>

    <h5 class="card-title">Fichier Excel</h5>
    <p class="card-text">Respectez rigoureusement le format imposé ci-dessous.</p>
    <p class="card-text">Le non respect de ce format peut être à l'origine de plusieurs types d'erreur.</p>
<br>
    <h5 class="card-title">Les Erreurs d'importation du fichier Excel</h5>
    <p class="card-text">Il y a erreur lorsque:</p>
    <p class="card-text">Le format du fichier excel à télécharger n'est pas respecté!</p>
    <p class="card-text">Une case est vide dans le fichier excel en ce qui concerne les informations de l'élève</p>
    <p class="card-text">Une information contenue dans la base de donnée est identique à une nouvelle information contenue dans le fichier excel</p>
    <br>
    <h5 class="card-title">Nouvelles insersions</h5>
    <p class="card-text">Pour enregister de nouveaux élèves il faudra:</p>
    <p class="card-text">Télécharger le model excel</p>
    <p class="card-text">Enregistrer les informations des nouveaux élèves dans le fichier téléchargé</p>
    <p class="card-text">Enregistrer et importer sur la plateforme <a class="navbar-brand" href="#"><span style="color:#123c61">Send</span><span style="color:#B18539">msg</span></a></p>
   <br>
    <a href="{{ asset('Model.xlsx') }}" class="btn btn-primary">Télécharger le modèle excel</a>
  </div>
  <br>
  <div class="card-footer text-muted">
    Mise à jour le 02/09/2022
  </div>

  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="{{ route('accueil') }}" class="nav-link px-2 text-muted">Accueil</a></li>
      <li class="nav-item active"><a href="#" class="nav-link px-2 text-muted">Documentation</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 By <span style="color:#123c61">Send</span><span style="color:#B18539">msg</span></p>
    </footer>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</div>
</body>
</html>