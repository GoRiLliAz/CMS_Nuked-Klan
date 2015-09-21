<?php

return array(
    #####################################
    # install->main()
    #####################################
    'CORRUPTED_CONF_INC'    => 'Fichier conf.inc.php corrompu, veuillez �diter le fichier conf.inc.php.',
    'DB_CONNECT_FAIL'       => 'Connexion � la base de donn�es impossible !',
    'DB_PREFIX_ERROR'       => 'Le prefix est erron�, veuillez �diter le fichier conf.inc.php.',// TODO : ou la table est manquante...
    'LAST_VERSION_SET'      => 'Vous avez d�j� la derni�re version %s de Nuked-Klan',
    'BAD_VERSION'           => 'Votre version de Nuked-Klan ne peut pas �tre mise � jour directement.<br/>Veuillez d\'abord mettre � jour vers la version %s',
    #####################################
    # install->creatingDB()
    #####################################
    'MISSING_FILE'          => 'Fichier introuvable : ',
    #####################################
    # install->_translateDbConnectError()
    #####################################
    'DB_HOST_ERROR'         => 'Veuillez contr�ler le nom du serveur mysql.',
    'DB_USER_ERROR'         => 'Veuillez contr�ler le nom d\'utilisateur et le mot de passe.',
    'DB_NAME_ERROR'         => 'Veuillez contr�ler le nom de la base de donn�es.',
    'DB_CHARSET_ERROR'      => 'Votre base de donn�es ne supporte pas l\'interclassement %s',
    'DB_UNKNOW_ERROR'       => 'Erreur MySQL inconnue',
    #####################################
    # install->_writeDefaultContent()
    #####################################
    'FIRST_NEWS_TITLE'      => 'Bienvenue sur votre site NuKed-KlaN %s',
    'FIRST_NEWS_CONTENT'    => 'Bienvenue sur votre site NuKed-KlaN, votre installation s\'est, � priori, bien d�roul�e, rendez-vous dans la partie administration pour commencer � utiliser votre site tout simplement en vous loguant avec le pseudo indiqu� lors de l\'install. En cas de probl�mes, veuillez le signaler sur <a href="http://www.nuked-klan.org">http://www.nuked-klan.org</a> dans le forum pr�vu � cet effet.',
    #####################################
    # install->_loadBBcode()
    #####################################
    'CODE'                  => 'Code',
    'QUOTE'                 => 'Citation',
    'HAS_WROTE'             => 'a �crit',
    #####################################
    # views/changelog.php
    #####################################
    'NEW_FEATURES_NK'       => 'Nouveaut�s Nuked Klan %s',
    'SECURITY'              => 'S�curit�',
    'SECURITY_DETAIL'       => 'La s�curit� a �t� ent�rement revue.<br />Nous pouvons aussi vous envoyer des messages depuis le site officiel, afin de vous avertir, informer ou autre...',
    'OPTIMISATION'          => 'Optimisation',
    'OPTIMISATION_DETAIL'   => 'Certaines parties de Nuked-Klan ont �t� optimis�es comme le syst�me de pagination afin de rendre votre site l�g�rement moins lourd.',
    'ADMINISTRATION'        => 'Administration',
    'ADMINISTRATION_DETAIL' => 'Afin de r�aliser une administration au go�t du jour, nous avons pr�f�r� repartir de z�ro, et concevoir un syst�me dans lequel administrateurs, utilisateurs, machines, et site officiel seraient reli�s. Pour cela, nous avons mis en place des syst�mes de communication comme les notifications, les actions, les discussions admin. Cette administration poss�de un panneau capable de vous transporter n\'importe o� dans votre administration mais aussi de vous avertir.',
    'BAN_TEMP'              => 'Ban temporaire',
    'BAN_TEMP_DETAIL'       => 'Un syst�me de bannissement temporaire a �t� mis en place, vous avez donc le choix de bannir l\'utilisateur 1 jour, 7 jours, 1 mois, 1 an, ou d�finitivement.',
    'SHOUTBOX'              => 'Shoutbox ajax',
    'SHOUTBOX_DETAIL'       => 'Un nouveau bloc textbox en ajax a �t� d�velopp�. Celui-ci est capable d\'afficher qui est en ligne, et d\'envoyer/afficher des nouveaux messages sans recharger la page.',
    'SQL_ERROR'             => 'Gestions des erreurs SQL',
    'SQL_ERROR_DETAIL'      => 'Ce syst�me est � double sens, lorsqu\'un visiteur tombe sur une erreur SQL, plut�t que de voir l\'erreur, il est redirig� vers une page d\'excuse, et un rapport de l\'erreur SQL est envoy� dans l\'administration.',
    'MULTI_WARS'            => 'Multi-map module wars',
    'MULTI_WARS_DETAIL'     => 'Le nouveau module permet de visionner les prochains matchs, il permet aussi de choisir le nombre de maps, il y a alors un score par map, puis un score final qui est la moyenne des scores par map.',
    'COMMENT_SYSTEM'        => 'Syst�me commentaires',
    'COMMENT_SYSTEM_DETAIL' => 'Le nouveau syst�me de commentaires permet rapidement d\'envoyer un commentaire en ajax et de visionner les 4 derniers commentaires.',
    'WYSIWYG_EDITOR'        => 'Editeur WYSIWYG',
    'WYSIWYG_EDITOR_DETAIL' => 'Ce nouveau syst�me permet d\'avoir une visualisation rapide de votre message, news ou autre apr�s mise en forme.',
    'CONTACT'               => 'Module Contact',
    'CONTACT_DETAIL'        => 'Nous avons ajout� le module contact indispensable au fonctionnement d\'un site web.',
    'PASSWORD_ERROR'        => 'Erreur mot de passe',
    'PASSWORD_ERROR_DETAIL' => 'Lorsqu\'un utilisateur se trompe de mot de passe 3 fois de suite, il doit alors recopier un code de s�curit� en plus de son login afin de se connecter � son compte.',
    'VARIOUS_MODIF'         => 'Diff�rentes modifications',
    'VARIOUS_MODIF_DETAIL'  => 'En plus des modifications pr�c�dentes, nous avons effectu� diverses modifications comme la page 404, o� m�me des modifications non visibles comme le captcha.',
    'NEXT'                  => 'Continuer',
    #####################################
    # views/checkCompatibility.php
    #####################################
    'CHECK_COMPATIBILITY_HOSTING' => 'V�rification de la compatibilit� avec votre h�bergement',
    'COMPOSANT'             => 'Composant',
    'COMPATIBILITY'         => 'Compatibilit�',
    'WEBSITE_DIRECTORY'     => 'R�pertoire du site web',
    'PHP_VERSION'           => 'PHP version &ge; %s',
    'PHP_VERSION_ERROR'     => 'Erreur PHP',
    'MYSQL_EXT'             => 'Extension MySQL',
    'MYSQL_EXT_ERROR'       => 'Erreur Mysql',
    'SESSION_EXT'           => 'Extension des sessions',
    'SESSION_EXT_ERROR'     => 'Erreur sessions',
    'FILEINFO_EXT'          => 'Extension File Info',
    'FILEINFO_EXT_ERROR'    => 'Erreur fileinfo',
    'GD_EXT'                => 'Extension GD',
    'GD_EXT_ERROR'          => 'Erreur GD',
    'CHMOD_TEST'            => 'Test du CHMOD',
    'CHMOD_TEST_ERROR'      => 'Erreur chmod',
    'BAD_HOSTING'           => 'Votre h�bergement n\'est pas compatible avec la nouvelle version de Nuked-Klan.',
    'FORCE'                 => 'Forcer l\'installation',
    #####################################
    # views/chooseSendStats.php
    #####################################'CONF_INC_ERROR'
    'SELECT_STATS'          => 'Activation des statistiques anonymes',
    'STATS_INFO'            => '<p>Afin d\'am�liorer au mieux le CMS Nuked Klan, en tenant compte de l\'utilisation des administrateurs de sites NK,<br/>nous avons mis en place sur cette nouvelle version un syst�me d\'envoi de statistiques anonymes.</p><p>Vous avez le choix d\'activer ou non ce syst�me, mais sachez qu\'en l\'activant vous permettrez � l\'�quipe de Developpement/Marketing<br/>de mieux r�pondre � vos attentes.</p><p>Pour une totale transparence, lors de l\'envoi des statistiques, vous serez inform� dans l\'administration, des donn�es envoy�es.<br/>Sachez qu\'� tout moment vous aurez la possibilit� de d�sactiver l\'envoi des statistiques dans les pr�f�rences g�n�rales de votre administration.</p>',
    'CONFIRM_STATS'         => 'Oui, j\'autorise l\'envoi de statistiques anonymes � Nuked-Klan',
    'CONFIRM'               => 'Valider',
    #####################################
    # views/confIncFailure.php
    #####################################
    'ERROR'                 => 'Une erreur est survenue !!!',
    'WEBSITE_DIRECTORY_CHMOD' => 'Impossible d\'�crire dans le dossier contenant Nuked-Klan<br/>Veuillez mettre manuellement le CHMOD <strong>0755</strong> sur ce dossier.',
    'CONF_INC_CHMOD_ERROR'  => 'Impossible de modifier les droits CHMOD du fichier conf.inc.php<br/>Veuillez mettre manuellement le CHMOD <strong>%s</strong> sur ce fichier.',
    'WRITE_CONF_INC_ERROR'  => 'Une erreur est survenue dans la g�n�ration du fichier conf.inc.php',
    'COPY_CONF_INC_ERROR'   => 'Impossible de cr�er la sauvegarde du fichier conf.inc.php<br/>Veuillez t�l�charger le fichier et le sauvegarder manuellement.',
    'DOWNLOAD'              => 'T�l�charger',
    'BACK'                  => 'Retour',
    #####################################
    # views/fatalError.php
    #####################################
    'REFRESH'               => 'Rafraichir',
    #####################################
    # views/fullPage.php
    #####################################
    'INSTALL_TITLE'         => 'Installation de Nuked-klan %s',
    'UPDATE_TITLE'          => 'Mise � jour de Nuked-klan %s',
    'SELECT_LANGUAGE'       => 'S�lection de la langue',
    'SELECT_TYPE'           => 'Type d\'installation',
    'INSTALL'               => 'Installation',
    'UPDATE'                => 'Mise � jour',
    'YES'                   => 'Oui',
    'NO'                    => 'Non',
    'QUICK'                 => 'Rapide',
    'ASSIST'                => 'Assist�e',
    'SELECT_SAVE'           => 'Sauvegarde de la base de donn�es',
    'IN_PROGRESS'           => 'En cours',
    'FINISH'                => 'Termin�',
    'RESET_SESSION'         => 'R�initialiser',
    'DISCOVERY'             => 'D�couvrer Nuked-Klan !',
    'DISCOVERY_DESCR'       => 'Vous �tes sur le point d\'installer votre site web sur base du CMS Nuked-Klan...</p><p>En quelques clics et en quelques minutes, offrez-vous la possibilit� de g�rer votre team, guilde ou clan, � l\'aide d\'outils sp�cialement con�us � cet effet !</p><p>Vous n\'�tes pas un joueur mais vous d�sirez toutefois utiliser Nuked-Klan pour r�aliser votre site web ?</p><p>Aucun probl�me, une version g�n�raliste (SP) a �galement �t� d�velopp�e et vous est propos�e, express�ment dans cette optique.</p><p>Adopter un design plus adapt� � l\'esprit de votre activit� (palette de couleurs, logos,...) devient, gr�ce � Nuked-Klan, un v�ritable jeu d\'enfant. Avec une collection impressionante de graphismes et une modification (ainsi qu\'une cr�ation) de th�mes certainement une des plus ais�e du march� des CMS, vous aboutirez in�vitablement � un site web qui vous ressemble.</p><p>Nous vous remercions pour l\'int�r�t et la confiance que vous nous apportez au quotidien... et depuis toutes ces ann�es !',
    'NEWSADMIN'             => 'Une nouvelle administration',
    'NEWSADMIN_DESCR'       => 'Plus ergonomique et plus compl�te, la nouvelle administration pr�sente dans cette version comblera les plus pointilleux d\'entre vous.</p><p>Des options indispensables comme le listage des erreurs SQL et des actions op�r�es sur le site, la possibilit� de laisser des notifications entre administrateurs,... sont, dor�navant, directement int�gr�es dans le panneau d\'administration.</p><p>Nous avons �galement pens� aux graphistes et d�veloppeurs de th�mes, en leur offrant la possibilit� de d�finir une gestion pr�cise des diff�rents �l�ments du design, directement via l\'administration interne du site.</p><p>Avec une s�curisation enti�rement revue et corrig�e, cette derni�re version devrait assurer la p�r�nnit� et la fiabilit� de votre site web.</p><p>Toujours attentifs � vos attentes et vos besoins, quelques options tr�s attendues voient le jour dans cette version. Ainsi, la possibilit� de r�gler le fuseau horaire de votre site, ... (citer quelques am�liorations).',
    'INSTALL_AND_UPDATE'    => 'Installation et mise � jour',
    'INSTALL_AND_UPDATE_DESCR' => 'Les proc�dures d\'installation et de mise � jour ont �t� compl�tement revisit�es et simplifi�es.</p><p>Etape par �tape, tout est maintenant comment� et dissoci� afin de parer au moindre probl�me que vous pourriez rencontrer.</p><p>Plus de perte de donn�es lors d\'une mise � jour, une sauvegarde de votre base de donn�e existante est automatiquement ex�cut�e.</p><p>Durant l\'installation et la mise � jour, toutes les �tapes sont maintenant archiv�es dans un journal. En cas de souci, ce journal permettra � notre �quipe de vous assister durant les proc�dures d\'installation (ou de mise � jour) de fa�on optimale.</p><p>Nous vous proposons, dor�navant, de participer � l\'�volution du CMS via l\'envoi (anonyme) de statistiques. Gr�ce � cela, nous aurons la possibilit� de r�pondre de fa�on pr�cise et id�ale � vos attentes, d�s les prochaines versions.',
    'COMMUNAUTY_NK'         => 'La communaut� NK',
    'COMMUNAUTY_NK_DESCR'   => 'Une communaut� sans cesse florissante, avec des membres d\'une grande serviabilit� et poss�dant de nombreuses comp�tences.<br/>Voil� un des avantages non n�gligeable dont vous b�n�ficierez en adoptant Nuked-Klan et en rejoignant la dite communaut�.<br/>Tout naturellement, vous int�grerez cette grande famille, toujours soucieuse du bien-�tre de ses membres.</p><p>De nombreux fan-sites gravitent autour du CMS. Preuve de l\'enthousiasme et de l\'engouement que procure l\'utilisation de Nuked-Klan, ils repr�sentent la colonne vert�brale du CMS.</p><p>Pour cette raison (et pour bien d\'autres), ils apportent � notre �quipe de d�veloppeurs et de communautaires l\'envie d\'avancer, main dans la main, dans la bonne humeur et avec un esprit assidu de communication.</p><p>C\'est ainsi que nous �voluerons, au fil des ann�es, toujours � l\'�coute de vos attentes et de vos besoins.</p><p>Parce que Nuked-Klan est, avant tout, votre CMS !!',
    #####################################
    # views/getPartners.php
    #####################################
    'NO_PARTNERS'           => 'Une erreur est survenue lors de la r&eacute;cup&eacute;ration de la liste des partenaires...',
    #####################################
    # views/installDB.php
    #####################################
    'CREATE_DB'             => 'Cr�ation de la base de donn�es',
    'UPDATE_DB'             => 'Mise � jour de la base de donn�es',
    'WAITING'               => 'Veuillez cliquer sur d�marrer pour commencer...',
    'CREATED_SUCCESS'       => 'cr�e avec succ�s.',
    'UPDATE_SUCCESS'        => 'mise � jour avec succ�s.',
    'REMOVE_SUCCESS'        => 'supprim�e avec succ�s.',
    'NOTHING_TO_DO'         => 'Aucune modification � effectu�e.',
    'STEP'                  => 'Etape',
    'STARTING_INSTALL'      => 'D�marrage de l\'installation.',
    'STARTING_UPDATE'       => 'D�marrage de la mise � jour.',
    'INSTALL_SUCCESS'       => 'L\'installation est termin�e ! Toutes les tables ont bien �t� cr��es.',
    'UPDATE_SUCCESS'        => 'La mise � jour est termin�e ! Toutes les tables ont bien �t� modifi�es.',
    'INSTALL_FAILED'        => 'L\'installation est termin�e ! Mais des erreurs sont survenues, %d tables n\'ont pas �t� cr��es.',
    'UPDATE_FAILED'         => 'La mise � jour est termin�e ! Mais des erreurs sont survenues, %d tables n\'ont pas �t� modifi�es.',
    'PRINT_ERROR'           => ' - Erreur :',
    'CREATED_TABLE_ERROR'   => 'Une erreur est survenue lors de la cr�ation de la table',
    'UPDATE_TABLE_ERROR'    => 'Une erreur est survenue lors de la modification de la table',
    'RETRY'                 => 'R�essayer',
    'START'                 => 'D�marrer',
    #####################################
    # views/installSuccess.php
    #####################################
    'INSTALL_SUCCESS'       => 'Installation termin�e',
    'INFO_PARTNERS'         => 'Retrouvez nos partenaires et leurs codes promotionnels,<br/>afin de profiter au mieux de leurs produits et/ou services.',
    'WAIT'                  => 'Veuillez patienter...',
    'ACCESS_SITE'           => 'Acc�der � votre site',
    #####################################
    # views/main.php
    #####################################
    'WELCOME_INSTALL'       => 'Bienvenue sur Nuked-Klan %s',
    'GUIDE_INSTALL'         => 'L\'assistant va vous guider � travers les �tapes de l\'installation de votre portail...<br /><br /><b>Merci de laisser le copyleft sur votre site pour respecter la licence GNU.</b>',
    'START_INSTALL'         => 'D�marrer l\'installation',
    'DETECT_UPDATE'         => 'L\'assistant a d�tect� une installation de la version : %s de Nuked-Klan',
    'START_UPDATE'          => 'D�marrer la mise � jour',
    #####################################
    # views/maliciousScript.php
    #####################################
    'MALICIOUS_SCRIPT_DETECTED' => 'Script malveillant d�tect�',
    'DELETE_TURKISH_FILE'   => 'Impossible de supprimer le fichier. Veuillez le supprimer manuellement et v�rifier encore si il est pr�sent.<br/>&nbsp;Fichier : /modules/404/lang.turkish.lang.php',
    'CHECK_AGAIN'           => 'V�rifier encore',
    #####################################
    # views/selectLanguage.php
    #####################################
    'FRENCH'                => 'Fran�ais',
    'ENGLISH'               => 'Anglais',
    'SUBMIT'                => 'Valider',
    #####################################
    # views/selectProcessType.php
    #####################################
    'CHECK_TYPE_INSTALL'    => 'Choix du type d\'installation',
    'INSTALL_SPEED'         => 'Installation rapide',
    'INSTALL_ASSIST'        => 'Installation assist�e',
    'UPDATE_SPEED'          => 'Mise � jour rapide',
    'UPDATE_ASSIST'         => 'Mise � jour assist�e',
    #####################################
    # views/selectSaveBdd.php
    #####################################
    'TO_SAVE'               => 'Sauvegarder',
    'SAVE_YOUR_DATABASE'    => 'Vous pouvez sauvegarder votre base de donn�e en cliquant sur le lien ci-dessous.',
    //'SAVE'                  => 'Sauvegarde',
    //'_NOTHANKS', 'Non merci!',
    //'_DBSAVED', 'Base de donn�es sauvegard�e',
    //'_DBSAVEDTXT', 'Votre base de donn�es a bien �t� sauvegard�e, vous pouvez la t�l�charger ici :',
    #####################################
    # views/setConfig.php
    #####################################
    'CONFIG'                => 'Configuration',
    'DB_HOST'               => 'Serveur Mysql',
    'INSTALL_DB_HOST'       => 'Il s\'agit ici de l\'adresse du serveur MySQL de votre h�bergement, celui-ci contient toutes vos donn�es textes, membres, messages... En g�n�ral, il s\'agit de localhost, mais dans tous les cas, l\'adresse est indiqu�e dans votre mail d\'inscription de votre h�bergeur ou dans l\'administration de votre h�bergement.',
    'DB_USER'                => 'Utilisateur',
    'INSTALL_DB_USER'       => 'Il s\'agit de votre identifiant qui vous permet de vous connecter � votre base MySQL.',
    'DB_PASSWORD'           => 'Mot de passe',
    'INSTALL_DB_PASSWORD'   => 'Il s\'agit du mot de passe de votre identifiant qui vous permet de vous connecter � votre base MySQL.',
    'DB_PREFIX'             => 'Prefix',
    'INSTALL_DB_PREFIX'     => 'Le prefix permet d\'installer plusieurs fois Nuked-Klan sur une seule base MySQL en utilisant un prefix diff�rent � chaque fois, par d�faut, il s\'agit de \'nuked\', mais vous pouvez le changer comme vous le voulez.',
    'DB_NAME'               => 'Nom de la Base',
    'INSTALL_DB_NAME'       => 'Il s\'agit du nom de votre base de donn�es MySQL, souvent vous devez vous rendre dans l\'administration de votre h�bergement pour cr�er une base de donn�es, mais parfois celle-ci vous est d�j� fournie dans le mail d\'inscription de votre h�bergement.',
    #####################################
    # views/setUserAdmin.php
    #####################################
    'CREATE_USER_ADMIN'     => 'Cr�ation du compte Administrateur',
    'NICKNAME'              => 'Pseudo',
    'PASSWORD'              => 'Mot de passe',
    'PASSWORD_CONFIRM'      => 'Mot de passe (confirmez)',
    'EMAIL'                 => 'E-mail',
    'ERROR_NICKNAME'        => 'Le pseudo doit faire minimum 3 caract�res et ne peut contenir les caract�res suivants : $^()\'?%#\<>,;:',
    'ERROR_PASSWORD'        => 'Veuillez saisir un mot de passe.',
    'ERROR_PASSWORD_CONFIRM' => 'Les mots de passes ne correspondent pas.',
    'ERROR_EMAIL'           => 'Veuillez saisir un e-mail valide',
    #####################################
    # views/setAdminError.php
    #####################################
    'ERROR_FIELDS'          => 'Vous avez mal rempli les champs du formulaire.',
    #####################################
    # tables/table.block.install.update.inc
    #####################################
    'BLOCK_LOGIN'           => 'Login',
    'NAV'                   => 'Menu',
    'NAV_HOME'              => 'Accueil',
    'NAV_NEWS'              => 'News',
    'NAV_FORUM'             => 'Forum',
    'NAV_DOWNLOAD'          => 'T�l�chargements',
    'NAV_TEAM'              => 'Team',
    'NAV_MEMBERS'           => 'Membres',
    'NAV_DEFY'              => 'Nous D�fier',
    'NAV_RECRUIT'           => 'Recrutement',
    'NAV_ART'               => 'Articles',
    'NAV_SERVER'            => 'Serveurs',
    'NAV_LINKS'             => 'Liens Web',
    'NAV_CALENDAR'          => 'Calendrier',
    'NAV_GALLERY'           => 'Galerie',
    'NAV_MATCHS'            => 'Matchs',
    'NAV_ARCHIV'            => 'Archives',
    'NAV_IRC'               => 'IrC',
    'NAV_GUESTBOOK'         => 'Livre d\'Or',
    'NAV_SEARCH'            => 'Recherche',
    'NAV_STRATS'            => 'Strat�gies',
    'MEMBER'                => 'Membre',
    'NAV_ACCOUNT'           => 'Compte',
    'ADMIN'                 => 'Admin',
    'NAV_ADMIN'             => 'Administration',
    'BLOCK_SEARCH'          => 'Recherche',
    'POLL'                  => 'Sondage',
    'BLOCK_STATS'           => 'Stats',
    'IRC_AWARD'             => 'Irc Awards',
    'SERVER_MONITOR'        => 'Serveur monitor',
    'SUGGEST'               => 'Suggestion',
    'BLOCK_SHOUTBOX'        => 'Tribune libre',
    'BLOCK_PARTNERS'        => 'Partenaires',
    'GAME_SERVER_RENTING'   => 'Location de serveurs de jeux',
    #####################################
    # tables/table.forums.install.inc
    #####################################
    'CATEGORY'              => 'Cat�gorie',
    #####################################
    # tables/table.forums_cat.install.update.inc
    #####################################
    'FORUM'                 => 'Forum',
    'TEST_FORUM'            => 'Forum Test',
    #####################################
    # tables/table.forums_rank.install.inc
    #####################################
    'NEWBIE'                => 'Noob',
    'JUNIOR_MEMBER'         => 'Jeune membre',
    'SENIOR_MEMBER'         => 'Membre averti',
    'POSTING_FREAK'         => 'Posteur Fou',
    'MODERATOR'             => 'Mod�rateur',
    'ADMINISTRATOR'         => 'Administrateur',
    #####################################
    # tables/table.games.install.update.inc
    #####################################
    'PREF_CS'               => 'Pr�f�rences CS',
    'OTHER_NICK'            => 'Autre pseudo',
    'FAV_MAP'               => 'Map favorite',
    'FAV_WEAPON'            => 'Arme favorite',
    'SKIN_T'                => 'Skin Terro',
    'SKIN_CT'               => 'Skin CT',
    #####################################
    # tables/table.news_cat.install.inc
    #####################################
    'BEST_MOD'              => 'Le meilleur MOD pour Half-Life',
    #####################################
    # tables/table.notification.install.inc
    #####################################
    'SUHOSIN'               => 'Attention la configuration PHP de suhosin.session.encrypt est sur "On". Veuillez vous r�f�rer � la documentation, en cas de probl�me.',
    #####################################
    # tables/table.sondage.install.inc
    #####################################
    'LIKE_NK'               => 'Aimez-vous Nuked-klan ?',
    #####################################
    # tables/table.sondage_data.install.inc
    #####################################
    'ROXX'                  => 'Ca d�chire, continuez !',
    'NOT_BAD'               => 'Mouais, pas mal...',
    'SHIET'                 => 'C\'est naze, arr�tez-vous !',
    'WHATS_NK'              => 'C\'est quoi Nuked-Klan ?',
    #####################################
    # tables/table.smilies.install.update.inc
    #####################################
    
);

