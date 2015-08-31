<?php 
/**
 * @version     1.8
 * @link http://www.nuked-klan.org Clan Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */
if (!defined("INDEX_CHECK"))
{
    die ("<div style=\"text-align: center;\">You cannot open this page directly</div>");
} 

global $user, $nuked, $language;
translate("modules/Textbox/lang/" . $language . ".lang.php");

$level_access = nivo_mod("Textbox");
$level_admin = admin_mod("Textbox");

if ($user)
{
    $visiteur = $user[1];
} 
else
{
    $visiteur = 0;
} 

function index()
{
    global $nuked, $user, $theme, $bgcolor1, $bgcolor2, $bgcolor3, $level_access, $level_admin, $visiteur;

    if ($visiteur >= $level_access && $level_access > -1) {
        opentable();

        $nb_mess = $nuked['max_shout'];

        $sql = mysql_query("SELECT id FROM " . TEXTBOX_TABLE);
        $count = mysql_num_rows($sql);

        if (!$_REQUEST['p']) $_REQUEST['p'] = 1;
        $start = $_REQUEST['p'] * $nb_mess - $nb_mess;

        echo "<div class=\"nkAlignCenter\"><h1>" . _SHOUTBOX . "</h1></div>\n";

        if ($count > $nb_mess) {
            number($count, $nb_mess, "index.php?file=Textbox");
        } 

        echo "<div id=\"nkTextboxWrapper\">\n";

        $sql2 = mysql_query("SELECT id, auteur, ip, texte, date FROM " . TEXTBOX_TABLE . " ORDER BY id DESC LIMIT " . $start . ", " . $nb_mess."");
        while (list($mid, $auteur, $ip, $texte, $date) = mysql_fetch_array($sql2)) {
            $texte = printSecuTags($texte);
            $texte = nk_CSS($texte);

            $texte = ' ' . $texte;
            $texte = preg_replace("#([\t\r\n ])([a-z0-9]+?){1}://([\w\-]+\.([\w\-]+\.)*[\w]+(:[0-9]+)?(/[^ \"\n\r\t<]*)?)#i", '\1<a href="\2://\3" onclick="window.open(this.href); return false;">\2://\3</a>', $texte);
            $texte = preg_replace("#([\t\r\n ])(www|ftp)\.(([\w\-]+\.)*[\w]+(:[0-9]+)?(/[^ \"\n\r\t<]*)?)#i", '\1<a href="http://\2.\3" onclick="window.open(this.href); return false;">\2.\3</a>', $texte);
            $texte = preg_replace("#([\n ])([a-z0-9\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $texte);

            $texte = icon($texte);
            $date = nkDate($date);

            $auteur = nk_CSS($auteur);

            $sql_aut = mysql_query("SELECT rang, country FROM " . USER_TABLE . " WHERE pseudo = '" . $auteur . "'");
            list($rang, $country) = mysql_fetch_array($sql_aut);

            $sql_rank_team = mysql_query("SELECT couleur FROM " . TEAM_RANK_TABLE . " WHERE id = '" . $rang . "'");
            list($rank_color) = mysql_fetch_array($sql_rank_team);

            $pays = ($country) ? '<img src="images/flags/' . $country . '" alt="' . $country . '" style="margin-right:2px;"/>' : '';
            $url_auteur = '<a href="index.php?file=Members&amp;op=detail&amp;autor=' . urlencode($auteur) . '" style="color: #' . $rank_color . '" >' . $auteur . '</a>';
        
            if ($j == 0) {
                $bg = $bgcolor2;
                $j++;
            } 
            else {
                $bg = $bgcolor1;
                $j = 0;
            } 

            if ($visiteur >= $level_admin && $level_admin > -1) {
                echo "<script type=\"text/javascript\">\n"
                . "<!--\n"
                . "\n"
                . "function del_shout(pseudo, id)\n"
                . "{\n"
                . "if (confirm('" . _DELETETEXT . " '+pseudo+' ! " . _CONFIRM . "'))\n"
                . "{document.location.href = 'index.php?file=Textbox&page=admin&op=del_shout&mid='+id;}\n"
                . "}\n"
                . "\n"
                . "// -->\n"
                . "</script>\n";

                $admin = "<div style=\"text-align: right;\"><div class=\"nkButton-group\"><span class=\"nkButton icon alone pin small\" title=\"" . $ip . "\"></span><a href=\"index.php?file=Textbox&amp;page=admin&amp;op=edit_shout&amp;mid=" . $mid . "\" class=\"nkButton icon alone edit small\" title=\"" . _EDITTHISMESS . "\"></a>"
                . "&nbsp;<a href=\"javascript:del_shout('" . mysql_real_escape_string(stripslashes($auteur)) . "', '" . $mid . "');\" class=\"nkButton icon alone remove small danger\" title=\"" . _DELTHISMESS . "\"></a></div></div>";
            } 
            else {
                $admin = "";
            } 
            echo "<div class=\"nkShootboxTinyRow\" style=\"background: " . $bg . ";padding:5px;\">\n"
            . "<div class=\"nkInlineBlock nkFloatRight\" style=\"padding:5px 0\">". $admin ."</div>\n"
            . "<div>" . $pays . "&lsaquo;<strong>" . $url_auteur . "</strong>&rsaquo;" . $texte . "\n"
            . "<br /><span class=\"nkShootDate\">" . $date . "<span></div></div>\n"
            . "<div class=\"nkClear\"></div>\n";
        } 

        if ($count == 0) echo "<div class=\"nkAlignCenter\">" . _NOMESS . "</div>\n";

        echo"</div>";

        if ($count > $nb_mess) {
            number($count, $nb_mess, "index.php?file=Textbox");
        } 

        echo "<br /><div class=\"nkAlignCenter\"><small><i>( " . _THEREIS . "&nbsp;" . $count . "&nbsp;" . _SHOUTINDB . " )</i></small></div><br />\n";

        closetable();
    } 
    else if ($level_access == -1) {
        opentable();
        // On affiche le message qui previent l'utilisateur que le module est désactivé
        echo '<div id="nkAlertError" class="nkAlert">
                <strong>'._MODULEOFF.'</strong>
                <a href="javascript:history.back()"><span>'._BACK.'</span></a>
            </div>';
        closetable();
    } 
    else if ($level_access == 1 && $visiteur == 0) {
        opentable();
        // On affiche le message qui previent l'utilisateur qu'il n'as pas accès à ce module
        echo '<div id="nkAlertError" class="nkAlert">
                <strong>'._USERENTRANCE.'</strong>
                <a href="index.php?file=User&amp;op=login_screen"><span>'._LOGINUSER.'</span></a>
                &nbsp;|&nbsp;
                <a href="index.php?file=User&amp;op=reg_screen"><span>'._REGISTERUSER.'</span></a>
            </div>';
        closetable();
    } 
    else {
        opentable();
        // On affiche le message qui previent l'utilisateur que le module est désactivé
        echo '<div id="nkAlertError" class="nkAlert">
                <strong>'._NOENTRANCE.'</strong>
                <a href="javascript:history.back()"><span>'._BACK.'</span></a>
            </div>';
        closetable();
    } 
} 

    function smilies()
    {
        global $theme, $bgcolor3, $bgcolor2;

        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n"
        . "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"fr\">\n"
        . "<head><title>" . _SMILEY . "</title>\n"
        . "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\n"
        . "<meta http-equiv=\"content-style-type\" content=\"text/css\" />\n"
        . "<link title=\"style\" type=\"text/css\" rel=\"stylesheet\" href=\"themes/" . $theme . "/style.css\" />\n"
        . "<script type=\"text/javascript\" src=\"media/js/smilies.js\"></script></head>\n"
        . "<body style=\"background: " . $bgcolor2 . ";\">\n";

        echo "<script type=\"text/javascript\">\n"
        . "<!--\n"
        . "\n"
        . "function eff(){\n"
        . "if (opener.document.getElementById('" . $_REQUEST['textarea'] . "').value == '" . _YOURMESS . "')\n"
        . "{\n"
        . "opener.document.getElementById('" . $_REQUEST['textarea'] . "').value='';\n"
        . "}\n"
        . "}\n"
        . "\n"
        . "// -->\n"
        . "</script>\n";

        echo "<div style=\"text-align: center;\"><big><b>" . _LISTSMILIES . "</b></big></div>\n"
        . "<table width=\"100%\" cellpadding=\"3\" cellspacing=\"0\"><tr><td colspan=\"2\">&nbsp;</td></tr>\n"
        . "<tr style=\"background: $bgcolor3;\"><td align=\"center\"><b>" . _CODE . "</b></td><td align=\"center\"><b>" . _IMAGE . "</b></td></tr>\n";

        $sql = mysql_query("SELECT code, url, name FROM " . SMILIES_TABLE . " ORDER BY id");
        while (list($code, $url, $name) = mysql_fetch_array($sql))
        {
            $name = printSecuTags($name);
            $code = printSecuTags($code);

            echo "<tr><td align=\"center\"><a href=\"javascript:eff();PopupinsertAtCaret('" . $_REQUEST['textarea'] . "', ' " . $code . " ', '')\" title=\"" . $name . "\">" . $code . "</a></td>\n"
            . "<td align=\"center\"><a href=\"javascript:eff();PopupinsertAtCaret('" . $_REQUEST['textarea'] . "', ' " . $code . " ')\"><img style=\"border: 0;\" src=\"images/icones/" . $url . "\" alt=\"\" title=\"" . $name . "\" /></a></td></tr>\n";
        } 

        echo "</table><div style=\"text-align: center;\"><br /><a href=\"#\" onclick=\"javascript:window.close()\"><b>" . _CLOSEWINDOW . "</b></a></div></body></html>";
    } 
    
    function cesure_href($matches) { 
        return '<a href="' . $matches[1] . '" title="' . $matches[1] . '" >['. _TLINK .']</a>';      
    }     
    
    function ajax() {

        header('Content-type: text/html; charset=iso-8859-1');
        global $nuked,$user,$language, $bgcolor1, $bgcolor2;

        require("modules/Textbox/config.php");

        $visiteur = $user ? $user[1] : 0;

        if ($visiteur >= $level_admin) {
            echo "<script type=\"text/javascript\">\n"
            . "<!--\n"
            . "\n"
            . "function del_shout(pseudo, id)\n"
            . "{\n"
            . "if (confirm('" . _DELETETEXT . " '+pseudo+' ! " . _CONFIRM . "'))\n"
            . "{document.location.href = 'index.php?file=Textbox&page=admin&op=del_shout&mid='+id;}\n"
            . "}\n"
            . "\n"
            . "// -->\n"
            . "</script>\n";
        }

        $active = 2;
        $width = $box_width;
        $height = $box_height;
        $max_chars = $max_string;
        $mess_max = $max_texte;
        $pseudo_max = $max_pseudo;
        $level_admin = admin_mod('Textbox');
        $level_mod = nivo_mod('Textbox');
        
        $nb_messages = 40;
        
        $sql = mysql_query('SELECT count(id) FROM '.TEXTBOX_TABLE.' ');
        list($index_limit) = mysql_fetch_array($sql);
        $index_start = $index_limit - $nb_messages;
        $index_start = $index_start < 0 ? 0 : $index_start;

        $sql = mysql_query("SELECT id, auteur, ip, texte, date FROM " . TEXTBOX_TABLE . " ORDER BY id ASC LIMIT ".$index_start.", ".$index_limit." ")or die(mysql_error());
        while (list($id, $auteur, $ip, $texte, $date) = mysql_fetch_array($sql)) {
            // On coupe le texte si trop long
            if (strlen($texte) > $mess_max) $texte = substr($texte, 0, $mess_max) . '...';

            $date_jour = nkDate($date);

            $block_text = '';

            // On coupe les mots trop longs
            $text = explode(' ', $texte);
            for($i = 0;$i < count($text);$i++) {
                $text[$i] = " " . $text[$i];

                if (strlen($text[$i]) > $max_chars && !preg_match("`http:`i", $text[$i]) && !preg_match("`www\.`i", $text[$i]) && !preg_match("`@`i", $text[$i]) && !preg_match("`ftp\.`i", $text[$i]))
                $text[$i] = '<span title="' . $text[$i] . '">' . substr($text[$i], 0, $max_chars) . '...</span>';

                $text[$i] = preg_replace_callback('`((https?|ftp)://\S+)`', cesure_href,$text[$i]); 
                $block_text .= $text[$i];
            }

            $texte = htmlentities($texte, ENT_NOQUOTES, 'ISO-8859-1');
            $texte = nk_CSS($texte);

            if (strlen($auteur) > $pseudo_max)
            {
                $auteurDisplay = '<span title="' . nk_CSS($auteur) . '">' . nk_CSS(substr($auteur, 0, $pseudo_max)) . '...</span>';
            }
            else
            {
                $auteurDisplay = $auteur;
            }

            $block_text = icon($block_text);

            $sql_aut = mysql_query("SELECT id, rang, country, avatar, niveau  FROM " . USER_TABLE . " WHERE pseudo = '" . $auteur . "'");
            list($user_id, $rang, $country, $avatar, $niveau) = mysql_fetch_array($sql_aut);
            $test_aut = mysql_num_rows($sql_aut);

            $sql_rank_team = mysql_query("SELECT couleur FROM " . TEAM_RANK_TABLE . " WHERE id = '" . $rang . "'");
            list($rank_color) = mysql_fetch_array($sql_rank_team);

            $pays = ($country) ? '<img src="images/flags/' . $country . '" alt="' . $country . '" style="margin-right:2px;"/>' : '';

            $sql_on = mysql_query("SELECT user_id FROM " . NBCONNECTE_TABLE . " WHERE username = '" . $auteur . "' ORDER BY date");
            $count_ok = mysql_num_rows($sql_on);

            $online = (isset($user_id) && $count_ok == 1) ? '<div class="nkIconOnline nkIconOnlineGreen" title="Online !"></div>' : '<div class="nkIconOnline nkIconOnlineGrey" title="Offline"></div>';

            $coloring = $rank_color;

            if($i2 == 0) {
                $bg = $bgcolor1;
                $i2++;
            }
            else {
                $bg = $bgcolor2;
                $i2 =0;
            }

            $url_auteur = ($test_aut == 1) ? '<a href="index.php?file=Members&amp;op=detail&amp;autor=' . urlencode($auteur) . '" style="color: #' . $coloring . '" title="' . $date_jour . '">' . $auteurDisplay . '</a>' : $auteurDisplay;
            $avatarDisplay = ($avatar != '') ? '<img src="' . $avatar . '" class="nkFloatLeft nkShootAvatar nkBorderColor2" />' : '<img src="modules/User/images/noavatar.png" alt="noavatar" class="nkFloatLeft nkShootAvatar nkBorderColor2" />';
            $post_time =strftime("%H:%M:%S", $date);
            $messageAuthor = mysql_real_escape_string(stripslashes($auteur));

            if ($nuked['textbox_avatar'] == 'on') {
                echo "<div class=\"nkShootboxRow nkBorderColor2\">\n"
                . "" . $avatarDisplay ."\n"
                . "<div>" . $pays . "<strong>" . $url_auteur . "</strong>\n";
                if ($visiteur >= $level_admin) {
                    echo "<div class=\"nkFloatRight\">\n"
                    . "<a href=\"javascript:del_shout('" . $messageAuthor . "', '" . $id . "');\">\n"
                    . "<div class=\"nkIconOnline nkIconOnlineRed\" title=\"" . _DELTHISMESS . "\"></div>\n"
                    . "</a>". $online ."\n"
                    . "</div><br /><span class=\"nkShootDate\">" . $date_jour . "<span></div>\n";
                }

                else {
                    echo "<div class=\"nkFloatRight\">". $online ."\n"
                    . "</div><br /><span class=\"nkShootDate\">" . $date_jour . "<span></div>\n";
                }
                echo "<div><p>" . $block_text . "</p></div></div>\n";
            }
            else {
                echo "<div class=\"nkShootboxTinyRow\">\n"
                . "<div>" . $pays . "&lsaquo;<strong>" . $url_auteur . "</strong>&rsaquo;" . $block_text . "\n";
                if ($visiteur >= $level_admin) {
                    echo "<div class=\"nkInlineBlock nkFloatRight\" style=\"margin-right:6px;\">\n"
                    . "<a href=\"javascript:del_shout('" . $messageAuthor . "', '" . $id . "');\">\n"
                    . "<div class=\"nkIconOnline nkIconOnlineRed\" title=\"" . _DELTHISMESS . "\"></div>\n"
                    . "</a>". $online ."\n"
                    . "</div></div></div>\n";
                }

                else {
                    echo "<div class=\"nkInlineBlock nkFloatRight\" style=\"margin-right:6px;\">". $online ."</div></div></div>\n";
                }                 
            }

            echo "<div class=\"nkClear\"></div>\n";
        }
    }

switch ($_REQUEST['op'])
{

    case"smilies":
        smilies();
        break;

    case"index":
        index();
        break;
        
    case"ajax":
        ajax();
        break;

    default:
        index();
        break;
} 


?>
