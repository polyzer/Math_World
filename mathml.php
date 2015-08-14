<!DOCTYPE html>
<html>
<head>
<title>MathML Testing & Learning</title>
<meta charset="UTF-8" />
<script src='../libs/MathWorld_extra_functions.js'></script>
</head>
<body>
<div id="symbols">
	
</div>



<math>
	<mrow>
		<msqrt>
			<mrow>
				<mi>x</mi>
				<mo>+</mo>
				<mn>12</mn>	
			</mrow>
		</msqrt>
		<mo>=</mo>
		<mi>y</mi>
	</mrow>
</math>

<script>
	var symbols = document.getElementById("symbols");
	symbols.innerHTML += "=" + "&#8800;";
</script>
</body>
</html>