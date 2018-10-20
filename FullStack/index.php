<?php
   session_start();      // Seperate sessions for each user.
   $_SESSION['verifier']=false;
?>

<!DOCTYPE html>
<html>
<head>
	<title>CSV to JSON Converter</title>
	<!-- STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/smallscreen.css" media="screen and (max-width: 900px)">
	<link rel="stylesheet" type="text/css" href="styles/ultrasmall.css" media="screen and (max-width: 600px)">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


	<!-- META AND VIEWPORTS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- I CREATED THIS PROJECT JUST SO I COULD USE IT. I DON'T LIKE USING SOMETHING SOMEONE ELSE BUILT. ESPECIALLY WHEN I CAN BUILD BETTER IN A LOT LESS LINES OF CODE! -->
</head>
<body onload='clear()'>
	<div id="main">
		<div id='first'>
			<h1>CSV To JSON!</h1>
			<br>
			<a href='https://github.com/deve-sh/...' target="_blank"><i class="fab fa-github fa-lg" title="View Source Code On Github"></i></a>
		</div>
		<div id='translators'>
			<div align="center" style="padding: 20px;">
				<form action="" enctype="multipart/form-data" method="post">
					Upload a File :  <input type="file" name="csvfile" required />
					<button type="submit">Upload</button>
					<br/><br/>
					Or
					<br>
				</form>
			</div>
			<?php

			if(basename($_FILES["csvfile"]["name"])!="")
			{
			        $target_dir = "files/";
				
				$randstr=uniqid();
				$randstr=crypt($randstr);
				$randstr=md5($randstr);
				
				$target_file = $target_dir . $randstr;

				if (move_uploaded_file($_FILES["csvfile"]["tmp_name"], $target_file)) {
					$_SESSION['verifier']=true;
					?>
					<script type="text/javascript">

						function unlinker(filename)     // Function as an AJAX Call to delete a file.
						{
							var remover=new XMLHttpRequest();

							remover.open('GET','delete.php?filename='+filename);

							remover.send();
						}

						function csvtojson()
						{
							var filename=("<?php echo $target_file; ?>").toString();

							var xml=new XMLHttpRequest();
							var text="";
							var jsonobject=[];    
							var finalstring=[];  // Array to store arrays of words in each line.
							var j=0;      // Array Counter
							var json="[\n";  // JSON String!

							xml.open('GET',filename);

							xml.onload=function()
							{
								text=xml.responseText;

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

								for(j=1;j<finalstring.length;j++)
								{
									// Loop to form the JSON
									
									json+="    {\n";  // Starting an object.
										
										
									for(var k=0;k<headings.length;k++)
									{
										if(k!=(headings.length-1))
										{
											json+=("        <span style='color: #5fa485;'>\"</span><span style='color: #99c794;'>"+headings[k].toString()+"</span><span style='color: #5fa485;'>\"</span> : "+"<span style='color : #f97450'>\""+finalstring[j][k]+"\"</span>,\n");
										}
										else
										{
										    json+=("        <span style='color: #5fa485;'>\"</span><span style='color: #99c794;'>"+headings[k].toString()+"</span><span style='color: #5fa485;'>\"</span> : "+"<span style='color : #f97450'>\""+finalstring[j][k]+"\"</span>");	
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
							}

							xml.send();

							unlinker(filename); 
						}

						window.addEventListener('load',csvtojson);
					</script>
					<?
				}
				if(!file_exists($target_file))
				{
					?>
					<script type="text/javascript">
						window.addEventListener('load',clear);
					</script>
					<?php
				}
			}
			?>
			<div id='textarea'>
				Write Your CSV Here (Don't use spaces after commas) : 
				<br/>
				<br/>
				<div id='csvtextbox' contenteditable="true"></div>
				<br/>
				<button onclick="csvtojsononline()">CONVERT</button>
		    </div>
		    <div id='convertedtext'>
		    	See your JSON Here : 
		    	<br><br>
			    <div id='convertedjson'>[<br>]</div>
			    <br/>
			    <button onclick="copy()">COPY</button>
		    </div>
			<script type="text/javascript" src='js/webscripts.js'></script>
			<script type="text/javascript" src='js/scripts.js'></script>
	    </div>
	    <div id='third'>
	    	<br>
	    	Built with passion! By a Naive Programmer!
	    	<br><br><br>
	    	<a href='https://github.com/deve-sh' target="_blank"><span class="socialbutton"><i class="fab fa-github-square fa-lg" title="View On Github"></i></span></a>
	    	&nbsp&nbsp
	    	<a href='https://instagram.com/d_e_v.e_s_h' target="_blank"><span class="socialbutton"><i class="fab fa-instagram fa-lg" title="Instagram"></i></span></a>
	    	&nbsp&nbsp
	    	<a href="mailto:devesh2027@gmail.com"><span class="socialbutton"><i class="fas fa-envelope fa-lg"></i></span></a>
	    </div>
	    <div id='fullstack'>
	    	<span>Nothing's Tough!</span>
	    </div>
    </div>
</body>
</html>
