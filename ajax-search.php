<?php 
include_once'Object.php';
if(isset($_POST['search'])){
	// $hotel_star=$_POST['hotel_star'];
	$search=$_POST['search'];
	$lat=$_POST['lat'];
	$lng=$_POST['lng'];
	$optradio=$_POST['optradio'];
	$check_in_date=date('Y-m-d',strtotime($_POST['check_in_date']));
	$check_in_time=$_POST['check_in_time'];
	$check_out_date=date('Y-m-d',strtotime($_POST['check_out_date']));
	$check_out_time=$_POST['check_out_time'];
	$no_of_adults=$_POST['no_of_adults'];
	$no_of_rooms=$_POST['no_of_rooms'];
	$no_of_childs=$_POST['no_of_childs'];
  $hr=$_POST['hr'];
	if(!empty($star0=$_POST['star0'])){
		$star0=$_POST['star0'];
	}else{
		$star0=5;
	}

	if(!empty($star1=$_POST['star1'])){
		 $star1=$_POST['star1'];
	}else{
		$star1=5;
	}
	if(!empty($star2=$_POST['star2'])){
		 $star2=$_POST['star2'];
	}else{
		$star2=5;
	}
	if(!empty($star3=$_POST['star3'])){
		 $star3=$_POST['star3'];
	}else{
		$star3=5;
	}
	if(!empty($rating1=$_POST['rating1'])){
		 $rating1=$_POST['rating1'];
	}else{
		$rating1=6;
	}
	if(!empty($rating2=$_POST['rating2'])){
		 $rating2=$_POST['rating2'];
	}else{
		$rating2=6;
	}
	if(!empty($rating3=$_POST['rating3'])){
		 $rating3=$_POST['rating3'];
	}else{
		$rating3=6;
	}
	if(!empty($rating4=$_POST['rating4'])){
		 $rating4=$_POST['rating4'];
	}else{
		$rating4=6;
	}
	if(!empty($rating5=$_POST['rating5'])){
		 $rating5=$_POST['rating5'];
	}else{
		$rating5=6;
	}
	if(!empty($budget_1=$_POST['budget_1'])){
		 $budget_1=$_POST['budget_1'];
	}else{
		$budget_1=0;
	}
	if(!empty($budget_2=$_POST['budget_2'])){
		 $budget_2=$_POST['budget_2'];
	}else{
		$budget_2=0;
	}
	if(!empty($budget_3=$_POST['budget_3'])){
		 $budget_3=$_POST['budget_3'];
	}else{
		$budget_3=0;
	}
	if(!empty($budget_4=$_POST['budget_4'])){
		 $budget_4=$_POST['budget_4'];
	}else{
		$budget_4=0;
	}
	
	
	if($optradio=='1'){
		$result=$user->searchResultFilterForday($check_in_date,$check_out_date,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng,$star0,$star1,$star2,$star3,$rating1,$rating2,$rating3,$rating4,$rating5,$budget_1,$budget_2,$budget_3,$budget_4);
		echo '<div class="col-sm-12 col-md-12">';
		echo '<div class="hotel-content inner">';
		echo '<h2 align="center">'.'Search Hotels'.'</h2>';
		echo '<p align="center" style="text-transform: lowercase;">'.'About';
		if($result >0){
			echo $shotel = count($result);
		}else{
			echo $shotel = '0';
		}
		echo 'results found'.'</p>';
		if($result >0){
			foreach ($result as $resultdetail) {
				echo '<div class="col-sm-3 col-md-3 pic">';
				echo  '<form action="hotel-detail.php" method="post">';
				 echo '<input type="hidden" name="hotel_id" value="'.$resultdetail['hotel_id'].'">';
                       echo   '<input type="hidden" name="check_in_date" value="'.$check_in_date.'">';
                          echo '<input type="hidden" name="check_out_date" value="'.$check_out_date.'">';
                           echo '<input type="hidden" name="check_in_time" value="'.$check_in_time.'">';
                          echo '<input type="hidden" name="check_out_time" value="'.$check_out_time.'">';
                          echo '<input type="hidden" name="no_of_adults" value="'.$no_of_adults.'">';
                          echo '<input type="hidden" name="no_of_rooms" value="'.$no_of_rooms.'">';
                          echo '<input type="hidden" name="no_of_childs" value="'.$no_of_childs.'">';
                          echo '<input type="hidden" name="lat" value="'.$lat.'">';
                          echo '<input type="hidden" name="lng" value="'.$lng.'">';
                           echo '<input type="hidden" name="search" value="'.$search.'">';
                            echo '<input type="hidden" name="optradio" value="'.$optradio.'">';
				 if (!empty($resultdetail['main_image'])) {
                            $thumbimage=explode(".",$resultdetail['main_image']); 
                            $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];
                             echo '<a href="#">';
                             echo '<img src="image/front/'.$thumbimagefinal.'">';
                             echo '</a>';
                               }
                          else{
                          	 echo '<a href="#">';
                          	 echo '<img src="image/no-image.png">';
                          	 echo '</a>';
                          	  }
                          	   echo '<div class="boder inner">';
                            echo '<div class="dor sev">';
                              echo '<ul>';
                                echo '<li>';
                                echo '<h2>'.$resultdetail['hotel_name'].'</h2>';
                                 $rating=$reviews->AvarageRating($resultdetail['hotel_id']);
                                  $rate = round($rating['AVG(user_rating)']);
                                  $color = '';
                                   for($count=1; $count<=5; $count++)
                                  {
                                    if($count <= $rate)
                                    {
                                     $color = 'color:#ffcc00;';
                                   }
                                   else
                                   {
                                     $color = 'color:#ccc;';
                                   }
                                    echo $output = '<span  data-rating="'.$rate.'" class="fa fa-star" style="'.$color.'">';
                                    echo  '</span>';
                                 }
                                 echo  '</li>';
                               echo '<li>'.$resultdetail['hotel_address'].','.$resultdetail['hotel_city'].'</li>';
                             echo '</ul>';
                           echo '</div>';
                            echo '<div class="dor new search-page">';
                            echo '<ul>';
                              echo '<li>';
                              echo 'Price From';
                              echo '<span class="dollor">';
                              echo 'RM.';
                              echo $resultdetail['price_per_day'];
                              echo '</span>';
                              echo '</li>';

                              echo '<li>';
                                $string = $resultdetail['hotel_description'];
                               $string = strip_tags($string);
                               if (strlen($string) > 100) {          

                                $stringCut = substr($string, 0, 100);                    
                                $string = substr($stringCut, 0, strrpos($stringCut, ' ')). '...........'; 
                              }
                               echo '<p>'.$string.'</p>';
                               echo '</li>';

                            echo '</ul>';

                          echo '</div>';

                          echo '<div class="books search-book" align="center">';

                          echo  '<input type="submit" class="btn home" value="Book Now" name="submit2">';

                         echo '</div>';   
                          echo '</div>';

                     echo '</div>';
                   echo '</form>';
                   } 
               }
                else{
                 echo '<p>'.' Hotel not Found'. '</p>';   
                   }
                 echo     '</div>';
           echo '</div>'; 

			}else{ 
				$result=$user->UserSearchResultfilterForHour($check_in_date,$check_in_time,$check_out_time,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng,$star0,$star1,$star2,$star3,$rating1,$rating2,$rating3,$rating4,$rating5,$budget_1,$budget_2,$budget_3,$budget_4,$hr);
				// var_dump($result);
				echo '<div class="col-sm-12 col-md-12">';
		echo '<div class="hotel-content inner">';
		echo '<h2 align="center">'.'Search Hotels'.'</h2>';
		echo '<p align="center" style="text-transform: lowercase;">'.'About';
		if($result >0){
			echo $shotel = count($result);
		}else{
			echo $shotel = '0';
		}
		echo 'results found'.'</p>';
		if($result >0){
			foreach ($result as $resultdetail) {
				echo '<div class="col-sm-3 col-md-3 pic">';
				echo  '<form action="hotel-detail.php" method="post">';
				 echo '<input type="hidden" name="hotel_id" value="'.$resultdetail['hotel_id'].'">';
                       echo   '<input type="hidden" name="check_in_date" value="'.$check_in_date.'">';
                          echo '<input type="hidden" name="check_out_date" value="'.$check_out_date.'">';
                           echo '<input type="hidden" name="check_in_time" value="'.$check_in_time.'">';
                          echo '<input type="hidden" name="check_out_time" value="'.$check_out_time.'">';
                          echo '<input type="hidden" name="no_of_adults" value="'.$no_of_adults.'">';
                          echo '<input type="hidden" name="no_of_rooms" value="'.$no_of_rooms.'">';
                          echo '<input type="hidden" name="no_of_childs" value="'.$no_of_childs.'">';
                          echo '<input type="hidden" name="lat" value="'.$lat.'">';
                          echo '<input type="hidden" name="lng" value="'.$lng.'">';
                           echo '<input type="hidden" name="search" value="'.$search.'">';
                            echo '<input type="hidden" name="optradio" value="'.$optradio.'">';
				 if (!empty($resultdetail['main_image'])) {
                            $thumbimage=explode(".",$resultdetail['main_image']); 
                            $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];
                             echo '<a href="#">';
                             echo '<img src="image/front/'.$thumbimagefinal.'">';
                             echo '</a>';
                               }
                          else{
                          	 echo '<a href="#">';
                          	 echo '<img src="image/no-image.png">';
                          	 echo '</a>';
                          	  }
                          	   echo '<div class="boder inner">';
                            echo '<div class="dor sev">';
                              echo '<ul>';
                                echo '<li>';
                                echo '<h2>'.$resultdetail['hotel_name'].'</h2>';
                                 $rating=$reviews->AvarageRating($resultdetail['hotel_id']);
                                  $rate = round($rating['AVG(user_rating)']);
                                  $color = '';
                                   for($count=1; $count<=5; $count++)
                                  {
                                    if($count <= $rate)
                                    {
                                     $color = 'color:#ffcc00;';
                                   }
                                   else
                                   {
                                     $color = 'color:#ccc;';
                                   }
                                    echo $output = '<span  data-rating="'.$rate.'" class="fa fa-star" style="'.$color.'">';
                                    echo  '</span>';
                                 }
                                 echo  '</li>';
                               echo '<li>'.$resultdetail['hotel_address'].','.$resultdetail['hotel_city'].'</li>';
                             echo '</ul>';
                           echo '</div>';
                            echo '<div class="dor new search-page">';
                            echo '<ul>';
                              echo '<li>';
                              echo 'Price From';
                              echo '<span class="dollor">';
                              echo 'RM.';
                              echo $resultdetail['price_per_day'];
                              echo '</span>';
                              echo '</li>';

                              echo '<li>';
                                $string = $resultdetail['hotel_description'];
                               $string = strip_tags($string);
                               if (strlen($string) > 100) {          

                                $stringCut = substr($string, 0, 100);                    
                                $string = substr($stringCut, 0, strrpos($stringCut, ' ')). '...........'; 
                              }
                               echo '<p>'.$string.'</p>';
                               echo '</li>';

                            echo '</ul>';

                          echo '</div>';

                          echo '<div class="books search-book" align="center">';

                          echo  '<input type="submit" class="btn home" value="Book Now" name="submit2">';

                         echo '</div>';   
                          echo '</div>';

                     echo '</div>';
                   echo '</form>';
                   } 
               }
                else{
                 echo '<p>'.' Hotel not Found'. '</p>';   
                   }
                 echo     '</div>';
           echo '</div>'; 

			}
		}
		?>