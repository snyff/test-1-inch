<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>CUBUS Translation</title>
		<link rel="stylesheet" type="text/css" href="{cssFiles}/core.css" />
		<link rel="stylesheet" type="text/css" href="{cssFiles}/general.css" />
		<link rel="stylesheet" type="text/css" href="{cssFiles}/tabber.css" />
	   
		<link rel="stylesheet" type="text/css" href="{cssFiles}/c/global.css" />
		<link type="text/css" rel="stylesheet" href="{cssFiles}/calendar/dhtmlgoodies_calendar.css" media="screen"></head>
	
		<link rel="stylesheet" href="{cssFiles}/jquery.accessible-news-slider.css" type="text/css" media="screen" />
		
		<link rel="shortcut icon" href="{imgFiles}/ico/icon.gif">
	  
 	    <script type="text/javascript" src="{jsFiles}/cookietabber.js"></script>
	    <script type="text/javascript" src="{jsFiles}/tabber.js"></script>
	    <script type="text/javascript" src="{jsFiles}/js.js"></script>
	    <script type="text/javascript" src="{jsFiles}/javascript.js"></script>
 		<script type="text/javascript" src="{jsFiles}/calendar/dhtmlgoodies_calendar.js"></script>
 		<script type="text/javascript" src="{jsFiles}/c/js.js"></script>
  		<script type="text/javascript" src="{jsFiles}/chainedSelects/chainedselects.js"></script>
		
		<script language="javascript" type="text/javascript" src="{jsFiles}/jquery-1.2.6.pack.js"></script>
		<script language="javascript" type="text/javascript" src="{jsFiles}/jquery.accessible-news-slider.js"></script>
		<script language="javascript" type="text/javascript">
 			$(function() {
				$( "#example_2" ).accessNews({
					speed : "slow",
					slideBy : 4
				});
                                $("#slider_ul").css('width', '2641px');
			});
 		</script>
		<script language="javascript" type="text/javascript">
		 function roll_over(img_name, img_src) {
			    document[img_name].src = img_src;
            }			
 		</script>
  	</head>
<body{body.load}>
    <div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=129411246396";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div id="viewport">
 	<div id="hd">
		<div class="topbg{language}">
			<h1><a href="{siteURL}"></a></h1>
			<ZONE userStatus guest>
				<div style="float:right; margin-top:3px; padding:4px;padding-right:0;">
					<form method="post" action="?L=c.account">
						<div style="display: block;">
							<div style="float: left; margin-top:2px;">
								<span class="formw"><input name="email" class="inputs_login"  id="username" type="text" placeholder="[username {1003}]"></span>
                                                                <br />
                                                                <div style="height: 2px;"></div>
                                                                <a href="?L=c.registration" style="color: #c0c0c0; font-size: 11px; font-family: arial;"><span>[sign up! {1002}]!</span></a>
							</div>
							<div style="float: left; margin-top:2px; margin-left:8px;">
								<span class="formw"><input name="password" class="inputs_login" type="password" id="password" placeholder="[password {1006}]"></span>
                                                                <br />
                                                                <div style="height: 2px;"></div>
                                                                <a href="?L=c.lostpass" style="color: #c0c0c0; font-size: 11px; font-family: arial;"><span>[forgot your password? {1026}]</span></a>
							</div>
							<div style="float: left; margin-left:7px;">
								<span class="formw" style="margin-top:-10px;"><input name="userlogin" type="submit" id="userlogin" value="[ {1023}]" ></span>
							</div>
						 
						 </div>
					</form>
					<br style="clear:both;"> 
				</div>
			</ZONE userStatus guest>
			<ZONE userStatus user>
				<div style="float:right; margin-right:15px; margin-top:14px; padding:7px; border:1px #CCCCCC solid; background:#f5f5f5">
					<a href="?logout=1"><span>[Iesire {1139}]</span></a>
				</div>
			</ZONE userStatus user>
		</div>
		
                    <table cellspacing="0" cellpadding="0" border="0" width="100%" class="nav main-nav">
			<tr> 
                            <td><img src="{imgFiles}/cubus_new/menu_left.png" style="cursor:pointer;border-right: 1px solid #dadada;" onclick="window.location='{siteURL}'"></td>
