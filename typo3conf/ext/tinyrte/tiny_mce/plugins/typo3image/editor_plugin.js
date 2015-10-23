/**
 * $Id: editor_plugin_src.js 201 2007-02-12 15:56:56Z spocke $
 *
 * @author Moxiecode
 * @copyright Copyright © 2004-2008, Moxiecode Systems AB, All rights reserved.
 */

(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('typo3image');
	tinymce.create('tinymce.plugins.typo3imagePlugin', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mcetypo3image', function() {
				node=tinyMCE.activeEditor.selection.getNode();
				var template = new Array();
				do {
					if (node.nodeName == "IMG") {
						template['file']   = url+'/image.php';
						template['width']  = 480 + parseInt(ed.getLang('advimage.delta_width', 0));
						template['height'] = 385 + parseInt(ed.getLang('advimage.delta_height', 0));
						template["inline"] = "1";
						tinyMCE.activeEditor.windowManager.open(template);
						return true;
					}
				} while ((node = node.parentNode));
				fileBrowserCallBack("", "", "image", "");
				return true;

			});

			// Register example button
			ed.addButton('typo3image', {
				title : 'typo3image.title',
				cmd : 'mcetypo3image',
				image : url + '/images/image.gif'
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('typo3image', n.nodeName == 'IMG');
			});
		},

		/**
		 * Creates control instances based in the incomming name. This method is normally not
		 * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
		 * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
		 * method can be used to create those.
		 *
		 * @param {String} n Name of the control to create.
		 * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
		 * @return {tinymce.ui.Control} New control instance or null if no control was created.
		 */
		createControl : function(n, cm) {
			return null;
		},

		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
				longname : 'Typo3 Imagebrowser',
				author : 'T.Schulze [outraxX]',
				authorurl : 'mailto:kontakt@outraxx.de',
				infourl : 'http://www.outraxx.de',
				version : "0.3"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('typo3image', tinymce.plugins.typo3imagePlugin);
})();