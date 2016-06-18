<?php
/** Page Contact
 * 
 * @author Adrien PIRONNEAU
 * @date 18/06/2016
 * @rev 01
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<head>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<div id="contact">
    <article>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tellus eros, porttitor vitae turpis vitae, elementum euismod lacus. Nullam malesuada maximus risus, congue dapibus eros dictum aliquam. Fusce in cursus dolor, a rhoncus mi. Proin molestie nisl et nunc congue, ut bibendum elit volutpat. Integer ligula tortor, suscipit a ultricies eget, efficitur sit amet sapien. Cras at neque fringilla eros viverra interdum ut id turpis. Mauris lacinia fringilla ullamcorper. Vivamus tellus massa, condimentum interdum tortor et, interdum vulputate justo. Donec leo dui, ornare quis orci tempus, consectetur consectetur mi. Nulla in arcu condimentum arcu faucibus tristique.<br><br></p>
    </article>
    <div class="contact-area">
        <div class="contact-form">
            <form class="contact-text-form">
                <input type="text" placeholder="Title"/>
                <textarea name="comment" form="usrform" placeholder="Enter text here..." rows='10'></textarea>
                <button>Send</button>
                <p class="message">Do you need to edit? <a class="button-next button-next-a">Previous</a></p>
            </form>
            <form class="contact-login-form">
                <input type="text" placeholder="Username"/>
                <input type="email" placeholder="Email address"/>
                <button class="button-next">Next</button>
            </form>
        </div>
    </div>
</div>

<foot>
    <script type="text/javascript">$('.button-next').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});</script>
</foot>