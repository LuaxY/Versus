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

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Semantic UI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/components/loader.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/components/dimmer.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/components/dimmer.min.js"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Fingerprint2 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/1.5.0/fingerprint2.min.js"></script>

        <!-- App -->
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <script src="{{ URL::asset('js/app.js') }}"></script>
    </head>
    <body>
        <div id="app" class="container">

            <div class="header clearfix">
                <h3 class="text-muted"><img src="{{ URL::asset('imgs/header.png') }}" alt="Logo" class="" width="50"/> Versus</h3>
            </div>

            <div class="jumbotron vote">
                <div class="row">
                    @include('student', ['id' => 0])
                    <div class="col-xs-6 col-xs-pull-3 col-sm-4 col-md-4 absolute">
                        <img src="{{ URL::asset('imgs/vs.png') }}" alt="Versus" class="vs"/>
                    </div>
                    @include('student', ['id' => 1])
                </div>
                <div :class="'ui dimmer ' + (loader ? 'active' : '')">
                    <div class="ui text loader">Vote en cours...</div>
                </div>
            </div>

            <div class="panel panel-default filters">
                <div class="panel-heading">
                    Filtres
                    <button @click="filters" class="btn btn-default pull-right">Afficher</button>
                </div>
                <div class="panel-body">
                    <h3>Sexes</h3>
                    <label><input type="checkbox" v-model="selectAllSexes"> Tout cocher</label>
                    <table class="table table-bordered table-striped">
                        <tr v-for="sex in sexes">
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" v-model="selectedSex" :id="sex" :value="sex"> @{{ sex }}
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <h3>Promotions</h3>
                    <label><input type="checkbox" v-model="selectAllPromotions"> Tout cocher</label>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4" v-for="promotionsGroup in promotions">
                            <table class="table table-bordered table-striped">
                                <tr v-for="promotion in promotionsGroup">
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" v-model="selectedPromotions" :id="promotion" :value="promotion"> @{{ promotion }}
                                            </label>
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
