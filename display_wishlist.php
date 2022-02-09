<!-- header -->
<?php 
$page_title = "Home";
include 'include/head.php'; 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Du Plessis Cole Realators - Home</title>

    <style>
             /*bootstrap styling starts*/
            @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }
                    
            .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
            }
            /*bootstrap styling ends*/
             
            /* On screens that are 992px wide or less */
            @media screen and (max-width: 992px) {
            .card_body {
                width: 60%;
                height: auto;
              }
            }

            /* Responsive for tablets/ipads */ /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
            @media (min-width:641px)  { 
            .card_body {
              width:60%;
              height:auto;
              }    
            }

            /* Responsive for phones */
            @media screen and (max-width: 600px) {
            .myColumn {
                width: 100%;
                display: block;
                align-content: center;
              }
            }
            
            /* Float cards one after another */
            .myColumn {
              position: relative;
              left: 8%;
              right: 8%;
              padding: 0 10px;
              max-width: 800px;
            }

            .banner { /*styling for the banner to introduce the page*/
              max-width: 100%;
              height: auto;
            }

            body { /*The font family used in the website*/
                  font-family: Arial, Helvetica, sans-serif;
            }
            
            html, body {/*make sure elements fits on the page*/
                  max-width: 100%;
                  overflow-x: hidden;
            }
            
            /*Give the achor tage with this class the color gray and remove underline in all events.*/
          .link, .link:visited, .link:hover, .link:active, .link:link { 
              color: gray; 
              text-decoration: none;
            }
            
          /* Remove extra left and right margins, due to padding */
          .myRow {
             position: relative;
             right: 35%;
             left: 23%;
          }
          
          /* Clear floats after the columns */
          .myRow:after {
            content: "";
            display: table;
            clear: both;
          }

          ul.houseSpec > li{ /*style the list of the icons on the property cards*/
              display: inline-block;
          }
          
          /* navigation buttons between  property pages */
          .mybutton{ 
             position: relative;
             right: 45%;
             left: 27%;
          }

          /* Style the counter cards */
          .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            background-color: #f1f1f1;
          }

        *{
            box-sizing: border-box;
        }

        .filter_style { /* Style for the filter of the property*/
          position: relative;
          right: 25%;
          left: 25%;
        }
    </style>
  </head>
  
  <body>
      
<main role="main">
  <!--the banner for this page -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
          <img class="banner" src="img/banner/home_pg.jpg" alt="image banner: a big house with a swimming pool" >
      </div>
    </div>
  </div>
    <div class="card_body">
        <div class="myRow">
                <?php
                    //display user property wishlist
                    if(isset($_COOKIE['user'])) { // is $_COOKIE['user'] empty / is user logged in 
                    
                            // build query to find all Properties in users wishlist 
                            $query = "SELECT * 
                              FROM wishlist_tb
                              JOIN property_tb ON wishlist_tb.Property_id=property_tb.Property_id AND wishlist_tb.User_id = {$_COOKIE['user']}
                              JOIN pricetype_tb ON property_tb.PriceType_id = pricetype_tb.PriceType_id
                              JOIN propertyrecord_tb ON property_tb.PropertyRecord_id = propertyrecord_tb.PropertyRecord_id";

                        $result = mysqli_query($dbc, $query); // run query 
                        while($row=mysqli_fetch_assoc($result)){ //Fetch a result row as a numeric array and as an associative(string) array
                            
                ?>          <!--Display Wishlist-->
                            <div class="myColumn">
                                <a href="property.php?Property_id=<?php echo $row['Property_id']?>" class="link"><!--link the cards to the property page-->
                                    <div class="card mb-3" style="max-width: 800px;"><!--Set card size-->
                                        <div class="row no-gutters">
                                            <div class="col-md-4"><!--Property image column-->
                                                <br><!--Display Property image -->
                                                <img src="<?php echo $row['Property_image'] ?>" style="height:180px; width:180px;" class="card-img" alt="Property: <?php echo $row['PropertyName']?>">
                                            </div>
                                            <div class="col-md-8"><!--Property information column-->
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $row['PropertyName']?></h5>
                                                    <p class="card-text"><?php echo $row['PropertyDescription']?><strong>Click me to read more.</strong></p>
                                                    <ul class="houseSpec" style="list-style-type: none;">
                                                        <!--Display a features of Property-->
                                                        <br>
                                                        <li><a href="https://icons8.com/icon/10771/sleeping-in-bed" target="_blank"><img src="img/icons/bedroom.png" title='Bed Room' data-toggle='tooltip' width="26px" height="26px" alt="icon: bedroom" target="_blank"><a/> <?php echo $row['bedRoom']?></li>
                                                        <li><a href="https://icons8.com/icon/8076/garage" target="_blank"><img src="img/icons/garage.png" title='Garage' data-toggle='tooltip' width="26px" height="26px" alt="icon: garage" target="_blank"></a> <?php echo $row['Garage']?></li>
                                                        <li><a href="https://icons8.com/icon/66908/sofa" target="_blank"><img src="img/icons/livingroom.png" title='Living room' data-toggle='tooltip' width="26px" height="26px" alt="icon: livingroom" target="_blank"></a> <?php echo $row['livingRoom']?></li>
                                                        <li><a href="https://icons8.com/icon/11516/bathtub" target="_blank"><img src="img/icons/bathroom.png" title='Bath room' data-toggle='tooltip' width="26px" height="26px" alt="icon: bathroom" target="_blank"></a> <?php echo $row['bathRoom']?></li>
                                                        <li><strong>Size:</strong> <?php echo $row['Size'] ?> m2</li>
                                                         <?php
                                                            // Check if property is Sold 
                                                            if($row['IsSold'] == 'TRUE'){
                                                               echo '<li class="float-right">Sold</li>'; 
                                                            }else{
                                                                 $priceType = $row['PriceType'];
                                                                 echo "<li class='float-right'> $priceType </li>"; 
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>   
                            </div><!--End of myColumn div-->
                <?php
                        }
                    }else{
                        echo "Cookies are disabled.";
                    }
                    mysqli_close($dbc); // Close the connection
                ?>
        </div><!-- End of myRow div -->
        
    </div><!-- End of card-body div -->
        <br>
        <br>

  <!-- FOOTER -->
    <?php 
   include 'include/footer.php'; 
   ?>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>');</script><script src="JavaScript/bootstrap.bundle.js" ></script></body>
</body>
</html>