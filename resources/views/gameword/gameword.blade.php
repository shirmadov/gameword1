<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<style type="text/css">
    .no-border__input {
        outline: 0;
        background: transparent;
        border: 0;
        outline-offset: 0;
        font-size: 30px;
        text-align: center;
        /*margin-left: 100px;*/
    }
</style>
<body>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg text-white">
    <div class="container py-2">
        <a href="#" class="navbar-brand">Word Game</a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-spotify" aria-controls="navbar-spotify">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-spotify">
            <!--Atomatik acilma-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item px-3">
                    <a href="#" class="nav-link text-white">About</a>
                </li>
                <li class="nav-item px-3">
                    <a href="#" class="nav-link text-white">Sign In</a>
                </li>
                <li class="nav-item px-3">
                    <a href="#" class="nav-link text-white">Sign Up</a>
                </li>

                <li class="nav-item px-3">
                    <a href="#" class="nav-link text-white">Contact</a>
                </li>

                <li class="nav-item pl-3">
                    <a href="#" class="nav-link text-white"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="mt-5" style="margin-left: 50px;flex-wrap: wrap;display: flex;justify-content: center;">
    <div class="card text-center">
        <div class="card-header">
            Computer
        </div>
        <div class="card-body">
            <h5 class="card-title">Are you ready</h5>
            <p class="card-text">If you want to win me, you need to eat more breads</p>
        </div>
        {{--        <div class="card-footer text-muted">--}}
        {{--            2 days ago--}}
        {{--        </div>--}}
    </div>
</div>

<div class="row" style="margin-left: 310px;">
    <div class="mt-5 mr-5" >
        <div class="card text-center">
            <div class="card-header">
                Start Game
            </div>
            <div class="card-body" style="width: 150px; height: 80px;">
                <input name="InputValue" id="startgame" type="button" onclick="StartGame()" id="startButton" class="btn btn-success col-md-6" value="Start"/>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="card text-center">
            <div class="card-header">
                Answer
            </div>
            <div class="card-body" style="width: 400px;height: 100px;" name="WordCard">
                {{--                <h3 name="wordcard" id="middleword" value="Sa"></h3>--}}
                <input class="no-border__input" style="" name="MiddleWord" type="text" readonly onclick="Change()" id="middleword" value=""/>
            </div>
            {{--        <div class="card-footer text-muted">--}}
            {{--            2 days ago--}}
            {{--        </div>--}}
        </div>
    </div>
</div>

<div class="mt-5" style="margin-left: 50px;flex-wrap: wrap;display: flex;justify-content: center;">
    <div class="card text-center">
        <div class="card-header">
            Unknown
        </div>
        <div class="progress">
            {{--            Unknown--}}
            <div class="progress-bar text-center" role="progressbar" name="time" id="second" style="width: 100%;" value="1000" aria-valuenow="1000" aria-valuemin="0" aria-valuemax="1000">10s</div>
        </div>


        <div class="card-body">
            <div class="col mb-4" style="width: 360px;" >

                {{--                <p class="card-text text-danger" name="ErrorMessage" style="font-size: 20px;"></p>--}}
                {{--                <div class="" style="height: 50px;" name="ErrorMessage">--}}
                {{--                </div>--}}
                <h5 class="card-title" style="height: 60px;" id="errormessage" name="ErrorMessage">Are you ready</h5>
                <input type="text" class="form-control" disabled id="writeword" for="send_and_start" placeholder="Your Word">
            </div>
            {{--            <button href="#" onclick="Change()" id="send_and_start" class="btn btn-success col-md-6">Start</button>--}}
            <input name="InputValue" type="button" onclick="SendWord()" id="send_and_start" class="btn btn-primary col-md-6" value="Send"/>
        </div>

    </div>
</div>

{{--<div class="col-md-4">--}}
{{--    <input name="InputValue" type="button" onclick="Change()" id="send_and_start" class="btn btn-success col-md-6" value="Start"/>--}}

{{--</div>--}}
<div class="col-md-4">
    <table class="table table-bordered" name="Word">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Words List</th>

        </tr>
        </thead>
        <tbody name="Word">


        </tbody>
    </table>

</div>
<?php

?>


</body>

