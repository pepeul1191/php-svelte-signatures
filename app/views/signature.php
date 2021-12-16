<?php

return <<<EOD

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>Firmas de %user_name</title>
 <style type="text/css">
  	a {
  		color: #09C;
  		text-decoration: none;
  	}
  	a:hover {
  		color: #069;
  	}
    p {
      margin-bottom: 3px;
      margin-top: 3px;
    }
 </style>
</head>
<body>
<p><font style="font-size:12px;" face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#05233D">Atte.</font></p>
<table width="35%" border="0" cellspacing="0" cellpadding="0" style="border-top-width:2px; border-top-style:solid; border-top-color:#dbeae7; padding-top: 5px;">
 <tr>
  <td width="120" align="center" valign="top"><img  width="120" height="120" src="%enterprise_logourl" alt="Logo" hspace="5" style="margin-right:10px; margin-bottom: 4px;"/></td>
  <td align="left" valign="top" style="padding:0px;">
    <p>
      <font face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#05233d" style="font-size:12px;">%user_name</font><br/>
      <font style="font-size:11px;" face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#05233D">%user_role</font><br/>
      <font style="font-size:11px;" face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#05233D">%user_mail</font><br/>
      <font face="Trebuchet MS, Arial, Helvetica, sans-serif" style="font-size:12px"><strong><font color="#1b4260" style="font-size:11px;">%user_phone</font></strong>
    </p>
   <p>
    <font face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#05233d"  style="font-size:11px;">%enterprise_name</font><br/>
    <font face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#416886"  style="font-size:11px;">%enterprise_adress</font><br/>
    <font face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#416886" size="-1" style="font-size:11px;">Tlf: <strong><font color="#1b4260">%enterprise_phone</font></strong><br><font face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#1b4260" size="-1"><a style="font-size:11px;" href="mailto:%enterprise_mail">%enterprise_mail</a> · <a style="font-size:11px;"  href="%enterprise_website">%enterprise_websitename</a></font>
   </p>
   <p style="margin-top: 6px; line-height:1em; font-size:12px; padding-bottom:3px;"><font color: rgb(144, 167, 181);face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#90A7B5" size="-1"><em>%enterprise_slogan</em></font></p>
    </td>
 </tr>
  <tr>
  <td colspan="2" align="left" valign="top" style="border-top-width:2px; border-top-style:solid; border-top-color:#dbeae7;">
   <p style="padding-top: 4px;"><font face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#79ac13"  style="font-size:11px;"><img src="https://softweb.pe/public/assets/img/leaf.png" alt="eco" width="14" height="14" align="absmiddle"/> &nbsp;&nbsp;No me imprimas si no es necesario. Protejamos el medio ambiente</font></p>
  </td>
 </tr>
 </table>
</body>
</html>

EOD;
