<?php
	include "system/db/myDataBase.php";
	$exam = new myDataBase();
	$file = fopen("data.csv","r");
	$i=0;
	while(! feof($file))
	{
		$data = (fgetcsv($file,'','@'));
		$exam->data = [
			'',
			rand(3,4),
			rand(5,7),
			rand(4,7),
			$data[0],
			$data[1],
			$data[2],
			$data[3],
			$data[4],
			rand(1,4),
			'',
			0,
			0,
			1,
			1,
			$exam->date,
			$exam->time
		];
		$exam->query = "INSERT INTO QUESTIONS (ques_id,course_id,subject_id,chapter_id,question,optiona,optionb,optionc,optiond,option_answer,imgdata,imgheight,imgwidth,difficulty,priority,date,time) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		echo $exam->execute_query();	
		echo $i."<br>";
		$i++;
	}
	
	fclose($file);
?>