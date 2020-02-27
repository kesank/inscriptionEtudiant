<!DOCTYPE HTML>

<html>

<head>
  <title>Recherche</title>
  <meta charset="utf-8"/>
  
  <style>
	.trait
	{
		width: 100%; 
		height: 40px; 
		background-color: #8C5DA2;
	}
	.titre
	{
		display: inline-block;
	}
	
	a
	{
		font-style: italic;
		font-size: x-large;
	}
  </style>
  
</head>

<body>    

	
	<marquee> 
		<h1 class="titre">RECHERCHER UN ETUDIANT </h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
		<h1 class="titre">AFFICHER SES DONNEES PERSONNELLE</h1>
	</marquee>
	<center> <a href="index.php">ACCUEIL</a><br/></ center>
	<hr class="trait"> <br/><br/><br/>
	
	<center>
	  <form action="traitement/traiRechercher.php" method="POST">
		  <Label for="matricule">Matricule : </label> 
		  <input type="text" name="matricule" id="matricule" required> &nbsp;&nbsp;
		  <input type="submit" value="Rechercher">
	  </form>
	</center>
	
</body>
</html>