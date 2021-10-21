@include('header')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<section class="hero-wrap js-fullheight" style="background-image: url('images/bg.jpg');" data-section="home"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">

        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">

            <div class="col-md-5 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    style="color:white">Your Journey to
                    the Quran</h1>
                <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    style="color:white"><b>Learn with Tutors you choose for Tajweed,
                        Recitation, Hifz and Arabic lessons,
                        in your time, at your rates.</p></b>


                @if (Auth::check())

                    <p class="mb-0 register-link"><a href="{{ url('userDashboard') }}" class="mr-3">My
                            Account</a><a href="{{ url('signout') }}">Logout</a></p>
            </div>
        @else
            <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                <h2 style="text-align: center;"><a href="{{ route('signupTeacher') }}"><input type="submit"
                            value="Sign-Up as Tutor" class="btn btn-primary py-3 px-5"></a></h2>
            </div>


            @endif

        </div>

    </div>

    </div>

</section>


<section class="ftco-section ftco-services-2 bg-light" id="services-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">3 simple steps to start</h2>

            </div>
        </div>
        <div class="row">
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services text-center d-block">
                    <div class="icon justify-content-center align-items-center d-flex"><span
                            class="flaticon-pin"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Find a Quran Tutor</h3>
                        <p>You can browse profiles of hand-picked online Quran teachers who teach Quran courses like
                            Noorani Qaida, Quran Recitation, Tajweed, Quran memorization and Arabic language.

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services text-center d-block mt-lg-5 pt-lg-4">
                    <div class="icon justify-content-center align-items-center d-flex"><span
                            class="flaticon-detective"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Select your Plan</h3>
                        <p>Use your thirty minute free classroom time to interview Quran teachers. Continue your Quran
                            lessons with your selected tutor by choosing a classroom plan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services text-center d-block">
                    <div class="icon justify-content-center align-items-center d-flex"><span
                            class="flaticon-house"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Start Learning Quran</h3>
                        <p>You don't need skype or any other software. Our Quran Classroom is designed for online Quran
                            learning and works in your browser with video and audio.

                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <h2 style="text-align: center;"><a href="{{ route('teachers') }}"><input type="submit"
                value="Find Tutor/ٹیوٹر تلاش کریں" class="btn btn-primary py-3 px-5"></a></h2>
</section>







<section class="ftco-section ftco-services-2 bg-light" id="workflow-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 heading-section ftco-animate">
                <h1 class="mb-4"><b>Register as a tutor on E Quran</h1></b>

                <div class="media block-6 services text-center d-block pt-md-5 mt-md-5">
                    <div class="icon justify-content-center align-items-center d-flex"><span>1</span></div>
                    <div class="media-body p-md-3">
                        <h3 class="heading mb-3">Build Your Profile</h3>
                        <p class="mb-5">Build your Quran Tutor profile and choose the Quran courses you want
                            to teach, like online Tajweed, Hifz memorization and Arabic Language course.</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate mt-lg-5">
                <div class="media block-6 services text-center d-block mt-lg-5 pt-md-5 pt-lg-4">
                    <div class="icon justify-content-center align-items-center d-flex"><span>2</span></div>
                    <div class="media-body p-md-3">
                        <h3 class="heading mb-3">Launch</h3>
                        <p class="mb-5">You can message Quran students and they can message you. If you are a
                            good match, set up your first Quran lesson and start teaching your online Quran classes</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services text-center d-block">
                    <div class="icon justify-content-center align-items-center d-flex"><span>3</span></div>
                    <div class="media-body p-md-3">
                        <h3 class="heading mb-3">Teach and earn</h3>
                        <p class="mb-5">Set your hourly rate and every minute you spend teaching Quran classes
                            gets logged so you know how much to bill each student. Students pay you directly

                        </p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 style="text-align: center;"><a href="{{ route('signupTeacher') }}"><input type="submit"
                value="Sign-Up as Tutor/بطور ٹیوٹر سائن اپ کریں" class="btn btn-primary py-3 px-5"></a></h2>
</section>




