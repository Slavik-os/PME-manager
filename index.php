<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container-fluid p-1 bg-primary text-white text-center">
<a href="new.php"><button type="button" class="btn btn-light btn-lg ">Ajouter un employé</button></a>
<a href="search.php"><button type="button" class="btn btn-dark btn-lg ">Rechercher un employé</button></a>
</div>
<?php
error_reporting(0);
include 'config.php';
$sql = 'SELECT matricule,firstName,lastName,em_date,departement,salaire,fonction,photo FROM employee_table';
$result = $con->query($sql);
?>
<div style="height:10vh">
<div class="container-fluid p-1 text-white text-center h-75 text-dark">
    <h1 class="bg-light text-dark">Gestion des employés PME</h1>
</div>
</div>
 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer cet employé ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="del_query()">Effacer</button>
      </div>
    </div>
  </div>
</div>
<div id="message-box-success" style="display:none">
    <div style="padding: 5px;">
        <div id="inner-message" class="alert alert-success">
		<strong>modifié avec succès</strong>
        </div>
    </div>
</div>

<div id="message-box" style="display:none">
    <div style="padding: 5px;">
        <div id="inner-message" class="alert alert-danger">
		<strong>Remplissez les entrées avec des informations valides ! </strong>
        </div>
    </div>
</div>
<div class="table-responsive">
<table class="table table-hover">
    <thead>
      <tr>
        <th  class="bg-primary text-white">#Matricule</th>
        <th  class="bg-primary text-white">Nom</th>
        <th  class="bg-primary text-white">Prénom</th>
        <th  class="bg-primary text-white">Date</th>
        <th  class="bg-primary text-white">Département</th>
        <th  class="bg-primary text-white">Salaire</th>
        <th  class="bg-primary text-white">Fonction</th>
        <th  class="bg-primary text-white">Photo</th>
        <th  class="bg-primary text-white">Utils</th>
      </tr>
    </thead>
    <tbody>

<?php 
	while($row=$result->fetch_assoc()){
	 echo '<tr>
		<td>'.$row['matricule'].'</td>
		<td>'.$row['firstName'].'</td>
		<td>'.$row['lastName'].'</td>
		<td>'.$row['em_date'].'</td>
		<td>'.$row['departement'].'</td>
		<td>'.$row['salaire'].'</td>
		<td>'.$row['fonction'].'</td>
		<td><img src="'.$row['photo'].'"></td>
		<td><i class="fa fa-edit" onclick="edit(this)" name="edit"></i> <i class="fa fa-trash btn"  data-toggle="modal" data-target="#exampleModal" onclick="del(this)"></i></td>
		</tr>';
	}	
?>

    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
let err_lst = []
let dataUser = null ;
let old_matricule = null ; 
function changeIcon(elem,rm_icon,ch_icon,setAttr,setAttrValue){
	elem.classList.remove(rm_icon);
	elem.classList+=' '+ch_icon;
	elem.setAttribute(setAttr,setAttrValue);

}

let edit =  (elem)=>{
	let  dataUser = elem.parentElement.parentElement.children ;
	 old_matricule= dataUser[0].innerHTML;
	dataUser[0].innerHTML = '<input type="text" value="'+old_matricule+'">';

	let old_firstName= dataUser[1].innerHTML;
	dataUser[1].innerHTML = '<input type="text" value="'+old_firstName+'">';

	let old_lastName= dataUser[2].innerHTML;
	dataUser[2].innerHTML = '<input type="text" value="'+old_lastName+'">';

	let old_date = dataUser[3].innerHTML ;
	dataUser[3].innerHTML = '<input type="date" value="'+old_date+'">';
	
	let old_depar = dataUser[4].innerHTML ;
	
	switch(old_depar) {
		case 'IT' :
			dataUser[4].innerHTML = `
			     <select class="form-select" aria-label="Default select example" title='choisir une departement' name='department' required>
			    <option selected disabled value=''>Choisir le Département</option>
			    <option value="IT" selected>Technologies de L'information</option>
			    <option value="RH">Ressources humaines</option>
			    <option value="finance">Finance</option>
			    </select>`;
			break;


		case 'RH' : 
			dataUser[4].innerHTML = `
			     <select class="form-select" aria-label="Default select example" title='choisir une departement' name='department' required>
			    <option selected disabled value=''>Choisir le Département</option>
			    <option value="IT" >Technologies de L'information</option>
			    <option value="RH" selected>Ressources humaines</option>
			    <option value="finance">Finance</option>
			    </select>`;
			break;
 		case 'finance' :
			dataUser[4].innerHTML = `
			     <select class="form-select" aria-label="Default select example" title='choisir une departement' name='department' required>
			    <option selected disabled value=''>Choisir le Département</option>
			    <option value="IT" >Technologies de L'information</option>
			    <option value="RH" >Ressources humaines</option>
			    <option value="finance" selected>Finance</option>
			    </select>`;
			break;
	}

	let old_salary = dataUser[5].innerHTML; 
	dataUser[5].innerHTML = '<input type="number" value="'+old_salary+'">';

	let old_fonction = dataUser[6].innerHTML; 
	dataUser[6].innerHTML = '<input type="text" value="'+old_fonction+'">';
	changeIcon(elem,'fa-edit','fa-check','onclick','check(this)');
	}	
	



