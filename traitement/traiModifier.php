<?php
	
   include('connexionPDO.php');

  /*$matricule = $_POST['matricule'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $telephone = $_POST['telephone'];
  $sexe = $_POST['sexe'];
  $dateNaiss = $_POST['naissance'];

  $nationalite= $_POST['nationalite'];
  $situation = $_POST['situation'];
  $filiere = $_POST['filiere'];
  $niveau = $_POST['niveau'];*/
  
  
  $reponse=$bdd->query('SELECT matEtud FROM etudiant WHERE matEtud= \''.$_POST['matricule'].'\' ');
  
  if($donnee=$reponse->fetch())
  {
	 
	$reponseEtudiant=$bdd->prepare('UPDATE etudiant SET  nomEtud = :nom, prenomEtud = :prenom, emailEtud = :email,
									telEtud = :tel , sexeEtud = :sexe , dateNaissEtud = :dateNaiss, refSit = :sit, codeFil = :fil,
									codeNiv = :niv WHERE matEtud= :mat ');
	
	$reponseEtudiant->execute(array(
									'nom' => $_POST['nom'] , 
									'prenom' => $_POST['prenom'] , 
									'email' => $_POST['email'] ,
									'tel' => $_POST['telephone'] , 
									'sexe' => $_POST['sexe'] , 
									'dateNaiss' => $_POST['naissance'], 
									'sit' => $_POST['situation'] ,
									'fil' => $_POST['filiere'] , 
									'niv' => $_POST['niveau'], 
									'mat' => $_POST['matricule'])
									);	
	
	$reponseNiveau=$bdd->query('SELECT montNiv FROM niveau WHERE codeNiv = \''.$_POST['niveau'].'\' ');
	$donneeNiveau=$reponseNiveau->fetch();
	
	$reponseCompte=$bdd->query('UPDATE compte SET sldCpt = \''.$donneeNiveau['montNiv'].'\' WHERE matEtud= \''.$_POST['matricule'].'\' ');
	
	echo 'Modification éffectué avec succès';
	
	$reponse->closeCursor();
	$reponseEtudiant->closeCursor();
	$reponseNiveau->closeCursor();
	$reponseCompte->closeCursor();
	
  }
  else
	  echo ' echec de modification de l\'étudiant de matricule '.$_POST['matricule'].' ';
  
 
  
?>