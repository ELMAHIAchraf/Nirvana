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
    <title>Document</title>
    <style>
        body {
            background-color: #DDDDDD;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 0;
        }

        #product-img {
            cursor: zoom-in;
        }

        #transparent-bg {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.750);
            position: fixed;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 10;
            cursor: zoom-out;
        }

        #image-div {
            width: 35%;
            height: 90%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 30px;
        }

        #displayed-img {
            width: 90%;
            height: 95%;
        }

        .img-arrows {
            background-color: #CDCDCD;
            padding: 0.3%;
            border-radius: 5%;
        }

        #left-arrow {
            font-size: 6vw;
            color: rgba(92, 78, 255, 0.800);
            position: absolute;
            left: 5%;
            cursor: pointer;
        }

        #right-arrow {
            font-size: 6vw;
            color: rgba(92, 78, 255, 0.800);
            float: right;
            position: absolute;
            right: 5%;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <img id="product-img" src="color1/item img1.jpg" width="15%" height="30%" onclick="imageDisplay()">
    <div id="transparent-bg" onclick="hideNotification()">
        <i class="fa-solid fa-angle-left img-arrows" id="left-arrow" onclick="slideLeft()"></i>
        <div id="image-div">
            <img id="displayed-img" src="color1/item img1.jpg" onclick="Zoom()">
        </div>
        <i class="fa-solid fa-angle-right img-arrows" id="right-arrow" onclick="slideRight()"></i>
    </div>
    <script>
        function hideNotification() {
            if (event.target.id == 'transparent-bg' || event.target.id == 'image-div' || event.target.id == 'displayed-img') {
                document.getElementById('transparent-bg').style.display = "none";
            }
        }

        function imageDisplay() {
            document.getElementById('transparent-bg').style.display = "flex";
        }
        let images = ["color1/item img1.jpg", "color1/item img2.jpg", "color1/item img3.jpg", "color1/item img4.jpg"];
        let m = 0;

        function slideRight() {
            m++;
            if (m > (images.length) - 1) {
                m = 0;
            }
            document.getElementById("displayed-img").src = images[m];
        }

        function slideLeft() {
            m--;
            if (m < 0) {
                m = (images.length) - 1;
            }
            document.getElementById("displayed-img").src = images[m];
        }
    </script>
</body>

</html>