import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//musik-objekt
var currentMusic;
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
    var winMusic = new Music(stages[currentStage] + "W.mp3");
    winMusic.play();

}

//lose-sound abspielen
window.lose = function(){
    var loseMusic = new Music(stages[currentStage] + "L.mp3");
    loseMusic.play();
}

//sound muten
window.mute = function(){
    currentMusic.mute();
}
