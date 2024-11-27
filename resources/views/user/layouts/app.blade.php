<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">
    @include('user.partial.css')
    @yield('css')


</head>

<body>

    @include('user.partial.header')

    <section class="site-hero overlay"
        style="background-image: url('{{ asset('assets/user/customimages/backgroundimage.jpg') }}')"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade-up">

                    <h1 class="heading">A Best Place For Women To Stay</h1>
                </div>
            </div>
        </div>

        <a class="mouse smoothscroll" href="#next">
            <div class="mouse-icon">
                <span class="mouse-wheel"></span>
            </div>
        </a>
    </section>
    <!-- END section -->

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
                    <figure class="img-absolute">
                        <img src="{{ asset('assets/user/images/food-1.jpg') }}" alt="Image" class="img-fluid">
                    </figure>
                    <img src="{{ asset('assets/user/images/img_1.jpg') }}" alt="Image" class="img-fluid rounded">
                </div>
                <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
                    <h2 class="heading">Welcome!</h2>
                    <p class="mb-4">Located in a secure and serene environment, our women’s hostel provides a perfect
                        blend of safety, comfort, and modern amenities. Designed exclusively for women, it offers a
                        peaceful retreat away from the noise of the city, fostering a supportive and welcoming
                        community. Whether you are a student or a working professional, our hostel ensures a home-like
                        atmosphere where you can relax, connect, and thrive.</p>
                </div>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade-up">Rooms</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind texts. Separated they live in
                        Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="{{ asset('assets/user/images/img_1.jpg') }}" alt="Free website template"
                                class="img-fluid mb-3">
                        </figure>

                    </a>
                </div>

                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="{{ asset('assets/user/images/img_2.jpg') }}" alt="Free website template"
                                class="img-fluid mb-3">
                        </figure>

                    </a>
                </div>

                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="{{ asset('assets/user/images/img_3.jpg') }}" alt="Free website template"
                                class="img-fluid mb-3">
                        </figure>

                    </a>
                </div>


            </div>
        </div>
    </section>

    <section class="section slider-section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade-up">Photos</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Room S is a spacious and comfortable hostel room designed
                        to meet students' needs, offering study tables, cozy beds, and an attached washroom. Located
                        near the coast, it provides a serene environment perfect for study and relaxation.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                        <div class="slider-item">
                            <a href="{{ asset('assets/user/images/slider-1.jpg') }}" data-fancybox="images"
                                data-caption="Caption for this image"><img
                                    src="{{ asset('assets/user/images/slider-1.jpg') }}" alt="Image placeholder"
                                    class="img-fluid"></a>
                        </div>
                        <div class="slider-item">
                            <a href="{{ asset('assets/user/images/slider-2.jpg') }}" data-fancybox="images"
                                data-caption="Caption for this image"><img
                                    src="{{ asset('assets/user/images/slider-2.jpg') }}" alt="Image placeholder"
                                    class="img-fluid"></a>
                        </div>
                        <div class="slider-item">
                            <a href="{{ asset('assets/user/images/slider-3.jpg') }}" data-fancybox="images"
                                data-caption="Caption for this image"><img
                                    src="{{ asset('assets/user/images/slider-3.jpg') }}" alt="Image placeholder"
                                    class="img-fluid"></a>
                        </div>
                        <div class="slider-item">
                            <a href="{{ asset('assets/user/images/slider-4.jpg') }}" data-fancybox="images"
                                data-caption="Caption for this image"><img
                                    src="{{ asset('assets/user/images/slider-4.jpg') }}" alt="Image placeholder"
                                    class="img-fluid"></a>
                        </div>
                        <div class="slider-item">
                            <a href="{{ asset('assets/user/images/slider-5.jpg') }}" data-fancybox="images"
                                data-caption="Caption for this image"><img
                                    src="{{ asset('assets/user/images/slider-5.jpg') }}" alt="Image placeholder"
                                    class="img-fluid"></a>
                        </div>
                        <div class="slider-item">
                            <a href="{{ asset('assets/user/images/slider-6.jpg') }}" data-fancybox="images"
                                data-caption="Caption for this image"><img
                                    src="{{ asset('assets/user/images/slider-6.jpg') }}" alt="Image placeholder"
                                    class="img-fluid"></a>
                        </div>
                        <div class="slider-item">
                            <a href="{{ asset('assets/user/images/slider-7.jpg') }}" data-fancybox="images"
                                data-caption="Caption for this image"><img
                                    src="{{ asset('assets/user/images/slider-7.jpg') }}" alt="Image placeholder"
                                    class="img-fluid"></a>
                        </div>
                    </div>
                    <!-- END slider -->
                </div>

            </div>
        </div>
    </section>




    @include('user.partial.footer')

    @include('user.partial.js')
    @yield('script')
</body>

</html>
