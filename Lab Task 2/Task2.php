<!DOCTYPE html>
<html>
<head>
	<style >
		.error
		{
			color: red;
		}
	</style>
</head>
<body>

<?php
    
    $name = $email = $dob = $gender = $degree = $bgroup = $dd = $mm = $yyyy = "";
    $ername = $eremail = $erdob = $ergender = $erdegree = $erbgroup = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	//Name
    	if(empty($_POST["name"]))
    	{
    		$ername="Name is requied";
    	}
    	else
    	{
    		$name = test_input($_POST["name"]);
    		if( preg_match("/^[0-9]/", $name))
    		{
    			$ername="Letters Only";
    		}
    		else if (!preg_match("/^[a-zA-Z-. ?!]{2,}$/",$name))
    		{
    			$ername = "At least two words and can only contain letters,period,dash";
    		}
    	}

    	//Email
    	if(empty($_POST["email"]))
    	{
    		$eremail = "Email is required";
    	}
    	else
    	{
    		$email = test_input($_POST["email"]);
    		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    		{
    			$eremail = "Invalid email format. Format: example@something.com";
    		}
    	}

    	//Date Of Birth
        if(empty($_POST["dd"]) or empty($_POST["mm"]) or empty($_POST["yyyy"]))
        {
		    $erdob="Fill up all the fields";
		    $dd = test_input($_POST["dd"]);
		    $mm = test_input($_POST["mm"]);
		    $yyyy = test_input($_POST["yyyy"]);
	    }
	    else
	    {
		    $dd = test_input($_POST["dd"]);
		    $mm = test_input($_POST["mm"]);
		    $yyyy = test_input($_POST["yyyy"]);

		    if( !filter_var($dd,FILTER_VALIDATE_INT,array('options' => array(
                'min_range' => 1, 
                'max_range' => 31
            )))|!filter_var($mm,FILTER_VALIDATE_INT,array('options' => array(
                'min_range' => 1, 
                'max_range' => 12
            )))|!filter_var($yyyy,FILTER_VALIDATE_INT,array('options' => array(
                'min_range' => 1953, 
                'max_range' => 1998
            ))))
			{
				$erdob="Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1950-2000)";
			}
	    }

        //Gender
        if(!isset($_POST["gender"]))
	    {
		    $ergender="At least one of them must be selected";
	    }
	    else
	    {
	    	$gender = test_input($_POST["gender"]);
	    }

        //Degree
        if(!isset($_POST["degree"]))
	    {
		    $erdegree="Must be selected";
	    }
	    else if (sizeof($_POST["degree"])<2)
	    {
		    $erdegree="At least two must be selected";
	    }

        //Blood Group
        if(!isset($_POST["bgroup"]))
	    {
		    $erbgroup="Must be selected";
	    }
	    else if($_POST["bgroup"]=="blank")
	    {
			$erbgroup="Must be selected";
	    }
	    else
	    {
	    	$bgroup = test_input($_POST["bgroup"]);
	    }
    }

    function test_input($data)
    {
    	$data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }  
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">

<fieldset style="width: 300px; ">
<legend><b>NAME</b></legend>
<input type="text" name="name" value="<?php echo $name;?>" ><span class="error">  <?php echo $ername;?> </span><br>
<hr style="border: 0.1px solid;">
<input type="submit" name="submit" value="Submit" style="width: 60px">
</fieldset>

<br>

<fieldset style="width: 300px; ">
<legend><b>EMAIL</b></legend>
<input type="text" name="email" value="<?php echo $email;?>"><span class="error">  <?php echo $eremail;?></span><br>
<hr style="border: 0.1px solid;">
<input type="submit" name="submit1" value="Submit" style="width: 60px">
</fieldset>

<br>

<fieldset style="width: 300px; ">
<legend><b>DATE OF BIRTH</b></legend>
<table>
<tr style="text-align: center;">
	<th style="font-weight: normal;"><label for="dd" >dd</label></th>
	<th></th>
	<th style="font-weight: normal;"><label for="mm" >mm</label></th>
	<th></th>
	<th style="font-weight: normal;"><label for="yyyy" >yyyy</label></th>
	<th></th>
</tr>

<tr>
<td><input type="text" name="dd" style="width: 30px" value="<?php echo $dd;?>"></td>
<td>/</td>
<td><input type="text" name="mm" style="width: 30px" value="<?php echo $mm;?>"></td>
<td>/</td>
<td><input type="text" name="yyyy" style="width: 30px;" value="<?php echo $yyyy;?>"></td>
<td style="padding-left: 10px"><span class="error">  <?php echo $erdob;?></span></td>
</tr>

</table>
<hr style="border: 0.1px solid;">
<input type="submit" name="submit2" value="Submit" style="width: 60px">
</fieldset>

<br>

<fieldset style="width: 300px; ">
<legend><b>GENDER</b></legend>
	<input  type="radio" name="gender"<?php if(isset($gender) && $gender=="female") echo "checked";?> value="Female">Female

	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male	

	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other 
			 
	<br>	
	<span class="error" >  <?php echo $ergender;?></span>			

<hr style="border: 0.1px solid;">
<input type="submit" name="submit3" value="Submit" style="width: 60px">
</fieldset>

<br>

<fieldset style="width: 300px; ">
<legend><b>DEGREE</b></legend>
	<input type="checkbox" id="degree" name="degree[]" value="SSC"> SSC
	<input type="checkbox" id="degree" name="degree[]" value="HSC"> HSC
	<input type="checkbox" id="degree" name="degree[]" value="BSc"> BSc
	<input type="checkbox" id="degree" name="degree[]" value="MSc"> MSc
	<br>	
	<span class="error" >  <?php echo $erdegree;?></span>			

<hr style="border: 0.1px solid;">
<input type="submit" name="submit4" value="Submit" style="width: 60px">
</fieldset>

<br>

<fieldset style="width: 300px; ">
<legend><b>BLOOD GROUP</b></legend>
	<select name="bgroup" id="bgroup">
		<option value="blank">Select</option>
		<option value="AB+">AB+</option>
		<option value="AB-">AB-</option>
		<option value="A+">A+</option>
		<option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="O+">O+</option>
		<option value="O-">O-</option>
	</select>	
	<br>	
	<span class="error">  <?php echo $erbgroup;?></span>			

<hr style="border: 0.1px solid;">
<input type="submit" name="submit5" value="Submit" style="width: 60px">
</fieldset>

</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dd . "/";
echo $mm . "/";
echo $yyyy;
echo "<br>";
echo $gender;
echo "<br>";
foreach($_POST['degree'] as $value)
{
    echo $value ."  ";
}
echo "<br>";
echo $bgroup;
?>

</body>
</html>