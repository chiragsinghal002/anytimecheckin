<?php  
class DB  

{
	protected $db_name = 'ci_adminlte_db';
	protected $db_user = 'root';
	protected $db_pass = '';
	protected $db_host = 'localhost';
	// protected $db_name = 'ibad';
	// protected $db_user = 'nmx';
	// protected $db_pass = 'nmx';
	// protected $db_host = 'localhost';
  
		
		    function __construct() {  
		        //$conn = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error()); 
		        $conn = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name ); 
		        //mysql_select_db(DB, $con) or die('DB Connection Error: ->'.mysql_error());
		    if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            } 
		    }  
		}
?>