<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>August Jewelry</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto:300,400,700" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        <header>
            <div class="top-nav container">
                <div class="logo">August Jewelry </div>
                <ul>
                    <li><a href="#">Prekės</a></li>
                    <li><a href="#">Naujienos</a></li>
                    <li><a href="#">Apie mane</a></li>
                    <li><a href="#">Krepšelis</a></li>
                </ul>
            </div> <!-- end top-nav -->

            <div class="hero container">
                <div class="hero-copy">
                    <h1>August Jewelry</h1>
                    <p>Trumpas svetaines aprasymas</p>
                </div>
                <div class="hero-image">
                    <img src="img/hero-image.png">
                </div>
            </div>

            
        </header>

        <div class="featured-section">
            <div class="container">
                <h1 class="text-center">Mano rinktiniai dirbiniai</h1>

                <p class="section-description">Sitie darbai man labai 
                    patinka ir taip toliau ir panasiai bla bla bla.</p>

            <div class="products text-center">
                <div class="product">
                    <a href="#"><img src="img/sirdele.png" alt="product"></a>
                    <a href="#"><div class="product-name">Ziedas "Sirdele"</div></a>
                    <div class="product-price">$109.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="img/sirdele.png" alt="product"></a>
                    <a href="#"><div class="product-name">Ziedas "Sirdele"</div></a>
                    <div class="product-price">$109.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="img/sirdele.png" alt="product"></a>
                    <a href="#"><div class="product-name">Ziedas "Sirdele"</div></a>
                    <div class="product-price">$109.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="img/sirdele.png" alt="product"></a>
                    <a href="#"><div class="product-name">Ziedas "Sirdele"</div></a>
                    <div class="product-price">$109.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="img/sirdele.png" alt="product"></a>
                    <a href="#"><div class="product-name">Ziedas "Sirdele"</div></a>
                    <div class="product-price">$109.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="img/sirdele.png" alt="product"></a>
                    <a href="#"><div class="product-name">Ziedas "Sirdele"</div></a>
                    <div class="product-price">$109.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="img/sirdele.png" alt="product"></a>
                    <a href="#"><div class="product-name">Ziedas "Sirdele"</div></a>
                    <div class="product-price">$109.99</div>
                </div>
                <div class="product">
                    <a href="#"><img src="img/sirdele.png" alt="product"></a>
                    <a href="#"><div class="product-name">Ziedas "Sirdele"</div></a>
                    <div class="product-price">$109.99</div>
                </div>
            </div> <!-- end products -->

            <div class="text-center button-container">
                <a href="#" class="button">Visos prekes</a>
            </div>

            </div> <!-- end container -->

        </div> <!-- end featured section -->

        <footer>
            <div class="footer-content container">
                <div class="made-by">Sukurta Igno Gasparaviciaus</div>
                <ul>
                    <li>Sekite Auguste:</li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>
        </footer>


    </body>
</html>
