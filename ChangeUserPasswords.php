<?php

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'ChangeUserPasswords' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['ChangeUserPasswords'] = __DIR__ . '/i18n';

	wfWarn(
		'Deprecated PHP entry point used for ChangeUserPasswords extension. Please use wfLoadExtension ' .
		'instead, see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	);
	return true;
} else {
	die( 'This version of the ChangeUserPasswords extension requires MediaWiki 1.25+. ' .
		'Also you should be an Admin to view this page' );
}
