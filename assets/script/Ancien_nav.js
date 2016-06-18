/**
 * Generic script for displaying a "Browser outdated" message to users
 * Displays an overlay and a message including the Chrome Frame
 *
 * @see http://www.browser-update.org/fr/
 *Source : https://www.occitech.fr/blog/2013/02/afficher-un-message-dinformation-aux-utilisateurs-ayant-un-navigateur-ancien/
 */

var $buoop = {
	reminder: 168,
	newwindow: true,
	text:
		"Bonjour. " +
		"Le site est optimisé pour fonctionner sur des navigateurs <b>récents</b>, ce qui ne semble pas être le cas du vôtre (%s). " +
		"Il pourrait <b>ne pas afficher certaines fonctionalités</b> de ce site (et d'autres) et contenir des <b>failles de sécurité</b>." +
		"<ul>" +
		"<li><a%s>Découvrez comment mettre votre navigateur à jour</a></li>" +
		"</ul>",
	onshow: function(infos){
		var e = document.createElement("div");
		e.setAttribute("id", "buorgoverlay");
		e.style.width = document.body.clientWidth + 'px';
		e.style.height = document.body.clientHeight + 'px';

		document.body.appendChild(e);
		document.body.style.marginTop = '0';
		$buoop.addOverlayCss();

		var chromeFrame = document.getElementById("buorgchromeframe");
		if (typeof(chromeFrame) !== 'undefined' && chromeFrame !== null) {
			chromeFrame.onclick = function(e) {
				$buoop.stopPropagation(e);
				return true;
			};
		}

		document.getElementById("buorgclose").onclick = $buoop.closeHandler;
		document.getElementById("buorgoverlay").onclick = $buoop.closeHandler;
	},
	closeHandler: function(e) {
		$buoop.stopPropagation(e);
		document.getElementById("buorg").style.display = "none";
		document.getElementById("buorgoverlay").style.display = "none";
		return true;
	},
	stopPropagation: function(e) {
		var e = e || window.event;
		if (e.stopPropagation) e.stopPropagation();
		else e.cancelBubble = true;
	},
	addOverlayCss: function(e) {
		var style = "body .buorg {" +
				"position:absolute;" +
				"top: 45%;" +
				"width: 70%;" +
				"left:15%;" +
				"border-bottom:1px solid #A29330;" +
				"background:#FDF2AB no-repeat 12px 25px url(http://browser-update.org/img/dialog-warning.gif);" +
				"z-index: 1000;" +
			"}" +
			"body .buorg div, body .buorg li { font-size: 20px; line-height: 24px }" +
			"body .buorg li { list-style: inside; }" +
			"body .buorg div {" +
				"padding:20px 36px 20px 40px;" +
			"}" +
			"#buorgoverlay {" +
				"position: absolute;" +
				"top: 0;" +
				"left: 0;" +
				"z-index: 999;" +
				"width: 100%;" +
				"height: 100%;" +
				"background: #000;" +
				"opacity: 0.6;" +
				"-ms-filter:\"progid:DXImageTransform.Microsoft.Alpha(Opacity=60)\";" +
				"filter: alpha(opacity=60);" +
			"}";
		$buoop.addInlineStyle(style);
	},
	addInlineStyle: function(style) {
		var sheet = document.createElement("style");
		document.getElementsByTagName("head")[0].appendChild(sheet);
		try {
			sheet.innerText=style;
			sheet.innerHTML=style;
		} catch(e) {
			try {
				sheet.styleSheet.cssText=style;
			}
			catch(e) {
				return;
			}
		}
	}
};

$buoop.ol = window.onload;
window.onload = function(){
	try {if ($buoop.ol) $buoop.ol();}catch (e) {}
	var e = document.createElement("script");
	e.setAttribute("type", "text/javascript");
	e.setAttribute("src", "http://browser-update.org/update.js");
	document.body.appendChild(e);
}
