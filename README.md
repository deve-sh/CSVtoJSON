  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/smallscreen.css" media="screen and (max-width: 900px)">
	<link rel="stylesheet" type="text/css" href="styles/ultrasmall.css" media="screen and (max-width: 600px)">
 
# <div align='center'>CSVtoJSON</div>
A Web Converter to Convert CSVs to JSON.

### Features

<ul>
  <li>Fast</li>
  <li>Efficient (Performs the job in the least number of lines of code.)</li>
  <li>Responsive</li>
</ul>

### Try it Out

<div style='width: 100%;'>
  <div id='textarea'>
    Write Your CSV Here (Don't use spaces after commas) : 
    <br/>
    <br/>
    <div id='csvtextbox' contenteditable="true"></div>
    <br/>
    <button onclick="csvtojson()">CONVERT</button>
    </div>
    <div id='convertedtext'>
      See your JSON Here : 
      <br><br>
      <div id='convertedjson'>[<br>]</div>
      <br/>
      <button onclick="copy()">COPY</button>
</div>
<script type='text/javascript' src='https://raw.githubusercontent.com/deve-sh/CSVtoJSON/master/js/webscripts.js'></script>

### Extra Featurette

A Full Stack Version is availaible in the FullStack Folder. It contains code written in PHP for conversion to JSON from uploaded CSV files.

### License

Do anything you want with it. Its absolutely free to use.

### Bugs or problems

Report any bugs or problems you may face to devesh2027@gmail.com
