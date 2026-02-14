    <!-- Footer -->
    <section id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="#"><i class="bi bi-chevron-double-right"></i>Home</a></li>
                        <li><a href="#"><i class="bi bi-chevron-double-right"></i>About Us</a></li>
                        <li><a href="#"><i class="bi bi-chevron-double-right"></i>Facilities</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="#"><i class="bi bi-chevron-double-right"></i>Terms & Conditions</a></li>
                        <li><a href="#"><i class="bi bi-chevron-double-right"></i>Privacy Policy</a></li>
                        <li><a href="#"><i class="bi bi-chevron-double-right"></i>Career</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="#"><i class="bi bi-chevron-double-right"></i>Contact Us</a></li>
                        <li><a href="#"><i class="bi bi-chevron-double-right"></i>Gallery</a></li>
                        <li><a href="#"><i class="bi bi-chevron-double-right"></i>Login</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p class="h6">&copy; <?php echo '2023-' . date("Y"); ?> JUDICIAL CASE MANAGEMENT SYSTEM<a class="text-green ml-2" href="#" target="_blank"> | ALL RIGHTS RESERVED</a></p>

                </div>
                <hr>
            </div>
        </div>
    </section>
    <!-- ./Footer -->

    <!-- Template Main JS File -->
    <script src="../assets/js/nav.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script>
        (function($) {
            "use strict";

            // Sticky Navbar
            $(window).scroll(function() {
                if ($(this).scrollTop() > 90) {
                    $('.nav-bar').addClass('nav-sticky');
                    $('.carousel, .page-header').css("margin-top", "73px");
                } else {
                    $('.nav-bar').removeClass('nav-sticky');
                    $('.carousel, .page-header').css("margin-top", "0");
                }
            });

            // Dropdown on mouse hover
            $(document).ready(function() {
                function toggleNavbarMethod() {
                    if ($(window).width() > 992) {
                        $('.navbar .dropdown').on('mouseover', function() {
                            $('.dropdown-toggle', this).trigger('click');
                        }).on('mouseout', function() {
                            $('.dropdown-toggle', this).trigger('click').blur();
                        });
                    } else {
                        $('.navbar .dropdown').off('mouseover').off('mouseout');
                    }
                }
                toggleNavbarMethod();
                $(window).resize(toggleNavbarMethod);
            });
        })(jQuery);
    </script>