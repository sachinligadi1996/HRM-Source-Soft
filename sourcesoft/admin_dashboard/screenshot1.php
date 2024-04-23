<!DOCTYPE html> 
<html> 

<head> 
	<title> 
		
	</title> 

	<!-- Include from the CDN -->
	<script src= 
"https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"> 
	</script> 

	<!-- Include locally otherwise -->
	<!-- <script src='html2canvas.js'></script> -->

	<!-- <style> 
		#photo { 
			border: 4px solid green; 
			padding: 4px; 
		} 
	</style>  -->
</head> 

<body> 
	<div id="photo"> 
		

		<!-- Define the button 
		that will be used to 
		take the screenshot -->
		<button onclick="takeshot()"> 
			Take Screenshot 
		</button> 
	</div> 
	<!-- <h1>Screenshot:</h1>  -->
	<div id="output"></div> 

	<script type="text/javascript"> 

		// Define the function 
		// to screenshot the div 
		function takeshot() { 
			let div = 
				document.getElementById('photo'); 

			// Use the html2canvas 
			// function to take a screenshot 
			// and append it 
			// to the output div 
			html2canvas(div).then(
				function (canvas) {
					// Convert canvas to data URL
					let imageData = canvas.toDataURL('image/png');

					// Create a link element
					let downloadLink = document.createElement('a');
					downloadLink.href = imageData;
					downloadLink.download = 'screenshot.png';

					// Append the link to the body
					document.body.appendChild(downloadLink);

					// Trigger a click event on the link
					downloadLink.click();

					// Remove the link from the body
					document.body.removeChild(downloadLink);
				})
		} 
	</script> 
</body> 

</html> 
