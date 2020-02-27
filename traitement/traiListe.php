<style>
	td,th
	{
		border: 1px solid black;
		width: 200px;
	}
	
	table
	{
		border: 1px solid black;
	}
	
	
	h1
	{
		border: 1px solid blue;
		border-radius: 10px 10px;
		box-shadow: 10px 2px 10px #000000;
		width: 80%;
	}
	
	a
	{
	    font-style: italic;
		font-size: x-large;
	}
</style>
	
<meta charset="utf-8"/>
	
	<?php
		include('connexionPDO.php');
		
		$reponse=$bdd->prepare('SELECT matEtud,UPPER(nomEtud)  AS nom ,UPPER(prenomEtud) AS prenom, DAY(dateNaissEtud) AS jour,MONTH(dateNaissEtud) AS mois,
										YEAR(dateNaissEtud) AS annee ,sexeEtud
							  FROM etudiant 
							  WHERE codeFil= :fil AND codeNiv= :niv');
							  
		$reponse->execute(array('fil'=>$_POST['filiere'],'niv'=>$_POST['niveau']));
	?>
		
		<center>
			<a href="../index.php">ACCUEIL</a>
			<table cellspacing="0">
					<caption><h1>Liste des Etudiants</h1></caption>
					 <br/>
					 <tr>
						<th>Matricule</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Sexe</th>
						<th>Date de naissance</th>
					 </tr>
				 <?php
				 
					while($donnee=$reponse->fetch())
					{
						
					?>	
						<tr>
						<td align="center" ><?php echo $donnee['matEtud'] ?></td>
						<td><?php echo $donnee['nom']?></td>
						<td><?php echo $donnee['prenom']?></td>
						<td align="center"><?php echo $donnee['sexeEtud']?></td>'
						<td align="center"><?php echo $donnee['jour'].'/'.$donnee['mois'].'/'.$donnee['annee'] ?></td>
						</tr>
					<?php
					}
				 
				 ?>
			</table> 
		</center>
		
		<?php
		$reponse->closeCursor();
		?>