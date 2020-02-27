<?php
     
	include('connexionPDO.php');
	
	 $reponse=$bdd->query('SELECT matEtud FROM etudiant WHERE matEtud = \''.$_POST['matricule'].'\' ');
	 
	 
	 if($donnee=$reponse->fetch())
	 {
		 $reponse2 =$bdd->query('DELETE FROM etudiant WHERE matEtud = \''.$donnee['matEtud'].'\' ');
		 echo 'Etudiant de matricule '.$donnee['matEtud'].' est supprimé de la base de données';
		 $reponse2->closeCursor();
	 }
	 else
       echo 'Matricule erroné';
	
	$reponse->closeCursor();
	
?>