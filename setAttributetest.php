<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    
    <?php
        $file=base64_encode(file_get_contents("logo image.png"));
        echo "<img src=\"data:image/png;base64,".$file."\">";
    ?>
    <script>
         let k=0;
        function change(){
            if(k%2==0){
                document.getElementById('reviews-display').innerHTML='Hide all customers reviews<i class="fa-sharp fa-solid fa-angle-up" id="down-arrow-reviews"></i>';
                }else{
                    document.getElementById('reviews-display').innerHTML='See all customers reviews<i class="fa-sharp fa-solid fa-angle-down" id="down-arrow-reviews"></i>';
                }
                k++;
        }
    </script>
</body>
</html>