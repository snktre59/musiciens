<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />
    <title><?php echo $titre; ?></title>
    
    <!-- Site Favicon
    ========================================================================= -->
    <link rel="icon" type="image/png" href="<?php echo img_url("favicon.png") ?>" title="Favicon">

    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/grids-responsive-min.css">
    <!--<![endif]-->

    <?php foreach($css as $url): ?>
        <link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo $url; ?>" />
    <?php endforeach; ?>

    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

</head>
<body>

    <div class="header">
        <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
            <a class="pure-menu-heading" href="">Musikos</a>

            <ul class="pure-menu-list">
                <li class="pure-menu-item pure-menu-selected"><a href="#" class="pure-menu-link">Accueil</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Tour</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Espace membres</a></li>
            </ul>
        </div>
    </div>
        
    <div class="row" id="left-sidebar-row">
        
        <div class="col s12" id="main-container"> <!-- Note that "m8 l9" was added -->
            <?php foreach($tabFlashMessage as $flashDataMessage): ?>
                <div id="card-alert" class="card <?php echo $flashDataMessage["statut"]; ?>">
                    <div class="card-content white-text">
                    <p><i class="material-icons left"><?php echo $flashDataMessage["logo"]; ?></i> <?php echo $flashDataMessage["message"]; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php echo $output; ?>
            
        </div>
    </div>
        
		
        
    <?php foreach($js as $url): ?>
        <script type="text/javascript" src="<?php echo $url; ?>"></script> 
    <?php endforeach; ?>
        

        
    <footer class="">
        <div class="ribbon l-box-lrg pure-g">
            <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
                <img width="300" alt="File Icons" class="pure-img-responsive" src="img/common/file-icons.png">
            </div>
            <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">

            <h2 class="content-head content-head-ribbon">Laboris nisi ut aliquip.</h2>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>