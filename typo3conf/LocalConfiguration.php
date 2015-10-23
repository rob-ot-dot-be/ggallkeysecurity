<?php
return array(
	'BE' => array(
		'debug' => FALSE,
		'explicitADmode' => 'explicitAllow',
		'installToolPassword' => '$P$CsuiWSuvJOfLppcSWp2GK2amIgsuzW1',
		'loginSecurityLevel' => 'rsa',
		'versionNumberInFilename' => '0',
	),
	'DB' => array(
		'database' => 'aksDev',
		'extTablesDefinitionScript' => 'extTables.php',
		'host' => 'localhost',
		'password' => 'root',
		'socket' => '',
		'username' => 'root',
	),
	'EXT' => array(
		'extConf' => array(
			'dix_urltool' => 'a:0:{}',
			'extension_builder' => 'a:3:{s:15:"enableRoundtrip";s:0:"";s:15:"backupExtension";s:1:"1";s:9:"backupDir";s:35:"uploads/tx_extensionbuilder/backups";}',
			'ggbootstrap' => 'a:0:{}',
			'gridelements' => 'a:2:{s:20:"additionalStylesheet";s:0:"";s:19:"nestingInListModule";s:1:"1";}',
			'powermail' => 'a:8:{s:12:"disableIpLog";s:1:"0";s:27:"disableMarketingInformation";s:1:"0";s:20:"disableBackendModule";s:1:"0";s:24:"disablePluginInformation";s:1:"0";s:13:"enableCaching";s:1:"0";s:28:"enableTableGarbageCollection";s:1:"0";s:15:"l10n_mode_merge";s:1:"0";s:29:"replaceIrreWithElementBrowser";s:1:"0";}',
			'realurl' => 'a:5:{s:10:"configFile";s:0:"";s:14:"enableAutoConf";s:1:"1";s:14:"autoConfFormat";s:1:"0";s:12:"enableDevLog";s:1:"0";s:19:"enableChashUrlDebug";s:1:"0";}',
			'rsaauth' => 'a:1:{s:18:"temporaryDirectory";s:0:"";}',
			'saltedpasswords' => 'a:2:{s:3:"BE.";a:4:{s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\PhpassSalt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}s:3:"FE.";a:5:{s:7:"enabled";i:1;s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\PhpassSalt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}}',
			'seo_basics' => 'a:1:{s:10:"xmlSitemap";s:1:"1";}',
			'static_info_tables' => 'a:1:{s:13:"enableManager";s:1:"0";}',
			't3sbootstrap' => 'a:9:{s:14:"default_CTypes";s:1:"1";s:16:"default_BScTypes";s:1:"1";s:12:"default_Flag";s:1:"1";s:10:"rte_config";s:1:"1";s:10:"rte_extend";s:1:"0";s:11:"fontawesome";s:1:"1";s:6:"autoTS";s:1:"0";s:15:"optionalContent";s:1:"0";s:14:"backendLayouts";s:1:"1";}',
			'version' => 'a:0:{}',
			'wt_spamshield' => 'a:0:{}',
		),
	),
	'EXTCONF' => array(
		'lang' => array(
			'availableLanguages' => array(),
		),
	),
	'FE' => array(
		'activateContentAdapter' => FALSE,
		'debug' => FALSE,
		'loginSecurityLevel' => 'rsa',
	),
	'GFX' => array(
		'colorspace' => 'sRGB',
		'im' => 1,
		'im_mask_temp_ext_gif' => 1,
		'im_path' => '/usr/local/bin/',
		'im_path_lzw' => '/usr/local/bin/',
		'im_v5effects' => 1,
		'im_version_5' => 'im6',
		'image_processing' => 1,
		'jpg_quality' => '80',
	),
	'INSTALL' => array(
		'wizardDone' => array(
			'TYPO3\CMS\Install\Updates\TceformsUpdateWizard' => 'tt_content:image,pages:media,pages_language_overlay:media',
			'TYPO3\CMS\Install\Updates\TruncateSysFileProcessedFileTable' => 1,
		),
	),
	'SYS' => array(
		'caching' => array(
			'cacheConfigurations' => array(
				'extbase_object' => array(
					'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
					'frontend' => 'TYPO3\\CMS\\Core\\Cache\\Frontend\\VariableFrontend',
					'groups' => array(
						'system',
					),
					'options' => array(
						'defaultLifetime' => 0,
					),
				),
			),
		),
		'clearCacheSystem' => FALSE,
		'compat_version' => '6.2',
		'devIPmask' => '',
		'displayErrors' => 0,
		'enableDeprecationLog' => FALSE,
		'encryptionKey' => '810e96651b485fe14c980c08ed5ac95465b66c6386481d5ca678ef2dc0c840e99af63852e0907fb077c105b30393b293',
		'isInitialInstallationInProgress' => FALSE,
		'sitename' => 'All Key Security',
		'sqlDebug' => 0,
		'systemLogLevel' => 2,
		't3lib_cs_convMethod' => 'mbstring',
		't3lib_cs_utils' => 'mbstring',
	),
);
?>