<?php
if(isset($_COOKIE['admin'])){	// is player logged in??
?>

    <?php
    //include '../../database/config.php'; // include the database conncetion

    $page_title = "display_properties";
    include '../../include/head_admin.php'; ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8" />
        <title>Manage Agents</title> 
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="ajax/ajax.js"></script>

            <!-- Delete property funciton -->
            <script>
                    function deleteProperty(id)
                    {
                            if (confirm("Are you sure you want to delete this property?"))//warning message
                            {
                            window.location.href = "delete.php?id="+id;//directs admin to the alert message for successful or non-successful property deleted
                            }
                    }// end of delProperty
            </script>
            <style>
                /*
                Topic: CSS text-overflow in a table cell?
                From: W3shool and stackoverflow
                URL: https://stackoverflow.com/questions/9789723/css-text-overflow-in-a-table-cell
                URL: https://www.w3schools.com/csSref/css3_pr_text-overflow.asp
                */

                table {width: 100%;}
                td{
                    max-width: 0;
                    white-space: nowrap; 
                    text-overflow: ellipsis;
                    overflow: hidden;
                }
                td.column_ID {width: 5%;}
                td.column_PropertyName {width: 41.5%;}
                td.column_Description {width: 41.5%;}
                td.column_CRUD {width: 12%;}

                /*
                td.column_CRUD {width: 35%;}
                td.column_Edit {width: 70%;}
                td.column_Delete {width: 70%;}
                td.column_AddAgent {width: 70%;}
                td.column_PropertyImage {width: 70%;}
                */		
                
            </style>
    </head>
    <body>
        <div class="container">
            <p id="success"></p>
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Agents</b></h2>
                        </div>
                            <!-- Add Properties button -->
                        <div class="col-sm-6">
                            <a href="add_properties.php" class="btn btn-success" ><i class="material-icons"></i> <span>Add New Property</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr><!-- Displays field names -->
                            <th>ID</th>
                            <th>Property Name</th>
                            <th>Description</th>
                            <th></th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Add agent</th>
                            <th>Property Image</th>
                        </tr><!-- End of table row -->
                    </thead>
                    <tbody>

                        <?php
                           // echo '<script type="text/javascript">';
                               // echo 'alert('.$_COOKIE['admin'].')'; 
                            //echo '</script>';

                                 // Retrieve items from property table                                      
                                $result = mysqli_query($dbc,"SELECT * FROM property_tb");

                                while($row = mysqli_fetch_array($result)) {
                            ?>

                                    <tr>								
                                        <td class="column_ID"><?php echo $row["Property_id"]; ?></td> <!-- echo property id -->
                                        <td class="column_PropertyName"><?php echo $row["PropertyName"]; ?></td> <!-- echo property name id -->
                                        <td class="column_Description"><?php echo $row["Brief"]; ?></td> <!-- echo brief id -->
                                        <td class="column_CRUD">
                                            <a href="edit_properties.php" >
                                                <i class="material-icons update" data-toggle="tooltip" 
                                                        data-id="<?php echo $row["Property_id"]; ?>"
                                                        data-PropertyName="<?php echo $row["PropertyName"]; ?>"
                                                        data-Brief="<?php echo $row["Brief"]; ?>"
                                                        title="Edit"><td><a href="edit_properties.php?property_id=<?php echo $row["Property_id"];?>" title="edit properties"><img src="../../img/icons/button_edit.png" width="40" border="0"></a></td>
                                                </i>
                                            </a>
                                            <td border="0"><a href="DeleteProperty.php?property_id=<?php echo $row["Property_id"];?>" title="Delete Property"><img src="../../img/icons/button_delete.png" width="40" ></a></td>                                           
                                            <td><a href="AddAgent.php?property_id=<?php echo $row["Property_id"];?>" title="Add Agent"><img src="../../img/icons/button_add.png" width="40" ></a></td>
                                            <td border="0"><a href="AddPropertyImg.php?property_id=<?php echo $row["Property_id"];?>" title="Add Property Image"><img src="../../img/icons/button_add.png" width="40" ></a></td>
                                        </td>
                                    </tr><!-- End of table row -->				
                                <?php				
                                }// End of while loop
                            ?>
                    </tbody>
                </table> <!-- End of table -->
            </div><!-- table-wrapper -->
        </div><!-- container -->
    </body>
    </html> 

<?php  
}else{ 
                         
// Not working because of echo that I can't find ?!?!?!?!?!?!?!?   
// Php header location redirect not working
//https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working/21226707
    
// now it needs to work after covering the entire page in a if statment checking if admin is logged in
header("Location: index.php");// login page/index page
  

//back up plan
// now you will work !!!!!!!!!!!! (fingers cross all the user have Javascript enabled) - hot fix for now
//echo "<script type='text/javascript'>location.href = 'index.php';</script>"; // login page/index page
} 
?>