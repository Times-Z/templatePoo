<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=App::getInstance()->title ?></title>
    <!-- Bootstrap & co -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://kit.fontawesome.com/81ee6dd9e0.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Sanchez&display=swap" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
</head>

<body>
    <div class="container-fluid mt-2 mb-4 vh-100">
        <nav class="nav nav-pills nav-fill mt-1 mb-4">
            <a class="nav-item nav-link <?= ($view === 'index') ? 'active' :  '' ?>" href="">Acceuil</a>
            <a class="nav-item nav-link <?= ($view === 'template') ? 'active' :  '' ?> " href="#">Une autre page</a>
            <a class="nav-item nav-link" href="#">Encore une autre page</a>
            <a class="nav-item nav-link disabled" href="#">Lien désactiver</a>
        </nav>
        <?=$content; ?>
    </div>
    <div class="footer-copyright text-center p-3 bg-light">
        <footer>
            <small> &copy; [nom] - tous droits réservés</small>
            <small> - 2019 - <?=date('Y') ?></small>
        </footer>
    </div>
    <!-- config cookie consent -->
    <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
    <script>
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#237afc"
            },
            "button": {
                "background": "#fff",
                "text": "#237afc"
            }
        },
        "theme": "edgeless",
        "position": "bottom-right",
        "type": "opt-out",
        "content": {
            "message": "Ce site utilise les cookies pour vous assurer une meilleur expérience.",
            "deny": "Refuser",
            "link": "Voir plus"
        }
    });
    </script>
</body>

</html>