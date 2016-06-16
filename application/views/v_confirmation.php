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
						
						<form method="post" action="<?php echo($url_base.'accueil/confirmation3')?>">
						    <!--légal de faire ça ? Mettre un lien dans une action ?-->
						    <fieldset>
						        <!--<legend></legend>-->

						        <label for="code">Code de confirmation : </label>
						        <input type="text" name="code" id="code" placeholder="Ex : 1232324342" size="30" maxlength="25" / required>
						        <input type="submit" value="Login" />
						    </fieldset>
						</form>
					</article>

				</section>
