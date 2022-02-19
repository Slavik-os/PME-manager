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
error_reporting(0);
include 'config.php';
require 'search.php';

$search_v = $_POST['searchBy'];
$sql = "SELECT matricule,firstName,lastName,em_date,departement,salaire,fonction,photo FROM employee_table as t  WHERE 
t.matricule='".htmlspecialchars($search_v)."' OR t.firstName='".htmlspecialchars($search_v)."' or t.departement='".htmlspecialchars($search_v)."'";
$result = $con->query($sql);
$row_get = mysqli_num_rows($result);


if($row_get > 0 ) {
echo "

"; 
while($row=$result->fetch_assoc()){

	 echo '<tr>
		<td>'.$row['matricule'].'</td>
		<td>'.$row['firstName'].'</td>
		<td>'.$row['lastName'].'</td>
		<td>'.$row['em_date'].'</td>
		<td>'.$row['departement'].'</td>
		<td>'.$row['salaire'].'</td>
		<td>'.$row['fonction'].'</td>
		<td><img src="'.$row['photo'].'"></td>';
	}
} else {echo '<div class="text-center"> <strong> Aucun enregistrement trouvé </strong> </div>';}

?>

</tbody>
</table>
</div>
