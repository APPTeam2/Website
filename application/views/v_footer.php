<?php
/** Pied de page commun à l'ensemble du site
 * 
 * @author Adrien PIRONNEAU
 * @date 08/06/2016
 * @rev 03
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

</div><!-- fin de la div container -->


<footer>
    
<div class="footer-container">
    
    <div class="footer-item">
        <div class="footer-title">Fest'Esaip</div>
        <div class="footer-body">
            <li>
                <?php echo anchor($uri = $url_base."Historique/c1#historique", $title = 'Historique')?>
            </li>
            <li>
                <?php echo anchor($uri = $url_base."Historique/c1#contact", $title = 'Equipes / Contact')?>
            </li>
            <li>
                <?php echo anchor($uri = $url_base."Historique/c1#slider_sponsors", $title = 'Sponsors')?>
            </li>
        </div>
    </div>
    <div class="footer-item">
        <div class="footer-title">Programmation</div>
        <div class="footer-body">
            <li>
                <?php echo anchor($uri = $url_base."Programmation/c_prog#animations", $title = 'Animations')?>
            </li>
            <li>
                <?php echo anchor($uri = $url_base."Programmation/c_prog#stands", $title = 'Stands')?>
            </li>
            <li>
                <?php echo anchor($uri = $url_base."Programmation/c_prog#concerts", $title = 'Concerts')?>
            </li>
        </div>
    </div>
    <div class="footer-item">
        <div class="footer-title">Infos Pratiques</div>
        <div class="footer-body">
            <li>
                <?php echo anchor($uri = $url_base."Infos/access", $title = 'Camping')?>
            </li>
            <li>
                <?php echo anchor($uri = $url_base."Infos/access", $title = 'Accessibilité')?>
            </li>
            <li>
                <?php echo anchor($uri = $url_base."Infos/come", $title = 'Venir au Fest\'Esaip')?>
            </li>
        </div>
    </div>
    <div class="footer-item ">
        <div class="footer-item-text">
            L'interface a été réalisée et développée par <b><a href="https://github.com/APPTeam2/" target="_blank">Team2</a></b> (Adrien P, Antoine G, Antoine R, Florian L, Nathan H) pour <b>Fest'Esaip</b>. Toute reproduction complète ou partielle est strictement interdite.<br><br>
        </div>
        <div class="footer-item-credits">
            <div id="footer-contact">
                <?php echo anchor($uri = $url_base."Contact/formulaire#", $title = 'Contactez-nous')?>
            </div>
            <div id="footer-codeigniter">
                Page rendered in <strong>{elapsed_time}</strong> seconds.<br>
                <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
            </div>
        </div>
    </div>

</div>

</footer>
</body>
</html>