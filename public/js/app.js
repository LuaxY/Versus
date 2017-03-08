$( document ).ready(function() {

    var app = new Vue({
        el: '#app',
        data: {
            uid: null,
            vid: null,
            loader: true,
            filtersPanel: false,
            students: [null, null],
            promotions: [
                ['Infosup', 'Ingésup B1', 'Ingésup B2', 'Ingésup B3', 'Ingésup M1', 'Ingésup M2'],
                ['ESSCA B1', 'ESSCA B2', 'ESSCA B3', 'ISEE M1', 'ISEE M2'],
                ['MANAA', 'Limart B2', 'Limart B3'],
                ['Anciens'],
            ],
            sexes: ['Homme', 'Femme'],
            selectedPromotions: [],
            selectedSex: [],
            error: false,
            errorMsg: "Erreur...",
        },
        methods: {
            loadStudents: function() {
                var self = this;

                self.loader = true;
                self.error = false;
                self.errorMsg = "Erreur...";

                var filters = self.getFilters();

                $.post(studentsUrl, {uid: self.uid, filters: filters}, function(res) {
                    if (res.success) {
                        self.students = res.data.students;
                        self.vid = res.data.voteId;
                        self.loader = false;
                    } else {
                        self.loader = false;
                        self.error = true;
                        self.errorMsg = res.error;
                    }
                });
            },
            vote: function(id) {
                var self = this;

                if (self.uid != null && self.vid != null) {
                    $.post(voteUrl, {uid: self.uid, vid: self.vid, vote: id}, function(res) {
                        if (res.success) {
                            app.loadStudents();
                        } else {
                            self.loader = false;
                            self.error = true;
                            self.errorMsg = res.error;
                        }
                    });
                }
            },
            filters: function() {
                if (this.filtersPanel) {
                    $('.filters .panel-body').fadeOut();
                    $('.filters .panel-heading button').html('Afficher');
                } else {
                    $('.filters .panel-body').fadeIn();
                    $('.filters .panel-heading button').html('Masquer');
                }

                this.filtersPanel = !this.filtersPanel;
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
            },
            format: function(str) {
                return str.replace(' ', "<br>");
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
        app.loadStudents();
    });

});
