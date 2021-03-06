<?php
/*    
	This file is part of STFC.
	Copyright 2006-2007 by Michael Krauss (info@stfc2.de) and Tobias Gafner
		
	STFC is based on STGC,
	Copyright 2003-2007 by Florian Brede (florian_brede@hotmail.com) and Philipp Schmidt
	
    STFC is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 3 of the License, or
    (at your option) any later version.

    STFC is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


$player_online = $db->queryrow('SELECT COUNT(user_id) AS num FROM user WHERE last_active > '.(time() - 60 * 20));
$player_online2 = $db2->queryrow('SELECT COUNT(user_id) AS num FROM user WHERE last_active > '.(time() - 60 * 20));

$title_html = 'Star Trek: Frontline Combat - Login';
$meta_descr = 'STFC: Pagina per effettuare la login alla galassia di gioco a cui si e` iscritti (galassia Brown Bobby o Fried Egg).';
$main_html .= '
<center><span class="caption">Login</span></center><br>

<form name="login_form" method="post" action="" onSubmit="return document.login_form.action = document.login_form.galaxy[document.login_form.galaxy.selectedIndex].value;">
<table align="center" border="0" cellpadding="2" cellspacing="2" width="320" class="border_grey" style=" background-image:url(\'gfx/template_bg.jpg\'); background-position:left; background-repeat:yes;">
  <tr>
    <td width="100%">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-image:url(\'gfx/template_bg.jpg\'); background-position:left; background-repeat:yes;">
        <tr>
          <td width="30%">Login:</td>
          <td width="70%"><input type="text" name="user_name" size="30" class="field"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="user_password" size="30" class="field"></td>
        </tr>
        <tr>
          <td>Galassia:</td>
          <td>
            <select name="galaxy">
              <option value="./game/index.php" selected="selected">'.GALAXY1_NAME.' ['.$player_online['num'].' online]</option>
              <option value="./game2/index.php">'.GALAXY2_NAME.' ['.$player_online2['num'].' online]</option>
            </select>
          </td>
        </tr>
        <tr><td height="5">&nbsp;</td></tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="checkbox" name="proxy_mode" value="1">&nbsp;Sto usando un <a href="http://it.wikipedia.org/wiki/Proxy" target="_blank"><u>server proxy</u></a> *</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan=2>
      * <i>Usare solo se le immagini non vengono caricate.</i>
    </td>
  </tr>
</table>

<br>
<center>
[ <a href="index.php?a=lost_password">Recupero password dimenticata</a> ]<br><br>
<input class="button" type="submit" name="stgc_login" value="Conferma">
</center>
</form>
';

?>
