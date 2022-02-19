let err_lst = []
function changeIcon(elem,rm_icon,ch_icon,setAttr,setAttrValue){
	elem.classList.remove(rm_icon);
	elem.classList+=' '+ch_icon;
	elem.setAttribute(setAttr,setAttrValue);

}

let edit =  (elem)=>{
	let  dataUser = elem.parentElement.parentElement.children ;
	let old_matricule= dataUser[0].innerHTML;
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
			    <option value="I.T" selected>Technologies de L'information</option>
			    <option value="R.H">Ressources humaines</option>
			    <option value="finance">Finance</option>
			    </select>`;
			break;


		case 'RH' : 
			dataUser[4].innerHTML = `
			     <select class="form-select" aria-label="Default select example" title='choisir une departement' name='department' required>
			    <option selected disabled value=''>Choisir le Département</option>
			    <option value="I.T" >Technologies de L'information</option>
			    <option value="R.H" selected>Ressources humaines</option>
			    <option value="finance">Finance</option>
			    </select>`;
			break;
 		case 'finance' :
			dataUser[4].innerHTML = `
			     <select class="form-select" aria-label="Default select example" title='choisir une departement' name='department' required>
			    <option selected disabled value=''>Choisir le Département</option>
			    <option value="I.T" >Technologies de L'information</option>
			    <option value="R.H" >Ressources humaines</option>
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

	
	function check_valid(str,reg) {
		let regex = new RegExp(reg);
		if(!regex.test(str.children[0].value)) {
			str.children[0].style.borderColor="red";
			err_lst.push('error');
		}
			
	}


	let  dataUser = elem.parentElement.parentElement.children ;

	data = {
		'matricule' : dataUser[0].children[0].value,
		'firstName' : dataUser[1].children[0].value,
		'secondName' : dataUser[2].children[0].value,
		'date' : dataUser[3].children[0].value,
		'department': dataUser[4].children[0].value,
		'salaire':dataUser[5].children[0].value,
		'fonction':dataUser[6].children[0].value,
		'photo' : dataUser[7].children[0].src,
		};
	console.log(data.matricule);

	check_valid(dataUser[0],'[a-z][0-9]{1,3}|[A-Z][0-9]{1,3}');
	/*
	check_valid(data.matricule,'[a-z][0-9]{1,3}|[A-Z][0-9]{1,3}');
	check_valid(data.firstName,'[Aa-zZ]{4,}|[Aa-zZ]{1,}\s[Aa-zZ]{2,}|[A-Z]{4,}');
	check_valid(data.secondName,'[Aa-zZ]{4,}|[Aa-zZ]{1,}\s[Aa-zZ]{2,}|[A-Z]{4,}');
	check_valid(data.fonction,'\\w{1,10}');
	*/
	
	if (err_lst.length !=0){
		document.getElementById('message-box').setAttribute('style','display:block');
		
	}else {
	 document.getElementById('message-box').setAttribute('style','display:none');
	 console.log('asdest2');
         console.log(data.matricule);
         changeIcon(elem,'fa-check','fa-edit','onclick','edit(this)');
	}
	console.log(err_lst);

	}

/*
	dataUser = elem.parentElement.parentElement.children ;

	console.log(data)
	
	$.ajax({
		url:'ajax.php',
		method:'POST',
		data:{data:JSON.stringify(data)},
		success :function(res){
			console.log(res);
		}
	});
*/
	