<!--                            <td {page.home}><a id="home-link" href="{siteURL}"><span style=""><nobr>[Prima pagina {1130}]</nobr></span></a></td>-->
                            <td {page.about}>
                                <a href="?L=page.about">
                                    <nobr>
                                        <span>
                                            [Despre CUBUS {1134}]
                                            <img src="{imgFiles}/cubus_new/separator.png" style="position:absolute; bottom:0;right:0;">
                                        </span>
                                    </nobr>
                                </a>
                            </td>
                            <td {page.services}><a id="" href="{siteURL}/?L=page.services&ld=1"><span><nobr>[Servicii {1160}]</nobr><img src="{imgFiles}/cubus_new/separator.png" style="position:absolute; bottom:0;right:0;"></span></a></td>
                            <td {page.clients}><a href="?L=page.clients"><span><nobr>[Clienti CUBUS {1159}]</nobr><img src="{imgFiles}/cubus_new/separator.png" style="position:absolute; bottom:0;right:0;"></span></a></td>
                            <td>
                                <a href="javascript:;">
                                    <span>
                                        <nobr onmouseover="$('#info_submenu').show();">[Informatii {1161}]</nobr>
                                        <img src="{imgFiles}/cubus_new/separator.png" style="position:absolute; bottom:0;right:0;">
                                    </span>
                                </a>
                                <div id="info_submenu">
                                    <ul id="info_submenu_ul">
                                        <li><a href="">[Stiri {1164}]</a></li>
                                        <li><a href="?L=page.forClients">[Pentru clienti {1136}]</a></li>
                                        <li><a href="?L=page.forTranslators">[Pentru traducatori {1135}]</a></li>
                                        <li><a href="?L=page.contacts">[Contacte {1165}]</a></li>
                                    </ul>
                                </div>
                                <script>
                                    $('#info_submenu').mouseout(function(e){
                                        if (!e) var e = window.event;
                                        var reltg = (e.relatedTarget) ? e.relatedTarget : e.toElement;
                                        while (reltg.tagName != 'BODY'){
                                            if (reltg.id == this.id)return;
                                            reltg = reltg.parentNode;
                                        }
                                        $('#info_submenu').hide();
                                    });
                                </script>
                            </td>
<!--                            <td {page.count}><a id="products-link" href="{siteURL}/?L=c.calcPrice&ld=1"><span><nobr>[Calculeaza Pretul {1137}]</nobr><img src="{imgFiles}/cubus_new/separator.png" style="position:absolute; bottom:0;right:0;"></span></a></td>-->
                            <td {page.newsletter}><a id="products-link" href="{siteURL}/?L=page.newsletter"><span><nobr>[Abonare newsletter {7025}]</nobr><img src="{imgFiles}/cubus_new/separator.png" style="position:absolute; bottom:0;right:0;"></span></a></td>
                            <td width="400"><a><span>&nbsp;</span></a></td>
                            <td align="right" valign="middle">
                                    <span class="lang_span">
                                            <a style="display:inline; font-size:11px;margin-right:5px;" href="?L=change.lang&chromeless=1&currentlangdata=ro"><img align="absmiddle" src="{imgFiles}/cubus_new/rom.png"></a> 
                                            <a style="display:inline;  font-size:11px;margin-right:5px;" href="?L=change.lang&chromeless=1&currentlangdata=ru"><img align="absmiddle" src="{imgFiles}/cubus_new/rus.png"></a>
                                            <a style="display:inline;  font-size:11px;margin-right:5px;" href="?L=change.lang&chromeless=1&currentlangdata=en"><img align="absmiddle" src="{imgFiles}/cubus_new/eng.png"></a>
                                    </span>
                            </td>
                            <td><img src="{imgFiles}/cubus_new/menu_right.png"></td>		
			</tr>
 		</table>
