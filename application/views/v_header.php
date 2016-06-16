<?php
/** -
 * 
 * @author Antoine GUILLOT
 * @date 01/06/2016
 * @version 1
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>



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
								<li><?php echo anchor($uri = $url_base."Historique/c1#historique", $title = 'historique')?>
								<li><?php echo anchor($uri = $url_base."Historique/c1#contact", $title = 'Equipes / Contact')?></li>
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
								<li><?php echo anchor($uri = $url_base."Infos/access", $title = 'Accessibilité')?></li>
								<li><?php echo anchor($uri = $url_base."Infos/come", $title = 'Venir au Fest\'Esaip')?></li>
							</ul>
						</li>

						<li><a href="<?php echo($url_base.'Inscription/afficherFormulaire')?>">S'inscrire / Tickets</a></li>

						<li id="formulaire_co_js"><?php echo $log_or_not ?>          
                            <ol>
                                <form id="formulaire_co" method="post" action="<?php echo($url_base.'accueil/login')?>">
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
                                        <a id="pass_oublie" href="<?php echo($url_base."/accueil/renvoyer_pass1")?>"><br />Mot de passe oublié</a>

                                    </fieldset>
                                </form>
                            </ol>                                                     
						</li>
					</ul>
				</div>
			</nav>

<script src="http://code.jquery.com/jquery-3.0.0.js"   integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo="   crossorigin="anonymous"></script>
<script src="<?php echo($url_base.'/assets/script/header.js')?>"></script>
