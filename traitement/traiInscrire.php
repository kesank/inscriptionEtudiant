<?php
  srand(time(0));
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
  
  if(!($donnee=$reponse->fetch()))
  {
	  //Génération du numero de compte et d'inscription
	  $numCompte=rand();
	  $numInscrip=rand();
	  
	  //test de controle de laa diponibilité du numero de compte dispo
	  $reponse2=$bdd->query('SELECT numCpt FROM compte');
	  $reponse3=$bdd->query('SELECT refIns FROM inscription');
	  
	  while($donnee2=$reponse2->fetch())
	  {
		if($numCompte==$donnee2['numCpt'])
			$numCompte=rand(); 			
	  }
	  
	  while($donnee3=$reponse3->fetch())
	  {
		if($numInscrip == $donnee3['refIns'])
			$numInscrip=rand(); 			
	  }
	  
	 $reponse2->closeCursor();
	 $reponse3->closeCursor();
	 
	$reponseEtudiant=$bdd->prepare('INSERT INTO etudiant VALUES(:matricule ,:nom ,:prenom,:email,:tel,:sexe, :dateNaiss,:sit,:fil,:niv)');
	
	$reponseEtudiant->execute(array(
									'matricule' => $_POST['matricule'],
									'nom' => $_POST['nom'] , 
									'prenom' => $_POST['prenom'] ,
									'email' => $_POST['email'] ,
									'tel' => $_POST['telephone'] , 
									'sexe' => $_POST['sexe'] ,
									'dateNaiss' => $_POST['naissance'] , 
									'sit' => $_POST['situation'] ,
									'fil' => $_POST['filiere'] , 
									'niv' => $_POST['niveau']));	
	
	$reponseNiveau=$bdd->query('SELECT montNiv FROM niveau WHERE \''.$_POST['niveau'].'\' =codeNiv');
	$donneeNiveau=$reponseNiveau->fetch();
	
	$reponseCompte=$bdd->query('INSERT INTO compte VALUES(\''.$numCompte.'\' , \''.$_POST['matricule'].'\' , \''.$donneeNiveau['montNiv'].'\') ');
	
	$reponseInscription=$bdd->query('INSERT INTO inscription VALUES(\''.$numInscrip.'\',CURDATE(),\''.$_POST['matricule'].'\')');
	
	echo 'Inscription éffectué avec succèe ';
	
	$reponseEtudiant->closeCursor();
	$reponseNiveau->closeCursor();
	$reponseCompte->closeCursor();
	$reponseInscription->closeCursor();
  }
  else
	  echo 'L\'étudiant de matricule '.$_POST['matricule'].' existe déjà. ';
  
 
  
?>