<!--		<table cellspacing="0" class="sub-nav">
			<tr>
				<td class="spacer"><img src="{imgFiles}/spacer.gif"></td>
				<td><a href="?L=page.about">[Despre CUBUS {1134}]</a></td>
				<td class="spacer"><img src="{imgFiles}/spacer.gif"></td>
  				<td><a href="?L=page.forTranslators">[Pentru traducatori {1135}]</a></td>
				<td class="spacer"><img src="{imgFiles}/spacer.gif"></td>
				<td><a href="?L=page.forClients">[Pentru clienti {1136}]</a></td>
			</tr>
		</table>-->
	</div>
	
	{jump}
	
	<!--
 	<div style="text-align:center; width:940px; margin-left:10px; margin-top:1px; border:0px #666666 solid;">
		<table cellpadding="0" cellspacing="0" width="940">
			<td align="left" valign="middle" width="110" height="35"><font size="1">&nbsp;&nbsp;<strong>Parteneri CUBUS:</strong></font></td>
			<td align="left" valign="middle">
			<a href="http://www.hr.md" target="_blank" onMouseOver="roll_over('ids', '{imgFiles}/parteneri/ids.gif')" onMouseOut="roll_over('ids', '{imgFiles}/parteneri/ids_gri.gif')"><img name="ids" src="{imgFiles}/parteneri/ids_gri.gif" align="absmiddle" border="0" hspace="8"></a>
			<img src="http://cubus.md/img/spacer.gif" align="absmiddle">
			<a href="http://www.kissfm.md" target="_blank" onMouseOver="roll_over('kiss', '{imgFiles}/parteneri/kiss.jpg')" onMouseOut="roll_over('kiss', '{imgFiles}/parteneri/kiss_gri.gif')"><img name="kiss" src="{imgFiles}/parteneri/kiss_gri.gif" align="absmiddle" border="0" hspace="8"></a>
			<img src="http://cubus.md/img/spacer.gif" align="absmiddle">
			<a href="http://www.milion.md" target="_blank" onMouseOver="roll_over('milion', '{imgFiles}/parteneri/milion.jpg')" onMouseOut="roll_over('milion', '{imgFiles}/parteneri/milion_gri.jpg')"><img name="milion" src="{imgFiles}/parteneri/milion_gri.jpg" align="absmiddle" border="0" hspace="8"></a>
			</td>
		</table>
	</div>
	-->
 	
        <div>
            <div style="float:left; width:923px;margin-left:11px;margin-top:15px;">
                    <span style="font-size:14px;font-weight:normal;color:#000;">[Clienti CUBUS {1159}]</span>
                    <table>
                        <tr>
                            <td valign="middle">
                                <a href="javascript:;" onclick="$('#bback').click();"><img src="{imgFiles}/cubus_new/slider_left.png"></a>
                            </td>
                            <td>
                            <div style="" class="accessible_news_slider business_as_usual" id="example_2">
                                <div class="back"><a href="#" title="Back" id="bback"></a></div>
                                <div style="margin-top:-6px; background-color:#FAFAFA;">
                                    <ul style="width: 2641px;" id="slider_ul">
                                        {slider_str}
                                    </ul>
                                </div>
                                <div class="next"><a href="#" title="Next" id="nnext"></a></div>
                            </div>
                            </td>
                            <td width="90" align="right">
                                <a href="javascript:;" onclick="$('#nnext').click();"><img src="{imgFiles}/cubus_new/slider_right.png"></a>
                            </td>
                        </tr>
                    </table>
                            <?php echo 'mda';?>
            </div>
        </div>
</div><!-- end viewport -->
<br clear="all" />

<div class="copy" style="font-size:12px;color:#000;font-family:arial;border-top:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;padding:9px;">
    <div style="text-align:left;margin: auto;width:945px;">
            <table style="font-size:12px;color:#000;font-family:arial;" width="100%">
                <tr>
                    <td>
                        Str. Tighina 11/1 <span style="color:#e5e5e5">|</span> Chisinau MD-2001 <span style="color:#e5e5e5">|</span> Tel: 925090 <span style="color:#e5e5e5">|</span> Mob.: 068640001 <span style="color:#e5e5e5">|</span> info@cubus.md
                    </td>
                    <td align="right">
                        [Urmeaza Cubus pe {1162}] 
                    </td>
                    <td align="right" width="97">
                        <a href="http://www.facebook.com/cubus.page" target="_blank"><img src="{imgFiles}/cubus_new/fb.png"></a>&nbsp;
                        <a href="http://twitter.com/#!/CUBUSMD" target="_blank"><img src="{imgFiles}/cubus_new/tw.png"></a>&nbsp;
                        <a href="" target="_blank"><img src="{imgFiles}/cubus_new/in.png"></a>&nbsp;
                    </td>
            </table>
    </div>
</div>
<div style="font-size:12px;color:#000;font-family:arial;border-bottom:1px solid #e5e5e5;padding:15px;background-color:#f8f8f8;">
    <div style="text-align:left;margin: auto;width:945px;">
            <table style="font-size:11px;color:#c0c0c0;font-family:arial;" width="100%">
                <tr>
                    <td>
                        <span style="font-size:11px;">[Realizat de {1163}]</span> <a style="font-size:11px;color:#c0c0c0;font-family:arial;text-decoration: underline;" href="http://mg.md/" target="_blank">Monitoring Group</a>
                    </td>
                    <td align="right" width="">
                        <span style="font-size:11px;">Copyright &copy; www.Cubus.md Toate Drepturile Rezervate</span>
                    </td>
            </table>
    </div>
</div>
<div style="padding-top:10px;"></div>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28770217-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Woopra Code Start -->
<script type="text/javascript" src="//static.woopra.com/js/woopra.v2.js"></script>
<script type="text/javascript">
woopraTracker.track();
</script>
<!-- Woopra Code End -->

</body>
</html>
