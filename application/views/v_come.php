<?php
/** Page Venez au Fest'esaip
 * 
 * @author Adrien PIRONNEAU
 * @date 14/06/2016
 * @rev 01
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class='gmaps'>
    <div id='gmap_canvas'></div>
</div>


<foot>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
    <script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(47.4636447,-0.49710240000001704),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(47.4636447,-0.49710240000001704)});infowindow = new google.maps.InfoWindow({content:'<strong>ESAIP</strong><br>18 Rue du 8 Mai 1945, 49124 Saint-Barthélemy-d\'Anjou<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
</foot>
