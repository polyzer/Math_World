<!DOCTYPE html>
<html>
<head>
<title>MathML Testing & Learning</title>
<meta charset="UTF-8" />
</head>

<body>
<div id="symbols">	
</div>
<script src='./resources/js/MathWorld_extra_functions.js'></script>
<script>

	var symbols = document.getElementById("symbols");
	for (var i = 0; i < mathSymbolsTable.length; i++)
	{
	symbols.innerHTML += mathSymbolsTable[i].htmlCode + " " + mathSymbolsTable[i].htmlName + "<br>";		
	}
</script>
</body>
</html>