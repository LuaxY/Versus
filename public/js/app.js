$( document ).ready(function() {

    var app = new Vue({
        el: '#app',
        data: {
            uid: false,
            vid: false,
            students: [null, null],
            promotions: [
                ['Infosup', 'Ingésup B1', 'Ingésup B2', 'Ingésup B3', 'Ingésup M1', 'Ingésup M2'],
                ['ESSCA B1', 'ESSCA B2', 'ESSCA B3', 'ISEE B1', 'ISEE B1'],
                ['MANAA', 'Limart B2', 'Limart B3'],
            ],
            sexes: ['Homme', 'Femme'],
            selectedPromotions: [],
            selectedSex: [],
        },
        methods: {
            vote: function(id) {
                // TODO: vote for this.students[id]
                // use this.uid and this.vid
            },
            reload: function(id) {
            },
        },
        computed: {
            selectAllPromotions: {
                get: function () {
                    return this.promotions ? this.selectedPromotions.length == (this.promotions[0].length + this.promotions[1].length + this.promotions[2].length) : false;
                },
                set: function (value) {
                    var selected = [];

                    if (value) {
                        this.promotions.forEach(function (promotionsGroup) {
                            promotionsGroup.forEach(function (promotion) {
                                selected.push(promotion);
                            });
                        });
                    }

                    this.selectedPromotions = selected;
                }
            },
            selectAllSexes: {
                get: function () {
                    return this.sexes ? this.selectedSex.length == this.sexes.length : false;
                },
                set: function (value) {
                    var selected = [];

                    if (value) {
                        this.sexes.forEach(function (sex) {
                            selected.push(sex);
                        });
                    }

                    this.selectedSex = selected;
                }
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
