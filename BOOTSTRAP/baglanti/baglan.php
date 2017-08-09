<?php 

	ob_start();
    session_start();



    try {

            $db=new PDO("mysql:host=localhost;dbname=messagebox",'root','12345678');
            $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
            
        
    } 
    catch (PDOExpection $e){
        echo $e->getMessage();
    }
        
    
     		





 ?>
     
