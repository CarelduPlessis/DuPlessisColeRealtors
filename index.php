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
              left: 18%;
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
            
            html, body { /*make sure elements fits on the page*/
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
             left: 42%;
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
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%;">
      <div class="carousel-inner">
          <div class="carousel-item active" style="object-fit: contain;">
            <img class="banner" src="img/banner/home_pg.jpg" alt="image banner: a big house with a swimming pool" >
        </div>
      </div>
    </div>
    
    <!--     Research about Next and Previous buttons 
    
    Pagination in Php with Next and Previous Button - by OnlineITtuts Tutorials
    https://www.youtube.com/watch?v=qxNXS5PeID4  
    
    Advanced Ajax Pagination with PHP and MySQL
    https://webdamn.com/advanced-ajax-pagination-with-php-and-mysql/
    
    Advanced Ajax Pagination PHP,MySQL Using JQuery
    https://www.phpflow.com/php/advanced-ajax-pagination-phpmysql-using-jquery/
    
    Advanced Jquery Pagination using Ajax and php - Next and previous links - Part 1
    https://www.youtube.com/watch?v=c3UMnVQbkEY
    
    Advanced Jquery Pagination using Ajax and php - Querying the ajax page - Part2
    https://www.youtube.com/watch?v=BYDPJEh8Lh0
    
    Advanced Jquery Pagination using Ajax and php - Next and previous links - Part 3
    https://www.youtube.com/watch?v=1xtcjNsm-dc
    
    Advanced Jquery Pagination using Ajax and php - Clicked link highlighter
    https://www.youtube.com/watch?v=NbA_tVtcnvc
    
    Advanced Jquery Pagination using Ajax and php - Setting up the ajax page - Part 1
    https://www.youtube.com/watch?v=RGd3UjqYamo
    
    Advanced Jquery Pagination using Ajax and php - Setting up the ajax page - Part2
    https://www.youtube.com/watch?v=b3qGM5odimU
    
    Advanced Jquery Pagination using Ajax and php - Setting up the ajax page - Part3
    https://www.youtube.com/watch?v=pXHP6KhTrp8
    
    Advanced Jquery Pagination using Ajax and php - Querying the ajax page - Part1
    https://www.youtube.com/watch?v=9HSOAfRSFnQ
    
    Advanced Jquery Pagination using Ajax and php - Querying the ajax page - Part2
    https://www.youtube.com/watch?v=BYDPJEh8Lh0
    
    Advanced Jquery Pagination using Ajax and php - Querying the ajax page - Part3
    https://www.youtube.com/watch?v=ONLMnXT7C9c
    
    Advanced Jquery Pagination using Ajax and php - Querying the ajax page - Part4
    https://www.youtube.com/watch?v=Bb3R_qmOFAE
    
    Advanced Jquery Pagination using Ajax and php - Introduction
    https://www.youtube.com/watch?v=5fxQ5XDmeeU
    
    Advanced Jquery Pagination using Ajax and php - Setting up the html
    https://www.youtube.com/watch?v=OMNM0Trsmyc -->
    
   
        <div class="filter_style">
            <h1>Filter Properties by City</h1>
            <form action="filterProperty.php?" method="get" multiple>
                    <ul>
                  <?php
                      $filter = []; // stop the dumplication of check box values
                      
                      $query1 = "SELECT * FROM propertycity_tb"; // query all the citys stored in the database tables
                      
                      $result1 = mysqli_query($dbc, $query1); // run query
                      
                      while($row=mysqli_fetch_assoc($result1)){ // Fetch a result row as an associative array // https://www.geeksforgeeks.org/associative-arrays-in-php/
                  ?>
            
                  <?php
                      if(!in_array($row['PropertyCity'], $filter)){ // if city is in array then run code below
                      $filter=array($row['PropertyCity']); // add city to array
                  ?>
                  
                      <!--Create check box with city as the value-->
                      <i><input type="radio" name="city" value="<?php echo $row['PropertyCity']?>"><?php echo $row['PropertyCity']?></i>
                  
                  <?php
                  
                      } // end of if statment 
                  } //end of while loop
                  ?>
                    </ul>
                    <input  type="submit" value="filter property">
                    
            </form>
            <hr align="left" width="50%">
        </div><!-- End of filter_style -->
            
        <div class="card_body">
            <div class="myRow"><!-- Displays propertites -->
                <?php
                
                    if(isset($_GET['page'])){ // if page is value is not empty then
                        $page = $_GET['page']; // get page value from url 
                    }else{ // other wise 
                       $page = 1; //declare page variable value as one
                    }
                    
                    $num_per_page = 04; // set the number of properties per page
                    $start_from = ($page-1)*04; // work out where the quary should start in the table.
                    
                    // Display the 4 properties per page
                    //build the query
                    /*
                    $query = "SELECT * FROM property_tb 
                    JOIN propertyrecord_tb ON property_tb.PropertyRecord_id = propertyrecord_tb.PropertyRecord_id
                    JOIN pricetype_tb ON property_tb.PriceType_id = pricetype_tb.PriceType_id
                    LIMIT $start_from, $num_per_page";*/

                    $query = "SELECT * FROM property_tb 
                    JOIN propertycity_tb ON property_tb.PropertyCity_id = propertycity_tb.PropertyCity_id 
                    JOIN propertysuburb_tb ON property_tb.PropertySuburb_id = propertysuburb_tb.PropertySuburb_id 
                    JOIN Propertystreet_tb ON property_tb.PropertyStreet_id = propertystreet_tb.PropertyStreet_id 
                    JOIN propertyPost_tb ON property_tb.PropertyPost_id = propertypost_tb.PropertyPost_id 
                    JOIN propertyrecord_tb ON property_tb.PropertyRecord_id = propertyrecord_tb.PropertyRecord_id
                    JOIN pricetype_tb ON property_tb.PriceType_id = pricetype_tb.PriceType_id
                    LIMIT $start_from, $num_per_page";



 
                    $result = mysqli_query($dbc, $query); // run query 
                    while($row=mysqli_fetch_assoc($result)){ // Fetch a result row as an associative array // https://www.geeksforgeeks.org/associative-arrays-in-php/
                ?>
                
                        <div class="myColumn">
                            <!--Get property id to be used as an identifier -->
                            <a href="property.php?Property_id=<?php echo $row['Property_id']?>" class="link"> <!--link the cards to the property page-->
                                <div class="card mb-3" style="max-width: 900px;"> <!--Set card size-->
                                    <div class="row no-gutters" >
                                        <div class="col-md-4"><!--Property image column-->
                                            <br>
                                            <!--Display Property image -->
                                            <img src="<?php echo $row['Property_image'] ?>" style="height:180px; width:180px;" class="card-img" alt="Property: <?php echo $row['PropertyName']?>">
                                        </div>
                                        <div class="col-md-8"><!--Property information column-->
                                            <div class="card-body">
                                                <!--Display Property Name -->
                                                <h5 class="card-title"><?php echo $row['PropertyName']?></h5><!--Display Property Name in card as the title-->
                                                <!--Display Brief description of the Property-->
                                                <p class="card-text"><?php echo $row['Brief']?><strong>Click me to read more.</strong></p>
                                                <ul class="houseSpec" style="list-style-type: none;">
                                                    <br>
                                                    <!--Display a features of Property-->
                                                    <li><a href="https://icons8.com/icon/10771/sleeping-in-bed" target="_blank"><img src="img/icons/bedroom.png" title='Bed Room' data-toggle='tooltip' width="26px" height="26px" alt="icon: bedroom" ></a> <?php echo $row['bedRoom']?></li>
                                                    <li><a href="https://icons8.com/icon/8076/garage" target="_blank"><img src="img/icons/garage.png" title='Garage' data-toggle='tooltip' width="26px" height="26px" alt="icon: garage"></a> <?php echo $row['Garage']?></li>
                                                    <li><a href="https://icons8.com/icon/66908/sofa" target="_blank"><img src="img/icons/livingroom.png" title='Living room' data-toggle='tooltip' width="26px" height="26px" alt="icon: livingroom"></a> <?php echo $row['livingRoom']?></li>
                                                    <li><a href="https://icons8.com/icon/11516/bathtub" target="_blank"><img src="img/icons/bathroom.png" title='Bath room' data-toggle='tooltip' width="26px" height="26px" alt="icon: bathroom"></a> <?php echo $row['bathRoom']?></li>
                                                    <li><strong>Size:</strong> <?php echo $row['Size'] ?> m2</li>
                                                    <?php
                                                        // Check if property is Sold 
                                                        if($row['IsSold'] == 'TRUE'){
                                                           echo '<li class="float-right">Sold</li>'; 
                                                        }else{
                                                             $PriceType = $row['PriceType'];
                                                             echo "<li class='float-right'> $PriceType </li>"; 
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
                    } // end while loop
                
                ?>
            </div> <!--End of myRow div-->
            
            <?php
                // navigation buttons between property pages (4 properties per page)
                //build the query
                $pr_query = "select * from property_tb";
                
                // run query 
                $pr_result = mysqli_query($dbc, $pr_query);
                
                //get number of rows from the results
                $total_record = mysqli_num_rows($pr_result);
                
                //get total number of pages 
                $total_page = ceil($total_record/$num_per_page);
                
                // If there are more pages to go back to, then you can click Previous.
                if($page>1){
                    echo "<a href='index.php?page=".($page-1)."' class='btn mybutton' Style='background-color:#333740; color:white;'>Previous</a>";
                }
                
                // Create the numbered navigation buttons. That navigates between page using index values to go to a precise page.   
                for($i=1;$i<$total_page;$i++){
                    echo "<a href='index.php?page=".($i)."' class='btn mybutton' Style='background-color:#EEC494; color:black;'>$i</a>";
                }
                // $i is the total number of page
                // If there are more page to go to, then you can click next.
                if($i>$page){
                    echo "<a href='index.php?page=".($page+1)."' class='btn mybutton' Style='background-color:#333740; color:white;'>Next</a>";
                }
                
                mysqli_close($dbc); // Close the connection
            ?>
        </div><!-- End of card body div --> 
    <br>
    <br>
  <!-- FOOTER -->
    <?php 
   include 'include/footer.php'; 
   ?>
  <script>
   // alert("Width "+ window.innerWidth);
    //alert("Height "+ window.innerHeight);
  </script>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>');</script><script src="JavaScript/bootstrap.bundle.js" ></script></body>
</html>