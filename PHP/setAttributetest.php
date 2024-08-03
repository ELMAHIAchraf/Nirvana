<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1\.0">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Default" href="/css/app-af6a05f42b013986b481566363f0186f.css?vsn=d">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-cc491567b46eab1188c6538ebc462e7d.css?vsn=d">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">
    <link rel="shortcut icon" href="../Static/logo image.png" type="image/x-icon">
    <title>Document</title>
</head>

<body>

    <?php
    $file = base64_encode(file_get_contents("../Static/logo image.png"));
    echo "<img src=\"data:image/png;base64," . $file . "\">";
    ?>
    <script>
        let k = 0;

        function change() {
            if (k % 2 == 0) {
                document.getElementById('reviews-display').innerHTML = 'Hide all customers reviews<i class="fa-sharp fa-solid fa-angle-up" id="down-arrow-reviews"></i>';
            } else {
                document.getElementById('reviews-display').innerHTML = 'See all customers reviews<i class="fa-sharp fa-solid fa-angle-down" id="down-arrow-reviews"></i>';
            }
            k++;
        }
    </script>
</body>

</html>