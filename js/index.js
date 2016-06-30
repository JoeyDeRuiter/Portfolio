"use strict";
window.onload = function() {
    /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
    particlesJS.load('particles-js', 'js/particles.json', function() {
        console.log('callback - particles.js config loaded');
    });

    setTimeout(function(){
        autoType("banner-txt", "Developer", Math.round(Math.random()));
    }, 500)

};

function autoType(obj_id, string, typo) {
    var chars = string.split("");
    var obj = document.getElementById(obj_id);

    if(typo) {
        chars.splice(chars.length - 2, 0, randomChar());
        chars.splice(chars.length - 2, 0, "@");
    }

    Object.keys(chars).forEach(function(currentValue, i) {
        setTimeout(function(currentValue) {
            if(chars[currentValue] != "@") {
                obj.innerHTML += chars[currentValue];
            } else {
                obj.innerHTML = obj.innerHTML.substr(0, obj.innerHTML.length - 1);
            }
        }.bind(this, currentValue), i++ * 175);
    });
}

function randomChar() {
    var possible = "abcdefghijklmnopqrstuvwxyz";
    return possible.charAt(Math.floor(Math.random() * possible.length));
}