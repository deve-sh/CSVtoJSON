/* Function To Convet CSV to JSON. */

function csvtojsononline()
{
	var text="";
	var jsonobject=[];    
	var finalstring=[];  // Array to store arrays of words in each line.
	var j=0;      // Array Counter
	var json="[\n";  // JSON String!

		text=document.getElementById('csvtextbox').innerText;

		// Splitting text according to lines first.

		text=text.split(/\r?\n/);

		// INSERTING THE TEXT INSIDE ANOTHER VARIABLE

		for(var i=0;i<text.length;i++)
		{
			if(text[i].includes(',')){ // If the text is real text.
				finalstring.splice(j,0,text[i].split(','));
				j++;
			}
		}

		// NOW PARSING THE CSV

		var headings=finalstring[0];

		for(j=0;j<finalstring.length;j++)
		{
		
		}

		for(j=1;j<finalstring.length;j++)
		{
			// Loop to form the JSON
			
			json+="    {\n";  // Starting an object.
				
				
			for(var k=0;k<headings.length;k++)
			{
				if(k!=(headings.length-1))
				{
					json+=("        <span style='color: #6699cc;'>\"</span><span style='color: #6699cc;'>"+headings[k].toString()+"</span><span style='color: #5fa485;'>\"</span> : "+"<span style='color : #f97450'>\""+finalstring[j][k]+"\"</span>,\n");
				}
				else
				{
				    json+=("        <span style='color: #6699cc;'>\"</span><span style='color: #6699cc;'>"+headings[k].toString()+"</span><span style='color: #5fa485;'>\"</span> : "+"<span style='color : #f97450'>\""+finalstring[j][k]+"\"</span>");	
				}
			}

			// Ending the object!

			if(j!=(finalstring.length-1))
			{
				json+="\n    },\n";
			}
			else
			{
				json+="\n    }\n";
			}
		}

		json+="]";  // Ending the JSON!

		document.getElementById('convertedjson').innerHTML=json;

		if(screen.width<600)
		{
			document.documentElement.scrollTop=document.getElementById('convertedjson').offsetTop-25;
			document.body.scrollTop=document.getElementById('convertedjson').offsetTop-25;
		}

}

/* Function to copy text from a div. */

 function copy() {
      var target = document.getElementById('convertedjson');
      var range, select;
      if (document.createRange) {
        range = document.createRange();
        range.selectNode(target)
        select = window.getSelection();
        select.removeAllRanges();
        select.addRange(range);
        document.execCommand('copy');
        select.removeAllRanges();
      } else {
        range = document.body.createTextRange();
        range.moveToElementText(target);
        range.select();
        document.execCommand('copy');
      }
    }