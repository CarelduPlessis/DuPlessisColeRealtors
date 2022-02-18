<!-- header -->
<?php 
$page_title = "Property";
include 'include/head.php'; // Include head before user logs in
?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Du Plessis Cole Realators - Property</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" integrity="pVreZ67fRaATygHF6T+gQtF1NI700W9kzeAivu6au9U=" rel="stylesheet" >

    <!-- My styles for this template -->
    <link href="css/stylesheet.css" rel="stylesheet">

    <style>
    *{
        box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

     /* Remove extra left and right margins, due to padding */
    .myRow {
       position: relative;
       right: 25%;
       left: 25%;
    }

     /* Clear floats after the columns */
    .myRow:after {
      content: "";
      display: table;
      clear: both;
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>
  <body>

<main role="main">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
          <img class="banner" src="img/banner/home_pg.jpg" alt="..." >
      </div>
    </div>
  </div>
  <div class="PropertyInfo-Container">
    <?php        
        //Display the property information from the database table 
    
        $Property_id = intval($_GET['Property_id']); //get id from URL and turn it into a number
        
        //$query = "select * from property_tb WHERE Property_id=$Property_id";
        //build query
        
        $query = "SELECT * FROM property_tb 
        JOIN agent_tb ON property_tb.Agent_id = agent_tb.Agent_id
        JOIN propertyrecord_tb ON property_tb.PropertyRecord_id = propertyrecord_tb.PropertyRecord_id
        JOIN pricetype_tb ON property_tb.PriceType_id = pricetype_tb.PriceType_id
        JOIN propertystreet_tb ON property_tb.PropertyStreet_id = propertystreet_tb.PropertyStreet_id
        JOIN propertysuburb_tb ON property_tb.PropertySuburb_id = propertysuburb_tb.PropertySuburb_id
        JOIN propertycity_tb ON property_tb.PropertyCity_id = propertycity_tb.PropertyCity_id
        JOIN propertypost_tb ON property_tb.PropertyPost_id = propertypost_tb.PropertyPost_id
        WHERE Property_id=$Property_id";


        $result = mysqli_query($dbc, $query); // run query
        
        //build query 
        $query2 = "SELECT * FROM ((wishlist_tb 
        INNER JOIN property_tb ON property_tb.Property_id = wishlist_tb.Property_id)
        INNER JOIN user_tb ON user_tb.User_id = wishlist_tb.User_id)
        WHERE property_tb.Property_id = $Property_id";
       
        $result2 = mysqli_query($dbc, $query2); // run query
        
        if (!$result2) { // test query 
            printf("Error: %s\n", mysqli_error($dbc));
            exit();
        }
        
        //$row1=mysqli_fetch_array($result2); 
        
        // retrieve the rows of the query
        $db_Property_id ="";
        while ($row1=mysqli_fetch_assoc($result2)){
            $db_Property_id = $row1['Property_id'];
        }


        while ($row=mysqli_fetch_assoc($result)){ // retrieve the rows of the query
            
            $starting_price =  number_format($row['Min_Price'],2); // format the min price in the database to a 2 decimal place number
            
            $currentBid =  number_format($row['currentBid'],2); // format the current Bid in the database to a 2 decimal place number
            
    ?>  
             
                <!--Display a features of Property-->
                <h1 style="padding-left: 10px;"><?php echo $row['PropertyName']?></h1>
                <br>
                <h5 style="padding-left: 10px;"><?php echo $row['PropertyStreet'] .', '. $row['PropertySuburb'].', '. $row['PropertyCity'].', '. $row['PropertyPost']?></h5>
                <br>
                <ul class="houseSpec" style="list-style-type: none;">   
                  <li><a href="https://icons8.com/icon/10771/sleeping-in-bed" target="_blank"><img src="img/icons/bedroom.png" title='Bed Room' data-toggle='tooltip' width="26px" height="26px" alt="icon: bedroom"><a/> <?php echo $row['bedRoom']?></li>
                  <li><a href="https://icons8.com/icon/8076/garage" target="_blank"><img src="img/icons/garage.png" title='Garage' data-toggle='tooltip' width="26px" height="26px" alt="icon: garage"></a> <?php echo $row['Garage']?></li>
                  <li><a href="https://icons8.com/icon/66908/sofa" target="_blank"><img src="img/icons/livingroom.png" title='Living Room' data-toggle='tooltip' width="26px" height="26px" alt="icon: livingroom"></a> <?php echo $row['livingRoom']?></li>
                  <li><a href="https://icons8.com/icon/11516/bathtub" target="_blank"><img src="img/icons/bathroom.png" title='Bath Room' data-toggle='tooltip' width="26px" height="26px" alt="icon: bathroom"></a> <?php echo $row['bathRoom']?></li>
                  <li><strong>Size:</strong> <?php echo $row['Size'] ?> m2</li>
                  <br>
                  <br>
                  <?php
                      // Check if property is Sold or Is Bid on or not Sold and not Bid on property
                      if($row['IsSold'] == 'TRUE'){
                          echo '<li><strong>The house is Sold</strong></li>'; 
                      }else if($row['IsBid'] == 'TRUE'){
                          echo '<li><strong>Current Bid:</strong> $'  . $currentBid . '</li>'; 
                      }else{
                          echo '<li><strong>Starting Price:</strong> $'  . $starting_price . '</li>'; 
                      } 
                      echo '&emsp;&emsp;<li><strong> Type of Sale: </strong>'  . $row['PriceType'] . '</li>';  
                  ?>
                    
                  <?php
                      // is user logged in
                      if(isset($_COOKIE['user'])) { // is $_COOKIE['user'] empty / is user logged in 
                        

                        if($row['IsSold'] != 'TRUE' && $db_Property_id != $Property_id){
                        ?>
                        <li><a href="add_wishlist.php?id=<?php echo  $Property_id ?>"><strong>Add to Wishlist</strong></a></li>
                      
                        <?php
                        
                        }else if($row['IsSold'] == 'TRUE' && $db_Property_id == $Property_id || $db_Property_id == $Property_id){
                        ?> 
                          <li><a href="remove_wishlist.php?id=<?php echo  $Property_id ?>"><strong>Remove from Wishlist</strong></a></li>
                    
                        <?php
                        }
                    }
                  ?> 
                  
                </ul>
            
           
            <!--Display the information of Property like image, Description, who is the Agent -->
            <div class="property-Column">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <br>
                        <img src="<?php echo $row['Property_image']?>"  class="card-img" alt="Property: <?php echo $row['PropertyName']?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><?php echo $row['PropertyDescription']?></p>
                            
                            <!-- Displays the agent connected to the property, displays their name and image  -->
                            <ul class="agent-details" style="list-style-type: none;">   
                                <li>
                                    <img src="<?php echo $row['AgentAvatar']?>" width="180px" height="180px" alt="Agent: <?php echo $row['AgentFullName']?>" style="border-radius: 2%;">
                                    <p><strong><?php echo $row['AgentFullName']?></strong></p>
                                    <p><strong>Phone: </strong><?php echo $row['AgentPhone']?></p>
                                    <p><strong>Email: </strong><?php echo $row['AgentEmail']?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <br> 
            </div>
                 
    <?php        
        }
        
        mysqli_close($dbc); // Close the connection
    ?> 
    
  </div>
 
  <!-- FOOTER -->
      <?php 
          include 'include/footer.php'; 
        ?>
     
</main>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>');</script><script src="JavaScript/bootstrap.bundle.js" ></script></body>
</html>
  