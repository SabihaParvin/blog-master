
<!DOCTYPE html>
<html lang="en">
    <head>
    @notifyCss
        <meta charset="utf-8">
        <title>Blog - Master</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="{{'/frontend/'}}/img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{'/frontend/'}}/css/style.css" rel="stylesheet">
    </head>

    <body>


        <div class="wrapper">

        @include('frontend.partials.sidebar')

            
            <div class="content">
                <!-- Navbar Start -->
                @include('frontend.partials.navbar')
               
                <!-- Navbar End -->
                
                <!-- Carousel Start -->

                <!-- Carousel End -->                    
                

                @yield('content')

                
                </div>
                </div>
                @include('notify::components.notify')

                <!-- Footer Start -->
               @include('frontend.partials.footer')
                <!-- Footer End -->
            
       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{'/frontend/'}}/lib/easing/easing.min.js"></script>
        <script src="{{'/frontend/'}}/lib/waypoints/waypoints.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="{{'/frontend/'}}/mail/jqBootstrapValidation.min.js"></script>
        <script src="{{'/frontend/'}}/mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="{{'/frontend/'}}/js/main.js"></script>
        @notifyJs
    </body>
</html>
