<?php

$dbTable->setTable($this->_session['db_prefix'] .'_games_prefs');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Check table integrity
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'checkIntegrity') {
    // table create in 1.7.x version
    $dbTable->checkIntegrity();
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
    $sql = 'CREATE TABLE `'. $this->_session['db_prefix'] .'_games_prefs` (
            `id` int(11) NOT NULL auto_increment,
            `game` int(11) NOT NULL default \'0\',
            `user_id` varchar(20) NOT NULL default \'\',
            `pref_1` text NOT NULL,
            `pref_2` text NOT NULL,
            `pref_3` text NOT NULL,
            `pref_4` text NOT NULL,
            `pref_5` text NOT NULL,
            PRIMARY KEY  (`id`)
        ) ENGINE=MyISAM DEFAULT CHARSET='. db::CHARSET .' COLLATE='. db::COLLATION .';';

    $dbTable->dropTable()->createTable($sql);
}

?>