import './bootstrap';
import '../css/app.css';
import './play';
import './confetti';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//musik-objekt
let currentMusic;
let secondaryMusic;
//array mit den verschiedenen Stages (der Einfachheit halber :D)
const stages = ["100-1000", "100-1000", "100-1000", "100-1000", 1000, 2000, 4000, 8000, 16000, 32000, 64000, 125000, 250000, 500000, 1000000];
//aktuelle Stage
let currentStage = 0;
let muteG = false;

/**
 *
 * @param src Dateiname der Musik
 * @param id Audio ID
 * @param loop soll der sound sich wiederholen
 * @constructor für die Musik
 */
function Music(src, id ,loop = false){
    //ist gemuted?
    let muted = false;
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
    this.mute = function(mute){
        muted = mute;
        this.music.volume = muted ? 1 : 0;
        // this.music.volume = muted ? 1 : 0;
        // muted = !muted;
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
    let muteIcon = document.getElementById("toggle_sound");
    if(muteIcon.src.includes("volume.png")) {
        // console.log("Mute icon to mute, icon was " + muteIcon.src)
        muteIcon.src = '/assets/img/mute.png';
        currentMusic.mute(false);
        secondaryMusic.mute(false);
        muteG = true;
        sessionStorage.setItem("muted", "true")
    }
    else {
        // console.log("Mute icon to volume, icon was " + muteIcon.src)
        muteIcon.src = '/assets/img/volume.png'
        currentMusic.mute(true);
        secondaryMusic.mute(true);
        muteG = false;
        sessionStorage.setItem("muted", "false");
    }
}

window.openingMusic = function(){
    secondaryMusic.set("MainTheme.mp3", true);
    secondaryMusic.play()
}

window.closingMusic = function(){
    secondaryMusic.set("ClosingTheme.mp3", true);
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

window.confirmLogout = function() {
    document.getElementById('bg').style.display = 'block';
    document.getElementsByTagName('main')[0].style.filter = 'blur(5px)'
}

window.cancelLogout = function() {
    document.getElementById('bg').style.display = 'none';
    document.getElementsByTagName('main')[0].style.filter = 'none';
}

window.muteCheck = function(){
    if(sessionStorage.getItem("muted") === "true"){
        muteG = true;
        mute();
    }
}

window.toRouteWhileGame = function(route){
    window.location.href = route + '/' + muteG;
}
