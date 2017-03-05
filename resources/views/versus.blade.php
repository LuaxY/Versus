<!Doctype HTML>
<html>
    <head>
        <title>Versus</title>
        <meta charset="utf-8">
        <meta name="robots" content="noindex" />
        <meta name="robots" content="noarchive" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.js" integrity="sha256-5i/mQ300M779N2OVDrl16lbohwXNUdzL/R2aVUXyXWA=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/1.5.0/fingerprint2.min.js" integrity="sha256-E3dHNcHtAwxS1HomiyotG8Fr4UzEM8Yfz8buH4Gk6W4=" crossorigin="anonymous"></script>-->
        <script src="/js/jquery.fancybox.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted"><img src="/imgs/header.png" alt="Logo" class="" width="50"/> Versus</h3>
            </div>
            <div class="jumbotron">
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-4">
                        <img src="/imgs/students/{{ $students[0]->uid }}.jpg" alt="{{ $students[0]->name }}" class="img-thumbnail"/>
                        <h3>@formatName($students[0]->name)</h3>
                        <h4>{{ $students[0]->promotion }}</h4>
                        <h4>
                            <i class="fa fa-{{ $students[0]->sex == 'H' ? 'mars' : 'venus' }}" aria-hidden="true"></i>
                            <a href="https://facebook.com/{{ $students[0]->fbId }}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        </h4>
                        <button type="button" class="btn btn-primary choose">VOTER !</button>
                        <button type="button" class="btn btn-danger reload"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-6 col-xs-pull-3 col-sm-4 col-md-4 absolute">
                        <img src="/imgs/vs.png" alt="Versus" class="vs"/>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4">
                        <img src="/imgs/students/{{ $students[1]->uid }}.jpg" alt="{{ $students[1]->name }}" class="img-thumbnail"/>
                        <h3>@formatName($students[1]->name)</h3>
                        <h4>{{ $students[1]->promotion }}</h4>
                        <h4>
                            <i class="fa fa-{{ $students[1]->sex == 'H' ? 'mars' : 'venus' }}" aria-hidden="true"></i>
                            <a href="https://facebook.com/{{ $students[1]->fbId }}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        </h4>
                        <button type="button" class="btn btn-primary choose">VOTER !</button>
                        <button type="button" class="btn btn-danger reload"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <div class="jumbotron">
                <div class="row">
                    Filtres
                </div>
            </div>
            <footer class="footer">
                <p></p>
            </footer>
        </div>
  </body>
</html>
