<!-- Footer -->
<footer class="bg-dark text-white py-5">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row pb-5">

      <!-- Grid column -->
      <div class="col-md-3 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase" > Site Links </h5>
        <div class="d-flex flex-column">
          <a href="index.php" class="link_to_white"> Home </a>
          <a href="about.php" class="link_to_white"> About us </a>
        </div>
      </div>
      <!-- Grid column -->


      <!-- Grid column -->
      <div class="col-md-3 mt-3">

        <!-- Links -->
        <h5 class="text-uppercase"> Terms and Condition </h5>
        <div class="d-flex flex-column">
          <a href="terms.php" class="link_to_white">Terms and condition </a>
          <a href="privacy.php" class="link_to_white"> Privacy </a>
        </div>
      </div>
      <!-- Grid column -->

      <div class="col-md-3 mt-3">
        <div class="text-uppercase h5">Join Us </div>
        <a href="login.php" class="btn btn-outline-primary btn-lg"> Join now </a>
      </div>


      <div class="col-md-3 mt-3">
        <div class="text-uppercase h4"> Social Media </div>

        <a class="pr-2 text-white social" href="https://www.facebook.com/" target="_blank" class="text-white"><i
            class="fab fa-2x fa-facebook" data-aos="slide-left"></i> </a>
        <a class="pr-2 text-white social" href="https://www.instagram.com/" target="_blank" class="text-white"><i
            class="fab fa-2x fa-instagram" data-aos="slide-right"></i> </a>
        <a class="pr-2 text-white social" href="https://twitter.com/" target="_blank" class="text-white"><i
            class="fab fa-2x fa-twitter" data-aos="slide-up"></i> </a>
        <a class="pr-2 text-white social" href="https://www.linkedin.com/" target="_blank" class="text-white"><i
            class="fab fa-2x fa-linkedin" data-aos="slide-down"></i> </a>


      </div>
    </div>

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="border border-bottom-0 border-right-0 border-left-0 border-info text-center py-3"> &copy;
    <?php echo date('Y'); ?> All rights reserved
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>

  // make social icon large in size
  $(".social").hover(function () {
      $(this).addClass('text-primary');
      $(this).css('text-decoration', 'none');
    },
    function () {
      $(this).removeClass("text-primary");
    }
  );

// change the color of link 
$(".link_to_white").hover(function(){
  $(this).addClass("text-white").css('text-decoration','none');
},
function(){
  $(this).removeClass("text-white");
}
)

</script>
</body>

</html>