<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'VisayInfo.' . $_EXTKEY,
	'DropboxCarousel',
	array(
		'Carousel' => 'play',
		
	),
	// non-cacheable actions
	array(
	)
);

?>