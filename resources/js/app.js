import './bootstrap';
import '../css/app.css';
import './play'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//musik-objekt
var currentMusic;
var secondaryMusic = new Music("");
//ist gemuted?
var muted = false;
//array mit den verschiedenen Stages (der Einfachheit halber :D)
var stages = ["100-1000", "100-1000", "100-1000", "100-1000", 1000, 2000, 4000, 8000, 16000, 32000, 64000, 125000, 500000, 1000000];
//aktuelle Stage
var currentStage = 0;

/**
 *
 * @param src Dateiname der Musik
 * @param loop soll der sound sich wiederholen
 * @constructor für die Musik
 */
function Music(src, loop = false){
    //neues audio-element (HTML element)
    this.music = document.createElement("audio");
    //audioquelle
    this.music.src = "./music/" + src;
    //der sound wird im Voraus geladen
    this.music.setAttribute("preload", "auto");
    //keine Controls
    this.music.setAttribute("controls", "none");
    //wiederholen nach Ende
    this.music.loop = loop;
    //Keine Leiste sichtbar
    this.music.style.display = "none";
    //audio element and html anhängen
    document.body.appendChild(this.music);
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
        this.music.src = "./music/" + newSrc;
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
    currentMusic = new Music(stages[currentStage] + "Q.mp3", true);
    currentMusic.play();
}

//nächste Stage
window.nextStage = function(){
    if(currentStage < 14)
        currentStage++;
    if(currentStage > 4 )
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
    secondaryMusic.set("AskTheAudience.mp3");
    secondaryMusic.play()
}

window.phoneJoker = function(){
    secondaryMusic.set("Phone-A-Friend.mp3");
    secondaryMusic.play();
}

window.endSecondaryMusic = function(){
    secondaryMusic.stop();
}
