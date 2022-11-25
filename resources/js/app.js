import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var currentMusic;
var muted = false;
var stages = ["100-1000", "100-1000", "100-1000", "100-1000", 1000, 2000, 4000, 8000, 16000, 32000, 64000, 125000, 500000, 1000000];
var currentStage = 0;

function Music(src){
    this.music = document.createElement("audio");
    this.music.src = "./public/music/" + src;
    this.music.setAttribute("preload", "auto");
    this.music.setAttribute("controls", "none");
    this.music.style.display = "none";
    document.body.appendChild(this.music);
    this.play = function(){
        this.music.play();
    }
    this.stop = function(){
        this.music.pause();
    }
    this.set = function(newSrc){
        this.music.src = newSrc;
    }
    this.mute = function(){
        this.music.volume = muted ? 100 : 0;
        muted = !muted;
        alert("MUTED");
    }
}

function startMusic(){
    currentMusic = new Music(stages[currentStage] + "Q.mp3");
    currentMusic.play();
}

function nextStage(){
    currentStage++;
    if(currentStage <= 13)
        currentMusic.set(stages[currentStage] + "Q.mp3");
}

function win(){
    var winMusic = new Music(stages[currentStage] + "W.mp3");
    winMusic.play();
    nextStage();
}

function lose(){
    var loseMusic = new Music(stages[currentStage] + "L.mp3");
    loseMusic.play();
}

startMusic();
