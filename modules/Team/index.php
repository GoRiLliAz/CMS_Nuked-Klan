<?php
/**
 * index.php
 *
 * Frontend of Team module
 *
 * @version     1.8
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */
defined('INDEX_CHECK') or die('You can\'t run this file alone.');

if (! moduleInit('Team'))
    return;

compteur('Team');

require_once 'Includes/nkUserSocial.php';

function index()
{
    global $bgcolor1, $bgcolor2, $bgcolor3, $theme, $user, $nuked, $visiteur;

    opentable();

    echo '<br />';

    if(!array_key_exists('cid', $_REQUEST)){
        $_REQUEST['cid'] = '';
    }

    if ($_REQUEST['cid'] != '') $where2 = "WHERE cid = '" . $_REQUEST['cid'] . "'"; else $where2 = '';
    $sql = mysql_query("SELECT cid, titre, tag, tag2, game FROM " . TEAM_TABLE . " " . $where2 . " ORDER BY ordre, titre");
    $nb_team = mysql_num_rows($sql);
    $res = mysql_fetch_row($sql);
    $where = '';

    if ($nb_team == 0)
    {
        $titre = @nkHtmlEntityDecode($nuked['name']);
        $team_tag = @nkHtmlEntityDecode($nuked['tag_pre']);
        $tag2 = @nkHtmlEntityDecode($nuked['tag_suf']);
        $res = array ('', "$titre", "$team_tag", "$tag2", '0');
    }

    while (is_array($res))
    {
        list($team, $titre, $team_tag, $tag2, $_REQUEST['game']) = $res;

        $titre = printSecuTags($titre);
        $team_tag = printSecuTags($team_tag);
        $tag2 = printSecuTags($tag2);

        if ($team != '') $link_titre = '<a href="index.php?file=Team&amp;cid=' . urlencode(nkHtmlEntityDecode($team)) . '"><big><b>' . $titre . '</b></big></a>';
        else $link_titre = '<big><b>' . $titre . '</b></big>';

        echo "<div style=\"text-align: center;\">$link_titre</div>"
        . "<table class=\"nkTeamList\" style=\"background: " . $bgcolor2 . ";border: 1px solid " . $bgcolor3 . ";\" width=\"100%\" cellpadding=\"2\" cellspacing=\"1\">\n"
        . "<tr style=\"background: " . $bgcolor3 . ";\">\n"
        . "<td style=\"width: 5%;\">&nbsp;</td>\n"
        . "<td style=\"width: 20%;\" align=\"center\"><b>" . _NICK . "</b></td>\n";

        $userSocialData = nkUserSocial_getConfig();

        $userSocialWebsiteKey = array_search('url', array_column($userSocialData, 'field'));

        if ($userSocialWebsiteKey !== false)
            unset($userSocialData[$userSocialWebsiteKey]);

        foreach ($userSocialData as $userSocial)
            echo '<td class="', $userSocial['cssClass'], '" align="center"><b>', nkUserSocial_getLabel($userSocial), '</b></td>', "\n";

        echo "<td style=\"width: 15%;\" align=\"center\"><b>" . _RANK . "</b></td></tr>\n";

        if ($team != "")
            $where = "WHERE team = '" . $team . "' OR team2 = '" . $team . "' OR team3 = '" . $team . "'";
        else
            $where = "WHERE niveau > 1";

        $userSocialFields = nkUserSocial_getActiveFields();
        $userSocialFields = ($userSocialFields) ? ', '. implode(', ', $userSocialFields) : '';

        $dbrTeamMember = nkDB_selectMany(
            'SELECT id, pseudo AS nickname, rang, country'. $userSocialFields .'
            FROM '. USER_TABLE . '
            '. $where .' AND niveau > 0
            ORDER BY ordre, pseudo'
        );

        if (nkDB_numRows() > 0)
        {
            $j = 0;

            foreach ($dbrTeamMember as $teamMember) {
                list ($pays, $ext) = explode ('.', $teamMember['country']);
                $temp = $team_tag . $teamMember['nickname'] . $tag2;
                $teamMember['nickname'] = nkHtmlEntityDecode($teamMember['nickname']);

                if ($teamMember['rang'] != "" && $teamMember['rang'] > 0)
                {
                    $sql_rank = mysql_query("SELECT titre FROM " . TEAM_RANK_TABLE . " WHERE id = '" . $teamMember['rang'] . "'");
                    list($rank_name) = mysql_fetch_array($sql_rank);
                    $rank_name = printSecuTags($rank_name);
                }
                else
                {
                    $rank_name = "N/A";
                }

                if ($_REQUEST['game'] > 0)
                {
                    $sql3 = mysql_query("SELECT * FROM " . GAMES_PREFS_TABLE . " WHERE game = '" . $_REQUEST['game'] . "' AND user_id = '" . $teamMember['id'] . "'");
                    $test = mysql_num_rows($sql3);

                    if ($test > 0)
                    {
                        $url_member = "index.php?file=Team&amp;op=detail&amp;autor=" . urlencode($teamMember['nickname']) . "&amp;game=" . $_REQUEST['game'];
                    }
                    else
                    {
                        $url_member = "index.php?file=Team&amp;op=detail&amp;autor=" . urlencode($teamMember['nickname']);
                    }
                }
                else
                {
                    $url_member = "index.php?file=Team&amp;op=detail&amp;autor=" . urlencode($teamMember['nickname']);
                }

                echo "<tr style=\"background: " . (($j++ % 2 == 1) ? $bgcolor1 : $bgcolor2) . ";\">\n"
                . "<td style=\"width: 5%;\" align=\"center\"><img src=\"images/flags/" . $teamMember['country'] . "\" alt=\"\" title=\"" . $pays . "\" /></td>\n"
                . "<td style=\"width: 20%;\"><a href=\"" . $url_member . "\" title=\"" . _VIEWPROFIL . "\"><b>" . $temp . "</b></a></td>\n";

                foreach ($userSocialData as $userSocial) {
                    echo '<td class="', $userSocial['cssClass'], '" align="center">', "\n"
                        , nkUserSocial_formatImgLink($userSocial, $teamMember)
                        , '</td>', "\n";
                }

                echo "<td style=\"width: 20%;\" align=\"center\">" . $rank_name . "</td></tr>\n";
            }
        }
        else
        {
            echo "<tr><td align=\"center\" colspan=\"". (3 + count($userSocialData)) ."\">" . _NOMEMBERS . "</td></tr>\n";
        }

        echo "</table><br /><br />\n";
        $j = 0;
        $res = mysql_fetch_row($sql);
    }
    closetable();
}

