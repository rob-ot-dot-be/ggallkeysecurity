<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");
$tempColumns = Array (
	"tx_tinyrte_tinyrte_plugins" => Array (		
		'label' => 'LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_plugins',
		'config' => Array (
			'type' => 'select',
			"items" => Array (
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_none', ""),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_safari', "safari"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_advhr', "advhr"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_contextmenu', "contextmenu"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_rtl', "rtl"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_ltr', "ltr"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_emotions', "emotions"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_ispell', "spellchecker"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_inlinepopups', "inlinepopups"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_insertdate', "insertdate"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_inserttime', "inserttime"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_cut', "cut"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_paste', "paste"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_pasteword', "pasteword"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_pastetext', "pastetext"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_preview', "preview"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_print', "print"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_search', "search"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_replace', "replace"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_table', "table"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_tablecontrols', "tablecontrols"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_zoom', "zoom"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_cleanup', "cleanup"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_typo3link', "typo3link"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_typo3image', "typo3image"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_code', "code"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_ bold', "bold"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_italic', "italic"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_underline', "underline"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_strikethrough', "strikethrough"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_justifyleft', "justifyleft"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_justifycenter', "justifycenter"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_justifyright', "justifyright"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_justifyfull', "justifyfull"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_bullist', "bullist"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_numlist', "numlist"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_outdent', "outdent"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_indent', "indent"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_copy', "copy"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_undo', "undo"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_redo', "redo"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_unlink', "unlink"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_help', "help"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_hr', "hr"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_removeformat', "removeformat"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_formatselect', "formatselect"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_fontselect', "fontselect"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_fontsizeselect', "fontsizeselect"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_styleselect', "styleselect"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_sub', "sub"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_sup', "sup"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_forecolor', "forecolor"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_backcolor', "backcolor"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_charmap', "charmap"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_visualaid', "visualaid"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_anchor', "anchor"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_newdocument', "newdocument"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_layer', "layer"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_vchars', "visualchars"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_xhtmlxtras', "xhtmlxtras"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_media', "media"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_lorem', "lorem"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_style', "style"),
				Array('LLL:EXT:tinyrte/locallang_db.php:be_users.tx_tinyrte_tinyrte_template', "template"),
			),
			'renderMode' => "singlebox",
			'size' => '5',
			'autoSizeMax' => 15,
			'maxitems' => '70',
			'iconsInOptionTags' => 1,
		)
	),
);

/**
 * Adds the icons to the items
 */
$newColumns=$tempColumns;
while (list($key,$val) = each($tempColumns[tx_tinyrte_tinyrte_plugins][config][items])) {
	$bePath="../typo3/../".t3lib_extMgm::siteRelPath("tinyrte");
	$mainPath=t3lib_div::getIndpEnv('TYPO3_DOCUMENT_ROOT').substr(t3lib_div::getIndpEnv('TYPO3_SITE_URL'),strlen(t3lib_div::getIndpEnv('TYPO3_REQUEST_HOST')), strlen(t3lib_div::getIndpEnv('TYPO3_SITE_URL'))).t3lib_extMgm::siteRelPath("tinyrte");
	if($val[1]) {
		if(file_exists($mainPath."tiny_mce/themes/advanced/images/".$val[1].".gif")) {
			$newColumns[tx_tinyrte_tinyrte_plugins][config][items][$i][2]=$bePath."tiny_mce/themes/advanced/images/".$val[1].".gif";
		}
		elseif(file_exists($mainPath."tiny_mce/plugins/".$val[1]."/images/image.gif")) {
			$newColumns[tx_tinyrte_tinyrte_plugins][config][items][$i][2]=$bePath."tiny_mce/plugins/".$val[1]."/images/image.gif";
		}
		elseif(file_exists($mainPath."tiny_mce/plugins/".$val[1]."/images/".$val[1].".gif")) {
			$newColumns[tx_tinyrte_tinyrte_plugins][config][items][$i][2]=$bePath."tiny_mce/plugins/".$val[1]."/images/".$val[1].".gif";
		}
		elseif(file_exists($mainPath."icons/".$val[1].".gif")) {
			$newColumns[tx_tinyrte_tinyrte_plugins][config][items][$i][2]=$bePath."icons/".$val[1].".gif";
		}
		else {
			$newColumns[tx_tinyrte_tinyrte_plugins][config][items][$i][2]=$bePath."icons/noimage.gif";
		}
	}
	$i++;
}
$tempColumns=$newColumns;

t3lib_div::loadTCA("be_users");
t3lib_extMgm::addTCAcolumns("be_users",$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes("be_users","tx_tinyrte_tinyrte_plugins;;;;1-1-1");

t3lib_div::loadTCA("be_groups");
t3lib_extMgm::addTCAcolumns("be_groups",$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes("be_groups","tx_tinyrte_tinyrte_plugins;;;;1-1-1");

?>