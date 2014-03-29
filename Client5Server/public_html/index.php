<?php
function proCHECK() { return TRUE; }
include("path.php");
include(pathREL."config/config.php");
include(pathprivate."indexCALL.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo siteNAME." - ".siteMOTTO; ?></title>
<meta name="keywords" content="<?php echo siteKEYWORDS; ?>">
<meta name="description" content="<?php echo siteMETADESC; ?>">
<meta name="author" content="<?php echo siteMETAAUTHOR; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- IMPORTANT TIP:
		Do NOT Close void tags e.g. - <script href="blah.js">
		not: <script href="blah.js" />
		Reason is that closed void tags pass a silent error to browser
		and are not needed, make the page load take longer and are
		deprecated in HTML5 (However for valid XHTML you DO need to close
		void tags)
-->
<link href='http://fonts.googleapis.com/css?family=Share+Tech' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href="css/default5.css" rel="stylesheet" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.playlist.js"></script>
<script src="js/fancywebsocket.js"></script>
<script src="js/fNode.js/fooDHTML.js"></script>
<script src="js/three/js/Detector.js"></script>
<script src="js/fNode.js/fooWebSocket.js"></script>
<script src="js/fNode.js/fooSYS.js"></script>
<script src="js/fNode.js/fooChatAssist.js"></script>
<script src="js/fNode.js/fooBoB.js"></script>
<script>
	
	var scrolled = 0;
	
$(document).ready(function () {
    $("#downClick").on("click", function () {
        scrolled = scrolled + 300;
        $(".metaInnerWrap").stop().animate({
            scrollTop: scrolled
        });
    });
	
	 $("#downClickMedia").on("click", function () {
        scrolled = scrolled + 300;
        $(".metaInnerWrap").stop().animate({
            scrollTop: scrolled
        });
    });

    $("#upClick").on("click", function () {
        scrolled = scrolled - 300;
        $(".metaInnerWrap").stop().animate({
            scrollTop: scrolled
        });
    });
    
     $("#downClicktwitter").on("click", function () {
        scrolled = scrolled + 300;
        $(".metaInnerWrap").stop().animate({
            scrollTop: scrolled
        });
    });

    $("#upClicktwitter").on("click", function () {
        scrolled = scrolled - 300;
        $(".metaInnerWrap").stop().animate({
            scrollTop: scrolled
        });
    });
	
	 $("#upClickMedia").on("click", function () {
        scrolled = scrolled - 300;
        $(".metaInnerWrap").stop().animate({
            scrollTop: scrolled
        });
    });

    $(".clearValue").on("click", function () {
        scrolled = 0;
    });
});

$(document).ready(function() {
         
              setInterval( function() {
              var seconds = new Date().getSeconds();
              var sdegree = seconds * 6;
              var srotate = "rotate(" + sdegree + "deg)";
              
              $("#sec").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});
                  
              }, 1000 );
              
         
              setInterval( function() {
              var hours = new Date().getHours();
              var mins = new Date().getMinutes();
              var hdegree = hours * 30 + (mins / 2);
              var hrotate = "rotate(" + hdegree + "deg)";
              
              $("#hour").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
                  
              }, 1000 );
        
        
              setInterval( function() {
              var mins = new Date().getMinutes();
              var mdegree = mins * 6;
              var mrotate = "rotate(" + mdegree + "deg)";
              
              $("#min").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
                  
              }, 1000 );
         
        }); 
</script>

</head>
<body id="n0" style="z-index: 0;" onload="init()">



<audio src="" id="alertAudioPlayer" controls autoplay  preload="auto" style="visibility: hidden; height: 0px;"></audio>
<div id="headerwrap1" class="headWrap">
	<div id="headerLogo" class="headerLogo">&nbsp;</div>
	<div id="headerLocalAd" class="headerLocalAd"></div>
</div>

<div id="globoWrap" class="globoWrap">
<img src="/media/textures/stock/ui/comhud1.png" class="comHUDWrap" />
<img src="/media/textures/stock/ui/scopeglass.png" class="comHUDglass" />
<div id="comHUDscreen" class="comHUDscreen">
</div>
</div>

<div id="mailwrap1" class="metaWrap" style="padding: 18px; visibility: hidden; background-color:rgba(0,0,0,0.0); z-index: 6; width: 600px; height: 450px; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto;">
<h2>altMail</h2>
<div onClick="hideObject('mailwrap1');" class="BobClose BoBgrow">&nbsp;</div>
<div onClick="schedDODay('back');" class="BobArrowUp BoBgrow">&nbsp;</div>
<div onClick="schedDODay('next');" class="BobArrowDown BoBgrow">&nbsp;</div>
<div id="mailInnerWrap" class="metaInnerWrap" >
	
		
		
</div>

</div>

<div id="twitterwrap1" class="metaWrap" style="padding: 18px; visibility: hidden; background-color:rgba(0,0,0,0.0); z-index: 6; width: 600px; height: 450px; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto;">
<h2>altUFO Twitter Feed</h2>
<div onClick="hideObject('twitterwrap1');" class="BobClose BoBgrow">&nbsp;</div>
<div id="upClicktwitter" class="BobArrowUp BoBgrow">&nbsp;</div>
<div id="downClicktwitter" class="BobArrowDown BoBgrow">&nbsp;</div>
<div id="twitterInnerWrap" class="metaInnerWrap" >


		
</div>

</div>