<script>

    let WordGame = '{{route('getword')}}'
    let InputValue = document.getElementById('send_and_start').value;
    let StartInputValue = document.getElementById('startgame').value;
    let input = document.getElementById('writeword');
    var WordCard = document.getElementById('middleword');
    let ErrorMessage = document.getElementById('errormessage');

    let randomTime = Math.floor(Math.random() * 10+5);


    function getRandomNumber(min,max){
        return Math.floor(Math.random()*(max-min))+min;
    }

    //Press Enter
    input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("send_and_start").click();
        }
    });
    let allWords;
    let getWordIndexToStart;





    function StartGame(){
        if(StartInputValue=="Start"){
            fetch(WordGame)
                .then((response) => {

                    return response.json();
                })
                .then(data => allWords = data)
                .then((data) => {
                    console.log(data);
                    getWordIndexToStart = Math.floor(Math.random() * data.length);
                    WordCard.value = data[getWordIndexToStart]['word'];
                });
            TimeSecond(false);
            document.getElementById('writeword').disabled=false;
        }
        ErrorMessage.style.color="black";
        ErrorMessage.innerHTML="Are you ready";
    }

    function SendWord(){
        if(InputValue=="Send"){
            let check;
            let yourword = document.getElementById('writeword');
            if(typeof allWords !== 'undefined' && allWords.length > 0){
                check="incorrect";
                let middleword = WordCard.value;
                console.log(middleword,"this");
                if(middleword.toLowerCase().substr(-1) === yourword.value.toLowerCase().substr(0,1)){
                    allWords.forEach((element) => {
                        if(element['word']===yourword.value.toLowerCase()){
                            check = "correct";
                        }
                    })
                }
                console.log(check);
            }

            if(check==="correct"){
                ErrorMessage.innerHTML="Correct";
                document.getElementById('errormessage').style.color = "#41D881 ";
                WordCard.value = yourword.value;
                document.getElementById('writeword').disabled=true;
                TimeSecond(true);
                compWord();
                yourword.value = "";
            }else if(check==="incorrect"){
                ErrorMessage.style.color = "red";
                ErrorMessage.innerHTML="Error";
                yourword.value = "";
            }

        }
    }

    function compWord(){

        let randomTime = getRandomNumber(3,10);
        console.log(randomTime);


        setTimeout(WordByTime, randomTime*1000);
        function WordByTime(){
            if(typeof allWords !== 'undefined' && allWords.length > 0){
                let middleword = WordCard.value;
                console.log(middleword);
                var getWordIndexToComp = [];
                allWords.forEach((element) => {
                    if(element['word'].substr(0,1)===middleword.toLowerCase().substr(-1)){
                        getWordIndexToComp.push(element['word']);
                    }
                })
                console.log(getWordIndexToComp);
                let getWordRandom;
                if(typeof getWordIndexToComp !== 'undefined' && getWordIndexToComp.length > 0){
                    getWordRandom = getWordIndexToComp[Math.floor(Math.random() * getWordIndexToComp.length)];
                    WordCard.value = getWordRandom;
                    TimeSecond(false);
                    document.getElementById('writeword').disabled=false;
                    // SendWord();
                    // WordCard.append('<h3 name="wordcard" id="middleword" value="'+getWordRandom+'">'+getWordRandom+'<h3>');
                }
                // console.log(getWordRandom);

            }
        }

    }

    function TimeSecond(condition){
        var count=100;
        let getTag = document.getElementById("second");
        function countNum(){
            if(count>=0){
                getTag.innerHTML = count/10+" s";
                getTag.style.width = count+"%";

            }else if(count===-10){
                clearTimeout(timerId)
                ErrorMessage.style.color = "red";
                ErrorMessage.innerHTML="Game Over";
                document.getElementById('writeword').disabled=true;
                // compWord();

            }
            count-=10;
            console.log(count);

        }
        if(condition){
            clearInterval(timerId);
            getTag.style.width=100+'%';
            getTag.innerHTML = 10+" s";
        }else{
            timerId= setInterval(countNum,1000);
        }

    }





    // function Change(){
    //
    //
    //
    //     document.getElementById("errormessage").innerHTML="";
    //
    //     if(InputValue=="Start"){
    //         fetch(WordGame)
    //             .then((response) => {
    //
    //                 return response.json();
    //             })
    //             .then(data => allWords = data)
    //             .then((data) => {
    //                 // console.log(data);
    //                 // allWords = data;
    //                 console.log(data);
    //                 getWordIndexToStart = Math.floor(Math.random() * data.length);
    //                 WordCard.value = data[getWordIndexToStart]['word'];
    //                 // WordCard.append('<h3 name="wordcard" id="middleword" value="'+data[getWordIndexToStart]['word']+'">'+data[getWordIndexToStart]['word']+'<h3>');
    //             });
    //         TimeSecond(false);
    //
    //
    //     }
    //
    //
    //     var textButton = document.getElementById('send_and_start');
    //     textButton.style.background="#0099ff";
    //     textButton.value="Send";
    //     InputValue = document.getElementById('send_and_start').value;
    //     // let InputValue2 = document.getElementById('send_and_start').value;
    //     document.getElementById('writeword').disabled=false;
    //
    //
    //     // console.log(count);
    //     if(InputValue=="Send"){
    //         let check;
    //         let yourword = document.getElementById('writeword');
    //         // console.log(yourword.value.toLowerCase());
    //         // console.log(allWords[0]);
    //         if(typeof allWords !== 'undefined' && allWords.length > 0){
    //             check="incorrect";
    //             if(allWords[getWordIndexToStart]['word'].substr(-1) === yourword.value.toLowerCase().substr(0,1)){
    //                 allWords.forEach((element) => {
    //                     if(element['word']===yourword.value.toLowerCase()){
    //                         check = "correct";
    //                     }
    //                 })
    //             }
    //             console.log(check);
    //         }
    //
    //         if(check==="correct"){
    //             // var myobj = document.getElementById("middleword");
    //             // myobj.remove();
    //             // document.getElementById("middleword").innerHTML = "";
    //             ErrorMessage.append("Correct");
    //             document.getElementById('errormessage').style.color = "#41D881 ";
    //             // WordCard.append('<h3 name="wordcard" id="middleword" value="'+yourword.value+'">'+yourword.value+'<h3>');
    //             WordCard.value = yourword.value;
    //             document.getElementById('writeword').disabled=true;
    //             TimeSecond(true);
    //             compWord();
    //             yourword.value = "";
    //         }else if(check==="incorrect"){
    //
    //             ErrorMessage.append("Error");
    //             document.getElementById('errormessage').style.color = "red";
    //             yourword.value = "";
    //         }
    //
    //     }
    //
    //
    // }
    //

    // function TimeSecond(condition){
    //     var count=100;
    //     let getTag = document.getElementById("second");
    //     function countNum(){
    //
    //         if(count>=0){
    //
    //             getTag.innerHTML = count/10+" s";
    //             getTag.style.width = count+"%";
    //
    //         }else if(count===-10){
    //             clearTimeout(timerId)
    //             document.getElementById("errormessage").innerHTML="";
    //             ErrorMessage.append("Game Over");
    //             document.getElementById('writeword').disabled=true;
    //             // compWord();
    //
    //         }
    //         count-=10;
    //         console.log(count);
    //
    //     }
    //     if(condition){
    //         clearInterval(timerId);
    //         getTag.style.width=100+'%';
    //         getTag.innerHTML = 10+" s";
    //     }else{
    //         timerId= setInterval(countNum,1000);
    //     }
    //
    //
    //
    //
    // }



    // function compWord(){
    //
    //     let randomTime = getRandomNumber(3,10);
    //     console.log(randomTime);
    //
    //
    //     setTimeout(WordByTime, randomTime*1000);
    //     function WordByTime(){
    //         if(typeof allWords !== 'undefined' && allWords.length > 0){
    //             let middleword = WordCard.value;
    //             console.log(middleword);
    //             var getWordIndexToComp = [];
    //             allWords.forEach((element) => {
    //                 if(element['word'].substr(0,1)===middleword.toLowerCase().substr(-1)){
    //                     getWordIndexToComp.push(element['word']);
    //                 }
    //             })
    //             console.log(getWordIndexToComp);
    //             let getWordRandom;
    //             if(typeof getWordIndexToComp !== 'undefined' && getWordIndexToComp.length > 0){
    //                 getWordRandom = getWordIndexToComp[Math.floor(Math.random() * getWordIndexToComp.length)];
    //                 WordCard.value = getWordRandom;
    //                 Change();
    //                 // WordCard.append('<h3 name="wordcard" id="middleword" value="'+getWordRandom+'">'+getWordRandom+'<h3>');
    //             }
    //             // console.log(getWordRandom);
    //
    //         }
    //     }
    //
    // }











</script>
</html>
