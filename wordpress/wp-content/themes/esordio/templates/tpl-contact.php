<?php /* Template Name: Template Contact 

             
               */ 
               get_header(); ?> 
  

  <div class="pad-div"></div>
  <section>
    <div class="container contact-sections">
      <div class="row">
        <div class="col-md-6 part-1">
          <div class="head">
            <h2>GET IN TOUCH</h2>
          </div>
          <div class="appointments">
            <div class="location-a">
              <span><img src="<?php echo esc_url(get_template_directory_uri()."/images/location.svg"); ?>" alt="Image" class="icon-li"></span>
              <p>Fortune towers,24/2435/c, <br>
                Thondayad, Chevarambalam PO. <br>
                Kozhikode - 673017
                <br>
              </p>
            </div>
            <div class="mail">
              <img src="<?php echo esc_url(get_template_directory_uri()."/images/mail.svg"); ?>" alt="Image" class="icon-li">
              <a href="mailto:info@esordio.in">info@esordio.in</a>
            </div>
            <div>
              <img src="<?php echo esc_url(get_template_directory_uri()."/images/telephone.svg"); ?>" alt="Image" class="icon-li">
              <span><a href="tel: 91 8157 995 577"> 91 8157 995 577</a></span>
            </div>
          </div>



        </div>
        <div class="col-md-6 part-2">
          <div class="head-h3">
            <form action="" method="post">
              <input type="text" name="userName" placeholder="Name" required>
              <br>
              <input type="number" name="userPhone" placeholder="Number" required>
              <br>
              <input type="email" name="userEmail" placeholder="Email">
              <br>
              <textarea name="userMessage" id="" cols="" rows="5" placeholder="Message"></textarea>
              <br>
              <input type="submit" value="Submit" name="send" class="submit">
            </form>
          </div>

        </div>
      </div>
    </div>
  </section>





  <section style="display: none;">
    <div class="agileits-w3layouts-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15652.015831719982!2d75.7837097!3d11.2611186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba65956c931d0fd:0xa7f288fe7b09c99a!2sS G Arcade!5e0!3m2!1sen!2sin!4v1680512658109!5m2!1sen!2sin" allowfullscreen></iframe>
    </div>
  </section>

  

               <?php
              // get_sidebar();
               get_footer(); 
               ?>
               