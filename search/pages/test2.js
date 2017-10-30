//Declaration de mes variable 

var annuaire;
var formulaire;
var divListeContacts;
var divAjoutContact;
var btnAddNewContact;
var btnSubmitContact;
var fields;
var nbFields;

//Affectation de variables un tableau à utiliser dans le travail
annuaire = new Array();

formulaire = document.querySelector('#formAddContact');
divAjoutContact = document.querySelector('#ajoutContact');
divListeContacts = document.querySelector('#listeContacts');

btnAddNewContact = document.querySelector('#addNewContact');
btnSubmitContact = document.querySelector('#submitContact');

fields = document.querySelectorAll('input');

var nbFields = fields.length;

/*Preparation du chemain de l'Affichage et du masquage de la Div lorsque l'on
  clique sur le bouton 'Ajouter un contact'.
*/
function showForm() {
	divAjoutContact.classList.toggle('showMe');	
}


function flushForm() {
	for(var i = 0; i < nbFields; i++) {
		fields[i].value = '';	
	}
}

function removeContact(index) {
	annuaire.splice(index,1);
	
	showListeContacts();	
}

function addContact() {
	
	var nom 	= document.getElementById('nom').value;
	var prenom 	= document.getElementById('prenom').value;
	var tel 	= document.getElementById('tel').value;
	var mail 	= document.getElementById('mail').value;
	
	if(nom == '' || prenom == '' || tel == '' || mail == '') {
		alert('Veuillez remplir tous les champs.');	
	}
	else if(isNaN(tel) || tel.length != 9) {
		alert('Veuillez saisir un numéro de téléphone valide.');	
	}
	else if(mail.indexOf('@') == -1 || mail.indexOf('.') == -1) {
		alert('L\'email doit contenir un arobase et un point.');	
	}
	else {
		//Création d'un nouveau tableau avec les éléments
		var contact = new Object();
		
		contact.nom	= nom;
		contact.prenom = prenom;
		contact.tel = tel;
		contact.mail = mail;
		
		annuaire.push(contact);
		
		showListeContacts();//Fonction contenant le tableau;	
		
		/*Les fonction masquant et afichant le block; elles nous permet de ne pas
    afficher le formulaire après avoir saisi la première fois.*/
		flushForm();
		showForm();
	}
	
}

btnAddNewContact.addEventListener('click', showForm);
btnSubmitContact.addEventListener('click', addContact);

showListeContacts();	


/*Récupèration des données saisies, les insèrent dans un tableau
et les afiche*/
function showListeContacts() 
{
	var contenu;
	var tailleTableau = annuaire.length;
	//elle nous permet de récupère le nombre d'éléments présents dans le tableau.
	
	if(tailleTableau == 0) {
		contenu = '<p>Vous n\'avez pas encore de contacts.</p>';
	}
	
	 /*Le choix de cette méthode nous permet par d'avoir le résultat compté.*/
	else {
		contenu = '<table border="1">';
		contenu	+= '<thead>';
		contenu += '<tr>';
		contenu += '<th>Nom</th><th>Prénom</th><th>Téléphone</th><th>Mail</th><th>Supprimer</th>';
		contenu += '</tr>';
		contenu += '</thead>';
		contenu += '<tbody>';
		
		for(var i = 0; i < tailleTableau; i++) {
			contenu += '<tr>';
			contenu += '<td>' + annuaire[i].nom + '</td>';
			contenu += '<td>' + annuaire[i].prenom + '</td>';
			contenu += '<td>' + annuaire[i].tel + '</td>';
			contenu += '<td>' + annuaire[i].mail + '</td>';
			contenu += '<td><button onClick="removeContact(' + i + ')">X</button></td>';
			contenu += '</tr>';
		}
		
		contenu += '</tbody>';
		contenu += '</table>';
	}
	
	divListeContacts.innerHTML = contenu;
}






