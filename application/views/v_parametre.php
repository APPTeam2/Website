<?php
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>



				<section>
					<article class="formulaires_verif">
						
						<form method="post" action="<?php echo($url_base.'parametre/valider_pass')?>">
						    <!--légal de faire ça ? Mettre un lien dans une action ?-->
						    <fieldset class="form_parametre">
						        <legend>Changer votre MDP</legend>

						        <label for="pass">Votre ancien MDP : </label>
						        <input type="password" name="pass" id="pass" placeholder="Ex : 1232324342" size="30" maxlength="25" / required>
						        <br />
						        <label for="pass1">Votre nouveau MDP : </label>
						        <input type="password" name="pass1" id="pass1" placeholder="Ex : 1232324342" size="30" maxlength="25" / required>
						        <br />
						        <label for="pass2">Votre nouveau MDP (vérification) : </label>
						        <input type="password" name="pass2" id="pass2" placeholder="Ex : 1232324342" size="30" maxlength="25" / required>
						        <br />
						        <input type="submit" value="Valider" />
						    </fieldset>
						</form>

						<br />

						<form method="post" action="<?php echo($url_base.'parametre/valider_mail')?>">
						    <!--légal de faire ça ? Mettre un lien dans une action ?-->
						    <fieldset class="form_parametre">
						        <legend>Changer votre adresse mail</legend>
						        <label for="pass">Votre MDP : </label>
						        <input type="password" name="pass" id="pass" placeholder="Ex : 1232324342" size="30" maxlength="25" / required>
						        <br />

						        <label for="mail">Adresse mail : </label>
						        <input type="email" name="mail" id="mail" placeholder="Ex : xxx@yyy.com" size="30" maxlength="50" / required>
						        <br />

						        <input type="submit" value="Valider" />

						    </fieldset>
						</form>


					</article>

				</section>
