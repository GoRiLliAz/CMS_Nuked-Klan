<?php
/**
 * @version     1.8
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */
defined('INDEX_CHECK') or die ('You can\'t run this file alone.');

global $user, $nuked, $language;


function getUserAvatar() {
    global $user;

    $dbrUser = nkDB_selectOne(
        'SELECT avatar
        FROM '. USER_TABLE .'
        WHERE id = '. nkDB_escape($user['id'])
    );

    if ($dbrUser['avatar'] != '')
        return $dbrUser['avatar'];
    else
        return 'modules/User/images/noavatar.png';
}

function printAdminMenuCurrentClass($menuName) {
    $menuData = array(
        'pannel'        => array('index'),
        'parameter'     => array('setting','maj','phpinfo','mysql','action','erreursql'),
        'management'    => array('user','theme','modules','block','menu','smilies','games'),
        'miscellaneous' => array('propos', 'licence')
    );

    if ($_REQUEST['file'] == 'Admin'
        && array_key_exists($menuName, $menuData)
        && in_array($_REQUEST['page'], $menuData[$menuName])
    )
        echo ' current';
}


function printAdminSubMenuCurrentClass($page) {
    if ($_REQUEST['file'] == 'Admin' && $_REQUEST['page'] == $page)
        echo 'class="current"';
}

function getAdminModulesMenuData() {
    global $visiteur;

    $data = array(
        0  => '',
        1  => array()
    );

    $dbrModules = nkDB_selectMany(
        'SELECT `nom`
        FROM `'. MODULES_TABLE .'`
        WHERE \''. $visiteur .'\' >= admin AND niveau > -1 AND admin > -1',
        array('nom')
    );

    foreach ($dbrModules as $mod) {
        if ($mod['nom'] == 'Gallery') $modname = _NAMEGALLERY;
        else if ($mod['nom'] == 'Calendar') $modname = _NAMECALANDAR;
        else if ($mod['nom'] == 'Defy') $modname = _NAMEDEFY;
        else if ($mod['nom'] == 'Download') $modname = _NAMEDOWNLOAD;
        else if ($mod['nom'] == 'Guestbook') $modname = _NAMEGUESTBOOK;
        else if ($mod['nom'] == 'Irc') $modname = _NAMEIRC;
        else if ($mod['nom'] == 'Links') $modname = _NAMELINKS;
        else if ($mod['nom'] == 'Wars') $modname = _NAMEMATCHES;
        else if ($mod['nom'] == 'News') $modname = _NAMENEWS;
        else if ($mod['nom'] == 'Recruit') $modname = _NAMERECRUIT;
        else if ($mod['nom'] == 'Sections') $modname = _NAMESECTIONS;
        else if ($mod['nom'] == 'Server') $modname = _NAMESERVER;
        else if ($mod['nom'] == 'Suggest') $modname = _NAMESUGGEST;
        else if ($mod['nom'] == 'Survey') $modname = _NAMESURVEY;
        else if ($mod['nom'] == 'Forum') $modname = _NAMEFORUM;
        else if ($mod['nom'] == 'Textbox') $modname = _NAMESHOUTBOX;
        else if ($mod['nom'] == 'Comment') $modname = _NAMECOMMENT;
        else $modname = $mod['nom'];

        if (is_file('modules/'. $mod['nom'] .'/admin.php'))
            $data[1][$mod['nom']] = $modname;
    }

    natcasesort($data[1]);

    if (array_key_exists($_REQUEST['file'], $data[1]) && $_REQUEST['page'] == 'admin')
        $data[0] = ' current';

    return $data;
}

function getDiscussionData() {
    return nkDB_selectMany(
        'SELECT D.date, D.texte, U.pseudo
        FROM '. DISCUSSION_TABLE .' D, '. USER_TABLE .' U
        WHERE D.pseudo = U.id',
        array('D.date'), 'DESC', 16
    );
}

function admintop(){
    trigger_error('admintop is deprecated. Please update your module.', E_USER_DEPRECATED);
}

function adminfoot() {
    trigger_error('admintop is deprecated. Please update your module.', E_USER_DEPRECATED);
}

function checkboxButton($name, $id, $checked = false, $inline = false) {
    $check = null;
    $classInline = null;
    $dataCheck = null;
    if ($checked === true) {
        $check = 'checked="checked"';
        $dataCheck = 'data-check="checked"';
    }

    if ($inline === true) {
        $classInline = ' inline ';
    }
    ?>
    <div class="onoffswitch <?php echo $classInline; ?> ">
        <input id="<?php echo $id; ?>" type="checkbox" name="<?php echo $name; ?>"
               class="onoffswitch-checkbox" <?php echo $check; ?>
                <?php echo $dataCheck; ?> />
        <label class="onoffswitch-label" for="<?php echo $id; ?>">
            <div class="onoffswitch-inner"></div>
            <div class="onoffswitch-switch"></div>
        </label>
    </div>
<?php
}

// information, error
function printNotification($message, $url, $type = 'information', $back = true, $redirect = false) {
    echo applyTemplate('notification', array(
        'type'      => $type,
        'message'   => $message,
        'back'      => $back,
        'url'       => $url
    ));

    if ($redirect === true)
        redirect($url, 2);
}
