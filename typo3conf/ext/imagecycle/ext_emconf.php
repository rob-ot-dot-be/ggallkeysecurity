<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "imagecycle".
 *
 * Auto generated 23-10-2015 11:47
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Image Cycle',
	'description' => 'Insert a slideshow into your page or template. Manage the images, captions and hrefs recursively in the pagetree and show it in a jQuery-Cycle, Coin-Slider, Nivo-Slider or Cross-Slider. Add media from DAM and DAM-Category. Use t3jquery for better integration with other jQuery extensions.',
	'category' => 'plugin',
	'version' => '2.7.7',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => 'uploads/tx_imagecycle',
	'clearcacheonload' => 0,
	'author' => 'Juergen Furrer',
	'author_email' => 'juergen.furrer@gmail.com',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'cms' => '',
			'php' => '5.0.0-0.0.0',
			'typo3' => '4.3.0-6.2.99',
			'jftcaforms' => '0.2.1-',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

