<?php
/**
 * table.forums_cat.c.i.php
 *
 * `[PREFIX]_forums_cat` database table script
 *
 * @version 1.8
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */

$dbTable->setTable($this->_session['db_prefix'] .'_forums_cat');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Check table integrity
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'checkIntegrity') {
    // table exist in 1.6.x version
    $dbTable->checkIntegrity();
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Convert charset and collation
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'checkAndConvertCharsetAndCollation')
    $dbTable->checkAndConvertCharsetAndCollation();

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table drop
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'drop')
    $dbTable->dropTable();

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table creation
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'install') {
    $sql = 'CREATE TABLE `'. $this->_session['db_prefix'] .'_forums_cat` (
            `id` int(11) NOT NULL auto_increment,
            `nom` varchar(100) default NULL,
            `image` varchar(200) NOT NULL default \'\',
            `ordre` int(5) NOT NULL default \'0\',
            `niveau` int(1) NOT NULL default \'0\',
            PRIMARY KEY  (`id`)
        ) ENGINE=MyISAM DEFAULT CHARSET='. db::CHARSET .' COLLATE='. db::COLLATION .';';

    $dbTable->createTable($sql);

    $sql='INSERT INTO `'. $this->_session['db_prefix'] .'_forums_cat` VALUES
        (1, \''. $this->_db->quote($this->_i18n['CATEGORY']) .' 1\', \'\', 0, 0);';

    $dbTable->insertData('INSERT_DEFAULT_DATA', $sql);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table update
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'update') {
    // install / update 1.8
    if (! $dbTable->fieldExist('image'))
        $dbTable->addField('image', array('type' => 'varchar(200)', 'null' => false, 'default' => '\'\''));

    $dbTable->alterTable();
}

?>