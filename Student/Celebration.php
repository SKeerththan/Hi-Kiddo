<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/celebration.css">
    <style>
        #container {
            display: block;
        }

        @media only screen and (orientation:portrait) {
            #container {
                height: 100vw;
                -webkit-transform: rotate(90deg);
                -moz-transform: rotate(90deg);
                -o-transform: rotate(90deg);
                -ms-transform: rotate(90deg);
                transform: rotate(90deg);
            }
        }

        @media only screen and (orientation:landscape) {
            #container {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }
        }
    </style>

</head>

<body>
    <button class="js-confetti">PRESS ME</button>
    <audio src="https://assets.codepen.io/1256430/whistle.mp3" id="sound" preload="auto" hidden></audio>




    <script src="Script/celebration.js"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

</html>