/*
///////////////////////////////////////////////
/////// ERREUR CREATION FICHIER CONF.INC.PHP
///////////////////////////////////////////////
define('_INFODLSAVECONFINC', 'Veuillez t�l�charger le contenu ci-dessus et conserver ce fichier (c\'est une sauvegarde).');
define('_BADCHMOD', 'Impossible d\'�crire dans le fichier <b>conf.inc.php</b>, v�rifiez les droits en �criture (CHMOD) !');
///////////////////////////////////////////////
/////// GLOBAL
///////////////////////////////////////////////
define("_HELP","Aides");
define('_FORCEINSTALL', 'Forcer l\'installation');
define('_ERRORTRY', 'Une erreur est survenue, veuillez r�essayer.');
///////////////////////////////////////////////
/////// CREATION BDD (INSTALLATION)
///////////////////////////////////////////////
define('_STARTDB', 'D�marrer la cr�ation');
define('_SQLCONNECTOK', 'La connexion � la base de donn�es a �t� r�alis�e avec succ�s.');
define('_WRONGTABLENAME', 'Le nom de la table est erron�.');
///////////////////////////////////////////////
/////// CREATION BDD (MISE A JOUR)
///////////////////////////////////////////////
define('_LOGUTXTSUCCESS', 'modifi�e avec succ�s.');
define('_LOGUTXTUPDATE', 'mis � jour avec succ�s.');
define('_LOGUTXTREMOVE2', 'supprim� avec succ�s.');
*/

?>