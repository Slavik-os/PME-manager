<?php
include 'config.php';
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string =   preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return $string;
}
function substring($string,$start,$length=null){
	return mb_substr($string,$start,$length,'UTF-8');
}

$data = json_decode($_POST['data']);
$oldmat =  htmlspecialchars($data->old_mat);
$matricule =  htmlspecialchars($data->matricule);
$firstName =  htmlspecialchars($data->firstName);
$secondName =  htmlspecialchars($data->secondName);
$date_em =  htmlspecialchars($data->date_em);
$department =  htmlspecialchars($data->department);
$fonction =  htmlspecialchars($data->fonction);
$salaire =  htmlspecialchars($data->salaire);
$sql= 'SELECT matricule FROM employee_table WHERE matricule=\''.$matricule.'\';';
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$case= $data->case;
$folder = 'uploads';
switch ($case) {
	case 'edite' :
		$sql = "UPDATE employee_table SET matricule='".$matricule."', firstName='".$firstName."',lastName='".$secondName."',em_date='".$date_em."',departement='".$department."',fonction='".$fonction."',salaire='".$salaire."' WHERE matricule='".$oldmat."'";
		echo $sql;
		break;
	case 'delete' :
//		$sql = "DELETE FROM employee_table WHERE matricule='".$matricule."'";
		if(file_exists($data->photo)) {
			unlink($data->photo);
		} 

		$sql = "DELETE FROM employee_table WHERE matricule='".$matricule."'";
		break;
}
$con->query($sql); 

?>
