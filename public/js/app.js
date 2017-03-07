$( document ).ready(function() {

    var app = new Vue({
        el: '#app',
        data: {
            uid: false,
            vid: false,
            students: [null, null],
            promotions: [
                ['Infosup', 'Ingésup B1', 'Ingésup B2', 'Ingésup B3', 'Ingésup M1', 'Ingésup M2'],
                ['ESSCA B1', 'ESSCA B2', 'ESSCA B3', 'ISEE M1', 'ISEE M2'],
                ['MANAA', 'Limart B2', 'Limart B3'],
                [/*'Anciens', 'Intervenants', 'Admin'*/],
            ],
            sexes: ['Homme', 'Femme'],
            selectedPromotions: [],
            selectedSex: [],
        },
        methods: {
            vote: function(id) {
                var self = this;
                // TODO: vote for this.students[id]
                // use this.uid and this.vid

                var filters = self.getFilters();
                console.log(filters);
            },
            reload: function(id) {
            },
            getFilters: function() {
                var self = this;
                var promotions = "";
                var sexes = "";

                self.promotions.forEach(function (promotionsGroup) {
                    promotionsGroup.forEach(function (promotion) {
                        if (self.selectedPromotions.indexOf(promotion) >= 0) {
                            promotions += "1";
                        } else {
                            promotions += "0";
                        }
                    });
                });

                self.sexes.forEach(function (sex) {
                    if (self.selectedSex.indexOf(sex) >= 0) {
                        sexes += "1";
                    } else {
                        sexes += "0";
                    }
                });

                return {promotions: promotions, sexes: sexes};
            }
        },
        computed: {
            selectAllPromotions: {
                get: function () {
                    return this.promotions ? this.selectedPromotions.length == (this.promotions[0].length + this.promotions[1].length + this.promotions[2].length + this.promotions[3].length) : false;
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
            this.selectAllPromotions = 1;
            this.selectAllSexes = 1;
        }
    });

    new Fingerprint2().get(function(result, components){
        app.uid = result;
    });

    app.vid = voteId;

});
