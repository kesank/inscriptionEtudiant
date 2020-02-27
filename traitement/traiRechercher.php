<style>
	h3
	{
		font-style: italic;
		text-shadow	: 6px 6px 5px black;
	}
	
	h1
	{
		font-style: italic;
		text-shadow	: 6px 6px 10px black;
		text-decoration: underline;
	}
</style>
<?php
	
	include('connexionPDO.php');
	
	$reponse=$bdd->prepare('SELECT matEtud,UPPER(nomEtud)  AS nom ,UPPER(prenomEtud) AS prenom, DAY(dateNaissEtud) AS jour,MONTH(dateNaissEtud) AS mois,
										YEAR(dateNaissEtud) AS annee ,sexeEtud,LOWER(emailEtud) as email, telEtud, refSit, codeFil, codeNiv
							  FROM etudiant 
							  WHERE matEtud= ?');
							  
	$reponse->execute(array($_POST['matricule']));
	$donnee=$reponse->fetch();
	
	$reponse2=$bdd->query('SELECT libSit FROM situation  WHERE refSit=\''.$donnee['refSit'].'\' ');
	$donnee2=$reponse2->fetch();
	
	$reponse3=$bdd->query('SELECT libFil FROM filiere  WHERE codeFil=\''.$donnee['codeFil'].'\' ');
	$donnee3=$reponse3->fetch();
	
	$reponse4=$bdd->query('SELECT libNiv FROM niveau  WHERE codeNiv=\''.$donnee['codeNiv'].'\' ');
	$donnee4=$reponse4->fetch();
	
	$reponse5=$bdd->query('SELECT DAY(dateIns) AS jour_ins, MONTH(dateIns) AS mois_ins, YEAR(dateIns) AS annee_ins 
							FROM inscription  
							WHERE matEtud=\''.$donnee['matEtud'].'\' ');
	$donnee5=$reponse5->fetch();
	
	if($donnee)
	{
	?>
	<Center>
		<h1>INFORMATION DE <?php echo $donnee['nom']?></h1>
		
		<table  align="center" cellspacing="0" cellpadding="0">
			<tr>
				<td align="center"><h3>Matricule : </h3></td>
				<td align="center"><?php echo $donnee['matEtud'] ?></td>
			</tr>
			
			<tr>
				<td align="center"><h3>Nom : </h3></td>
				<td align="center"><?php echo $donnee['nom'] ?></td>
			</tr>
			<tr>
				<td align="center"><h3>Prenom : </h3></td>
				<td align="center"><?php echo $donnee['prenom'] ?></td>
			</tr>
			<tr>
				<td align="center"><h3>Date de naissance : </h3></td>
				<td align="center"><?php echo $donnee['jour'].'/'.$donnee['mois'].'/'.$donnee['annee'] ?></td>
			</tr>
			<tr>
				<td align="center"><h3>Sexe : </h3></td>
				<td align="center"><?php echo $donnee['sexeEtud'] ?></td>
			</tr>
			<tr>
				<td align="center"><h3>Telephone : </h3></td>
				<td align="center"><?php echo $donnee['telEtud'] ?></td>
			</tr>
			<tr>
				<td align="center"><h3>Email : </h3></td>
				<td align="center"><?php echo $donnee['email'] ?></td>
			</tr>
			<tr>
				<td align="center"><h3>Situation : </h3></td>
				<td align="center"><?php echo $donnee2['libSit'] ?></td>
			</tr>
			<tr>
				<td align="center"><h3>Filiere : </h3></td>
				<td align="center"><?php echo $donnee3['libFil'] ?></td>
			</tr>
			<tr>
				<td align="center"><h3>Niveau : </h3></td>
				<td align="center"><?php echo $donnee4['libNiv'] ?></td>
			</tr>
			<tr>
				<td align="center"><h3>Date d'inscription : </h3></td>
				<td align="center"><?php echo $donnee5['jour_ins'].'/'.$donnee5['mois_ins'].'/'.$donnee5['annee_ins'] ?></td>
			</tr>
		</table>
	</center>
	<?php
	}
	else
		echo '<center style="margin-top:200px;"><span style="color:red; font-size: 80px;">AUCUNE INFORMATION SUR L\'ETUDIANT DE MATRICULE '.$_POST['matricule'].'</span></center>';

	$reponse->closeCursor();
	$reponse2->closeCursor();
	$reponse3->closeCursor();
	$reponse4->closeCursor();
?>