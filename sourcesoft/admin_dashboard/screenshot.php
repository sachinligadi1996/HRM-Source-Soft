<!-- index.html -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Screenshot</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="path/to/html2canvas.js"></script>
</head>

<body>
    <div class="container mt-5">
        <form id="screenshotForm">
            <div class="form-group">
                <label for="url">Enter URL:</label>
                <input type="text" class="form-control" id="url" name="url" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="takeScreenshot()">Take Screenshot</button>
        </form>
        <div id="screenshotResult" class="mt-3"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function takeScreenshot() {
        var url = document.getElementById("url").value;

        html2canvas(document.body).then(function(canvas) {
            // Convert canvas to data URL
            var imageData = canvas.toDataURL("image/png");

            // Send data to the server using AJAX
            $.ajax({
                type: "POST",
                url: "screenshot.php",
                data: {
                    url: url,
                    imageData: imageData
                },
                success: function(result) {
                    $("#screenshotResult").html('<img src="' + result + '" alt="Screenshot">');
                }
            });
        });
    }
    </script>

</body>

</html>
<?php
// screenshot.php
error_log(print_r($_POST, true)); // Log the $_POST array

$url = $_POST['url'] ?? '';
$imageData = $_POST['imageData'] ?? '';

// $url = $_POST['url'];
// $imageData = $_POST['imageData'];

// Decode the base64 image data
$decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));

// Generate a unique filename
$filename = uniqid('screenshot_') . '.jpg';

// Save the image on the server
file_put_contents($filename, $decodedImage);


// Return the image path
echo $filename;
?>