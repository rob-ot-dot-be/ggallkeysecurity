<?php
foreach(explode(",",$globalConf["MCEplugin"]) as $js) {
	if(is_dir((!stristr(t3lib_extmgm::extRelPath("lang_tinyrte"),"typo3") ? "typo3/" : "").t3lib_extmgm::extPath("lang_tinyrte")."tiny_mce/plugins/".$js)) {
	$item.='
				tinymce.ScriptLoader.load("'.$path2Lang.'/plugins/'.$js.'/langs/'.(file_exists(t3lib_extmgm::extPath("lang_tinyrte")."tiny_mce/plugins/".$js."/langs/".$this->language."_dlg.js") ? $this->language."_dlg" : "en_dlg").'.js");';
	}
}
$item.='
				tinymce.ScriptLoader.load("'.$path2Lang.'/themes/advanced/langs/'.(file_exists(t3lib_extmgm::extPath("lang_tinyrte")."tiny_mce/themes/advanced/langs/".$this->language."_dlg.js") ? $this->language."_dlg" : "en_dlg").'.js");
				tinymce.ScriptLoader.load("'.$path2Lang.'/themes/advanced/langs/'.(file_exists(t3lib_extmgm::extPath("lang_tinyrte")."tiny_mce/themes/advanced/langs/".$this->language.".js") ? $this->language : "en").'.js");
				tinymce.ScriptLoader.load("'.$path2Lang.'/langs/'.(file_exists(t3lib_extmgm::extPath("lang_tinyrte")."tiny_mce/langs/".$this->language.".js") ? $this->language : "en").'.js");';
?>