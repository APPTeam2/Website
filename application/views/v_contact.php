<?php
/** Page Contact
 * 
 * @author Adrien PIRONNEAU
 * @date 18/06/2016
 * @rev 01
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--
<div id="contact">
    <article>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tellus eros, porttitor vitae turpis vitae, elementum euismod lacus. Nullam malesuada maximus risus, congue dapibus eros dictum aliquam. Fusce in cursus dolor, a rhoncus mi. Proin molestie nisl et nunc congue, ut bibendum elit volutpat. Integer ligula tortor, suscipit a ultricies eget, efficitur sit amet sapien. Cras at neque fringilla eros viverra interdum ut id turpis. Mauris lacinia fringilla ullamcorper. Vivamus tellus massa, condimentum interdum tortor et, interdum vulputate justo. Donec leo dui, ornare quis orci tempus, consectetur consectetur mi. Nulla in arcu condimentum arcu faucibus tristique.<br><br></p>
    </article>
    <div class="contact-area">
        <div class="contact-form">
            <form class="contact-text-form" method="post" action="<?php echo($url_base.'inscription_Ticket/contact')?>">
                <textarea name="texte_contact" form="usrform" placeholder="Entrez votre texte ici" rows='10'></textarea>
                <button type="submit">Envoyer</button>
                <p class="message">Vous souhaitez faire un retour arrière ? <a class="button-next button-next-a">C'est ici.</a></p>
            </form>
            <form class="contact-login-form">
                <input type="email" name="mail_contact" placeholder="Adresse mail"/>
                <button class="button-next">Suivant</button>
            </form>
        </div>
    </div>
</div>

<foot>
    <script type="text/javascript">$('.button-next').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});</script>
</foot>-->

<!-- Solution temporaire avant debug d'Adrien-->

<div id="contact">
    <article>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tellus eros, porttitor vitae turpis vitae, elementum euismod lacus. Nullam malesuada maximus risus, congue dapibus eros dictum aliquam. Fusce in cursus dolor, a rhoncus mi. Proin molestie nisl et nunc congue, ut bibendum elit volutpat. Integer ligula tortor, suscipit a ultricies eget, efficitur sit amet sapien. Cras at neque fringilla eros viverra interdum ut id turpis. Mauris lacinia fringilla ullamcorper. Vivamus tellus massa, condimentum interdum tortor et, interdum vulputate justo. Donec leo dui, ornare quis orci tempus, consectetur consectetur mi. Nulla in arcu condimentum arcu faucibus tristique.<br><br></p>
    </article>
    <div class="contact-area">
        <div class="contact-form">
            <form class="contact-login-form" method="post" action="<?php echo($url_base.'inscription_Ticket/contact')?>">
                <fieldset id="acheter_tickets">
                    <input type="email" name="mail_contact" id="mail_contact" placeholder="Adresse mail"/>
                    <textarea name="texte_contact" id="texte_contact" placeholder="Entrez votre texte ici" rows='10'></textarea>
                    <input type="submit" value="Valider" />
                </form>
            </fieldset>
        </div>
    </div>
</div>