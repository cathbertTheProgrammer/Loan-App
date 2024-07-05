<x-website-layout>
  
	@php
    	$googleMapsKey = config('services.google_maps.key');
	@endphp
    <section class="banner">
        <div class="rev_slider_wrapper">
            <div id="main_slider" class="rev_slider" data-version="5.0">
                <ul>

                    <li data-index='rs-355' class="slide_show slide_1" data-transition='boxslide' data-slotamount='default'
                        data-easein='default' data-easeout='default' data-masterspeed='default' data-rotate='0'
                        data-saveperformance='off' data-title='Slide Boxes' data-description=''> <!-- Slide_show -->
                        <img src="{{ asset('assets/website/images/home/slide-4.jpg') }}" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            class="rev-slidebg">

                        <div class="main_heading tp-caption tp-resizeme" data-x="['left','left','left','left']"
                            data-hoffset="['0','0','30','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-169','-169','-139','-80']" data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:2000;e:Power3.easeInOut;"
                            data-transform_out="y:[100%];s:1000;s:1000;"
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="2000"
                            data-splitin="none" data-splitout="none">
                            <h1>We work with focus<br>and understanding.</h1>
                        </div>
                        <div class="tp-caption tp-resizeme" data-x="['left','left','left','left']"
                            data-hoffset="['0','0','30','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-16','-16','-06','20']" data-transform_idle="o:1;"
                            data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeOut;"
                            data-transform_out="y:[100%];s:1000;s:1000;"
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="3000"
                            data-splitin="none" data-splitout="none" data-elementdelay="0.05">
                            <p class="p_color">We develop innovative financing solutions to improve <br>the lives of
                                people in need.</p>
                        </div>
                        <div class="tp-caption" data-x="['left','left','left','left']"
                            data-hoffset="['0','0','30','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['87','87','97','107']" data-transform_idle="o:1;"
                            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                            data-style_hover="c:rgba(0, 154, 238, 1.00);bc:rgba(0, 154, 238, 1.00);cursor:pointer;"
                            data-transform_in="x:[-100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;"
                            data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" data-start="4000"
                            data-splitin="none" data-splitout="none">
                            <a href="contact.html" class="contact_us_button tran3s s_color_bg theme_button">Contact
                                us</a>
                        </div>
                        <div class="tp-caption" data-x="['left','left','left','left']"
                            data-hoffset="['180','180','210','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['87','87','97','200']" data-transform_idle="o:1;"
                            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                            data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(114, 168, 0, 1.00);cursor:pointer;"
                            data-transform_in="x:[100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;"
                            data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" data-start="4000"
                            data-splitin="none" data-splitout="none">
                            <a href="service.html" class="service_button tran3s p_color_bg theme_button">Our
                                Services</a>
                        </div>
                    </li> <!-- /Slide_show -->

                    <li data-index='rs-356' class="slide_show slide_2" data-transition='slotslide-vertical'
                        data-slotamount='default' data-easein='default' data-easeout='default'
                        data-masterspeed='default' data-rotate='0' data-saveperformance='off'
                        data-title='Slide Slots vertical' data-description=''> <!-- Slide2 -->

                        <img src="{{ asset('assets/website/images/home/slide-2.jpg') }}" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            class="rev-slidebg">

                        <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']"
                            data-hoffset="['268','268','100','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-169','-169','-129','-50']" data-transform_idle="o:1;"
                            data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                            data-start="2000" data-splitin="none" data-splitout="none">
                            <h1>Providing leading<br>Business Solutions</h1>
                        </div>
                        <div class="main_heading tp-caption tp-resizeme"
                            data-x="['center','center','center','center']" data-hoffset="['265','265','97','28']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-16','-16','24','48']"
                            data-transform_idle="o:1;" data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                            data-start="3000" data-splitin="none" data-splitout="none">
                            <p class="p_color">Our company offers a full range of consulting<br>services in all the
                                countries</p>
                        </div>
                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['90','90','-78',-88']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['87','87','130','140']" data-transform_idle="o:1;"
                            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                            data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);cursor:pointer;"
                            data-transform_in="x:[-100%];z:0;rX:25deg;rY:-50deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;"
                            data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" data-start="4000"
                            data-splitin="none" data-splitout="none" data-actions='' data-responsive_offset="on">
                            <a href="contact.html" class="contact_us_button tran3s s_color_bg theme_button">Contact
                                us</a>
                        </div>
                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['270','270','102',-88']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['87','87','130','235']" data-transform_idle="o:1;"
                            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                            data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(0, 133, 214, 1.00);cursor:pointer;"
                            data-transform_in="x:[100%];z:0;rX:25deg;rY:50deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;"
                            data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" data-start="4000"
                            data-splitin="none" data-splitout="none" data-actions='' data-responsive_offset="on">
                            <a href="service.html" class="service_button tran3s p_color_bg theme_button">Our
                                Services</a>
                        </div>
                    </li> <!-- /Slide2 -->

                    <li class="slide_show slide_3" data-index='rs-381' data-transition='3dcurtain-vertical'
                        data-slotamount='default' data-easein='default' data-easeout='default'
                        data-masterspeed='default' data-rotate='0' data-saveperformance='off'
                        data-title='3D Curtain Vertical' data-description=''> <!-- Slide_3 -->

                        <img src="{{ asset('assets/website/images/home/slide-1.jpg') }}"alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            class="rev-slidebg">

                        <div class="tp-caption tp-resizeme" data-x="['left','left','left','left']"
                            data-hoffset="['0','0','30','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-169','-169','-139','-80']" data-transform_idle="o:1;"
                            data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                            data-start="2000" data-splitin="none" data-splitout="none">
                            <h1>Business Taken<br>to the New Heights</h1>
                        </div>
                        <div class="tp-caption tp-resizeme" data-x="['left','left','left','left']"
                            data-hoffset="['0','0','30','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-16','-16','-06','20']" data-transform_idle="o:1;"
                            data-transform_in="x:50px;opacity:0;s:1000;e:Power3.easeOut;"
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                            data-start="3000" data-splitin="none" data-splitout="none">
                            <p class="p_color">We’re here to offer the best support, to help you<br>troubleshoot any
                                business issues.</p>
                        </div>
                        <div class="tp-caption" data-x="['left','left','left','left']"
                            data-hoffset="['0','0','30','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['87','87','97','107']" data-transform_idle="o:1;"
                            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                            data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);cursor:pointer;"
                            data-transform_in="x:[-100%];z:0;rX:25deg;rY:-50deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;"
                            data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" data-start="4000"
                            data-splitin="none" data-splitout="none">
                            <a href="contact.html" class="contact_us_button tran3s s_color_bg theme_button">Contact
                                us</a>
                        </div>
                        <div class="tp-caption" data-x="['left','left','left','left']"
                            data-hoffset="['180','180','210','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['87','87','97','200']"
                            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                            data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(0, 133, 214, 1.00);cursor:pointer;"
                            data-transform_in="x:[100%];z:0;rX:25deg;rY:50deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;"
                            data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" data-start="4000"
                            data-splitin="none" data-splitout="none">
                            <a href="service.html" class="service_button tran3s p_color_bg theme_button">Our
                                Services</a>
                        </div>
                    </li> <!-- /Slide_3 -->

                    <li class="slide_show slide_3" data-index='rs-381' data-transition='3dcurtain-vertical'
                        data-slotamount='default' data-easein='default' data-easeout='default'
                        data-masterspeed='default' data-rotate='0' data-saveperformance='off'
                        data-title='3D Curtain Vertical' data-description=''> <!-- Slide_3 -->

                        <img src="{{ asset('assets/website/images/home/slide-1.jpg') }}" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            class="rev-slidebg">

                        <div class="tp-caption tp-resizeme" data-x="['left','left','left','left']"
                            data-hoffset="['0','0','30','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-169','-169','-139','-80']" data-transform_idle="o:1;"
                            data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                            data-start="2000" data-splitin="none" data-splitout="none">
                            <h1>Business Taken<br>to the New Heights</h1>
                        </div>
                        <div class="tp-caption tp-resizeme" data-x="['left','left','left','left']"
                            data-hoffset="['0','0','30','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-16','-16','-06','20']" data-transform_idle="o:1;"
                            data-transform_in="x:50px;opacity:0;s:1000;e:Power3.easeOut;"
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                            data-start="3000" data-splitin="none" data-splitout="none">
                            <p class="p_color">We’re here to offer the best support, to help you<br>troubleshoot any
                                business issues.</p>
                        </div>
                        <div class="tp-caption" data-x="['left','left','left','left']"
                            data-hoffset="['0','0','30','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['87','87','97','107']" data-transform_idle="o:1;"
                            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                            data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);cursor:pointer;"
                            data-transform_in="x:[-100%];z:0;rX:25deg;rY:-50deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;"
                            data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" data-start="4000"
                            data-splitin="none" data-splitout="none">
                            <a href="contact.html" class="contact_us_button tran3s s_color_bg theme_button">Contact
                                us</a>
                        </div>
                        <div class="tp-caption" data-x="['left','left','left','left']"
                            data-hoffset="['180','180','210','40']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['87','87','97','200']"
                            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                            data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(0, 133, 214, 1.00);cursor:pointer;"
                            data-transform_in="x:[100%];z:0;rX:25deg;rY:50deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;"
                            data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" data-start="4000"
                            data-splitin="none" data-splitout="none">
                            <a href="service.html" class="service_button tran3s p_color_bg theme_button">Our
                                Services</a>
                        </div>
                    </li> <!-- /Slide_3 -->

                </ul>
            </div> <!-- /main_slider -->
        </div> <!-- /rev_slider_wrapper -->
    </section> <!-- /banner -->




    <!-- Request Quote _____________________________________ -->
    <div class="request_quote">
        <div class="container">
            <p class="float_left">Kamulll group of Companies providing you the best consultancy for your business</p>
            <a href="#" class="theme_button s_color_bg float_right tran3s">Request Quote</a>
            <div class="clear_fix"></div>
        </div> <!-- End of .container -->
    </div> <!-- End of .request_quote -->



    <!-- Company Excellence _________________________________ -->

    <div class="company_excellance">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 single_excellance">
                    <div class="hexagon tran3s">
                        <span class="ficon flaticon-staticsscreen"></span>
                    </div> <!-- End of .hexagon -->

                    <div class="text">
                        <h5>Why Consult Us?</h5>
                        <span class="s_color_bg tran3s"></span>
                        <p class="tran3s">The Kamulll Group of Companies prides itself on delivering top-notch services
                            that help clients achieve their goals with ease and confidence. Whether it's navigating
                            complex financial landscapes, securing immigration status, clearing customs efficiently, or
                            Cash Advance and Loan services, Kamulll is a trusted partner in your success.</p>
                    </div> <!-- End of .text -->
                </div> <!-- End of .single_excellance -->

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 single_excellance">
                    <div class="hexagon tran3s">
                        <span class="ficon flaticon-statics"></span>
                    </div> <!-- End of .hexagon -->

                    <div class="text">
                        <h5>Pay for Success</h5>
                        <span class="s_color_bg tran3s"></span>
                        <p class="tran3s">We are focused on developing a strong Pay for Success field through market
                            bonds, traders, mutual funds, research and analysis.</p>
                    </div> <!-- End of .text -->
                </div> <!-- End of .single_excellance -->

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 single_excellance">
                    <div class="hexagon tran3s">
                        <span class="ficon flaticon-wheel"></span>
                    </div> <!-- End of .hexagon -->

                    <div class="text">
                        <h5>Tailor-Made Solutions</h5>
                        <span class="s_color_bg tran3s"></span>
                        <p class="tran3s">Holistic set-up, providing you sucess with optimal solutions from Wealth
                            Management and Investment Banking.</p>
                    </div> <!-- End of .text -->
                </div> <!-- End of .single_excellance -->

            </div> <!-- End of .row -->
        </div> <!-- End of .container -->
    </div> <!-- End of .company_excellance -->


    <!-- About Kamulll group of Companies & Testimonial ____________ -->

    <div class="about_testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about_Kamulll group of Companies">
                    <div class="theme_title">
                        <h3>About Kamulll Group of Companies</h3>
                    </div>
                    <p>The Kamulll Group of Companies is a multifaceted service provider offering a range of
                        professional services across various sectors. Our comprehensive suite of offerings caters to
                        both individual and corporate clients, ensuring expert guidance and efficient solutions <br>
                        <br>
                        We strive to build a relationship of trust with every client, for the long-term.70% of our work
                        is for clients that we have served for over 3 years.</p>
                </div> <!-- End of .about_Kamulll group of Companies -->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 testimonial">

                    <div class="theme_title">
                        <h3>Testimonials</h3>
                    </div>
                    <!-- __________________ testimonial Slider ____________ -->

                    <div class="slider_wrapper">
                        <div class="testimonial-carousel-content-box owl-carousel owl-theme">
                            <!-- SLide  -->
                            <div class="item">
                                <div class="text p_color_bg">
                                    <i>They have got my project on time with the competition with a highly skilled,
                                        well-organized and experienced team of professional Engineers.</i>
                                </div> <!-- End of .text -->
                                <div class="author">
                                    <img src="{{ asset('assets/website/images/home/placeholderFaces.jpg') }}"
                                        alt="Client Image" class="float_left border_round">
                                    <div class="author_name float_left">
                                        <h6 class="p_color">Mumba Lukombo <span></span></h6>
                                        <ul>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        </ul>
                                    </div> <!-- End of .author_name -->
                                </div> <!-- End of .author -->
                            </div>


                            <!-- SLide  -->
                            <div class="item">
                                <div class="text p_color_bg">
                                    <i>Kamulll group of Companies providing you the best consultancy for your business
                                        We serve clients at every level of their organization</i>
                                </div> <!-- End of .text -->
                                <div class="author">
                                    <img src="{{ asset('assets/website/images/home/placeholderFaces.jpg') }}"
                                        alt="Client Image" class="float_left border_round">
                                    <div class="author_name float_left">
                                        <h6 class="p_color">Aaron Mwelwa <span></span></h6>
                                        <ul>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        </ul>
                                    </div> <!-- End of .author_name -->
                                </div> <!-- End of .author -->
                            </div>


                            <!-- SLide  -->
                            <div class="item">
                                <div class="text p_color_bg">
                                    <i>They have got my project on time with the competition with a highly skilled,
                                        well-organized and experienced team of professional Engineers.</i>
                                </div> <!-- End of .text -->
                                <div class="author">
                                    <img src="{{ asset('assets/website/images/home/placeholderFaces.jpg') }}"
                                        alt="Client Image" class="float_left border_round">
                                    <div class="author_name float_left">
                                        <h6 class="p_color">Phiri James <span></span></h6>
                                        <ul>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        </ul>
                                    </div> <!-- End of .author_name -->
                                </div> <!-- End of .author -->
                            </div>

                            <!-- SLide  -->
                            <div class="item">
                                <div class="text p_color_bg">
                                    <i>Kamulll group of Companies providing you the best consultancy for your business
                                        We serve clients at every level of their organization</i>
                                </div> <!-- End of .text -->
                                <div class="author">
                                    <img src="{{ asset('assets/website/images/home/4.jpg') }}" alt="Client Image"
                                        class="float_left border_round">
                                    <div class="author_name float_left">
                                        <h6 class="p_color">Aaron Mwelwa <span></span></h6>
                                        <ul>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        </ul>
                                    </div> <!-- End of .author_name -->
                                </div> <!-- End of .author -->
                            </div>

                        </div> <!-- End of .testimonial-carousel-content-box -->
                        <div class="thumbnail_wrapper">
                            <div class="testimonial-carousel-thumbnail-box owl-carousel owl-theme">
                                <div class="item">
                                    <img src="{{ asset('assets/website/images/home/placeholderFaces.jpg') }}"
                                        alt="Image" />
                                </div>
                                <div class="item">
                                    <img src="{{ asset('assets/website/images/home/placeholderFaces.jpg') }}"
                                        alt="Image" />
                                </div>
                                <div class="item">
                                    <img src="{{ asset('assets/website/images/home/placeholderFaces.jpg') }}"
                                        alt="Image" />
                                </div>

                                <div class="item">
                                    <img src="{{ asset('assets/website/images/home/placeholderFaces.jpg') }}"
                                        alt="Image" />
                                </div>
                            </div> <!-- End of .sidebar-testimonial-carousel-thumbnail-box -->
                            <div class="clear_fix"></div>
                        </div> <!-- End of .thumbnail_wrapper -->

                    </div> <!-- End .slider_wrapper -->
                </div> <!-- End of .testimonial -->
            </div> <!-- End of .row -->
        </div> <!-- End of .container -->
    </div> <!-- End of .about_testimonial -->



    <!-- What Makes us Special _________________________ -->

    <div class="makesUs_special">
        <div class="overlay">
            <div class="container">
                <div class="theme_title">
                    <h2>What Makes us Special?</h2>
                </div>
                <div class="row">
                    <!-- _____________ Item ____________ -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="special_item">
                            <div class="icon float_left"><span class="ficon flaticon-peopletwo"></span></div>
                            <!-- End of .icon -->
                            <div class="text float_left">
                                <span class="timer" data-from="1" data-to="100" data-speed="5000"
                                    data-refresh-interval="50">100</span>
                                <p>Projects Completed</p>
                            </div> <!-- End of .text -->
                            <div class="clear_fix"></div>
                        </div> <!-- End of .special_item -->
                    </div> <!-- End of .col -->

                    <!-- _____________ Item ____________ -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="special_item">
                            <div class="icon float_left"><span class="ficon flaticon-screen"></span></div>
                            <!-- End of .icon -->
                            <div class="text float_left">
                                <span class="timer" data-from="100" data-to="230" data-speed="5000"
                                    data-refresh-interval="50">230</span>
                                <p>Consultants</p>
                            </div> <!-- End of .text -->
                            <div class="clear_fix"></div>
                        </div> <!-- End of .special_item -->
                    </div> <!-- End of .col -->

                    <!-- _____________ Item ____________ -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="special_item">
                            <div class="icon float_left"><span class="ficon flaticon-badge"></span></div>
                            <!-- End of .icon -->
                            <div class="text float_left">
                                <span class="timer" data-from="10" data-to="90" data-speed="4500"
                                    data-refresh-interval="50">90</span>
                                <p>Awwards winning</p>
                            </div> <!-- End of .text -->
                            <div class="clear_fix"></div>
                        </div> <!-- End of .special_item -->
                    </div> <!-- End of .col -->


                    <!-- _____________ Item ____________ -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="special_item">
                            <div class="icon float_left"><span class="ficon flaticon-smile"></span></div>
                            <!-- End of .icon -->
                            <div class="text float_left">
                                <span class="timer" data-from="1" data-to="100" data-speed="5000"
                                    data-refresh-interval="50">100</span><span>%</span>
                                <p>Satisfied clients</p>
                            </div> <!-- End of .text -->
                            <div class="clear_fix"></div>
                        </div> <!-- End of .special_item -->
                    </div> <!-- End of .col -->

                </div> <!-- End of .row -->
            </div> <!-- End of .container -->
        </div> <!-- End of .overlay -->
    </div> <!-- End of .makesUs_special -->




    <!-- Why Choose Us ________________________ -->

    <section class="why_choose_us">
        <div class="container">
            <div class="theme_title_center">
                <h2>Why Choose Kamulll group of Companies?</h2>
                <span></span>
            </div> <!-- End of .theme_title_center -->

            <div class="row">

                <!-- ______________ Item _____________ -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="choose_us_item tran3s">
                        <div class="icon p_color_bg border_round float_left"><span
                                class="ficon flaticon-hexagon"></span></div> <!-- End of .icon -->
                        <div class="text float_left">
                            <h5 class="tran3s">25 years of Experience</h5>
                            <p class="tran3s">We have over 25 years experience providing expert financial advice.</p>
                        </div> <!-- End of .text -->
                        <div class="clear_fix"></div>
                    </div> <!-- End of .choose_us_item -->
                </div> <!-- End of .col -->

                <!-- ______________ Item _____________ -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="choose_us_item tran3s">
                        <div class="icon p_color_bg border_round float_left"><span class="ficon flaticon-web"></span>
                        </div> <!-- End of .icon -->
                        <div class="text float_left">
                            <h5 class="tran3s">Global Solutions</h5>
                            <p class="tran3s">We present you the various topics of business consultations</p>
                        </div> <!-- End of .text -->
                        <div class="clear_fix"></div>
                    </div> <!-- End of .choose_us_item -->
                </div> <!-- End of .col -->

                <!-- ______________ Item _____________ -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="choose_us_item tran3s">
                        <div class="icon p_color_bg border_round float_left"><span class="ficon flaticon-user"></span>
                        </div> <!-- End of .icon -->
                        <div class="text float_left">
                            <h5 class="tran3s">Individual Approach</h5>
                            <p class="tran3s">We are always looking for specific approach to each cases.</p>
                        </div> <!-- End of .text -->
                        <div class="clear_fix"></div>
                    </div> <!-- End of .choose_us_item -->
                </div> <!-- End of .col -->

                <!-- ______________ Item _____________ -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="choose_us_item tran3s">
                        <div class="icon p_color_bg border_round float_left"><span
                                class="ficon flaticon-twopeople"></span></div> <!-- End of .icon -->
                        <div class="text float_left">
                            <h5 class="tran3s">Exclusive Partnerships</h5>
                            <p class="tran3s">We work with premier community development impact investors.</p>
                        </div> <!-- End of .text -->
                        <div class="clear_fix"></div>
                    </div> <!-- End of .choose_us_item -->
                </div> <!-- End of .col -->

                <!-- ______________ Item _____________ -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="choose_us_item tran3s">
                        <div class="icon p_color_bg border_round float_left"><span
                                class="ficon flaticon-people"></span></div> <!-- End of .icon -->
                        <div class="text float_left">
                            <h5 class="tran3s">Business Opportunities</h5>
                            <p class="tran3s">Raising business development, the involvement of partners.</p>
                        </div> <!-- End of .text -->
                        <div class="clear_fix"></div>
                    </div> <!-- End of .choose_us_item -->
                </div> <!-- End of .col -->

                <!-- ______________ Item _____________ -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="choose_us_item tran3s">
                        <div class="icon p_color_bg border_round float_left"><span
                                class="ficon flaticon-telephone"></span></div> <!-- End of .icon -->
                        <div class="text float_left">
                            <h5 class="tran3s">24/7 Online Support</h5>
                            <p class="tran3s">Assured of our support 24 hours a day, 7 days a week. </p>
                        </div> <!-- End of .text -->
                        <div class="clear_fix"></div>
                    </div> <!-- End of .choose_us_item -->
                </div> <!-- End of .col -->
            </div>
        </div> <!-- End of .container -->
    </section> <!-- End of .why_choose_us -->





    <!-- Awards Banner _________________________  -->

    <div class="award_banner">
        <div class="overlay">
            <div class="container">
                <h2>Looking for Awards Winning Business Consultant?</h2>
                <p>The Consumers' Choice Award was established to identify and promote business excellence. The award
                    utilizes a unique survey that asks consumers to choose the best in their city. Leading independent
                    research organizations</p>
                <h5>Lets Start Your Business Today - <a href="contact.html">Contact Us</a></h5>
            </div> <!-- End of .container -->
        </div> <!-- End of .overlay -->
    </div> <!-- End of .award_banner -->


    <!-- Request Call Back _____________________ -->

    <div class="req_callBack">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 callBack_text">
                    <div class="theme_title">
                        <h2>Request a Call Back</h2>
                    </div>

                    <h5>If you would like to contact someone by phone, fax or post and you don't know the address,
                        please consult our world wide branch <a href="#" class="p_color">directory.</a></h5>

                    <p><span>For Business: </span> For Business inquiry fill our short feedback form or you can also
                        send us an <a href="#" class="s_color" title="E-mail us">email</a> and we’ll get in
                        touch shortly, or Troll Free Number <a href="#" class="p_color" title="Call us">(260)
                            765675740, (260) 957713086</a></p>

                    <p><span>For Customer Support :</span> If you have any doubt about Kamulll group of Companies
                        WordPress or how we can support your business, Send us an <a href="#" class="s_color"
                            title="E-mail us">email</a> and we’ll get in touch shortly, or Contact via <a
                            href="#" class="s_color" title="Contact via Support Forum">Support Forum</a></p>

                    <p><span>Office Hours :</span> 07:30 and 19:00 Monday to Saturday,Sunday - Holiday</p>
                </div> <!-- End of .callBack_text -->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 req_callBackForm">
                    <form action="#">
                        <div class="input_group">
                            <label>Your Name (required)</label>
                            <input type="text">
                        </div> <!-- End of .input_group -->

                        <div class="input_group">
                            <label>Your Email (required)</label>
                            <input type="email">
                        </div> <!-- End of .input_group -->

                        <div class="input_group">
                            <label>Phone Number (required)</label>
                            <input type="text">
                        </div> <!-- End of .input_group -->

                        <div class="input_group">
                            <label>I would like to discuss:</label>
                            <select class="selectmenu">
                                <option selected="selected">&emsp;</option>
                                <option value="#">Accounting & Tax Services Advisory</option>
                                <option value="#"> Immigration Services</option>
                                <option value="#">Customs and Clearing Services</option>
                                <option value="#">Cash Advance and Loan Services</option>
                                <option value="#">Global Risk & Investigations </option>
                                <option value="#">Audit & Assurance</option>
                                <option value="#">Trades & Stocks</option>
                                <option value="#">Information Technology</option>
                            </select>
                        </div> <!-- End of .input_group -->

                        <button class="s_color_bg tran3s font_fix">Submit</button>
                    </form>
                </div> <!-- End of .req_callBackForm -->
            </div> <!-- End of .row -->
        </div> <!-- End of .container -->
    </div> <!-- End of .req_callBack -->


    <section id="google-map-area">
        <!-- <div class="google-map-home skin-2" id="contact-google-map" data-map-lat="40.925372" data-map-lng="-74.276544" data-icon-path="images/logo/1.png" data-map-title="Awesome Place" data-map-zoom="12"></div> -->
        <div style="max-width:100%;list-style:none; transition: none;overflow:hidden;width:1900px;height:474px;">
            <div id="display-google-map" style="height:100%; width:100%;max-width:100%;"><iframe
                    style="height:100%;width:100%;border:0;" frameborder="0"
                    src="https://www.google.com/maps/embed/v1/place?q=PLOT+1,+KALABO+COURT+,+RHODESPARK,+LUSAKA,+ZAMBIA&key={{$googleMapsKey}}"></iframe>
            </div><a class="from-embedmap-code" href="https://www.bootstrapskins.com/themes"
                id="make-map-data">premium bootstrap themes</a>
            <style>
                #display-google-map img {
                    max-width: none !important;
                    background: none !important;
                    font-size: inherit;
                    font-weight: inherit;
                }
            </style>
        </div>

        <div class="address_wrapper">
            <div class="container">
                <div class="map_address">
                    <div class="item">
                        <h5 class="s_color">Head Quator - Zambia</h5>

                        <ul>
                            <li><i class="fa fa-map-marker s_color" aria-hidden="true"></i>PLOT 1, KALABO COURT ,
                                RHODESPARK, LUSAKA, ZAMBIA</li>
                            <li><i class="fa fa-phone s_color" aria-hidden="true"></i><a
                                    href="tel:(260) 765675740">(260) 765675740, (260) 957713086</a></li>
                            <li><i class="fa fa-envelope s_color" aria-hidden="true"></i><a
                                    href="#">info@kamulllgroup.co.zm</a></li>
                        </ul>
                    </div> <!-- End of .item -->



                    <div class="item">
                        <h5 class="s_color">Head Quator - Zambia</h5>

                        <ul>
                            <li><i class="fa fa-map-marker s_color" aria-hidden="true"></i>PLOT 1, KALABO COURT ,
                                RHODESPARK, LUSAKA, ZAMBIA</li>
                            <li><i class="fa fa-phone s_color" aria-hidden="true"></i><a
                                    href="tel:(260) 765675740">(260) 765675740, (260) 957713086</a></li>
                            <li><i class="fa fa-envelope s_color" aria-hidden="true"></i><a
                                    href="#">info@kamulllgroup.co.zm</a></li>
                        </ul>
                    </div> <!-- End of .item -->

                </div> <!-- End of .map_address -->
            </div>
        </div> <!-- End of .address_wrapper -->
    </section>

</x-website-layout>
