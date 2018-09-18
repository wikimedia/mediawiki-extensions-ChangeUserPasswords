<?php
/**
 * Hooks for {{ cookiecutter.repo_name }} extension
 *
 * @file
 * @ingroup Extensions
 */

class ChangeUserPasswordsHooks {

    public static function addToAdminLinks( ALTree &$adminLinksTree ) {
        $generalSection = $adminLinksTree->getSection( wfMessage( 'adminlinks_general' )->text() );
        $extensionsRow = $generalSection->getRow( 'extensions' );

        if ( is_null( $extensionsRow ) ) {
            $extensionsRow = new ALRow( 'extensions' );
            $generalSection->addRow( $extensionsRow );
        }

        $extensionsRow->addItem( ALItem::newFromSpecialPage( 'ChangeUserPasswords' ) );

        return true;
    }

	public static function onParserFirstCallInit( Parser &$parser ) {
		$parser->setFunctionHook( 'something', 'ChangeUserPasswordsHooksHooks::doSomething' );
	}

	public static function doSomething( Parser &$parser )
	{
		// Called in MW text like this: {{ "{{" }}#something: {{ "}}" }}

		// For named parameters like {{ "{{" }}#something: foo=bar | apple=orange | banana {{ "}}" }}
		// See: https://www.mediawiki.org/wiki/Manual:Parser_functions#Named_parameters

		return "This text will be shown when calling this in MW text.";
	}
}
