@extends('master.master')
@section('title')
Liên hệ
@endsection
@section('content')
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.html">Home</a>
                    <i>|</i>
                </li>
                <li>contact Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- contact page -->
<div class="contact-w3l">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Contact Us
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <!-- contact -->
        <div class="contact agileits">
            <div class="contact-agileinfo">
                <div class="contact-form wthree">
                    <form action="#" method="post">
                        <div class="">
                            <input type="text" name="name" placeholder="Name" required="">
                        </div>
                        <div class="">
                            <input class="text" type="text" name="subject" placeholder="Subject" required="">
                        </div>
                        <div class="">
                            <input class="email" type="email" name="email" placeholder="Email" required="">
                        </div>
                        <div class="">
                            <textarea placeholder="Message" name="message" required=""></textarea>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="contact-right wthree">
                    <div class="col-xs-7 contact-text w3-agileits">
                        <h4>GET IN TOUCH :</h4>
                        <p>
                            <i class="fa fa-map-marker"></i> 123 Sebastian, NY 10002, USA.</p>
                        <p>
                            <i class="fa fa-phone"></i> Telephone : 333 222 3333</p>
                        <p>
                            <i class="fa fa-fax"></i> FAX : +1 888 888 4444</p>
                        <p>
                            <i class="fa fa-envelope-o"></i> Email :
                            <a href="mailto:example@mail.com">mail@example.com</a>
                        </p>
                    </div>
                    <div class="col-xs-5 contact-agile">
                        <img src="images/contact2.jpg" alt="">
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //contact -->
    </div>
</div>
<!-- map -->
<div class="map w3layouts">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1521735277706!2d106.67613701462112!3d10.799654761718038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528d7bcf5e32b%3A0xf19e40783f62920f!2sTuoi%20Tre%20Tower!5e0!3m2!1svi!2s!4v1602921864710!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!-- //map -->
@endsection
