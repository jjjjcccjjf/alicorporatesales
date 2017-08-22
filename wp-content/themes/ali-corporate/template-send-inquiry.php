<?php
/* Template Name: Send inquiry */
get_header();
while(have_posts()): the_post();
?>
<section class="projects">

    <article class="forms">
     <h3>Inquire Now</h3>
       <aside class="tab">
         <ul>
           <li><a href="inquire-now.html">Am I qualified for Acentives Discount?</a></li>
           <li class="active"><a href="send-inquiry.html">Send Inquiry</a></li>

         </ul>
       </aside>
       <div class="forms-main">
         <p>Fill out the form below:</p>
         <ul>
           <li>
             <label>Your Employer</label>
             <select>
                 <option>List of Employer</option>
                 <option>AC Energy and Infrastructure Group (and subsidiaries)</option>
                 <option>Accendo Commercial Corp</option>
                 <option>Affinity Express</option>
                 <option>Affordable Private Education Centers (APEC)</option>
                 <option>Automobile Central Enterprise, Inc. (Volkswagen Philippines)</option>
                 <option>Avida Land Corp.</option>
                 <option>Ayala Aviation Corporation</option>
                 <option>Ayala Corporation</option>
                 <option>Ayala Education</option>
                 <option>Ayala Foundation, Inc.</option>
                 <option>Ayala Hotels, Inc.</option>
                 <option>Ayala Land Commercial REIT, Inc.</option>
                 <option>Ayala Land International Sales, Inc.</option>
                 <option>Ayala Land Malls, Inc.</option>
                 <option>Ayala Land Sales, Inc.</option>
                 <option>Ayala Land, Inc.</option>
                 <option>Ayala Property Management Corporation</option>
                 <option>Ayala Theatres Management, Inc.</option>
                 <option>Bank of the Philippine Islands</option>
                 <option>BellaVita Land Corp.</option>
                 <option>BPI Philam Life Assurance Corp.</option>
                 <option>BPI/MS Insurance Corporation</option>
                 <option>CDO Gateway Corp.</option>
                 <option>Cebu City Marriott Hotel</option>
                 <option>Cebu Holdings, Inc.</option>
                 <option>City Sports Club</option>
                 <option>Fort Bonifacio Development Corp.</option>
                 <option>Generika Drugstore</option>
                 <option>Globe Telecom, Inc.</option>
                 <option>Holiday Inn &amp; Suites Makati</option>
                 <option>Honda Cars Cebu, Inc</option>
                 <option>Honda Cars Makati, Inc.</option>
                 <option>HRMall, Inc.</option>
                 <option>Integrated Microelectronics, Inc.</option>
                 <option>Isuzu Automotive Dealership, Inc.</option>
                 <option>Isuzu Cebu, Inc. / Isuzu Iloilo Corporation</option>
                 <option>Laguna Technopark, Inc.</option>
                 <option>Leisure and Allied Industries Philippines, Inc.</option>
                 <option>Light Rail Manila Corporation</option>
                 <option>Makati Development Corporation</option>
                 <option>Manila Water Company, Inc.</option>
                 <option>Mercado General Hospital Inc. Group of Companies (Qualimed)</option>
                 <option>North Triangle Depot Commercial Corporation</option>
                 <option>Northbeacon Commercial Corporation</option>
                 <option>Phil. Energy</option>
                 <option>Primavera Towncentre Inc</option>
                 <option>Raffles &amp; Fairmont Hotel</option>
                 <option>Sonoma Services</option>
                 <option>South Luzon Thermal Energy Corp.</option>
                 <option>Station Square East Commercial Corporation</option>
                 <option>Subic Bay Town Center</option>
                 <option>Ten Knots Development Corporation- El Nido Resorts</option>
                 <option>University of Nueva Caceres (UNC)</option>
                 <option>Varejo Corp.</option>
                 <option>Zalora</option>
             </select>
           </li>
           <li>
             <label>Your Name</label>
             <input type="text" name="name">
           </li>
           <li>
             <label>Your Email</label>
             <input type="email" name="email">
           </li>
           <li>
             <label>Your Telephone at Work</label>
             <input type="text" name="phone">
           </li>
           <li>
             <label>Your Mobile</label>
             <input type="text" name="mobile">
           </li>
           <li>
             <label>Your Message</label>
             <textarea></textarea>
             <p><input type="checkbox" name=""> Please send me more information about the Employee Discount</p>
           </li>

           <li>

             <input type="submit" name="">
           </li>
         </ul>
       </div>

    </article>

   <!-- Project Details -->
     <div id="projdesc" class="white-popup mfp-hide">
       <h3>Project Title</h3>
       <div>
         <figure>
           <img src="images/projectimg.jpg">
         </figure>
         <article>
           <ul>
             <li>
               <h6>Price:</h6>
               <p>P4.1M - P33M</p>
             </li>
             <li>
               <h6>Location:</h6>
               <p>Name of Location</p>
             </li>
             <li>
               <h6>Type:</h6>
               <p>Condominium</p>
             </li>
             <li>
               <h6>Size:</h6>
               <p>36sqm - 161sqm</p>
             </li>
             <li><a href="#">View Project</a></li>
           </ul>

         </article>
         <aside>
             <ul>
               <li><a href="inquire-now.html">Inquire Now</a></li>
               <li><a href="#">Refer Now</a></li>
               <li><a href="#">Download Forms</a></li>
             </ul>
           </aside>
       </div>
     </div>
   <!-- Project Details -->
    <div class="other-links">
      <?php displaySideNav('generic'); # Find this in the header ?>
    </div>
</section>
<?php
endwhile;
get_footer();
