<?php
	function ShowCards()
		{
			$data = file_get_contents("../Controller/data.json");
            $data = json_decode($data, true);
            return $data;
		}
?>