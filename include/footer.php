<footer class="footer-container"   style="padding:50px; color:white; background-color:#333740;">
    
    <!-- Back to top button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Back to top</button>
    
        <script>
            // Script for the back to top button Get the button
            var mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

              function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                  mybutton.style.display = "block";
                } else {
                  mybutton.style.display = "none";
                }
              }

              // When the user clicks on the button, scroll to the top of the document
              function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
              }
        </script>
        
        <style>
        
          /* Back to Top button styling */
          #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #333740;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
          }
          
          #myBtn:hover {
            background-color: #EEC494;
            color: #000000;
          }
        </style>

    <div class="footer-links" style="text-align:center;">
        <div>
          <a href="https://visioncollege.ac.nz/" target="_blank"> <img src="img/icons/Instagram.png" alt="Instagram icon" width="40" height="40"></a>
          <a href="https://visioncollege.ac.nz/" target="_blank"> <img src="img/icons/Twitter.png" alt="Twitter icon" width="80" height="50"></a>
          <a href="https://visioncollege.ac.nz/" target="_blank"> <img src="img/icons/Facebook.png" alt="Facebook icon" width="50" height="50"></a>
                
            <p style=" padding-top:10px;">&copy; 2019 Du Plessis Cole Realtors</p>
           
        </div>
    </div><!--  -->
</footer>
