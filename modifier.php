<!DOCTYPE HTML>

<html>

	<head>
	  <title>Modification</title>
	  <meta charset="utf-8"/>
      <style>
         .bloc_page
         {
             margin: auto;
             width:900px;

         }

         input
         {
             height: 20px;
         }
         h1
         {
             text-align: center;

         }
         center
         {
            /* border: 10px ridge #2421CC;
             border-radius: 20px 20px 20px 20px;
             box-shadow : 6px 6px 12px blue;*/
             position:relative;

         }

        .identifie
        {
            position:absolute;
            left:200px;
        }

        .envoie
        {
            height: 40px;
            width: 150px;
        }
        .liste
        {
            display:inline-block;
            margin-right:20px;
        }
		
		a
		{
			font-style: italic;
			font-size: x-large;
		}

      </style>
	</head>

<body>
    <div class="bloc_page">
		<a href="index.php">ACCUEIL</a>
		<h1>MODIFICATION</h1>

		<hr size="50" color="blue">
        <center>
			<!--page de traitement de la modification-->
			<?php if(isset($_POST['matricule']))
					include("traitement/traiModifier.php");
					echo '<br>';
			?>
            <h3>* = Champ obligatoire</h3>
    		<form method="POST" action="modifier.php">

    			<label for="matricule" class="identifie"> Matricule* </label><br>
                <input type="text" name="matricule" id="matricule" placeholder="Ex:20160001" size="80%" autofocus required maxlength="20"><br/><br>

    			<label for="nom" class="identifie"> Nom* </label><br>
                <input type="text" name="nom" id="nom" placeholder="Ex:kouadio"size="80%" required><br/><br>

    			<label for="prenom" class="identifie"> Prenom* </label> <br>
                <input type="text" name="prenom" id="prenom" placeholder="Ex:kevin"size="80%" required><br/><br>

    			<label for="email" class="identifie"> Email </label><br>
                <input type="email" name="email" id="email"placeholder="Ex:kevin@gmail.com"size="80%"><br/><br>

    			<label for="telephone" class="identifie">Téléphone </label><br>
                <input type="tel" name="telephone" id="telephone" placeholder="Ex:05421451" size="80%" required><br/><br>

    		   <div>
                   <div class="liste">
                       <label for="nationalite">Nationalité*</label><br>
            		   <select name="nationalite" id="nationnalite">
                            <option value=" "> </option>
            		        <option value="1">Ivoirienne</option>
            				<option value="2"> Etranger</option>
            			</select>
                   </div>

                    <div class="liste">
                        <label for="sexe"> Sexe* </label><br>
            			<Select name="sexe" id="sexe">
                            <option value=" "> </option>
                            <option value="M">Masculin</option>
            				<option value="F">Feminin</option>
            			</select>
                    </div>

                    <div class="liste">
                        <label for="situation">Situation*</label><br>
            			<Select name="situation" id="situation">
                            <option value=" "> </option>
            				<option value="1">Orienté</option>
            				<option value="2">Non Orienté</option>
            			</select>
                    </div>

                    <div class="liste">
                        <label for="naissance">Date de naissance*</label><br>
                        <input type="date" name="naissance" id="naissance" placeholder="Ex:AA-MM-JJ">
                    </div>
                </div>

                <div class="liste">
                    <label for="filiere"> Filière* </label><br>
        			<select name="filiere" id="filiere">
                        <option value=" "> </option>
        				<option value="1">IDA</option>
        				<option value="2">RHCOM</option>
        				<option value="3">RIT</option>
        				<option value="4">FCG</option>
        				<option value="5">MARKETING</option>
        				<option value="6">DAF</option>
        				<option value="7">LOGISTIQUE</option>
        			</select>
                </div>


    			<div class="liste">
                    <label for="niveau"> Niveau* </label><br>
        			<select name="niveau" id="niveau">
                        <option value=" "> </option>
        			    <option value="1"> Licence 1 </option>
        				<option value="2"> Licence 2 </option>
                        <option value="3"> Licence 3 </option>
        				<option value="4"> Master 1 </option>
        				<option value="5"> Master 2 </option>
        				<option value="6"> BTS </option>
        				<option value="7"> DUT </option>
        			</select>
                </div>


    			<p><input type="submit" value="  Valider " class="envoie">

    			<input type="reset" value="Mettre à zero" class="envoie"></p>

    	 	<form>
        </center>

    </div>
</body>
 </html>