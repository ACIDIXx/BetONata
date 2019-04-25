
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="favicon.png" />
<title>BetOnNata</title>
</head>
<body>

		<div id="header"><h1 style=display:inline> BetOnNata</h1> <img src="image/fribcoin.png" width=50 /> </div>
		<div class='container'>
			<div id="cam"> <img name=url src="http://fribcoin.freeboxos.fr:8081"/></div>
				<div class='chat'>
					<div id="formu">
						<form action="minichat_post.php" method="post">
							<p>
							<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
							<label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
							<input type="submit" value="Envoyer" />
							</p>
						</form>
					</div>
				
				
					<div id="rep">
					 
						<?php
						// Connexion à la base de données
						try
						{
							$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
						}
						catch(Exception $e)
						{
								die('Erreur : '.$e->getMessage());
						}

						// Récupération des 10 derniers messages
						$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
						
						// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
						while ($donnees = $reponse->fetch())
						{
							echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
						}

						$reponse->closeCursor();

						?>
					</div>
				</div>
		</div>
		<div id="foot">
		<img style=display:inline src="image/accept.png" width=400 /><img style=display:inline src="image/side_illust_blog.png"/>
		<p>Donate Fribcoin here : cacaXLW2k4eeuVjeRMD5EFYMu1fPVgyrcg6vtbhWwYTc3ZpmL9GS5wk3bMmJ7YzetoCet16gwHA2WKHmqGdkBm5PACtE9qV13i
		</div>
	</body>
</html>