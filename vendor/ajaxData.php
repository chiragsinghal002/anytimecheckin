<?php 
 include_once'Object.php';
// $dbHost = 'localhost';
// $dbUsername = 'restngo_anytime';
// $dbPassword = 'restngo_anytime';
// $dbName = 'restngo_anytimecheckin';

// //Connect and select the database
// $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
// }

// if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){


   
// $query = $db->query("SELECT * FROM states WHERE country_id = '150' AND status = 1 ORDER BY state_name ASC");
       
//      // $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");

//       //Count total number of rows
//     $rowCount = $query->num_rows;
    
//     //Display cities list
//     if($rowCount > 0){
//         echo '<option value="">Select state</option>';
//         while($row = $query->fetch_assoc()){ 
//             echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
//         }
//     }else{
//         echo '<option value="">State not available</option>';
//     }
 

//         //Get all city data
   
    
   
// }

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){  


	    //Get all city data
        $result=$user->getCitybyState($_POST["state_id"]);

    //      echo "<pre>";
    // print_r($result);die;

         // //Display cities list
    // if($result > 0){
    //     echo '<option value="">Select city</option>';
    //     foreach ($result as $value) { 
    //         echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
    //     }
    // }else{
    //     echo '<option value="">City not available</option>';
    // }



                   
                    foreach ($result as $value) {
                     ?>
                     <option value="<?php echo $value['city_name'];?>"><?php echo $value['city_name'];?></option>
                     <?php
                    }
                    
                    






    // $query = $db->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
    
    // //Count total number of rows
    // $rowCount = $query->num_rows;
    
    // //Display cities list
    // if($rowCount > 0){
    //     echo '<option value="">Select city</option>';
    //     while($row = $query->fetch_assoc()){ 
    //         echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
    //     }
    // }else{
    //     echo '<option value="">City not available</option>';
    // }
}

?>