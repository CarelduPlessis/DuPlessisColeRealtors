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
        *{
            box-sizing: border-box;
        }

        
        body {  /*The font family used in the website*/
                  font-family: Arial, Helvetica, sans-serif;
            }
            
        html, body { /*make sure elements fits on the page*/
                  max-width: 100%;
                  overflow-x: hidden;
        }


         /* Float cards one after another */
            /*
            .myColumn {
              position: relative;
              left: 8%;
              right: 8%;
              padding: 0 10px;
              max-width: 800px;
            }*/

        /* navigation buttons between  property pages */
          /*
           rename class in stylesheet to pagenumber-btn
          .mybutton{ 
             position: relative;
             right: 45%;
             left: 27%;
          }*/

          
        
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
                <div>
                    <form action="filterProperty.php?" method="get" multiple>
                    <ul>
                    <?php
                        $filter = []; // stop the dumplication of check box values
                        
                        $query1 = "SELECT * FROM propertycity_tb"; // query all the citys stored in the database tables
                        $result1 = mysqli_query($dbc, $query1); // run query 
                        while($row1=mysqli_fetch_assoc($result1)){ // Fetch a result row as an associative array // https://www.geeksforgeeks.org/associative-arrays-in-php/
                    ?>
            
                    <?php
                        
                        if(!in_array($row1['PropertyCity'], $filter)){ // if city is in array then run code below
                        $filter=array($row1['PropertyCity']); // add city to array
                    ?>
                    
                            <!--Create check box with city as the value-->
                            <i><input type="radio" name="city" value="<?php echo $row1['PropertyCity']?>"><?php echo $row1['PropertyCity']?></i>
                        
                    <?php
                    
                        }
                    }
                    ?>
                        </ul>
                        <input  type="submit" value="filter property">
                    </form>
                    <hr align="left" width="50%">
                </div>
        </div><!-- End of filter_style -->
            <?php 
                
                    if(isset($_GET['city'])){ // if the city value is set then 
                         $city =$_GET['city']; // store city in a varaible for later use 
                    }else{
                        header('Location: index.php'); //Go to home/index page
                    }
            ?>
        
        <div class="card_body">
            <div class="myRow"><!-- Displays filtered properties-->
                <?php
                
                    if(isset($_GET['page'])){ // if page is value is not empty then
                        $page = $_GET['page']; // get page value from url 
                    }else{ // other wise 
                       $page = 1; //declare page variable value as one
                    }
                    
                    $num_per_page = 04; // set the number of properties per page
                    $start_from = ($page-1)*04; // work out where the quary should start in the table.
                    
                    //build query
                    // query find the selected proberties by city
                    $filterquery  = "SELECT * FROM property_tb 
                    JOIN propertycity_tb ON property_tb.PropertyCity_id = propertycity_tb.PropertyCity_id 
                    JOIN propertysuburb_tb ON property_tb.PropertySuburb_id = propertysuburb_tb.PropertySuburb_id 
                    JOIN Propertystreet_tb ON property_tb.PropertyStreet_id = propertystreet_tb.PropertyStreet_id 
                    JOIN propertyPost_tb ON property_tb.PropertyPost_id = propertypost_tb.PropertyPost_id 
                    JOIN propertyrecord_tb ON property_tb.PropertyRecord_id = propertyrecord_tb.PropertyRecord_id
                     JOIN pricetype_tb ON property_tb.PriceType_id = pricetype_tb.PriceType_id
                    WHERE propertycity_tb.PropertyCity = '$city' LIMIT $start_from, $num_per_page";
                      
                    $result = mysqli_query($dbc, $filterquery); // run query 
                    while($row=mysqli_fetch_assoc($result)){ // Fetch a result row as an associative array // https://www.geeksforgeeks.org/associative-arrays-in-php/
                ?>
                
                        <div class="myColumn">
                            <!--Get property id to be used as an identifier -->
                            <a href="property.php?Property_id=<?php echo $row['Property_id']?>" class="link"><!--link the cards to the property page-->
                                <div class="card mb-3" style="max-width: 900px;"><!--Set card size-->
                                    <div class="row no-gutters" >
                                        <div class="col-md-4"><!--Property image column-->
                                            <br>
                                            <!--Display Property image -->
                                            <img src="<?php echo $row['Property_image'] ?>" style="height:180px; width:180px;" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8"><!--Property information column-->
                                            <div class="card-body">
                                                <!--Display Property Name -->
                                                <h5 class="card-title"><?php echo $row['PropertyName']?></h5>
                                                <!--Display Brief description of the Property-->
                                                <p class="card-text"><?php echo $row['Brief']?><strong>Click me to read more.</strong></p>
                                                <ul class="houseSpec" style="list-style-type: none;">
                                                    <br>
                                                    <!--Display a features of Property-->
                                                    <li><a href="https://icons8.com/icon/10771/sleeping-in-bed" target="_blank"><img src="img/icons/bedroom.png" title='Bed Room' data-toggle='tooltip' width="26px" height="26px" alt="icon: bedroom" ><a/> <?php echo $row['bedRoom']?></li>
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
            </div><!--End of myRow div-->
            
            <?php
                // navigation buttons between property pages (4 properties per page)
                //build the query
                $filterquery  = "SELECT * FROM property_tb 
                JOIN propertycity_tb ON property_tb.PropertyCity_id = propertycity_tb.PropertyCity_id 
                JOIN propertysuburb_tb ON property_tb.PropertySuburb_id = propertysuburb_tb.PropertySuburb_id 
                JOIN Propertystreet_tb ON property_tb.PropertyStreet_id = propertystreet_tb.PropertyStreet_id 
                JOIN propertyPost_tb ON property_tb.PropertyPost_id = propertypost_tb.PropertyPost_id 
                JOIN propertyrecord_tb ON property_tb.PropertyRecord_id = propertyrecord_tb.PropertyRecord_id
                JOIN pricetype_tb ON property_tb.PriceType_id = pricetype_tb.PriceType_id 
                WHERE propertycity_tb.PropertyCity = '$city'";
                
                // run query 
                $pr_result = mysqli_query($dbc, $filterquery);
                
                //get number of rows from the results
                $total_record = mysqli_num_rows($pr_result);
                
                //get total number of pages 
                $total_page = ceil($total_record/$num_per_page);
                
                // If there are more pages to go back to, then you can click Previous.
                if($page>1){
                    echo "<a href='filterProperty.php?city=$city&page=".($page-1)."' class='btn pagenumber-btn' Style='background-color:#333740; color:white;'>Previous</a>";
                }
                
                // Create the numbered navigation buttons. That navigates between page using index values to go to a precise page.   
                for($i=1;$i<$total_page;$i++){
                    echo "<a href='filterProperty.php?city=$city&page=".($i)."' class='btn pagenumber-btn' Style='background-color:#EEC494; color:black;'>$i</a>";
                }
                // $i is the total number of page
                // If there are more page to go to, then you can click next.
                if($i>$page){
                    echo "<a href='filterProperty.php?city=$city&page=".($page+1)."' class='btn pagenumber-btn' Style='background-color:#333740; color:white;'>Next</a>";
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
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>');</script><script src="JavaScript/bootstrap.bundle.js" ></script></body>
</html>