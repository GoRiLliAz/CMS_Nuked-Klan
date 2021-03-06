<?php
/**
 * table.news_cat.c.i.php
 *
 * `[PREFIX]_news_cat` database table script
 *
 * @version 1.8
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2016 Nuked-Klan (Registred Trademark)
 */

$dbTable->setTable(NEWS_CAT_TABLE);

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table configuration
///////////////////////////////////////////////////////////////////////////////////////////////////////////

$newsCatTableCfg = array(
    'fields' => array(
        'nid'         => array('type' => 'int(11)', 'null' => false, 'autoIncrement' => true),
        'titre'       => array('type' => 'text',    'null' => true),
        'description' => array('type' => 'text',    'null' => true),
        'image'       => array('type' => 'text',    'null' => true)
    ),
    'primaryKey' => array('nid'),
    'engine' => 'MyISAM'
);

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Check table integrity
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'checkIntegrity') {
    // table and field exist in 1.6.x version
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

if ($process == 'drop' && $dbTable->tableExist())
    $dbTable->dropTable();

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table creation
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'install') {
    $dbTable->createTable($newsCatTableCfg);

    $sql = 'INSERT INTO `'. NEWS_CAT_TABLE .'` VALUES
        (\'1\', \'Counter Strike Source\', \''. $this->_db->quote($this->_i18n['BEST_MOD']) .'\', \'modules/News/images/cs.gif\');';

    $dbTable->insertData('INSERT_DEFAULT_DATA', $sql);
}

?>