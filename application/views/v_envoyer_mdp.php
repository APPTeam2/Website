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
					<article>
						
						<form method="post" action="<?php echo($url_base.'accueil/renvoyer_pass2')?>">
						    <!--légal de faire ça ? Mettre un lien dans une action ?-->
						    <fieldset>
						        <!--<legend></legend>-->

						        <label for="mail">Adresse mail : </label>
						        <input type="email" name="mail" id="mail" placeholder="Ex : xxx@yyy.com" size="8" maxlength="50" / required>
						        <br />

						        <input type="submit" value="Envoyer" />
						    </fieldset>
						</form>
					</article>

				</section>
