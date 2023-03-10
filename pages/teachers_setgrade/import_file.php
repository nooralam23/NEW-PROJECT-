<?php
include "../connection.php";

if(isset($_POST['btn_submitbatch'])){
if ($_FILES["file"]["error"] > 0)
{
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
}
else
{
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
    //echo "Stored in: " . $_FILES["file"]["tmp_name"];
	$a=$_FILES["file"]["tmp_name"];
	//echo $a;
	
	
if (!$con) {
die('Could not connect to MySQL: ' . mysqli_error());
}	
//your database name
//$cid =mysql_select_db('test',$connect);

// path where your CSV file is located
//define('CSV_PATH','C:/xampp/htdocs/');
//<!-- C:\\xampp\\htdocs -->
// Name of your CSV file
$csv_file = $a;
$duplicate ='';
if (($getfile = fopen($csv_file, "r")) !== FALSE) {
         $data = fgetcsv($getfile, 1000, ",");
   while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
     //$num = count($data);
	   //echo $num;
        //for ($c=0; $c < $num; $c++) {
            $result = $data;
        	$str = implode(",", $result);
        	$slice = explode(",", $str);

            $studnum = $slice[0];
            $subjectcode = $slice[1];
            $criterianame = $slice[2];
			$score = $slice[3];
            $period = $slice[4];


    $studquery = mysqli_query($con,"SELECT * from tblstudent where studNo = '".$studnum."' ");
    $row = mysqli_fetch_array($studquery);
    $studentid = $row['id'];
    $studNo = $row['studNo'];

    $subjquery = mysqli_query($con,"SELECT * from tblsubjects where subjectcode = '".$subjectcode."' ");
    $row1 = mysqli_fetch_array($subjquery);
    $subjectid = $row1['id'];

    $gradequery = mysqli_query($con,"SELECT * from tblgradingcriteria where criterianame = '".$criterianame."' and subjectid = '".$subjectid."' ");
    $grow = mysqli_fetch_array($gradequery);
    $finalgrade = $score*($grow['percentage']/100);

    $checkduplicate = mysqli_query($con,"SELECT * from tblstudentgrade where studentid = '".$studentid."' and subjectid = '".$subjectid."' and period = '".$period."' ");
    $count = mysqli_num_rows($checkduplicate);

    if($count == 0){
        $query = mysqli_query( $con,"INSERT INTO tblstudentgrade (studentid, subjectid, score,finalgrade,period,criterianame) VALUES ('".$studentid."','".$subjectid."','".$score."','".$finalgrade."','".$period."','".$criterianame."')") or die('Error: ' . mysqli_error($con));
    }
    else{
        $duplicate.=$studNo.'</br>';
       // echo '<script>alert("'.$studentid.'");</script>';
    }
    

}
echo $duplicate;
}
echo "<script>alert('Record successfully uploaded.');";
//echo "File data successfully imported to database!!";
mysqli_close($con);
}}
?>