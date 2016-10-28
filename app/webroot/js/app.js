"use strict";

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

