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
            <h4>@widget('text_ournews', 'title')</h4>
            <div class="widget_content">@widget('text_ournews')</div>
          </div>

        </div>
      </div>
    </div>

    <div class="container text-center">
      <div class="copyright">
        @widget('text_copyright')
      </div>
      <div class="credits">
          @widget('text_footer')
      </div>
    </div>
  </footer>
