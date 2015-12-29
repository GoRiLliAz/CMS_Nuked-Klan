<?php
/**
 * table.sondage_check.c.i.u.php
 *
 * `[PREFIX]_sondage_check` database table script
 *
 * @version 1.8
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */

$dbTable->setTable($this->_session['db_prefix'] .'_sondage_check');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table configuration
///////////////////////////////////////////////////////////////////////////////////////////////////////////

$surveyCheckTableCfg = array(
    'fields' => array(
        'ip'          => array('type' => 'varchar(40)', 'null' => false, 'default' => '\'\''),
        'pseudo'      => array('type' => 'varchar(50)', 'null' => false, 'default' => '\'\''),
        'heurelimite' => array('type' => 'int(14)',     'null' => false, 'default' => '\'0\''),
        'sid'         => array('type' => 'varchar(30)', 'null' => false, 'default' => '\'\'')
    ),
    'index' => array(
        'sid' => 'sid'
    ),
    'engine' => 'MyISAM'
);

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Check table integrity
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'checkIntegrity') {
    // table and field exist in 1.6.x version
    $dbTable->checkIntegrity('ip');
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
    $dbTable->createTable($surveyCheckTableCfg);

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table update
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'update') {
    // install / update 1.7.14
    if ($dbTable->fieldExist('ip') && $dbTable->getFieldType('ip') != 'varchar(40)')
        $dbTable->modifyField('ip', $surveyCheckTableCfg['fields']['ip']);
}

?>