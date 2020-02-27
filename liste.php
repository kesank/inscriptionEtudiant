<!DOCTYPE HTML>

<html>

<head>
	<title>LISTE DES ETUDIANTS</title>
	<meta charset="utf-8"/>
	
	<style>
		.trait
		{
			width: 100%;
			height: 40px; 
			background-color: #CC58C5;
		}
		
		a
		{
			font-style: italic;
			font-size: x-large;
		}
		p
		{
			font-size: xx-large;
			color: red;
			font-weight: bold;
		}
	</style>
	
</head>

<body>
	<center>
		
		<marquee><H2>LISTE&nbsp;DES&nbsp;ETUDIANTS</H2></marquee>
		<a href="index.php">ACCUEIL</a>
		<hr class="trait"><br/><br/>
		<form method="POST" action="traitement/traiListe.php">
			
			
                <label for="filiere"> Filière </label>
        		<select name="filiere" id="filiere" required>
                    <option value=" "> </option>
        			<option value="1">IDA</option>
        			<option value="2">RHCOM</option>
        			<option value="3">RIT</option>
        			<option value="4">FCG</option>
        			<option value="5">MARKETING</option>
        			<option value="6">DAF</option>
					<option value="7">LOGISTIQUE</option>
        		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
                <label for="niveau"> Niveau </label>
        		<select name="niveau" id="niveau" required>
                    <option value=" "> </option>
					<option value="1"> Licence 1 </option>
        			<option value="2"> Licence 2 </option>
                    <option value="3"> Licence 3 </option>
        			<option value="4"> Master 1 </option>
        			<option value="5"> Master 2 </option>
        			<option value="6"> BTS </option>
        			<option value="7"> DUT </option>
        		</select>
			
			<input type="submit" value="Valider">

		</form>
		
		<p>Pour rechercher un étudiant particulier <a href="rechercher.php">cliquer ici </a></p>
	</center>
	

</body>
</html>