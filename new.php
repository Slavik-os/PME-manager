<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-primary">Ajouter un Nouvel Employé </h1>
    <form class="row g-3" method="POST" action="fill.php" enctype="multipart/form-data">

    <div class="col-md-6">
       <label for="matricule" class="form-label">Matricule</label>
       <input type="text" class="form-control" id='validationCustom01'  name="matricule" pattern="^[a-z][0-9]{1,3}|[A-Z][0-9]{1,3}$" title="Une lettre au debut est 3 digits" required>
    </div>

    <div class="col-md-6">
    <label for="firstName" class="form-label">Nom</label>
    <input type="text" class="form-control" id='validationCustom01' pattern="[a-zA-Z]{4,}|[a-zA-Z]{1,}\s[a-zA-Z]{2,} |[A-Z]{2,}" title="entrez 4 lettres au moins"  name="firstName" required>
     </div>
     
     <div class="col-md-6">
    <label for="secondName" class="form-label">Prénom</label>
    <input type="text" class="form-control" name="secondName" pattern="[a-zA-Z]{4,}|[a-zA-Z]{1,}\s[a-zA-Z]{2,}|[A-Z]{2,}" title="entrez 4 lettres au moins"  required>
     </div>
     
     <div class="col-md-6">
     <label for="secondName" class="form-label" >Département</label> 
     <select class="form-select" aria-label="Default select example" title='choisir une departement' name='department' required>
    <option selected disabled value=''>Choisir le Département</option>
    <option value="IT">Technologies de L'information</option>
    <option value="RH">Ressources humaines</option>
    <option value="finance">Finance</option>
    </select>
    </div>

    <div class="col-md-6">
     <label for="salary"  class="form-label" >Salaire</label> 
     <input type="number" class="form-control" name="salary" pattern='[0-9]{4,6}' min="1000" max="9999" title='enter 4 digits au mois' required> 
    </div>

    <div class="col-md-6">
    <label for="formFileDisabled" class="form-label">Ajouter une Photo</label>
    <input class="form-control" type="file" value="c:/uploads/1126105-fight-club.jpg" name="uploadFile" title='choisir une photo' required>
    </div>

     
     <div class="col-md-6">
    <label for="secondName" class="form-label">Date de naissance</label>
    <input type="date" class="form-control" name="Date" required>
     </div>


     <div class="col-md-6">
    <label for="secondName" class="form-label">Fonction</label>
    <input type="text" class="form-control" name="fonction" pattern="\w{1,10}"required>
     </div>

    <div class="d-grid gap-2">
    <input type="submit" id='submit'  class="btn btn-lg bg-primary text-white" name="submit" value="AJOUTER">
    </div>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script>
</script>
</body>
</html>