function detail($autor)
{
    global $nuked, $bgcolor1, $bgcolor2, $bgcolor3, $user, $visiteur;

    opentable();

    $autor = nkHtmlEntities($autor, ENT_QUOTES);

    // TODO : Check while update if url with preg_match("`http://`i", $url)

    $userSocialFields = nkUserSocial_getActiveFields();
    $userSocialFields = ($userSocialFields) ? ', '. implode(', ', $userSocialFields) : '';

    $teamMember = nkDB_selectOne(
        'SELECT id, game, country'. $userSocialFields .'
        FROM '. USER_TABLE .'
        WHERE pseudo = '. nkDB_escape($autor)
    );

    if (nkDB_numRows() > 0) {
        list ($pays, $ext) = explode ('.', $teamMember['country']);

        $sql2 = mysql_query("SELECT prenom, age, sexe, ville, motherboard, cpu, ram, video, resolution, son, ecran, souris, clavier, connexion, system, photo, pref_1, pref_2, pref_3, pref_4, pref_5 FROM " . USER_DETAIL_TABLE . " WHERE user_id = '" . $teamMember['id'] . "'");
        $res = mysql_num_rows($sql2);
        list($prenom, $birthday, $sexe, $ville, $motherboard, $cpu, $ram, $video, $resolution, $sons, $ecran, $souris, $clavier, $connexion, $osystem, $photo, $pref1, $pref2, $pref3, $pref4, $pref5) = mysql_fetch_array($sql2);

        if (array_key_exists('game', $_REQUEST) && $_REQUEST['game'] != "")
        {
            $sql3 = mysql_query("SELECT titre, pref_1, pref_2, pref_3, pref_4, pref_5 FROM " . GAMES_TABLE . " WHERE id = '" . $_REQUEST['game'] . "'");
            list($titre, $pref_1, $pref_2, $pref_3, $pref_4, $pref_5) = mysql_fetch_array($sql3);


            $titre = printSecuTags($titre);
            $pref_1 = printSecuTags($pref_1);
            $pref_2 = printSecuTags($pref_2);
            $pref_3 = printSecuTags($pref_3);
            $pref_4 = printSecuTags($pref_4);
            $pref_5 = printSecuTags($pref_5);


            $sql4 = mysql_query("SELECT pref_1, pref_2, pref_3, pref_4, pref_5 FROM " . GAMES_PREFS_TABLE . " WHERE game = '" . $_REQUEST['game'] . "' AND user_id = '" . $teamMember['id'] . "'");
            list($gpref1, $gpref2, $gpref3, $gpref4, $gpref5) = mysql_fetch_array($sql4);

        }
        else
        {
            $sql3 = mysql_query("SELECT titre, pref_1, pref_2, pref_3, pref_4, pref_5 FROM " . GAMES_TABLE . " WHERE id = '" . $teamMember['game'] . "'");
            list($titre, $pref_1, $pref_2, $pref_3, $pref_4, $pref_5) = mysql_fetch_array($sql3);


            $titre = printSecuTags($titre);
            $pref_1 = printSecuTags($pref_1);
            $pref_2 = printSecuTags($pref_2);
            $pref_3 = printSecuTags($pref_3);
            $pref_4 = printSecuTags($pref_4);
            $pref_5 = printSecuTags($pref_5);

            $gpref1 = $pref1;
            $gpref2 = $pref2;
            $gpref3 = $pref3;
            $gpref4 = $pref4;
            $gpref5 = $pref5;
        }

        if ($birthday != "")
        {
            list ($jour, $mois, $an) = explode ('/', $birthday);
            $age = date("Y") - $an;
            if (date("m") < $mois)
            {
                $age = $age-1;
            }
            if (date("d") < $jour && date("m") == $mois)
            {
                $age = $age - 1;
            }
        }
        else
        {
            $age = "";
        }


        if ($sexe == "male")
        {
            $sex = _MALE;
        }
        else if ($sexe == "female")
        {
            $sex = _FEMALE;
        }
        else
        {
            $sex = "";
        }

        if ($visiteur == 9)
        {
            echo "<div style=\"text-align: right;\"><a href=\"index.php?file=Admin&amp;page=user&amp;op=edit_user&amp;id_user=" . $teamMember['id'] . "\"><img style=\"border: 0;\" src=\"images/edition.gif\" alt=\"\" title=\"" . _EDIT . "\" /></a>";

        if ($teamMember['id'] != $user[0])
        {
            echo "<script type=\"text/javascript\">\n"
            ."<!--\n"
            ."\n"
            . "function deluser(pseudo, id)\n"
            . "{\n"
            . "if (confirm('" . _DELETEUSER . " '+pseudo+' ! " . _CONFIRM . "'))\n"
            . "{document.location.href = 'index.php?file=Admin&page=user&op=del_user&id_user='+id;}\n"
            . "}\n"
            . "\n"
            . "// -->\n"
            . "</script>\n";

            echo "<a href=\"javascript:deluser('" . addslashes($autor) . "', '" . $teamMember['id'] . "');\"><img style=\"border: 0;\" src=\"images/delete.gif\" alt=\"\" title=\"" . _DELETE . "\" /></a>";
        }
    echo "&nbsp;</div>\n";
    }

        $a = "�����������������������������������������������������";
        $b = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
        $flash_autor = @nkHtmlEntityDecode($autor);
        $flash_autor = strtr($flash_autor, $a, $b);

        echo "<br /><object type=\"application/x-shockwave-flash\" data=\"modules/Members/images/title.swf\" width=\"100%\" height=\"50\">\n"
        . "<param name=\"movie\" value=\"modules/Members/images/title.swf\" />\n"
        . "<param name=\"pluginurl\" value=\"http://www.macromedia.com/go/getflashplayer\" />\n"
        . "<param name=\"wmode\" value=\"transparent\" />\n"
        . "<param name=\"menu\" value=\"false\" />\n"
        . "<param name=\"quality\" value=\"best\" />\n"
        . "<param name=\"scale\" value=\"exactfit\" />\n"
        . "<param name=\"flashvars\" value=\"text=" . $flash_autor . "\" /></object>\n";

        if ($res > 0)
        {
            echo "<table style=\"background: " . $bgcolor2 . ";border: 1px solid " . $bgcolor3 . ";\" width=\"100%\" cellpadding=\"2\" cellspacing=\"1\">\n"
            . "<tr style=\"background: " . $bgcolor3 . ";\"><td style=\"height: 20px\" colspan=\"2\" align=\"center\"><big><b>" . _INFOPERSO . "</b></big></td></tr>\n"
            . "<tr style=\"background: " . $bgcolor1 . ";\"><td style=\"width: 100%\"><table cellpadding=\"1\" cellspacing=\"0\">\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _NICK . " :</b></td><td>" . $autor . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _LASTNAME . " :</b></td><td>" . $prenom . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _AGE . " :</b></td><td>" . $age . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _SEXE . " :</b></td><td>" . $sex . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _CITY . " :</b></td><td>" . $ville . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _COUNTRY . " :</b></td><td>" . $pays . "</td></tr>\n";

            if ($visiteur >= $nuked['user_social_level']) {
                foreach (nkUserSocial_getConfig() as $userSocial) {
                    if (isset($teamMember[$userSocial['field']]) && $teamMember[$userSocial['field']] != '') {
                        echo '<tr><td><b>&nbsp;&nbsp;� ', nkUserSocial_getLabel($userSocial), ' :</b></td><td><a href="'
                            , nkUserSocial_getLinkUrl($userSocial, $teamMember[$userSocial['field']])
                            , '"', nkUserSocial_openUrlPage($userSocial), '>', $teamMember[$userSocial['field']]
                            , '</a></td></tr>';
                    }
                }
            }

            echo "</td></tr></table></td><td align=\"center\">\n";

            if ($photo != "")
            {
                echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"" . $photo . "\" width=\"100\" height=\"100\" alt=\"\" style=\"border: 1px solid #000000;\" />&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            else
            {
                echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"modules/Team/images/noAvatar.png\" width=\"100\" height=\"100\" alt=\"\" style=\"border: 1px solid #000000;\" />&nbsp;&nbsp;&nbsp;&nbsp;";
            }

            echo "</td></tr>\n"
            . "<tr style=\"background: " . $bgcolor3 . ";\"><td colspan=\"2\" style=\"height: 20px\" align=\"center\"><big><b>" . _HARDCONFIG . "</b></big></td></tr>\n"
            . "<tr style=\"background: " . $bgcolor1 . ";\"><td style=\"width: 100%\" colspan=\"2\"><table cellpadding=\"1\" cellspacing=\"0\">\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _PROCESSOR . " : </b></td><td>" . $cpu . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _MEMORY . " : </b></td><td>" . $ram . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _MOTHERBOARD . " : </b></td><td>" . $motherboard . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _VIDEOCARD . " : </b></td><td>" . $video . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _RESOLUTION . " : </b></td><td>" . $resolution . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _SOUNDCARD . " : </b></td><td>" . $sons . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _MOUSE . " : </b></td><td>" . $souris . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _KEYBOARD . " : </b></td><td>" . $clavier . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _MONITOR . " : </b></td><td>" . $ecran . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _SYSTEMOS . " : </b></td><td>" . $osystem . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . _CONNECT . " :</b></td><td>" . $connexion . "</td></tr>\n"
            . "</table></td></tr>"
            . "<tr style=\"background: " . $bgcolor3 . ";\"><td colspan=\"2\" style=\"height: 20px\" align=\"center\"><big><b>" . $titre . " :</b></big></td></tr>\n"
            . "<tr style=\"background: " . $bgcolor1 . ";\"><td colspan=\"2\"><table cellpadding=\"1\" cellspacing=\"0\">\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . $pref_1 . " :</b></td><td>" . $gpref1 . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . $pref_2 . " :</b></td><td>" . $gpref2 . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . $pref_3 . " :</b></td><td>" . $gpref3 . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . $pref_4 . " :</b></td><td>" . $gpref4 . "</td></tr>\n"
            . "<tr><td><b>&nbsp;&nbsp;� " . $pref_5 . " :</b></td><td>" . $gpref5 . "</td></tr>\n"
            . "</table></td></tr></table><br />";
        }
        else
        {
            echo "<br /><div style=\"text-align: center;\">" . _NOPREF . "</div><br />\n";
        }

        if ($user)
        {
            echo "<br /><div style=\"text-align: center;\">[ <a href=\"index.php?file=Userbox&amp;op=post_message&amp;for=" . $teamMember['id'] . "\">" . _SENDPV . "</a> ]</div><br />\n";
        }
    }
    else
    {
        printNotification(_NOMEMBER, 'error');
    }

    closetable();
}

switch ($GLOBALS['op'])
{
    case"index":
        index();
        break;

    case"detail":
        detail($_REQUEST['autor']);
        break;

    default:
        index();
}

?>