let check = (elem)=>{

	
	document.getElementById("message-box-success").setAttribute('style','display:none');					
	function check_valid(str,reg) {
		let regex = new RegExp(reg);
		if(!regex.test(str.children[0].value)) {
			str.children[0].style.borderColor="red";
			err_lst.push('error');
		}
			
	}
	dataUser = elem.parentElement.parentElement.children ;
	data = {
		'old_mat'   : old_matricule ,
		'case' :  'edite' ,
		'matricule' : dataUser[0].children[0].value,
		'firstName' : dataUser[1].children[0].value,
		'secondName' : dataUser[2].children[0].value,
		'date_em'    : dataUser[3].children[0].value,
		'department': dataUser[4].children[0].value,
		'salaire':dataUser[5].children[0].value,
		'fonction':dataUser[6].children[0].value,
		};

	check_valid(dataUser[0],'[a-z][0-9]{1,3}|[A-Z][0-9]{1,3}');
	check_valid(dataUser[1],'\\w{1,100}');
	check_valid(dataUser[2],'[Aa-zZ]{4,}|[Aa-zZ]{1,}\s[Aa-zZ]{2,}|[A-Z]{4,}');
	check_valid(dataUser[6],'\\w{1,10}');
	
	if (err_lst.length !=0){
		document.getElementById('message-box').setAttribute('style','display:block');
		
	}else {
	 document.getElementById('message-box').setAttribute('style','display:none');

	 dataUser[0].innerHTML = data.matricule;
	 dataUser[1].innerHTML = data.firstName;
	 dataUser[2].innerHTML = data.secondName;
	 dataUser[3].innerHTML = data.date_em ;
	 dataUser[4].removeChild(dataUser[4].firstChild);
	 dataUser[4].innerHTML = data.department;
	 dataUser[5].innerHTML = data.salaire;
	 dataUser[6].innerHTML = data.fonction;
         changeIcon(elem,'fa-check','fa-edit','onclick','edit(this)');
	}

	$.ajax({
		url:'ajax.php',
		method:'POST',
		data:{data:JSON.stringify(data)},
		success :function(res){
			document.getElementById("message-box-success").setAttribute('style','display:block');					
			console.log(res);
		}
	});

	document.location.reload(true);	
	}


	
	
let del = (elem)=>{
          $('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').trigger('focus')
          });
		del_query = ()=>{

	dataUser = elem.parentElement.parentElement.children ;

	let src = dataUser[7].children[0].src;
	src_photo = src.split("");
	src_photo.splice(0,25);
	src_photo = src_photo.join("");
	data = {
		'old_mat'   : old_matricule ,
		'case' :  'delete' ,
		'matricule' : dataUser[0].innerHTML,
		'firstName' : dataUser[1].innerHTML,
		'secondName' : dataUser[2].innerHTML,
		'date_em'    : dataUser[3].innerHTML,
		'department': dataUser[4].innerHTML,
		'salaire':dataUser[5].innerHTML,
		'fonction':dataUser[6].innerHTML,
		 'photo':src_photo
		};
	$.ajax({
		url:'ajax.php',
		method:'POST',
		data:{data:JSON.stringify(data)},
		success :function(res){
			document.getElementById("message-box-success").setAttribute('style','display:block');					
			console.log(res);
		}
	});

//	document.location.reload(true);	

		
	}
}



</script>
</body>
</html>
