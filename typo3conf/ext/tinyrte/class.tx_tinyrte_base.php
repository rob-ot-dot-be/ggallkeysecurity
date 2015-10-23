<?php
require_once(PATH_t3lib.'class.t3lib_rteapi.php');
require_once(PATH_t3lib.'class.t3lib_cs.php');

$tinyrte_initialized = false;

class tx_tinyrte_base extends t3lib_rteapi {

	/**
	 * Is the browser able to display the RTE? (Not implemented yet. Coming soon...
	 */
	function isAvailable()	{


	return true;
	}


	/**
	 * Draws the RTE
	 *
	 * @param	object		Reference to parent object, which is an instance of the TCEforms.
	 * @param	string		The table name
	 * @param	string		The field name
	 * @param	array		The current row from which field is being rendered
	 * @param	array		Array of standard content for rendering form fields from TCEforms. See TCEforms for details on this. Includes for instance the value and the form field name, java script actions and more.
	 * @param	array		"special" configuration - what is found at position 4 in the types configuration of a field from record, parsed into an array.
	 * @param	array		Configuration for RTEs; A mix between TSconfig and otherwise. Contains configuration for display, which buttons are enabled, additional transformation information etc.
	 * @param	string		Record "type" field value.
	 * @param	string		Relative path for images/links in RTE; this is used when the RTE edits content from static files where the path of such media has to be transformed forth and back!
	 * @param	integer		PID value of record (true parent page id)
	 * @return	string		HTML code for RTE!
	 */
	function drawRTE(&$pObj,$table,$field,$row,$PA,$specConf,$thisConfig,$RTEtypeVal,$RTErelPath,$thePidValue){
		global $BE_USER,$LANG,$TCA,$TYPO3_CONF_VARS;
 		$tf=array(
			"0" => "false",
			"1" => "true",
		);
		/**
		 * get the language
		 */
		$this->language = $LANG->lang;
		if ($this->language=='default' || !$this->language)	{
			$this->language='en';
		}

		/**
		 * Path for links in RTE
		 */
		$editorPath=$thisConfig["initial."]["relative_urls"]==true ? str_replace(t3lib_div::getIndpEnv("TYPO3_REQUEST_HOST"),"",t3lib_div::getIndpEnv("TYPO3_SITE_URL")) : t3lib_div::getIndpEnv("TYPO3_SITE_URL");

		/**
		 * Path to the Extension
		 */
		$this->httpTypo3Path = substr( substr( t3lib_div::getIndpEnv('TYPO3_SITE_URL'), strlen( t3lib_div::getIndpEnv('TYPO3_REQUEST_HOST') ) ), 0, -1 );
		if (strlen($this->httpTypo3Path) == 1) {
			$this->httpTypo3Path = "/";
		} else {
			$this->httpTypo3Path .= "/";
		}
		$this->Path = $this->httpTypo3Path . t3lib_extMgm::siteRelPath("tinyrte");

		/**
		 * Configure the RTE
		 */ 
		$globalConf=unserialize($GLOBALS["TYPO3_CONF_VARS"]["EXT"]["extConf"]["tinyrte"]);
		//t3lib_div::debug($globalConf);
		$css=$globalConf["MCEstyle"];
		if($thisConfig["buttonlist"]) $globalConf["MCEbuttons"]=$thisConfig["buttonlist"];
		$globalConf["MCEbuttons"]=explode(";",$globalConf["MCEbuttons"]);

		/**
		 * Override the values from the initialconfiguration with TS-Config
		 */ 
		if($thisConfig["initial."]) {
			foreach($thisConfig["addParams."] as $key => $val) {
				$globalConf[$key]=$val;
			}
		}
		/**
		 * Gets permissions from groups and user or select all if user is admin AND buttons are not configured
		 */
		if($BE_USER->user[admin] && $BE_USER->user[tx_tinyrte_tinyrte_plugins]=="") {
			$MCEConfig="";
			foreach($TCA[be_groups][columns][tx_tinyrte_tinyrte_plugins][config][items] as $val) {
				if($val[1]!="") $MCEConfig.=$val[1].",";
			}
		}
		else {
			foreach($BE_USER->userGroups as $key => $v) {
				$groupConfig.=$BE_USER->userGroups[$key][tx_tinyrte_tinyrte_plugins].",";
			}
			$MCEConfig=str_replace(",,",",",$groupConfig.$BE_USER->user[tx_tinyrte_tinyrte_plugins]);
		}
	
		$value = $this->transformContent('rte',$PA['itemFormElValue'],$table,$field,$row,$specConf,$thisConfig,$RTErelPath,$thePidValue);

		/**
		 * Go on if there buttons configured
		 */ 
		if(strlen($MCEConfig)>2){
			/**
			 * override all configuration with values from TS-Config
			 */ 
			$TS=t3lib_befunc::getPagesTSconfig($thePidValue);
			$thisConfig=$TS["RTE."]["default."];

			if($thisConfig["disableColorPicker"]==1) $thisConfig["hideButtons"].=",forecolor,backcolor";

			$hideButtons=explode(",",str_replace(" ","",$thisConfig["hideButtons"]));
			$showButtons=explode(",",str_replace(" ","",$thisConfig["showButtons"]));
			foreach($showButtons as $val) { // adds the buttons from TSConfig to groups & users
				if(!strstr($MCEConfig,$val.",") || !strstr($MCEConfig,",".$val)) $MCEConfig.=",".$val;
			}
			$allButtons=explode(",",$MCEConfig);
			$MCEConfig="";
			foreach($allButtons as $val) { // remove the buttons from TSConfig from groups & users
				if(!in_array($val,$hideButtons)) $MCEConfig.=$val.",";
			}
			$MCEConfig=substr($MCEConfig,0,strlen($MCEConfig)-1);
			$css=$thisConfig["cssFile"] ? $thisConfig["cssFile"] : $css; // override css

			/**
			 * TinyMCE-Template-Configuration
			 */	
			if($thisConfig["templates."]["items."]) {
				foreach($thisConfig["templates."]["items."] as $key => $val) {
					$tinyTemplate.='
							{
								title : "'.substr($key,0,strlen($key)-1).'",
								src : "'.$thisConfig["templates."]["path"].$val["src"].'",
								description : "'.$val["description"].'"
							},';
				}
				$tinyTemplate = $tinyTemplate ? substr($tinyTemplate,0,strlen($tinyTemplate)-1) : "";
			}

			/**
			 * TinyMCE-Replacement-Configuration for Templates
			 */
			if($thisConfig["templates."]["replace."]) {
				foreach($thisConfig["templates."]["replace."] as $key => $val) {
					$tinyReplace.='
								'.$key.': "'.$BE_USER->user[$val].'",';
				}
				$tinyReplace = $tinyReplace ? substr($tinyReplace,0,strlen($tinyReplace)-1) : "";
			}

			/**
			 * Plugins to load
			 */
			$allowed=explode(",",$MCEConfig);
			$MCEConfig="";
			foreach($allowed as $val) { // if this really a loadable Plugin?
				if($val=="rtl" || $val=="ltr") $val="directionality";
				if($val=="insertdate" || $val=="inserttime") $val="insertdatetime";
				if($val=="search" || $val=="replace") $val="searchreplace";
				if($val=="flash" && in_array("media", $allowed)) $val="";
				//$plug=t3lib_div::getIndpEnv("TYPO3_DOCUMENT_ROOT").$this->Path."tiny_mce/plugins/".$val."/editor_plugin.js";
				//$replacePath=$this->httpTypo3Path!="/" ? $this->httpTypo3Path : "";
				//$plugRel=str_replace("//","/","../".str_replace($replacePath,"",$this->Path)."tiny_mce/plugins/".$val."/editor_plugin.js");

				$plug=t3lib_extmgm::extPath("tinyrte")."tiny_mce/plugins/".$val."/editor_plugin.js";
				if($val && file_exists($plug) && !in_array($val,explode(",",$MCEConfig))) {
					$MCEConfig.=$val.",";
				}
			}
			$globalConf["MCEplugin"]=substr($MCEConfig,0,strlen($MCEConfig)-1);

			/**
			 * Remove not allowed Buttons
			 */
			$Cset=explode(",",$globalConf["MCEbuttons"][0].",".$globalConf["MCEbuttons"][1].",".$globalConf["MCEbuttons"][2].",".$globalConf["MCEbuttons"][3]);
			for ($i = 0; $i <= 2; $i++) {
				$set=explode(",",$globalConf["MCEbuttons"][$i]);
				$globalConf["MCEbuttons"][$i]="";
				foreach($set as $val) {
					if($val=="|") {
						$globalConf["MCEbuttons"][$i].=$val.",";
					}
					else {
						if($val!="table" || ($val=="table" && (!in_array("tablecontrols", $Cset) || !in_array("tablecontrols",$allowed)))) { //Remove button "table" if "tablecontrols" include
							if(in_array($val,$allowed)) $globalConf["MCEbuttons"][$i].=$val.",";
							if(($val=="insertlayer" || $val=="moveforward" || $val=="movebackward" || $val=="absolute") && in_array("layer", $allowed)) $globalConf["MCEbuttons"][$i].=$val.","; // Layerfunctions
							if(($val=="cite" || $val=="abbr" || $val=="acronym" || $val=="del" || $val=="ins") && in_array("layer", $allowed)) $globalConf["MCEbuttons"][$i].=$val.","; // xhtmlextrafunctions
							if($val=="tablecontrols" && !in_array("table",explode(",",$globalConf["MCEplugin"]))) $globalConf["MCEplugin"].=",table"; // table is disabled but tablecontrols enabled, we must load the plugin "table"
							if($val=="styleprops" && in_array("style",$allowed)) $globalConf["MCEbuttons"][$i].=$val.",";
						}
					}
				}
				$globalConf["MCEbuttons"][$i]=substr($globalConf["MCEbuttons"][$i],0,strlen($globalConf["MCEbuttons"][$i])-1);
			}

			/**
			 * Remove double commatas
			 */
			for ($i = 0; $i <= 3; $i++) {
				$globalConf["MCEbuttons"][$i]=str_replace(",,",",",$globalConf["MCEbuttons"][$i]);
				if(substr($globalConf["MCEbuttons"][$i],0,1)==",") $globalConf["MCEbuttons"][$i]=substr($globalConf["MCEbuttons"][$i],1,strlen($globalConf["MCEbuttons"][$i]));
			}
	
	
	
			/**
			 * Remove double separators
			 */
			for ($i = 0; $i <= 3; $i++) {
				unset($d);
				while (!$d) {
					if(!strstr($globalConf["MCEbuttons"][$i],"|,|")) $d=true;
					$globalConf["MCEbuttons"][$i]=str_replace("|,|","|",$globalConf["MCEbuttons"][$i]);
				}
			}
			/**
			 * normal or compressed script?
			 */
			$script= ($globalConf["MCEcompressed"] && file_exists(t3lib_extmgm::extPath("tinyrte")."tiny_mce/tiny_mce_gzip.js")) ? "tiny_mce_gzip.js" : "tiny_mce.js";


			/**
			 * Additional Parameters
			 */
			$addParams=$thisConfig["addParams."];
			foreach($addParams as $key => $val) {
				$additionalParameters.='
					'.$key.' : '.$val.',';
			}


			/**
			 * If the Extension lang_tinyrte installed, get the path
			 */
			if(t3lib_extmgm::isLoaded("lang_tinyrte")) {
				$path2Lang=t3lib_div::getIndpEnv('TYPO3_SITE_URL').(!stristr(t3lib_extmgm::extRelPath("lang_tinyrte"),"typo3") ? "typo3/" : "").str_replace("../","",t3lib_extmgm::extRelPath("lang_tinyrte")).'tiny_mce';
			}

			/**
			 * Load the RTE
			 */
			
			// a little hack to handle multiple instances of tinyRTE. At this time 100 RTE´s per Page can be handled.
			for($count=1; $count<=100; $count++) {
				$instances.='RTEarea'.$count.',';
			}
			$instances=substr($instances,0,strlen($instances)-1);

			if (!$GLOBALS['tinyrte_initialized']) {
			$relOrAbsPath = TYPO3_MODE == 'BE' ? $GLOBALS['BACK_PATH'] . t3lib_extmgm::extRelPath("tinyrte") : t3lib_extmgm::siteRelPath("tinyrte");
			$item.='
			<script language="javascript" type="text/javascript" src="'.$relOrAbsPath.'tiny_mce/'.$script.'"></script>';
				$GLOBALS['tinyrte_initialized'] = true;

if(stristr($script,"gzip")) {
	$item.='
			<script language="javascript" type="text/javascript">
			//<![CDATA[
				tinyMCE_GZ.init({
					themes : "advanced",
					plugins : "'.$globalConf["MCEplugin"].'",
					languages : "'.$this->language.'",
					disk_cache : true
				});
			//]]>
			</script>';
}
$item.='
			<script language="javascript" type="text/javascript">
			//<![CDATA[
				var s;';
if($path2Lang) include(t3lib_extmgm::extPath("tinyrte")."lang_tinyrte.inc");
$item.='
				tinyMCE.init({'.$additionalParameters.'
					theme : "advanced",
					language : "'.$this->language.'",
					plugins : "'.$globalConf["MCEplugin"].'",
					elements : "'.$instances.'",
					document_base_url : "'.$editorPath.'",
					mode : "exact",
					file_browser_callback : "fileBrowserCallBack",
					width : "'.$globalConf["MCEwidth"].'",
					height : "'.$globalConf["MCEheight"].'",
					content_css : "'.$css.'?" + new Date().getTime(),
					theme_advanced_resizing : '.$tf[$globalConf["MCEtheme_advanced_resizing"]].',
					theme_advanced_resize_horizontal : '.$tf[$globalConf["MCEtheme_advanced_resize_horizontal"]].',
					theme_advanced_buttons1 : "'.str_replace("|","separator",$globalConf["MCEbuttons"][0]).'",
					theme_advanced_buttons2 : "'.str_replace("|","separator",$globalConf["MCEbuttons"][1]).'",
					theme_advanced_buttons3 : "'.str_replace("|","separator",$globalConf["MCEbuttons"][2]).'",
					theme_advanced_buttons4 : "'.str_replace("|","separator",$globalConf["MCEbuttons"][3]).'",
				   	plugin_insertdate_dateFormat : "'.$globalConf["MCEplugin_insertdate_dateFormat"].'",
				   	plugin_insertdate_timeFormat : "'.$globalConf["MCEplugin_insertdate_timeFormat"].'",
					theme_advanced_styles : "'.$thisConfig["classes"].'",
					theme_advanced_fonts : "'.$globalConf["MCEoption_theme_advanced_fonts"].'"';
			if($tinyReplace) {
				$item.=',
					template_replace_values : {'.$tinyReplace.'
					}';
}

			if($tinyTemplate) {
				$item.=',
					template_templates : [
'.$tinyTemplate.'

					]';
}
			$item.='
				});


				
				/**
				 * Here are the additional Typo3-Functions
				 * At this time only "type" is used to
				 * manage Link or Image functions 
				 */
				function fileBrowserCallBack(field_name, url, type, win) {
					field=field_name;
					wObject=win;
					var template = new Array();
					var expPage="";
					template["width"] = 600;
					template["height"] = 400;
					template["close_previous"] = "no";
					template["inline"] = "1";
					var editor_id="RTEarea'.$pObj->RTEcounter.'";
					var act="page";
                                        if(type!="image") type="link";
					s = tinyMCE.selectedInstance.selection.getBookmark();
					switch(type){
						case "link":
							var selURL="";
							var current="";
							var node=tinyMCE.activeEditor.selection.getNode();
							do {
								if (node.nodeName.toLowerCase() == "a" && node.getAttribute("href") != "") {
									var act=node.getAttribute("t3page") ? node.getAttribute("t3page") : "page";
									var url=node.getAttribute("t3url") ? node.getAttribute("t3url") : node.getAttribute("href");
									var target=node.getAttribute("t3target") ? node.getAttribute("t3target") : (node.getAttribute("target") ? node.getAttribute("target") : "");
									if(url.indexOf("?id=")<0) {
										var selURL=url;
										current="&P[currentValue]="+selURL+" "+target;
									}
									else {
										var fz=url.indexOf("?")+4;
										selURL=url.substr(fz,url.length);
										current="&P[currentValue]="+selURL+" "+target;
									}
								}

							} while ((node = node.parentNode));

							if(selURL.indexOf("#")>-1) {
								var lT=selURL.split("#")
								var expPage="&expandPage="+lT[0]+"&cE="+lT[1];
								current=current.replace("#","%23");
							}


							template["file"] = "'.$this->Path.'mod1/browse_links.php?news='.$thisConfig["newsSinglePid"].'&act="+act+expPage+"&mode=wizard&P[ext]=../'.t3lib_extMgm::siteRelPath("tinyrte").'&P[init]=tinyrte&P[formName]=' . $pObj->formName . '"+current+"&P[itemName]=data%5B'.$table.'%5D%5B'.$row["uid"].'%5D%5B'.$field.'%5D&P[fieldChangeFunc][TBE_EDITOR_fieldChanged]=TBE_EDITOR_fieldChanged%28%27'.$table.'%27%2C%27'.$row["uid"].'%27%2C%27'.$field.'%27%2C%27data%5B'.$table.'%5D%5B'.$row["uid"].'%5D%5B'.$field.'%5D%27%29%3B";
							tinyMCE.activeEditor.windowManager.open(template);
							return false;
	
						case "image":
							template["file"] = "'.$this->Path.'mod2/rte_select_image.php?act=magic&RTEtsConfigParams='.$table.'%3A136%3A'.$field.'%3A29%3Atext%3A'.$row["pid"].'%3A";
							
							//template["file"] = "browser.php?mode=file&bparams=data['.$table.']['.$row["uid"].'][image]|||gif,jpg,jpeg,tif,bmp,pcx,tga,png,pdf,ai|";
							
							tinyMCE.activeEditor.windowManager.open(template);
							return false;
					}
				}
				/**
				 * If an Link or Image selected, insert in the RTE
				 * This function is called from the Elementbrowser.
				 *
				 * type		: Link or Image
				 * value	: The value to be inserted
				 * act		: Needed for Links, to transform the kind of link (internal, external, file, email)
				 *
				 * The "act"-Value we become from the URL of the Elementbrowser
				 */ 
				function setTheValue(type,value,act) {
					var set=false;
					var prop=new Array();
					prop[0]=new Object();
					tinyMCE.selectedInstance.selection.moveToBookmark(s);
					switch(type){
						case "link":
							//Build the attributes for an Link
							if(act!="url" && act!="mail") host="'.$editorPath.'"; 
							var linkValue=value.split(" ");
							switch(act) {
								case "news":
									var sep=linkValue[0].split("#");
									prop[0]["href"]="'.$editorPath.'?id='.$thisConfig["newsSinglePid"].'&tx_ttnews[tt_news]="+sep[1]+"&tx_ttnews[backPid]='.$row["pid"].'";
								break;
								case "page":
									prop[0]["href"]="'.$editorPath.'?id="+linkValue[0];
								break;
								case "file":
									prop[0]["href"]="'.$editorPath.'"+linkValue[0];
								break;
								case "url":
									if(linkValue[0].lastIndexOf("http")<0) linkValue[0]="http://"+linkValue[0];
									prop[0]["href"]=linkValue[0];
								break;
								case "mail":
									prop[0]["href"]="mailto:"+linkValue[0];
								break;
								
							}
							if(linkValue[1]) {
								// is target a Popup or normal target?
								if(linkValue[1].indexOf("x")>-1) { // Popup
									var winProp=linkValue[1].split("x");
									prop[0]["onClick"]="window.open(\'"+prop[0]["href"]+"\',\'popup\',\'height="+winProp[1]+",width="+winProp[0]+"\');";
									prop[0]["href"]="#";
								}
								else { // normal Target
									prop[0]["target"]=linkValue[1];
								}
							}';
// Store the advanced attributes for TYPO3?
if($globalConf["MCEstore_filelink_attrib"]) {
	$item.='
							prop[0]["t3page"]=act;
							prop[0]["t3url"]=linkValue[0];
							if(linkValue[1]) prop[0]["t3target"]=linkValue[1];';
}
$item.='
							var inst = tinyMCE.activeEditor;
							var elm, elementArray, i;
							elm = inst.selection.getNode();
							elm = inst.dom.getParent(elm, "A");
							tinyMCE.execCommand("mceBeginUndoLevel");
							if (elm == null) {
								tinyMCE.execCommand("CreateLink", false, "#mce_temp_url#", {skip_undo : 1});
								elementArray = tinymce.grep(inst.dom.select("a"), function(n) {return inst.dom.getAttrib(n, \'href\') == \'#mce_temp_url#\';});
								elm = elementArray[0];
							}
							for (var value in prop[0]) {
								tinyMCE.activeEditor.dom.setAttrib(elm, value, prop[0][value]);
							}
							tinyMCE.execCommand("mceEndUndoLevel");
						break;
						case "image":
							var prop=value.split("|");
							if(field) {
								wObject.document.getElementById(field).value=prop[0];
								wObject.document.getElementById("width").value=prop[1];
								wObject.document.getElementById("height").value=prop[2];
								if(wObject.document.getElementById("previewImg")) wObject.document.getElementById("previewImg").src=prop[0];
							}
							else {
								var properties= new Array();
								properties["src"]=prop[0];
								properties["width"]=prop[1];
								properties["height"]=prop[2];
								tinyMCE.execCommand("mceBeginUndoLevel");
								tinyMCE.execCommand(\'mceInsertContent\', false, \'<img src="\'+prop[0]+\'" width="\'+prop[1]+\'" height="\'+prop[2]+\'" />\');
								tinyMCE.execCommand("mceEndUndoLevel");
								TBE_EDITOR_fieldChanged(\''.$table.'\',\''.$row["uid"].'\',\''.$field.'\',\'data['.$table.']['.$row["uid"].']['.$field.']\');
							}
						break;
					}
				}
			//]]>
			</script>';
		}
		}

		$field=$this->triggerField($PA['itemFormElName']).'
			<textarea id="RTEarea'.$pObj->RTEcounter.'" class="RTEarea'.$pObj->RTEcounter.'" name="'.htmlspecialchars($PA['itemFormElName']).'" rows="15" cols="80">'.t3lib_div::formatForTextarea($value).'</textarea>';

		return $item.$field;
	}
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tinyrte/class.tx_tinyrte_base.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tinyrte/class.tx_tinyrte_base.php']);
}
?>
