<?php
error_reporting(0);
require 'new.php';
include 'config.php';

if ($con->connect_error) {
	die("Connection faild : " .$con->connect_error);
} 

class Employee {

	public $matricule;
	public $firstname;
	public $lastname;
	public $department;
	public $salary;
	public $fonction;
	public $photo;
	public $date;

	function __construct($matricule,$firstname,$lastname,$department,$salary,$fonction,$photo,$date){
		$this->matricule = $matricule ;
		$this->firstname  = $firstname;
		$this->lastname = $lastname;
		$this->department= $department;
		$this->salary = $salary;
		$this->fonction = $fonction;
		$this->photo = $photo;
		$this->date = $date;	
	}

	function getData(){		
		$data = [ 
			  'matricule'=> $this->matricule,
			  'firstname'=> $this->firstname,
			  'lastname' => $this->lastname,
			  'department' => $this->department,
			  'salary'   => $this->salary,
			  'fonction' =>$this->fonction,
			  'photo' => $this->photo,
			  'date'  => $this->date
 			 ];

		return $data;
	}
	

}

// Sanitaze Data from user ; 
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string =   preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return $string;
}

// Declaration ; 

$Matricule = clean($_POST['matricule']);
$firstName = clean($_POST['firstName']);
$secondName = clean( $_POST['secondName']);
$department = clean($_POST['department']);
$fonction = clean($_POST['fonction']);
$date = clean($_POST['Date']);
$salary = clean($_POST['salary']);

$sql= 'SELECT matricule FROM employee_table WHERE matricule=\''.$Matricule.'\';';
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
if ($row !=Null){
	echo '<div class="alert alert-warning"><strong> Matricule Exists !</strong> Choisir Une autre.';
} else {

// Uplaods : 
$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES['uploadFile']['name']); // provide the name of file on client machine 
$imageExtention = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // return the extention of image 
$allowed = ['jpeg','jpg','gif','png'];
$uploadOK= 1;  
// Check if file is image or not :
if(isset($_POST['submit'])){ // when submit is not null 

	$check = getimagesize($_FILES['uploadFile']['tmp_name']); // provide the name of file on server machine ,return array of bites
	if($check) {
		$uploadOK =1;	
	}else {
		    echo'<div class="alert alert-danger">
			<strong>seules les images sont autorisées à être téléchargées</strong> .
		     </div>';
	}
	if (file_exists($target_file)) {
		echo '<div class="alert alert-warning">
			<strong>l\'mage existe déjà!</strong> .
		      </div>';
		$uploadOK= 0 ;
	}
	if (!in_array($imageExtention,$allowed)){
		echo '<div class="alert alert-warning">
			<strong>seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.
		     </div>';
		$uploadOK= 0 ;
	}
	if ($uploadOK==0) {
		    echo'<div class="alert alert-danger">
			<strong>votre fichier n\'a pas été téléchargé.</strong> .
		     </div>';

	} else {
		if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)){ // check if file has ben uplaoded 
			echo '<div class="alert alert-success">
				<strong>Success!</strong> .
			     </div>';	
 		} else {
			echo ' <div lcass="alert alert-danger">
               			<strong> Quelque chose s\'est mal passé </strong>.
			 	</div>';
		}

	}
	

}

// New Employee 

$employee = new Employee($Matricule,$firstName,$secondName,$department,$salary,$fonction,$target_file,$date);
$employee  = $employee->getData();

$sql = 'INSERT INTO employee_table (matricule,firstName,lastName,departement,fonction,salaire,em_date,photo) VALUES('.'\''.$employee['matricule'].'\','.'\''.$employee['firstname'].'\','.'\''.$employee['lastname'].'\''.','.'\''.$employee['department'].'\','.'\''.$employee['fonction'].'\','.'\''.$employee['salary'].'\',STR_TO_DATE('.'\''.$employee['date'].'\',\'%Y-%m-%d\'),\''.$employee['photo'].'\')';
if ($uploadOK != 0) {
	$con->query($sql); 
}


}
// Fill database columns
$con->close();
?>
