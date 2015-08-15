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
	for (var i = 0; i < MathWorld.mathSymbolsTable.length; i++)
	{
	symbols.innerHTML += MathWorld.mathSymbolsTable[i].htmlCode + " " + MathWorld.mathSymbolsTable[i].htmlName + "<br>";		
	}
	for (var i = 0; i < MathWorld.greekLettersTable.length; i++)
	{
	symbols.innerHTML += MathWorld.greekLettersTable[i].htmlCode + " " + MathWorld.greekLettersTable[i].htmlName + "<br>";		
	}

</script>
</body>
</html>