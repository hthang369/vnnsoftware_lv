<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>{{$webName}}</h3>
              <p> {{$webAddess}}<br>
                <strong>Phone:</strong> {{ $webPhone }}<br>
                <strong>Email:</strong> {{ $webEmail }}<br>
              </p>
              <div class="social-links mt-3">
                {!! $footerSocial->text !!}
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 col-6 footer-links">
            <h4>Useful Links</h4>
            {!! $footerMenu !!}
          </div>

          <div class="col-lg-3 col-md-6 col-6 footer-links">
            <h4>Our Services</h4>
            {!! $footerOurMenu !!}
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container text-center">
      <div class="copyright">
        © Copyright <strong><span>VNNIT</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>
