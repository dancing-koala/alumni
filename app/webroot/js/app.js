"use strict";

// var optionsBtn = document.getElementById('options-btn');
//
// optionsBtn.onclick = function (event) {
//     console.log(event);
// };

var alumniApp = new Vue({
    el: '#alumni-app',
    data: {
        showOptions: false
    },
    methods: {
        toggleOptions: function () {
            this.showOptions = !this.showOptions;
        }
    }
});