<div class="contianer">
    <section class="ftco-section bg-light" id="blog-section">
        <header class="w3-container w3-teal">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-5">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Our Features</h2>

                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <img src="<?php echo url('/'); ?>/images/q8.png" class="img-fluid" alt="Colorlib Template">
                            </a>
                            <div class="text float-right d-block">
                                <div class="d-flex align-items-center pt-2 mb-4 topp">
                                    <div class="one mr-2">
                                        <span class="day">12</span>
                                    </div>

                                </div>
                                <h2><b>Interactive Quran</b></h2>
                                <p>Makes Quran learning easy for kids and adults</p>
                                <div class="d-flex align-items-center mt-4 meta">
                                    <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                                class="ion-ios-arrow-round-forward"></span></a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <img src="<?php echo url('/'); ?>/images/q9.png" class="img-fluid" alt="Colorlib Template">
                            </a>
                            <div class="text float-right d-block">
                                <div class="d-flex align-items-center pt-2 mb-4 topp">

                                </div>
                                <h3 class="heading">Enhanced Learning:</h3>
                                <p>ideo and Audio Streaming, Text Chat and White Board help you learn Tajweed online</p>
                                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                            class="ion-ios-arrow-round-forward"></span></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                        <div class="blog-entry">
                            <img src="<?php echo url('/'); ?>/images/q11.png" class="img-fluid"
                                alt="Colorlib Template">
                            </a>

                            <h3 class="heading"><b>Parental Watch:</b></h3>
                            <p>Parents can monitor their children’s Quran learning progress through videos recorded at
                                random intervals</p>
                            <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                        class="ion-ios-arrow-round-forward"></span></a></p>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">

                        </a>
                        <div class="text float-right d-block">

                            <h3 class="heading">Archiving:</h3>
                            <p>Record and play-back your online Tajweed lessons and Hifz classes</p>
                            <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                        class="ion-ios-arrow-round-forward"></span></a></p>
                        </div>
                    </div>
                </div>

            </div>
</div>
<h1 style="text-align: center;"><img src="<?php echo url('/'); ?>/images/q7.png" class="img-fluid"
        alt="Colorlib Template">
    <br><b>Check Your System Compatibility</b><br>
    <p style="text-align: center;">Online Quran Learning works best when you can communicate with each other. <br>Make
        sure your computer is set up properly.</p>


    <a href="https://www.speedtest.net"><input type="submit" value="Check Your Compatibility"
            class="btn btn-primary py-3 px-5">
</h1></a>
</header>
</section>
</div>
<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">

                <h2 class="mb-4">What they say about us</h2>
            </div>
        </div>
        <div class="row ftco-animate justify-content-center">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap text-center py-4 pb-5">
                            <div class="user-img"
                                style="background-image: url(<?php echo url('/'); ?>/images/q14.jpeg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text px-4 pb-5">
                                <p class="mb-4">Sama-Quran is perfect for me...<br> i get more knowledge from
                                    this platform
                                    I'm Satisfied Suggested every person</p>
                                <p class="name">Ayan Javed</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap text-center py-4 pb-5">
                            <div class="user-img"
                                style="background-image: url(<?php echo url('/'); ?>/images/q13.jpeg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text px-4 pb-5">
                                <p class="mb-4">Sama-Quran is perfect for me...<br> i get more knowledge from
                                    this platform
                                    I'm Satisfied Suggested every person</p>
                                <p class="name"><b>Arosh Khan<b></p>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap text-center py-4 pb-5">
                            <div class="user-img"
                                style="background-image: url(<?php echo url('/'); ?>/images/q14.jpeg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text px-4 pb-5">
                                <p class="mb-4">Sama-Quran is perfect for me...<br> i get more knowledge from
                                    this platform
                                    I'm Satisfied Suggested every person</p>
                                <p class="name">Zara Javed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Contact</span>
                <h2 class="mb-4">Contact Me</h2>

            </div>
        </div>

        <div class="row block-9">
            <div class="col-md-7 order-md-last d-flex ftco-animate">
                <form action="#" class="bg-light p-4 p-md-5 contact-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control"
                            placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <button onclick="myFunction()">Send message/ پیغام بھیجیں</button>

                        <script>
                            function myFunction() {
                                alert("Thi service is not available! ========> Only Call and Emaill");
                            }
                        </script>
                    </div>
                </form>

            </div>

            <div class="col-md-5 d-flex">
                <div class="row d-flex contact-info mb-5">

                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light d-flex">
                            <div class="icon mr-3">
                                <span class="icon-phone2"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Contact Number</h3>
                                <p><a href="tel://1234567920">+92320 5030115</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light d-flex">
                            <div class="icon mr-3">
                                <span class="icon-paper-plane"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Email Address</h3>
                                <p><a href="mailto:info@yoursite.com">usama1517a@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ftco-animate">
                        <div class="box p-2 px-3 bg-light d-flex">
                            <div class="icon mr-3">
                                <span class="icon-globe"></span>
                            </div>
                            <div>
                                <h3 class="mb-3">Website</h3>
                                <p><a href="#">Sama-Quran.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')
</body>

</html>
