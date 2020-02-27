<!DOCTYPE HTML>

<html>

<head>
  <title>Supprimer</title>
  <meta charset="utf-8"/>
</head>

<body>
<center style="margin-top:200px;">

	<a href="index.php" style="font-style: italic; font-size: x-large;">ACCUEIL</a>
	
    <h1 style="text-shadow: 18px 20px 4px #7DD83B; color:green; font-weight: bold;font-style: italic;text-decoration: underline">
        SUPPRIMER UN ETUDIANT
    </h1>
	
    <form name="supprimer" action="supprimer.php" method="POST">

        <label for="matricule" style="font-size:30px; font-family: Algerian,serif">
            Entrez le matricule de l'étudiant
        </label><br><br>
		
	<?php 
		if(isset($_POST['matricule']))
		{ 
			include("traitement/traiSupprimer.php");
		}
	?>
		<br/> <br/>
       <input id="matricule" name="matricule" type="text" size="50" required><br><br>
       <input id="supprimer" name="suprimer" type="submit" value="Suprimer" style="width=100px">
    </form>

</center>




</body>

</html>