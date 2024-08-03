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
        #transparent-bgd {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.750);
            position: fixed;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 100;
            top: 0;
            /* margin-top: -12.3vh; */
        }

        #notification-div {
            width: 30%;
            height: auto;
            background-color: white;
            border-radius: 30px;
            padding: 1%;
            padding-bottom: 2%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column
        }

        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');

        #message {
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 500;
            font-size: 1.3vw;
            text-align: center;
            color: #4d4d4d;
        }

        #ok {
            width: 30%;
            height: 5.5vh;
            margin-top: 0.5%;
            border-radius: 25px;
            background-color: #6e61ff;
            color: white;
            border-style: none;
            font-size: 1.3vw;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0px 2px 2px #7e7e7e;
            transform: scale(1);
            transition: transform 0.5s;
        }

        #ok:hover {
            transform: scale(1.03);
            transition: transform 0.5s;
        }
    </style>
</head>

<body>
    <div id="transparent-bgd" onclick="hideNotification()">
        <div id="notification-div">
            <p id="message">
            </p>
            <button id="ok" onclick="hideNotification()">OK</button>
        </div>
    </div>
    <style>
    </style>
    <script>
        function hideNotification() {
            if (event.target.id == 'transparent-bgd' || event.target.id == 'ok') {
                document.getElementById('transparent-bgd').style.display = "none";
            }
        }

        function notify(messageContent) {
            document.getElementById('message').innerHTML = messageContent;
            document.getElementById('transparent-bgd').style.display = "flex";

        }
    </script>
</body>

</html>