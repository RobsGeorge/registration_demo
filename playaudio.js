function playAudio(url){
    new Audio(url).play();
}

function play(id) {
    var audio;
    audio = document.getElementById(id);

    if(audio.paused)
    {
        audio.play();
    }
    else{
        audio.pause();
    }
}

function onPlayer(playButtonId,pauseButtonId) {

    const playBtn = document.getElementById(playButtonId);
    playBtn.disabled = true;
    const pauseBtn = document.getElementById(pauseButtonId);
    pauseBtn.disabled = false;
}

function onPauser(playButtonId,pauseButtonId) {

    const playBtn = document.getElementById(playButtonId);
    playBtn.disabled = false;
    const pauseBtn = document.getElementById(pauseButtonId);
    pauseBtn.disabled = true;
}


