
<h3>Sample Template</h3>
<hr>
This is a sample of using Templates in tinyRTE. This can also be an php-script and you can define any replacements in TS-Config<br>
<strong>Usage</strong><br>
Put this little Typoscript in as value of TS-Config on a Page:<br>
<textarea style="width: 100%; height=150px">
RTE.default.templates.path=typo3conf/ext/tinyrte/
RTE.default.templates.items {
	Template {
		src=template_sample.php
		description=a simple Template
	}
	Snippet {
		src=snippet_sample.php
		description=a simple snippet
	}
}
RTE.default.templates.replace {
	username=realName
	email=email
}
</textarea><br>
The path in <i>RTE.default.templates.path</i> should be the path to the Extension. "typo3conf/ext/tinyrte/" if the Extension is as local installed, "typo3/ext/tinyrte/" if the Extension is as global installed.
In this case we defined two items, one Template called "Template" and one Snippet called "Snippet". We need a source for both (src=) and maybe a description. The source can be HTML or PHP or whatever.<br />
We also define a path to our sources, in this case to the tinyRTE-Extension-Samples:<br />
<br />
<em>RTE.default.templates.path=typo3conf/ext/tinyrte/<br />
</em><br />
We define some relacements, that can be placeholders for values of the actual user. In the source you notice {&#36;username} as placeholder to replace. In TS-Config you can define which value should override this placeholder:<br />
<br />
<em>username=realName<br />
</em><br />
realName is a field from the database and holds the real Name of the actual User, not the Username.<br />
<br />
You see here in this Template a headline, this little text of usage and the textbox with Typoscript. Further you see a blue Box with a little Text. Only this will be inserted in the RTE, because it´s in a div-Container with a defined Classname "mceTmpl".

<hr>
<div class="mceTmpl" style="color: #ffffff; background-color: #0b84f3; border: #0707ce thin dashed">
<br>
Only this Text in the blue Box would be inserted in the RTE.<br><br>
<strong>Your name:</strong> {$username}<br>
<strong>Your eMail:</strong> {$email}<br>
<strong>Today is:</strong>
<?php
echo date("Y-n-j");
?><br><br>
</div>