<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>RaspiWatch</title>
		<link rel="stylesheet" type="test/css" href="style.css">
	</head>

	<body>
		<header>
			<img id = "logo" src = "./RaspiWATCH-Logo-V2.png" alt="logo raspiWATCH">
			<h1>RaspiWATCH</h1>
		</header>


		<nav>
			<div id = "menu">
				<ul id = "onglets">
					<li id = "onglet0" class = "active" onclick ="changeOnglet(0)"> Configuration </li>
					<li id = "onglet1" onclick ="changeOnglet(1)"> Photos </li>
					<li id = "onglet2" onclick ="changeOnglet(2)"> Vidéos </li>
				</ul>
			</div>
		</nav>

			<section>
				<form action="cgi-bin/raspiwatch.cgi" method="GET" target="_blank">
					<legend>Que souhaitez-vous faire ?</legend>
					<fieldset>
					<input type = "submit" name = "on" value = "Démarrer">
					<input type = "submit" name = "off" value = "Arrêter">
					<input type = "submit" name = "photo" value = "Photo">
					<input type = "submit" name = "video" value = "Vidéo">
					</fieldset>
				</form>
			</section>

		
		<section id = "contenuOnglet0">
			<h2> Configuration </h2>
			<form id="config" action="cgi-bin/raspiwatch.cgi" method="GET" target="_blank">
				<fieldset>
					<legend>Résolution</legend>
					<input type = "radio" name = "res" value = "1" checked>1900x1080<br>
					<input type = "radio" name = "res" value = "2">1280x720<br>
					<input type = "radio" name = "res" value = "3">640x480<br>
					
					<legend>Images par seconde</legend>
					<input type = "radio" name = "ips" value = "30" checked>30<br>
					<input type = "radio" name = "ips" value = "25">25<br>
					<input type = "radio" name = "ips" value = "20">20<br>
					<input type = "radio" name = "ips" value = "15">15<br>
					
					
					<legend>Seuil de détection</legend>
					<input type="range"  id = "seuil" name = "seuil" min="0" max="100" value="50" step = "5" oninput="document.getElementById('AfficheRange1').textContent=value" />
					<span id="AfficheRange1">50</span>%
					
					
					<legend>Luminosité</legend> 
					<input type="range"  id = "luminoite" name = "luminosite" min="0" max="100" value="50" step = "5" oninput="document.getElementById('AfficheRange2').textContent=value" />
					<span id="AfficheRange2">50</span>%
					
					<input type = "submit" name = "submit" value = "Valider">
				</fieldset>
			</form>
		</section>
		
		<section id = "contenuOnglet1">
			<h2>Photos</h2>
		<!--
		<?php
		//Ce premier script met en place des tableaux avec les noms de fichiers
		
			$photoPath="/home/pi/RaspiWatch/photo";
			$videoPath="/home/pi/RaspiWatch/video";
			
			$photoDirectory = opendir($photoPath);
			$videoDirectory = opendir($videoPath);

			while($filename = readdir($photoDirectory)) {
				$photoArray[] = $filename;
		    	}
		    	
		    	while($filename = readdir($videoDirectory)) {
				$videoArray[] = $filename;
		    	}

		    	
			closedir($photoDirectory);
			closedir($videoDirectory);
			
			$nbPhoto = count($photoArray);
			$nbVideo = count($videoArray);
		?>
		-->
		
		<ul id="photos">
		    <?php include 'getPhotos.php';?>

        <!--
			<?php
			//Ce deuxième script affiche tous les photos dans le tableau photoArray et les affiches, s'ils sont sous format .jpg
			
				for($index=0; $index < $nbPhoto; $index++) {
					$extension = substr($photoArray[$index], -3);
						if ($extension == 'jpg'){
							echo '<li><a href="photo/'. $photoArray[$index].'"><img src="photo/'. $photoArray[$index] .'" alt="'.$photoArray[$index].'" /><span>' . $photoArray[$index] . '</span></a></li>';
						}
			    	}
			?>
			-->

		</ul>	
		</section>

		<section id = "contenuOnglet2">
			<h2>Vidéos</h2>	

		<ul id="videos">
		    <?php include 'getVideos.php';?>
		<!--
			<?php
			//Ce troisème script crée des liens pour télécharger les vidéos, et, si elle exite, affiche la photo correspondante comme miniature
			
				for($index=0; $index < $nbVideo; $index++) {
					$extension = substr($videoArray[$index], -4);
						if ($extension == 'h264'){
							$miniName= substr($videoArray[$index],0, strlen($videoArray[$index])-4).'jpg';
							echo '<li><a href="video/'.$videoArray[$index].'"><img src="video/miniatures/'. $miniName .'" alt="'.$miniName.'" /><span>' . $videoArray[$index] . '</span></a></li>';
						}
			    	}
			?>
		-->

		</ul>
		</section>
		
		<footer>
		Site en construction.
		</footer>


		<script type="text/javascript">
		      var nombreOnglets = 3;
		      function changeOnglet(numero)
		      {
			// On commence par tout masquer
			for (var i = 0; i < nombreOnglets; i++){
				document.getElementById("contenuOnglet" + i).style.display = "none";
				document.getElementById("onglet" + i).className = '';
			
			}
			// Puis on affiche celui qui a été sélectionné
			document.getElementById("contenuOnglet" + numero).style.display = "block";
			document.getElementById("onglet" + numero).className = 'active';
		      }
		</script>
	</body>
</html>