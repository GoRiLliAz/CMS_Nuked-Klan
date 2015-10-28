<?php
/**
 * table.downloads.c.i.u.php
 *
 * `[PREFIX]_downloads` database table script
 *
 * @version 1.7
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */

$dbTable->setTable($this->_session['db_prefix'] .'_downloads');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table function
///////////////////////////////////////////////////////////////////////////////////////////////////////////

/*
 * Callback function for update row of downloads database table
 */
function updateDownloadsRow($updateList, $row, $vars) {
    $setFields = array();

    if (in_array('APPLY_BBCODE', $updateList))
        $setFields['description'] = $vars['bbcode']->apply(stripslashes($row['description']));

    return $setFields;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Check table integrity
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'checkIntegrity') {
    // table and field exist in 1.6.x version
    $dbTable->checkIntegrity('id', 'description');
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Convert charset and collation
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'checkAndConvertCharsetAndCollation')
    $dbTable->checkAndConvertCharsetAndCollation();

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table creation
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'install') {
    $sql = 'CREATE TABLE `'. $this->_session['db_prefix'] .'_downloads` (
            `id` int(11) NOT NULL auto_increment,
            `date` varchar(12) NOT NULL default \'\',
            `taille` varchar(6) NOT NULL default \'0\',
            `titre` text NOT NULL,
            `description` text NOT NULL,
            `type` int(11) NOT NULL default \'0\',
            `count` int(10) NOT NULL default \'0\',
            `url` varchar(200) NOT NULL default \'\',
            `url2` varchar(200) NOT NULL default \'\',
            `broke` int(11) NOT NULL default \'0\',
            `url3` varchar(200) NOT NULL default \'\',
            `level` int(1) NOT NULL default \'0\',
            `hit` int(11) NOT NULL default \'0\',
            `edit` varchar(12) NOT NULL default \'\',
            `screen` varchar(200) NOT NULL default \'\',
            `autor` text NOT NULL,
            `url_autor` varchar(200) NOT NULL default \'\',
            `comp` text NOT NULL,
            PRIMARY KEY  (`id`),
            KEY `type` (`type`)
        ) ENGINE=MyISAM DEFAULT CHARSET='. db::CHARSET .' COLLATE='. db::COLLATION .';';

    $dbTable->dropTable()->createTable($sql);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table update
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'update') {
    // Update BBcode
    // update 1.7.9 RC1
    if (version_compare($this->_session['version'], '1.7.9', '<=')) {
        $dbTable->setCallbackFunctionVars(array('bbcode' => new bbcode($this->_db, $this->_session, $this->_i18n)))
            ->setUpdateFieldData('APPLY_BBCODE', 'description');
    }

    $dbTable->applyUpdateFieldListToData('id', 'updateDownloadsRow');
}

?>