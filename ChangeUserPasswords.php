<?php

if ( function_exists( 'wfLoadExtension' ) ) {

         wfLoadExtension('ChangeUserPasswords');
         // Keep i18n globals so mergeMessageFileList.php doesn't break
         $wgMessagesDirs['ChangeUserPasswords'] = __DIR__ . '/i18n';

         $wgExtensionMessagesFiles['ChangeUserPasswordsMagic'] = __DIR__ . '/ChangeUserPasswords.i18n.magic.php';
         wfWarn(
             'Deprecated PHP entry point used for ChangeUserPasswords extension. Please use wfLoadExtension ' .
             'instead, see https://www.mediawiki.org/wiki/Extension_registration for more details.'
         );
         return true;

} else {
	die( 'This version of the ChangeUserPasswords extension requires MediaWiki 1.25+. Also you should be an Admin to view this page' );
}
define( 'CHANGE_USER_PASSWORDS_VERSION', '1.0.0' );
$wgExtensionCredits['specialpage'][] = [
    'path' => __FILE__,
    'name' => 'Change User Passwords',
    'version' => CHANGE_USER_PASSWORDS_VERSION,
    'author' => [ 'Ankita Mandal', 'Mirco Zick'],
    'url' => 'https://www.mediawiki.org/wiki/Special:ChangeUserPasswords',
    'descriptionmsg' => 'changeuserpassword-desc',
    'license-name' => 'GPL-2.0-or-later'
];

$wgAvailableRights[] = 'changeuserpasswords';
$wgGroupPermissions['sysop']['changeuserpasswords'] = true;

$wgHooks['AdminLinks'][] = 'ChangeUserPasswordsHooks::addToAdminLinks';