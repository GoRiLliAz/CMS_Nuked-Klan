<?php
/**
 * french.lang.php
 *
 * French translation file of Vote module
 *
 * @version     1.8
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */
defined('INDEX_CHECK') or die('You can\'t run this file alone.');

// admin - module_vote
define("_ADMINVOTE","Administration des Votes");
define("_VOTEMOD","Liste des modules vot�s");
define("_LISTI","Liste des modules o� les votes sont autoris�es.<br /><br />");
define("_DESACTIVER","D�sactiver");
define("_ACTIVER","Activer");
define("_MODIF","Modifier");
define("_BACK","Retour");
// admin - modify_module_vote
define("_ACTIONMODIFVOTEMOD","a modifi� la liste des modules vot�s");
define("_VOTEMODIFMOD","Liste des modules vot�s modifi�s avec succ�s.");


return array(
    // vote_index - modules/Vote/index.php
    'VOTE_UNACTIVE' => 'Vote d�sactiv�',
    // postVote / saveVote - modules/Vote/index.php
    'VOTE_FROM'     => 'Vote de',
    'ALREADY_VOTE'  => 'Vous avez d�j� vot� !',
    // saveVote - modules/Vote/index.php
    'VOTE_ADD'      => 'Votre vote a bien �t� enregistr�',
    // views/frontend/modules/Vote/voteIndex.php / views/frontend/modules/Vote/voteForm.php
    'NOTE'          => 'Note',
    // views/frontend/modules/Vote/voteIndex.php
    'VOTES'         => 'votes',
    'NOT_EVAL'      => 'Non �valu�',
    'RATE'          => 'Evaluer',
    // views/frontend/modules/Vote/voteForm.php
    'ONE_VOTE_ONLY' => 'Vous ne pouvez voter qu\'une seule fois',
);

?>