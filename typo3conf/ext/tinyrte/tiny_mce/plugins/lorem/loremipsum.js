function loremipsum() {
	// Lorem Ipsum Generator
	// Version 2.0
	// Copyright 2003 - 2005 Marcus Campbell
	// Open-source code under the GNU GPL:
	// http://www.gnu.org/licenses/gpl.txt

	this.source = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

	this.getLetters = function getLetters(value) {
		var output = new String();
		if (isNaN(value))
			value = this.source.length;
		var tempSource = this.growSource(value / this.source.length + 1);
		for (var i = 0; i < value; i++)
			output += tempSource.charAt(i);
		return output;
	}

	this.getWords = function getWords(value) {
		var output = new String();
		var pattern = /[\w\!\.\?\;\,\:]+/g;
		var matches = this.source.match(pattern);
		if (isNaN(value))
			value = matches.length;
		var tempSource = this.growSource(value / matches.length);
		var tempMatches = tempSource.match(pattern);
		for (var i = 0; i < value; i++) {
			if (i > 0)
				output += " ";
			output += tempMatches[i];
		}
		return output;
	}

	this.growSource = function growSource(value) {
		var output = new String();
		for (var i = 0; i < value; i++) {
			if (i > 0)
				output += " ";
			output += this.source;
		}
		return output;
	}
}