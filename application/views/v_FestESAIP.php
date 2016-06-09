<?php
/** A CHANGER
 * 
 * @author Florian Levenez-Delafontaine
 * @date A 09/06/2016
 * @version 1.2
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<section>
    <div class="FestEsaip">
        <h3 id="historique" class="droit">Historique</h3>
        <p class="anonce"> Retrouvez la liste de nos précédents événements et les artistes qui y étaient présents.</p>

        <table>
            <t
                <th>
                    Fest'esaip 2012
                </th>
                <th>
                    <ul>
                        <?php {

                            foreach ($Trucdeflo as $array) {
                                echo "<li class='espace'>";
                                echo $array['nom'];
                                echo "</li>";
                            }
                        }
                        ?>
                    </ul>
                </th>
            </tr>
        </table>

        <!-- backup
        <table>
            <tr>
                <th>
                    <h4>Fest'ESAIP 2048</h4>
                </th>
                <th>
                    <ul class="espace">
                        <li>Daft Punk</li>
                        <li>Fredy Mercurie (holographique)</li>
                        <li>Sun 42</li>
                        <li>Bratisla boy</li>
                        <li>Boby La Pointe (holographique)</li>
                        <li>Edith Piaf (holographique)</li>
                    </ul>
                </th>
            </tr>
            <tr>
                <th>
                    <h4>Fest'ESAIP 2049</h4>
                </th>
                <th>
                    <ul class="espace">
                        <li>Mathias Perraud et ses mignottet</li>
                        <li>Antoine et ses sbires</li>
                        <li>les brute du staff</li>
                        <li>U3</li>
                        <li>Wolfgang Amadeus Mozart (holographique)</li>
                        <li>Edith Piaf (holographique)</li>
                    </ul>
                </th>
            </tr>
            <tr>
                <th>
                    <h4>Fest'ESAIP 2050</h4>
                </th>
                <th>
                    <ul class="espace">
                        <li>a10a</li>
                        <li>Trivial</li>
                        <li>Ca vas chauffer</li>
                        <li>U1 retour aux sources</li>
                        <li><s>Booba</s></li>
                        <li>Edith Piaf (holographique)</li>
                    </ul>
                </th>
            </tr>
        </table>
        -->

    </div>


    <div class="FestEsaip">
        <h3 id="contact">Equipe/contact</h3>
        <br>
        <ul>
            <li class="espace">Chef supreme : Paul Tregouet</li>
            <li class="espace">Sous chef : Antoine Richard</li>
            <li class="espace">Brute : Nathan Hardi</li>
            <li class="espace">Enfant perdu : Adrien Pironneau</li>
            <li class="espace">Mascotte : Florian Levenez-Delafontaine</li>
            <li class="espace">Sous-fifre : Antoine Guillot</li>
        </ul> 
        <p class="espace">Nous contacter : <a href="mailto:FestESAIP.contact@esaip.org">FestESAIP.contact@esaip.org</a> </p>
    </div>
</section>