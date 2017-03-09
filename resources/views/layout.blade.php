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
        <div class="container">

            @yield('content')

            <footer class="footer">
                <p><a href="mailto:zac.terna@protonmail.com">Contact</a></p>
            </footer>

            <script type="text/javascript">
                var studentsUrl = '{{ route('students') }}';
                var voteUrl = '{{ route('vote') }}';
            </script>
        </div>
  </body>
</html>