<div id="schedulewrap1" class="schedWrap" style="padding: 18px; visibility: hidden; background-color:rgba(0,0,0,0.0); z-index: 6; width: 600px; height: 450px; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto;">
<h2>altUFO Schedule</h2>
<div onClick="hideObject('schedulewrap1');" class="BobClose BoBgrow">&nbsp;</div>
<div id="upClick" class="BobArrowUp BoBgrow">&nbsp;</div>
<div id="downClick" class="BobArrowDown BoBgrow">&nbsp;</div>
<div id="schedInnerWrap" class="metaInnerWrap" >
	
		<div class="showTime6" id="lio"><span class="schedTIME">12 AM - 6 AM</span><span class="schedSHOW">Outer Limits Conspiracy</span></div>
		<div class="showTime4" id="lie"><span class="schedTIME">6 AM - 10 AM</span><span class="schedSHOW">Morning Liberal Show</span></div>
		<div class="showTime1" id="lio"><span class="schedTIME">11 AM - 12 PM</span><span class="schedSHOW">Talking Points with LordVoo</span></div>
		<div class="showTime4" id="lie"><span class="schedTIME">12 PM - 4 PM</span><span class="schedSHOW">Battle Zone Free For All</span></div>
		<div class="showTime6" id="lio"><span class="schedTIME">4 PM - 10 PM</span><span class="schedSHOW">Prime Time in the Dungeon</span></div>
		<div class="showTime2" id="lie"><span class="schedTIME">10 PM - 12 AM</span><span class="schedSHOW">Vandetta Time</span></div>
		
</div>
</div>

<div id="mediawrap1" class="metaWrap" style="padding: 18px; visibility: hidden; background-color:rgba(0,0,0,0.0); z-index: 6; width: 600px; height: 450px; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto;">
<h2>altMedia</h2>
<div onClick="hideObject('mediawrap1');" class="BobClose BoBgrow">&nbsp;</div>
<div id="upClickMedia" class="BobArrowUp BoBgrow">&nbsp;</div>
<div id="downClickMedia" class="BobArrowDown BoBgrow">&nbsp;</div>
<div id="mediaInnerWrap" class="metaInnerWrap" >

<span style="display: block;"><h3 style="display: inline-block; padding: 8px; padding-left: 0px; padding-right: 18px;">Now Playing: </h3><h3 class="effexFade2Black" style="display: inline-block;">Mainstream Proof of Concept Live Stream</h3></span>
<audio src="http://altufo.com:8000/livestream.ogg" id="audioPLAYER" controls autoplay  preload="auto" style="visibility: inherit; display: block; align: center;"></audio >
<span style="display: block;"><h3 style="display: inline-block; padding: 8px; padding-left: 0px; padding-right: 18px;">Network Status: </h3><h3 class="effexFade2Black" style="display: inline-block;">Live Stream</h3></span>		

</div>
</div>

<div id="controlwrap1" class="metaWrap" style="padding: 18px; visibility: hidden; background-color:rgba(0,0,0,0.0); z-index: 6; width: 600px; height: 450px; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto;">
<h2>altPanel</h2>
<div onClick="hideObject('controlwrap1');" class="BobClose BoBgrow">&nbsp;</div>
<div id="upClick" class="BobArrowUp BoBgrow">&nbsp;</div>
<div id="downClick" class="BobArrowDown BoBgrow">&nbsp;</div>

<div id="controlInnerWrap" class="metaInnerWrap" >
	<img src="/media/textures/stock/ui/loginavatar75.png" class="BobMetaLoginLaunch BoBgrow" />
</div>

</div>

<div id="PALcontrolwrap1" class="PALmetaWrap" style="padding: 18px; visibility: hidden; background-color:rgba(0,0,0,0.0); z-index: 6; position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto;">
<h2>VControl Panel</h2>
<div onClick="hideObject('PALcontrolwrap1');" class="BobClose BoBgrow">&nbsp;</div>

<div id="PALcontrolInnerWrap" class="PALmetaInnerWrap" >
<div id="log" style="width: 80%; background-color: #222; color: #efefef; overflow: auto; height: 300px; margin: 9px;"></div>
 <input id="msg" type="textbox" onkeypress="onkey(event)" style="width: 80%; background-color: #222; color: #efefef; height: 26px; margin: 9px;"/>
 <button onclick="send();">Send</button>
 <button onclick="quit();">Quit</button>
</div>
</div>
<div onClick="skinnyBobLaunch();" class="BobLaunch BoBgrow">&nbsp;</div>
<div onClick="skinnyBobMediaLaunch();" class="BobVolumeLaunch BoBgrow">&nbsp;</div>
<div onClick="skinnyBobSchedLaunch();" class="BobSchedLaunch BoBgrow">&nbsp;</div>
<div onClick="skinnyBobTwitterLaunch();" class="BobTwitterLaunch BoBgrow">&nbsp;</div>
<div onClick="skinnyBobMailLaunch();" class="BobMailLaunch BoBgrow">&nbsp;</div>
<div id="timex" class="timex">
	<ul id="clock">	
	   	<li id="sec"></li>
	   	<li id="hour"></li>
		<li id="min"></li>
	</ul>
</div>
<div id="n2" style="visibility: hidden; overflow: hidden; opacity: 0.4; background-color:#000; z-index: 4; width: 100%; height: 100%; position: fixed;top:0;bottom:0;left:0;right:0;margin:auto;">&nbsp;</div>
<div class="footerWrap">&nbsp;</div>


</body>
</html>
