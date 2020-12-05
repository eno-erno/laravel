<footer class="bg-dark text-white">
  <div class="container py-4">
    <div class="row py-5">
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="text-uppercase mb-3">Customer services</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="#">Help &amp; Contact Us</a></li>
          <li><a class="footer-link" href="#">Returns &amp; Refunds</a></li>
          <li><a class="footer-link" href="#">Online Stores</a></li>
          <li><a class="footer-link" href="#">Terms &amp; Conditions</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="text-uppercase mb-3">Company</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="#">What We Do</a></li>
          <li><a class="footer-link" href="#">Available Services</a></li>
          <li><a class="footer-link" href="#">Latest Posts</a></li>
          <li><a class="footer-link" href="#">FAQs</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h6 class="text-uppercase mb-3">Social media</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="#">Twitter</a></li>
          <li><a class="footer-link" href="#">Instagram</a></li>
          <li><a class="footer-link" href="#">Tumblr</a></li>
          <li><a class="footer-link" href="#">Pinterest</a></li>
        </ul>
      </div>
    </div>
    <div class="border-top pt-4" style="border-color: #1d1d1d !important">
      <div class="row">
        <div class="col-lg-6">
          <p class="small text-muted mb-0">&copy; 2020 All rights reserved.</p>
        </div>
        <div class="col-lg-6 text-lg-right">
          <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstraptemple.com/p/bootstrap-ecommerce">Bootstrap Temple</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>
</div>
      <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
      @yield('js')
      <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/lightbox2/js/lightbox.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/nouislider/nouislider.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/owl.carousel2/owl.carousel.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
      <script src="{{asset('frontend/js/front.js')}}"></script>
      <script>
        function injectSvgSprite(path) {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
              var div = document.createElement("div");
              div.className = 'd-none';
              div.innerHTML = ajax.responseText;
              document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        injectSvgSprite(`https://bootstraptemple.com/files/icons/orion-svg-sprite.svg`); 
        
      </script>

    
  </body>
</html>