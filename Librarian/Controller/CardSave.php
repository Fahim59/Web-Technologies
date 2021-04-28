<?php 
	function CardSave($data)
	{ 
		if(file_exists('../Controller/data.json'))  
	    {  
	      $current_data = file_get_contents('../Controller/data.json');
	      $array_data = json_decode($current_data, true);  
	      $extra = array(  
	        'id'            =>     $data["id"],  
	        'name'          =>     $data["name"],  
	        'class'     =>     $data["class"]
	        );
	        $array_data[] = $extra;  
	        $final_data = json_encode($array_data); 
	        file_put_contents('../Controller/data.json', $final_data); 
	         return true;
	    }  
	    else  
	    {  
	      $error = 'JSON File not exits'; 
	      return false; 
	    }


	}
	
       
  

 ?>