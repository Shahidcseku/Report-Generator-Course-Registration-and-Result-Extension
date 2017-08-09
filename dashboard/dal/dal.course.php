<?php
	/**
	*  Course CRUD
	*/
	require_once($_SERVER['DOCUMENT_ROOT'].'/se/includes/connect.php');
	class DALCourse
	{
		
		function __construct()
		{

			
		}

		public function get()
		{
			global $con;
			$sql = "SELECT * FROM course WHERE 1 ORDER BY course_no ASC";
			$result = mysqli_query($con,$sql);

			return $result;
		}

		public function insert($prefix,$course_no,$course_title,$credit,$yearId,$termId,$prerequisite,$varsityId,$deptId)
		{
			global $con;
			$sql = "INSERT INTO course VALUES('','".$prefix."',".$course_no.",'".$course_title."',".$credit.",".$yearId.",".$termId.",".$prerequisite.",".$varsityId.",".$deptId.")";
			$result = mysqli_query($con,$sql);
			if($result)
			{
				return true;
			}
			else
			{
				//debug_backtrace();
				return false;
			}
		}

		public function update($id,$prefix,$course_no,$course_title,$credit,$yearId,$termId,$prerequisite,$varsityId,$deptId)
		{
			global $con;
			$sql = "UPDATE course SET prefix = '".$prefix."',course_no = ".$course_no.",course_title = '".$course_title."',credit = ".$credit.",yearId = ".$yearId.",termId = ".$termId.",prerequisite= ".$prerequisite.",varsityId = ".$varsityId.",deptId = ".$deptId." WHERE id= ".$id."";
			$result = mysqli_query($con,$sql);
			if($result)
			{
				return true;
			}
			else
			{
				return false;

			}
		}
		public function delete($id)
		{
			global $con;
			$sql = "DELETE FROM course WHERE id = $id";
			$result = mysqli_query($con,$sql);
			if($result)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}


?>