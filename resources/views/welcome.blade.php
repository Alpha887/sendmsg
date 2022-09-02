<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Laravel import</title>
</head>
<body class="p-3 mb-2 bg-light.bg-gradient" data-spy="scroll"  data-target="#navbarko">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span style="color:#123c61">Send</span><span style="color:#B18539">msg</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('documentation') }}">Documentation</a>
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
    <h2 style="text-align:center">Bienvenue sur <span style="color:#123c61">Send</span><span style="color:#B18539">msg</span> !</h2>
     <br>

       <table border="4" style="margin-top:2em;" class="table table-striped table-hover">
       <div>
            @if($errors->any())
                <h5 class="alert alert-danger" role="alert">Les erreurs suivantes existent dans votre fichier Excel. Veuillez les corriger. Voir la <a href="{{ route('documentation') }}">documentation</a>.</h5>
                <ol>
                    @foreach($errors->all() as $error )

                    <li class="alert alert-danger" role="alert">{{$error}}</li>

                    @endforeach
                </ol>
            @endif

        </div>

       
<h3 style="text-align:center">Importez votre fichier excel contenant les informations suivant <a href="{{ asset('Model.xlsx') }}" style="text-decoration:none; color:blue;"> ce modèle</a>!</h3>
<br>
            <form action="/import" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control form-control-lg" type="file" name="student_file" id="" accept=".xlsx,.xls,.csv" required>
                <br>
                <div >
                <a href="{{ asset('Model.xlsx') }}" type="button" class="btn btn-primary" data-bs-dismiss="modal">Télécharger le modèle</a>
                <input type="submit" class="btn btn-success" value="Envoyer le fichier excel">
                </div>
            
            </form>
            <h2 style="text-align:center">Information des élèves</h2>
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
                <thead>
                        <tr class="fst-italic" >
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prénoms</th>
                            <th>Matricule</th>
                            <th>Notes</th>
                            <th>Contacts</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                </thead>

                <tbody class="fw-lighter">
                        @php
                            $i=0;
                        @endphp

                        @forelse ($students as $student)

                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->firstname}}</td>
                            <td>{{$student->matricule}}</td>
                            <td>{{$student->notes}}</td>
                            <td>{{$student->mobile}}</td>
                            <td>{{$student->email}}</td>
                            <td><a href="{{ route('sendmail',['id'=>$student->id]) }}" class="btn btn-secondary" type='button'>Envoyer le mail</a></td>
                            <td>

                                                                      <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$student->id}}">
                                            Modifier la note
                                          </button>

                                          


                                          <!-- Modal -->
                                          <div class="modal fade" id="exampleModal{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Modification de note</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  
                                                <form action="{{ route('updatestudent',['id'=> $student->id]) }}" method="POST" >
                                                @csrf
                                                <div class="mb-3">
                                                      <h5 style="text-align:center">Nom et Prénoms*</h5>
                                                      <h6 style="text-align:center">{{ $student->name }}  {{ $student->firstname }}</h6>
                                                      <h5 style="text-align:center">Anciènne note*</h4>
                                                      <h6 style="text-align:center">{{ $student->notes }}</h6>

                                                      <label  class="form-label">Entrez la nouvelle note.</label>
                                                      <input type="number" min="0" max="20" name="notes" class="form-control" id="notes" aria-describedby="emailHelp">
                                                      <div id="emailHelp" class="form-text">Entez que des nombres compris entre 0 et 20 !</div>
                                                    </div>
                                                    <!--div class="mb-3">
                                                      <label for="exampleInputPassword1" class="form-label">Password</label>
                                                      <input type="password" class="form-control" id="exampleInputPassword1">
                                                    </div-->
                                                    <!--div class="mb-3 form-check">
                                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                    </div-->
                                                    <button type="submit" class="btn btn-success">Actualiser la note !</button>
                                                  </form>

                                                </div>
                                                <!--div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                                </div-->
                                              </div>
                                            </div>
                                          </div>

                                          
                            </td>
                              
                            <td>
                            
                            <form method="POST" class="d-flex justify-content-center" action="{{ route('Destroy', ['id'=> $student]) }}">
                                                                @csrf()
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger me-3">Suprimer l'élève</button>
                            </form>
 

                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="6">No Students</td>
                        </tr>

                        @endforelse

                </tbody>

        </table>

        <div>
        <a href="{{ route('modification') }}" type="button" class="btn btn-primary" data-bs-dismiss="modal">Modifier les notes</a>
        <button type="button" class="btn btn-success">Envoyer les messages</button>
      </div>
			</div>
    
    <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Accueil</a></li>
      <li class="nav-item"><a href="{{ route('documentation') }}" class="nav-link px-2 text-muted">Documentation</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 By <span style="color:#123c61">Send</span><span style="color:#B18539">msg</span></p>
    </footer>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>