
<?php

 public function actuator($user){
	$servername = "localhost";
	// REPLACE with your Database name
	$dbname = "id16359395_testing";
	// REPLACE with Database user
	$username = "id16359395_root";
	// REPLACE with Database user password
	$password = "Yamjam@2020s";

    $conn = new mysqli ($servername, $username, $password, $dbname);
    if($conn->connect_error){
       die('Connection failed: ' . $conn->connect_error);
    }
    

  $sql = " SELECT * FROM  brood_data  WHERE username ='".$user."'  ORDER BY last_updated DESC LIMIT 1";
    $result = $conn ->query($sql);
    $conn->close();
    while ($row=$result->fetch_assoc()) {
       $temp =$row['Temperature'];
       $hum= $row ['Humidity'];
       $urea = $row['Urealevel'];
       $air = $row['Airquality'];
         
    }

 $sqli = " SELECT * FROM  datasert WHERE username ='".$user."'  ORDER BY last_updated DESC LIMIT 1";
    $results = $conn ->query($sqli);
    $conn->close();
    while ($rows=$results->fetch_assoc()) {
       $tempset =$rows['Temperature'];
       $humset= $rows['Humidity'];
       $ureaset = $rows['Urealevel'];
       $airset = $rows['Airquality'];
    }

    $sqlw = "SELECT * FROM  Boards  WHERE board = '"  .$user. "'  ORDER BY id DESC LIMIT 1";
    $resultw = $conn ->query($sqlw);
    $conn->close();
    while ($roww=$resultw->fetch_assoc()) {
       $gas =$roww['gas'];
       $bulb= $roww ['elec']; 

	}
	$gasex = gasexist($gas);
	$bulbex = elecexist($bulb);
	$combines = combine($bulbex, $gasex);
   

	$tempcomp = tempcompare($temperature, $temper);
	$amtget = $temp + $hum;
	$amtset = $tempset + $humset;
	if($tempcomp==0){
		$res=$amget - $amtset;
		if(25> $res >=5){
			if($combines==11){
				if(elecon($bulb)){
				turnbulb($bulb, 1,1,1);
				} else{
					turngas($gas,1);
				}
			}else if($combines==10){
				if(elecon($bulb)){
					turnbulb($bulb,1,1,1,);
				} else{
					echo " electricity off, Gas not available";
				}
			}else if($combines==01){
					turngas($gas,1);
			}else{
				 echo " Brooding Unit needs to be heated";
			}

		}else{
			if($combines==11){
				if(elecon($bulb)){
					turnbulb($bulb, 1,0,1);
				} else{
					turngas($gas,1);
				}
			}else if($combines==10){
				if(elecon($bulb)){
						turnbulb($bulb, 1,0,1);
				} else{
					echo " electricity off  Gas not available";
				}
			}else if($combines==01){
					turngas($gas, 1);
			}else{
				 echo " Brooding Unit needs to be heated";
			}
		}
		}else{
			$res=$amtset - $amtget;
			if(25>=$res >=13){
				if($combines==11){
				if(elecon($bulb)){
					turnbulb($bulb, 0,0,0);
					echo " Open Window for Ventilation";
				} else{
					turngas($gas,1);
					echo " Open Window for Ventilation";
					
				}
			}else if($combines==10){
				if(elecon($bulb)){
					turnbulb($bulb, 0,0,0);
					echo " Open Window for Ventilation";
				} else{
					echo " Open Window for Ventilation";
				}
			}else if($combines==01){
					turngas($gas,1);
					echo " Open Window for Ventilation";
					// turn off Gas 
					// Open Window
			}else{
				 echo " Brooding Unit needs not to be heated";
				echo "Open Window for Ventilation";
			}
			
			}else{
			if(25>=$res >=13){
				if($combines==11){
				if(elecon($bulb)){
					// turn one bulb on
					turnbulb($bulb, 0,1,0);
				
				} else{
					turngas($gas,0);
					//turn off gas
					//Open window
				}
			}else if($combines==10){
				if(elecon($bulb)){

					turnbulb($bulb, 0,1,0);
					// turn one bulb on
				
				} else{
					echo "Little Heat Needed. Electricity not availble";
				}
			}else if($combines==01){
					// Turn Gas of minimally
				turn($gas, 1);
			}else{
				echo " Brooding Unit needs Little to be heated";
			
					}
				}
			}
		}



}

	function  tempcompare($Tempdata, $Tempset){
	if($Tempdata<=$Tempset){
		retun 0;
	}
		else{
			return 1;
		}
	}

	function gasexist($board){
		$servername = "localhost";
		// REPLACE with your Database name
		$dbname = "id16359395_esp";
		// REPLACE with Database user
		$username = "id16359395_esp32";
		// REPLACE with Database user password
		$password = "Yamjam@2020s";

    	$conn = new mysqli ($servername, $username, $password, $dbname);
    	if($conn->connect_error){
       		die('Connection failed: ' . $conn->connect_error);
    }

    $sqli = " SELECT * FROM  gas WHERE username ='".$board."' ";
    $results = $conn ->query($sqli);
    $conn->close();
    if($results){
    	return 1;
    }else{
    	return 0;
    }
}


	function elecexist($board){
		$servername = "localhost";
		// REPLACE with your Database name
		$dbname = "id16359395_esp";
		// REPLACE with Database user
		$username = "id16359395_esp32";
		// REPLACE with Database user password
		$password = "Yamjam@2020s";

    $conn = new mysqli ($servername, $username, $password, $dbname);
    if($conn->connect_error){
       die('Connection failed: ' . $conn->connect_error);
    }

    $sqli = " SELECT * FROM  elecbulb WHERE username ='".$board."' ";
    $results = $conn ->query($sqli);
    $conn->close();
    if($results){
    	return 1;
    }else{
    	return 0;
    }
	}

	function combine($x, $y){
		if($x==1 && $y==1){
			return 11
		}else if($x==1 && $y==0){
			return 10
		}else if($x==0 && $y==1){
			return 01
		}else {
			return 0;
		}
	}

	function elecon($bulb){
		return 1;
	}
	function turnbulb($bulb, $bulb1, $bulb2, $bulb3){
		$sql = "INSERT INTO elecbulb ( username, Bulbone, Bulbtwo, Bulbthree)
        	VALUES ('" . $bulb . "', '" . $bulb1. "','" . $bulb2 . "', '" . $bulb3 . "')";
        	$result = $conn ->query($sql);
   			$conn->close();
	}
	function turngas($gas, $state){
		$sql = "INSERT INTO Outputs (gasboard, state)
        VALUES ('" . $gas . "', '" . $state. "') ";
        $result = $conn ->query($sql);
   		$conn->close();

	}
?>