<!DOCTYPE html>
<html>
<head>
    <title>RCFM &middot; Home</title>

    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <meta http-equiv="content-language" content="en-us">
    <meta charset="utf-8">
    <meta name="charset" content="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="copyright" content="">
    <meta name="author" content="">
    <meta name="designer" content="">
    <meta name="email" content="">
    <meta name="rating" content="General">
    <meta name="distribution" content="Global">

    <link rel="stylesheet" type="text/css" href="assets/css/layout.css">
</head>

<body id="body-index">
<div class="container-fluid">
    <section class="row" id="header">
        <div class="container">
            <div class="col-xs-4">
                <i class="fa fa-bars menu"></i>
            </div>

            <div class="col-xs-4">
                <h1>Rosana</h1>
            </div>

            <div class="col-xs-4">
                <nav>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-500px"></i></a>
                    <a href="#"><i class="fa fa-envelope-o"></i></a>
                </nav>
            </div>
        </div>
    </section>

    <!--               	<div id="instafeed">-->
    <!--                	<h3>Instagram</h3>-->
    <!--				</div>-->

    <section class="row" id="menu-overlay">
        <div class="wrapper wow fadeIn">
            <i class="fa fa-times"></i>

            <nav>
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="/admin">Admin</a>
            </nav>
        </div>
    </section>

    <section class="row" id="about">
        <div class="container">
            <div class="col-xs-12 col-sm-6 col-sm-offset-6 about-inner">
                <h2>Who is Rosana Carla Furtado Martins</h2>
                <p>Rosana Carla Furtado Martins is a professional photographer based in 's-Hertogenbosch, the Netherlands. She was born, and grew up
                in the beautiful Belem do Para, Brazil. She was always interested in visual things and loved to capture amazing moments in eternity
                through photo's. At a young age when she got her first photo camera she took pictures of everything and tried to get a great composition
                between colors and objects. Few years go by, and she goes to Unama – Unversidade da Amazonia where she studies Photography.
                </p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean feugiat nisi sed arcu rhoncus, sed aliquet velit facilisis. Nam vel eleifend odio, a dignissim lectus. Mauris et imperdiet sapien. Phasellus vel lacinia velit. Curabitur ac leo semper, gravida nunc et, lacinia metus. Integer finibus diam quis ante suscipit aliquam. Nunc maximus nibh a semper semper. Morbi tincidunt est ac tellus efficitur, eu fringilla augue eleifend. Maecenas venenatis dictum nibh ac tempus. Sed condimentum lorem id vestibulum pretium. Praesent sed ipsum imperdiet, pulvinar nisi eget, fermentum odio. Proin pretium molestie nunc, vel consectetur libero eleifend et. Vestibulum egestas elementum nunc, scelerisque aliquet lectus hendrerit dapibus. Praesent mi nulla, convallis sit amet pellentesque in, sagittis at justo.</p>
                <p>Aenean in urna vel nisi iaculis viverra in non augue. Aliquam erat volutpat. Nullam dignissim nibh et libero efficitur, a tincidunt lacus auctor. Nam volutpat tellus quis volutpat volutpat. Quisque viverra enim at porttitor sagittis. Cras fermentum arcu rhoncus, condimentum tellus sit amet, pharetra tellus. Sed egestas tellus tempor, consequat augue in, tincidunt lorem. Suspendisse at arcu ipsum. Pellentesque viverra nisi quis massa faucibus, at ultrices justo volutpat. Praesent luctus non lectus et finibus. Duis eget dictum lacus.</p>
                <p>In interdum dui odio, quis congue purus aliquet eu. Ut dignissim, enim eget malesuada pulvinar, quam quam finibus nisi, non hendrerit sapien sem placerat mi. Donec sed ullamcorper tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. In tincidunt dictum sem ac cursus. Donec finibus quam quis erat fermentum, a sollicitudin lacus aliquam.</p>
            </div>
        </div>

        <div class="overlay"></div>
    </section>
</div>

<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/wow.min.js"></script>
<script type="text/javascript" src="assets/js/instafeed.js"></script>
<script type="text/javascript" src="assets/js/masonry.js"></script>
<script type="text/javascript">
    new WOW().init();

    //			    var feed = new Instafeed({
    //			        get: 'user',
    //			        userId: '1608051790',
    //			        clientId: '2065b6b128ca4cb7ad24fab30309e79a',
    //			    });
    //			    feed.run();
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".menu").on("click", function() {
            $("#menu-overlay").slideToggle();
        });

        $("#menu-overlay i").on("click", function() {
            $("#menu-overlay").slideToggle();
        });
    })
</script>
</body>
</html>
