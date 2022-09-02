<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
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
          <a class="nav-link" aria-current="page" href="{{ route('accueil') }}">Accueil</a>
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
    <h2 style="text-align:center">Mettre à jour les notes sur <span style="color:#123c61">Send</span><span style="color:#B18539">msg</span> !</h2>
     <br>
           
     <form action="{{ route('modificationnotes') }}" method="POST">
          @csrf()
       <table border="4" style="margin-top:2em;" class="table table-striped table-hover">
       <!--div>
            @if($errors->any())
                <h5 class="alert alert-danger" role="alert">Les erreurs suivantes existent dans votre fichier Excel. Veillez les corrigés. Voir la <a href="#">documentation</a>.</h5>
                <ol>
                    @foreach($errors->all() as $error )

                    <li class="alert alert-danger" role="alert">{{$error}}</li>

                    @endforeach
                </ol>
            @endif

        </div-->
            <!--form action="{{ route('importnote') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control form-control-lg" type="file" name="student_files" id="" accept=".xlsx,.xls,.csv" required>
                <br>
                <input type="submit" class="btn btn-primary" value="Upload">
            </form-->
                <thead>
                        <tr class="fst-italic" >
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prénoms</th>
                            <th>Matricules</th>
                            <th>Notes</th>
                            <th>Nouvelles Notes</th>
                            <!--th>Messages</th-->
                            <!--th></th>
                            <th></th-->
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
                            <td>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"></label>
    <input type="number" value="{{ $student->notes }}" name="notes[]" min="0" max="20"class="form-control w-50" id="exampleInputPassword1">
    <input type="hidden" name="students[]" value="{{$student->id}}" min="0" max="20"class="form-control w-50" id="exampleInputPassword1">
  </div>
                            </td>
                            <!--td>{{$student->msg}}</td>
                            <td><a><button type="button" class="btn btn-success">Modifier la note</button></a></td>
                            <td><a href="{{ url('edit-users/'.$student->matricule)}}"><button type="button" class="btn btn-danger">Supprimer l'élève</button></a></td-->

                        </tr>

                        @empty
                        <tr>
                            <td colspan="6">No Students</td>
                        </tr>

                        @endforelse

                </tbody>

        </table>

        <div class="modal-footer">
        <a href="{{ route('accueil') }}" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Retour à l'Accueil</a>
        <button type="submit" class="btn btn-success">Enregistrer les notes.</button>
      </div>
        </form>
        

    
    <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="{{ route('accueil') }}" class="nav-link px-2 text-muted">Accueil</a></li>
      <li class="nav-item"><a href="{{ route('documentation') }}" class="nav-link px-2 text-muted">Documentation</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 By <span style="color:#123c61">Send</span><span style="color:#B18539">msg</span></p>
    </footer>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>