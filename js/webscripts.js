/* Function To Convet CSV to JSON. */

function csvtojson() {
	let text = "";
	let jsonobject = [];
	let finalstring = []; // Array to store arrays of words in each line.
	let j = 0; // Array Counter
	let json = "[\n"; // JSON String!

	text = document.getElementById("csvtextbox").innerText;

	// Splitting text according to lines first.

	text = text.split(/\r?\n/);

	// INSERTING THE TEXT INSIDE ANOTHER letIABLE

	for (let i = 0; i < text.length; i++) {
		if (text[i].includes(",")) {
			// If the text is real text.
			finalstring.push(text[i].split(",").map(token => token.trim()));
		}
	}

	// NOW PARSING THE CSV

	let headings = finalstring[0];

	for (j = 1; j < finalstring.length; j++) {
		// Loop to form the JSON

		json += "\t{\n"; // Starting an object.

		for (let k = 0; k < headings.length; k++) {
			if (k != headings.length - 1) {
				json +=
					"\t\t<span style='color: #6699cc;'>\"</span><span style='color: #6699cc;'>" +
					headings[k].toString() +
					"</span><span style='color: #5fa485;'>\"</span> : " +
					"<span style='color: #f97450'>\"" +
					finalstring[j][k] +
					'"</span>,\n';
			} else {
				json +=
					"\t\t<span style='color: #6699cc;'>\"</span><span style='color: #6699cc;'>" +
					headings[k].toString() +
					"</span><span style='color: #5fa485;'>\"</span> : " +
					"<span style='color : #f97450'>\"" +
					finalstring[j][k] +
					'"</span>';
			}
		}

		// Ending the object!
		json += "\n\t}";

		if (j != finalstring.length - 1)
			json += ",\n";
		else
			json += "\n";
	}

	json += "]"; // Ending the JSON!

	document.getElementById("convertedjson").innerHTML = json;

	if (screen.width < 600) {
		document.documentElement.scrollTop =
			document.getElementById("convertedjson").offsetTop - 25;
		document.body.scrollTop =
			document.getElementById("convertedjson").offsetTop - 25;
	}
}

/* Function to copy text from a div. */

function copy() {
	let target = document.getElementById("convertedjson");
	let range, select;
	if (document.createRange) {
		range = document.createRange();
		range.selectNode(target);
		select = window.getSelection();
		select.removeAllRanges();
		select.addRange(range);
		document.execCommand("copy");
		select.removeAllRanges();
	} else {
		range = document.body.createTextRange();
		range.moveToElementText(target);
		range.select();
		document.execCommand("copy");
	}
}
