<!Doctype HTML>
<html>
    <head>
        <title>Versus</title>
        <meta charset="utf-8">
        <meta name="robots" content="noindex" />
        <meta name="robots" content="noarchive" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="{{ URL::asset('imgs/vs.png') }}">

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- VueJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.1/vue.min.js"></script>

        <!-- Semantic UI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Fingerprint2 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/1.5.0/fingerprint2.min.js"></script>

        <!-- App -->
        <!--<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">-->
        <script src="{{ URL::asset('js/app.js') }}"></script>
    </head>
    <body>
        <div id="app" class="container">
            <div class="header clearfix">
                <h3 class="text-muted"><img src="{{ URL::asset('imgs/header.png') }}" alt="Logo" class="" width="50"/> Versus</h3>
            </div>

            <div class="ui segment attached">
                <div class="ui three column grid">
                    <div class="row">
                        <div class="column">
                            @include('student', ['id' => 0])
                        </div>
                        <div class="column">
                            <img src="{{ URL::asset('imgs/vs.png') }}" alt="Versus" class="vs"/>
                        </div>
                        <div class="column">
                            @include('student', ['id' => 1])
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui bottom attached warning message">
                <i class="warning icon"></i> Version démo
            </div>

            <div class="ui segment">
                <h3>Sexes</h3>
                <div class="ui checkbox">
                    <input type="checkbox" v-model="selectAllSexes" id="selectAllSexes">
                    <label for="selectAllSexes">Tout cocher</label>
                </div>
                <table class="ui celled table">
                    <tr v-for="sex in sexes">
                        <td>
                            <div class="ui checkbox">
                                <input type="checkbox" v-model="selectedSex" :id="sex" :value="sex">
                                <label :for="sex"l>@{{ sex }}</label>
                            </div>
                        </td>
                    </tr>
                </table>
                <h3>Promotions</h3>
                <div class="ui checkbox">
                    <input type="checkbox" v-model="selectAllPromotions" id="selectAllPromotions">
                    <label for="selectAllPromotions">Tout cocher</label>
                </div>
                <br><br>
                <div class="ui four column grid">
                    <div class="row">
                        <div class="column" v-for="promotionsGroup in promotions">
                            <table class="ui celled table">
                                <tr v-for="promotion in promotionsGroup">
                                    <td>
                                        <div class="ui checkbox">
                                            <input type="checkbox" v-model="selectedPromotions" :id="promotion" :value="promotion">
                                            <label :for="promotion">@{{ promotion }}</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <p></p>
            </footer>
        </div>
        <script type="text/javascript">
            var studentsUrl = '{{ route('students') }}';
            var voteUrl = '{{ route('vote') }}';
        </script>
  </body>
</html>
