<?php 
	require_once '../Model/model.php';
	
	function BookReturn($data)
	{
		$student = GetBalance($data['uid']);
		$balance = $student["balance"];

		$issue = IssueDetails($data['id']);
		$due = $issue["duedate"];
		$ret = $data['rdate'];

		$date1=date_create($due);
		$date2=date_create($ret);
		$diff=date_diff($date1,$date2);
		$x = ($diff->format("%R%a"));

		if ($x > 0) {
			$x = $x * 10;
		}else{
			$x = 0;
		}

		$fine = $x;
		$balance = $balance - $fine;

		ReturnBook($data['uid'], $data['bid'], $data['status'], $data['id'], $ret, $fine, $balance);
	}
 ?>