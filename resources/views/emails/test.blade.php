<!DOCTYPE html>
<html>
<head>
	
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="background: #e5e5e5; padding: 30px;" >

<div class="card mb-3">
  <img src="{{ asset('download.jpg') }}" class="card-img-top" alt="...">
  <div class="card-body">
      <h2 style="text-align:center">Bonjour M./Mme  {{ $student->name }}</h2>
			<h3 style="text-align:center">L'élève <em style="color:blue"> {{ $student->name }} {{ $student->firstname }} </em>a <em style="color:red">{{ $student->notes }} </em> en  <em style="color:red">Mathématique</em> pour le devoir du semestre.</h3>
			
			<h5 style="text-align:center">Merci de nous faire confiance!</h5>
      <h6 style="text-align:center">Le directeur</h6>
    
  </div>
</div>

</body>
</html>