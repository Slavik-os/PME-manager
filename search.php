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
    <h1 class="text-primary">Rechercher un employé</h1>
    <form class="row g-3" method="POST" action="searching.php" >

    <div class="col-md-6">
       <label for="search" class="form-label">Rechercher </label>
       <input type="text" class="form-control" id='validationCustom01'  name="searchBy" placeholder="...." required>
    </div>
<br>
    <div class="d-grid gap-3">
    <input type="submit" id='submit'  class="btn btn-lg bg-primary text-white" name="submit" value="Recherch">
    </div>
    </form>
</div>
<br>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script>
</script>
</body>
</html>

