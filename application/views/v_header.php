<!DOCTYPE html>
<!-- commentaire -->
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="<?php echo($url_base.'/assets/css/style_header.css')?>"/>
		<title>Fest'Eaip</title>
	</head>

	<body>
		<header>
			<img src="<?php echo($url_base.'/assets/img/logo_titre.jpg')?>" id="logo_titre" alt="Logo titre"/>
			<h1 id="text_titre">
			LE FESTIVAL DE MUSIQUE DE L'ESAIP <br />LES 28, 29 et 30 JUIN 2013
			</h1>
		</header>

		<div id="corps">
			<nav>
				<div id="nav">
					<ul id="menu" >
						<li><a href="<?php echo($url_base)?>">Accueil</a></li>

						<li>Fest'Esaip
							<ul>
								<li><?php echo anchor($uri = $url_base."/Historique/c1#historique", $title = 'historique', $attributes = 'contact')?>
								<li><?php echo anchor($uri = $url_base."/Historique/c1#contact", $title = 'Equipes / Contact', $attributes = 'contact')?></li>
								<li>Sponsors</li>
							</ul>
						</li>

						<li>Programmation
							<ul>
								<li>Animations</li>
								<li>Stands</li>
								<li>Concerts</li>
							</ul>
						</li>

						<li>Infos pratiques
							<ul>
								<li>Camping</li>
								<li>Accessibilité</li>
								<li>Venir au Fest'Esaip</li>
							</ul>
						</li>


						<li><?php echo $log_or_not ?>          
                            <ol>
                                <form method="post" action="<?php echo($url_base.'accueil/login')?>">
                                    <!--légal de faire ça ? Mettre un lien dans une action ?-->
                                    <fieldset>
                                        <!--<legend></legend>-->

                                        <label for="login">login : </label>
                                        <input type="text" name="login" id="login" placeholder="Ex : a10a" size="8" maxlength="25" / required>
                                        <br />
                                        <label for="pass">mdp :</label>
                                        <input type="password" name="pass" id="pass"
                                               size="8" maxlength="25" / required>
                                        <br />

                                        <input type="submit" value="Login" />
                                    </fieldset>
                                </form>
                            </ul>                                                     
						</li>
					</ul>
				</div>
			</nav>







	</body>
</html>