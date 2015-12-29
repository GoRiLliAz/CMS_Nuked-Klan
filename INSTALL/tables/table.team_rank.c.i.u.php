<?php
/**
 * table.team_rank.c.i.u.php
 *
 * `[PREFIX]_team_rank` database table script
 *
 * @version 1.8
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */

$dbTable->setTable($this->_session['db_prefix'] .'_team_rank');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table configuration
///////////////////////////////////////////////////////////////////////////////////////////////////////////

$teamRankTableCfg = array(
    'fields' => array(
        'id'      => array('type' => 'int(11)',      'null' => false, 'autoIncrement' => true),
        'titre'   => array('type' => 'varchar(80)',  'null' => false, 'default' => '\'\''),
        'image'   => array('type' => 'varchar(200)', 'null' => false, 'default' => '\'\''),
        'couleur' => array('type' => 'varchar(6)',   'null' => false, 'default' => '\'\''),
        'ordre'   => array('type' => 'int(5)',       'null' => false, 'default' => '\'0\'')
    ),
    'primaryKey' => array('id'),
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

if ($process == 'drop')
    $dbTable->dropTable();

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table creation
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'install')
    $dbTable->createTable($teamRankTableCfg);

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table update
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'update') {
    // install / update 1.8
    if (! $dbTable->fieldExist('image'))
        $dbTable->addField('image', $teamRankTableCfg['fields']['image']);

    if (! $dbTable->fieldExist('couleur'))
        $dbTable->addField('couleur', $teamRankTableCfg['fields']['couleur']);
}

?>