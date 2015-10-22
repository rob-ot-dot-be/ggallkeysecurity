<?php
return array(
	'BE' => array(
		'debug' => FALSE,
		'explicitADmode' => 'explicitAllow',
		'installToolPassword' => '$P$CsuiWSuvJOfLppcSWp2GK2amIgsuzW1',
		'loginSecurityLevel' => 'rsa',
	),
	'DB' => array(
		'database' => 'aks',
		'extTablesDefinitionScript' => 'extTables.php',
		'host' => 'localhost',
		'password' => 'root',
		'socket' => '',
		'username' => 'root',
	),
	'EXT' => array(
		'extConf' => array(
			'gridelements' => 'a:2:{s:20:"additionalStylesheet";s:0:"";s:19:"nestingInListModule";s:1:"1";}',
			'rsaauth' => 'a:1:{s:18:"temporaryDirectory";s:0:"";}',
			'saltedpasswords' => 'a:2:{s:3:"BE.";a:4:{s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\PhpassSalt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}s:3:"FE.";a:5:{s:7:"enabled";i:1;s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\PhpassSalt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}}',
			't3sbootstrap' => 'a:9:{s:14:"default_CTypes";s:1:"1";s:16:"default_BScTypes";s:1:"1";s:12:"default_Flag";s:1:"1";s:10:"rte_config";s:1:"1";s:10:"rte_extend";s:1:"0";s:11:"fontawesome";s:1:"1";s:6:"autoTS";s:1:"0";s:15:"optionalContent";s:1:"0";s:14:"backendLayouts";s:1:"1";}',
			'version' => 'a:0:{}',
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