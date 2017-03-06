$( document ).ready(function() {

    var app = new Vue({
        el: '#app',
        data: {
            uid: false,
            vid: false,
            students: [null, null],
        },
        methods: {
            vote: function(id) {
                // TODO: vote for this.students[id]
                // use this.uid and this.vid
                alert(this.vid);
            },
            reload: function(id) {
            },
        },
        mounted: function() {
        }
    });

    new Fingerprint2().get(function(result, components){
        app.uid = result;
    });

    app.vid = voteId;

});
