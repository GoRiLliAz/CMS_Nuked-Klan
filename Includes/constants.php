<?php
// -------------------------------------------------------------------------//
// Nuked-KlaN - PHP Portal                                                  //
// http://www.nuked-klan.org                                                //
// -------------------------------------------------------------------------//
// This program is free software. you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License.           //
// -------------------------------------------------------------------------//
defined('INDEX_CHECK') or die ('You can\'t run this file alone.');

// Update param
define('UPDATE_URL', 'http://nuked-klan.org/');

// Admin access for adminInit function
define('ADMINISTRATOR_ACCESS', 2);
define('SUPER_ADMINISTRATOR_ACCESS', 9);

// Table names
define('ACTION_TABLE', $nuked['prefix'] . '_action');
define('BANNED_TABLE', $nuked['prefix'] . '_banned');
define('BLOCK_TABLE', $nuked['prefix'] . '_block');
define('CALENDAR_TABLE', $nuked['prefix'] . '_calendar');
define('COMMENT_TABLE', $nuked['prefix'] . '_comment');
define('COMMENT_MODULES_TABLE', $nuked['prefix'] . '_comment_modules');
define('CONFIG_TABLE', $nuked['prefix'] . '_config');
define('DEFY_TABLE', $nuked['prefix'] . '_defie');
define('DEFY_PREF_TABLE', $nuked['prefix'] . '_defie_pref');
define('DISCUSSION_TABLE', $nuked['prefix'] . '_discussion');
define('DOWNLOAD_TABLE', $nuked['prefix'] . '_downloads');
define('DOWNLOAD_CAT_TABLE', $nuked['prefix'] . '_downloads_cat');
define('FORUM_TABLE', $nuked['prefix'] . '_forums');
define('FORUM_CAT_TABLE', $nuked['prefix'] . '_forums_cat');
define('FORUM_MESSAGES_TABLE', $nuked['prefix'] . '_forums_messages');
define('FORUM_OPTIONS_TABLE', $nuked['prefix'] . '_forums_options');
define('FORUM_POLL_TABLE', $nuked['prefix'] . '_forums_poll');
define('FORUM_RANK_TABLE', $nuked['prefix'] . '_forums_rank');
define('FORUM_READ_TABLE', $nuked['prefix'] . '_forums_read');
define('FORUM_THREADS_TABLE', $nuked['prefix'] . '_forums_threads');
define('FORUM_VOTE_TABLE', $nuked['prefix'] . '_forums_vote');
define('GALLERY_TABLE', $nuked['prefix'] . '_gallery');
define('GALLERY_CAT_TABLE', $nuked['prefix'] . '_gallery_cat');
define('GAMES_TABLE', $nuked['prefix'] . '_games');
define('GAMES_PREFS_TABLE', $nuked['prefix'] . '_games_prefs');
define('GUESTBOOK_TABLE', $nuked['prefix'] . '_guestbook');
define('IRC_AWARDS_TABLE', $nuked['prefix'] . '_irc_awards');
define('LINKS_TABLE', $nuked['prefix'] . '_liens');
define('LINKS_CAT_TABLE', $nuked['prefix'] . '_liens_cat');
define('MODULES_TABLE', $nuked['prefix'] . '_modules');
define('NBCONNECTE_TABLE', $nuked['prefix'] . '_nbconnecte');
define('NEWS_TABLE', $nuked['prefix'] . '_news');
define('NEWS_CAT_TABLE', $nuked['prefix'] . '_news_cat');
define('NOTIFICATIONS_TABLE', $nuked['prefix'] . '_notification');
define('RECRUIT_TABLE', $nuked['prefix'] . '_recrute');
define('RECRUIT_PREF_TABLE', $nuked['prefix'] . '_recrute_pref');
define('SECTIONS_TABLE', $nuked['prefix'] . '_sections');
define('SECTIONS_CAT_TABLE', $nuked['prefix'] . '_sections_cat');
define('SERVER_TABLE', $nuked['prefix'] . '_serveur');
define('SERVER_CAT_TABLE', $nuked['prefix'] . '_serveur_cat');
define('SESSIONS_TABLE', $nuked['prefix'] . '_sessions');
define('SMILIES_TABLE', $nuked['prefix'] . '_smilies');
define('STATS_TABLE', $nuked['prefix'] . '_stats');
define('STATS_VISITOR_TABLE', $nuked['prefix'] . '_stats_visitor');
define('SUGGEST_TABLE', $nuked['prefix'] . '_suggest');
define('SURVEY_TABLE', $nuked['prefix'] . '_sondage');
define('SURVEY_CHECK_TABLE', $nuked['prefix'] . '_sondage_check');
define('SURVEY_DATA_TABLE', $nuked['prefix'] . '_sondage_data');
define('TEAM_TABLE', $nuked['prefix'] . '_team');
define('TMPSES_TABLE', $nuked['prefix'] . '_tmpses');
define('TEAM_RANK_TABLE', $nuked['prefix'] . '_team_rank');
define('TEXTBOX_TABLE', $nuked['prefix'] . '_shoutbox');
define('USERBOX_TABLE', $nuked['prefix'] . '_userbox');
define('USER_TABLE', $nuked['prefix'] . '_users');
define('USER_DETAIL_TABLE', $nuked['prefix'] . '_users_detail');
define('VOTE_TABLE', $nuked['prefix'] . '_vote');
define('VOTE_MODULES_TABLE', $nuked['prefix'] . '_vote_modules');
define('WARS_TABLE', $nuked['prefix'] . '_match');
define('WARS_FILES_TABLE', $nuked['prefix'] . '_match_files');
define('CONTACT_TABLE', $nuked['prefix'] . '_contact');
define('PAGE_TABLE', $nuked['prefix'] . '_page');

// Table ID names
define('GALLERY_TABLE_ID', 'sid');
define('SECTIONS_TABLE_ID', 'artid');
define('SURVEY_TABLE_ID', 'sid');
define('WARS_TABLE_ID', 'warid');

// Notification level
define('NOTIFICATION_INFO', 1);
define('NOTIFICATION_ERROR', 2);
define('NOTIFICATION_SUCCESS', 3);
define('NOTIFICATION_WARNING', 4);

?>