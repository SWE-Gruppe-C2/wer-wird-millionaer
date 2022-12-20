import './bootstrap';
import '../css/app.css';
import './play'

import '../css/app.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//musik-objekt
var currentMusic;
var secondaryMusic;
//array mit den verschiedenen Stages (der Einfachheit halber :D)
var stages = ["100-1000", "100-1000", "100-1000", "100-1000", 1000, 2000, 4000, 8000, 16000, 32000, 64000, 125000, 250000, 500000, 1000000];
//aktuelle Stage
var currentStage = 0;

/**
 *
 * @param src Dateiname der Musik
 * @param id Audio ID
 * @param loop soll der sound sich wiederholen
 * @constructor für die Musik
 */
function Music(src, id ,loop = false){
    //ist gemuted?
    var muted = false;
    //neues audio-element (HTML element)
    this.music = document.createElement("audio");
    this.music.setAttribute("id", id);
    //audioquelle
    this.music.src = "/music/" + src;
    //der sound wird im Voraus geladen
    this.music.setAttribute("preload", "metadata");
    //keine Controls
    this.music.setAttribute("controls", "none");
    //wiederholen nach Ende
    this.music.loop = loop;
    //Keine Leiste sichtbar
    this.music.style.display = "none";
    //audio element and html anhängen
    document.body.appendChild(this.music);
    // this.music.volume = 0;
    //musik starten
    this.play = function(){
        this.music.play();
    }
    //musik stoppen
    this.stop = function(){
        this.music.pause();
    }
    //neue Audioquelle
    this.set = function(newSrc, loop = false){
        this.music.src = "/music/" + newSrc;
        this.music.loop = loop;
    }
    //musik stummschalten
    this.mute = function(){
        this.music.volume = muted ? 1 : 0;
        muted = !muted;
    }
}

//musik starten
window.startMusic = function(){
    currentMusic.set(stages[currentStage] + "Q.mp3", true);
    currentMusic.play();
}

window.initMusic = function(stage){
    currentStage = stage;
    currentMusic = new Music("", "currentMusic")
    secondaryMusic = new Music("", "secondaryMusic");
}

//nächste Stage
window.nextStage = function(){
    if(currentStage < 14)
        currentStage++;
    if(currentStage > 4)
        currentMusic.set(stages[currentStage] + "Q.mp3");
        currentMusic.play();
    console.log(currentStage);
}

//win-sound abspielen
window.win = function(){
    secondaryMusic.set(stages[currentStage] + "W.mp3");
    secondaryMusic.play();
}

//lose-sound abspielen
window.lose = function(){
    secondaryMusic.set(stages[currentStage] + "L.mp3");
    secondaryMusic.play();
}

//sound muten
window.mute = function(){
    currentMusic.mute();
    secondaryMusic.mute();
    let muteIcon = document.getElementById("toggle_sound");
    if(muteIcon.src === "/assets/img/volume.png") {
        console.log("Mute icon to mute, icon was " + muteIcon.src)
        muteIcon.src = '/assets/img/mute.png'
    }
    else {
        console.log("Mute icon to volume, icon was " + muteIcon.src)
        muteIcon.src = '/assets/img/volume.png'
    }
}

window.openingMusic = function(){
    secondaryMusic.set("MainTheme.mp3");
    secondaryMusic.play()
}

window.closingMusic = function(){
    secondaryMusic.set("ClosingTheme.mp3");
    secondaryMusic.play();
}

window.joker5050 = function(){
    secondaryMusic.set("50-50.mp3");
    secondaryMusic.play();
}

window.audienceJoker = function(){
    // secondaryMusic.set("AskTheAudience.mp3");
    secondaryMusic.set("50-50.mp3");
    secondaryMusic.play()
}

window.phoneJoker = function(){
    // secondaryMusic.set("Phone-A-Friend.mp3");
    secondaryMusic.set("50-50.mp3");
    secondaryMusic.play();
}

window.endSecondaryMusic = function(){
    secondaryMusic.stop();
}
