<?PHP 
// ob_start();
// session_start();   
// include "init.php";

// $dsn = "mysql:host=localhost;dbname=e-commerce";
// $user = "root";
// $pass="";

// try{
//     $con = new PDO($dsn , $user , $pass);
   
// }catch(PDOException $e){
//     echo "error" . $e->getMessage();
// }

// global $con;
// $response = array();
// $stmt = $con->prepare("SELECT * FROM users WHERE type = '1'");
// $stmt->execute();
// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// if($rows){
//     header("Content-Type: JSON");
//     $i=0;
//     while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
//         $response[$i]['id']=$row['id'];
//         $response[$i]['username']=$row['username'];
//         $response[$i]['email']=$row['email'];
//         $response[$i]['gender']=$row['gender'];
//         $i++;
//     }
//     echo json_encode($response,JSON_PRETTY_PRINT);
// }



// ================ Correct =========================

// $con = mysqli_connect("localhost","root","","e-commerce");
// $response = array();
// if($con){
//     $sql = "select * from users";
//     $result = mysqli_query($con,$sql);
//     if($result){
//         header("Content-Type: JSON");
//         $i=0;
//         while($row = mysqli_fetch_assoc($result)){
//                     $response[$i]['id']=$row['id'];
//                     $response[$i]['username']=$row['username'];
//                     $response[$i]['email']=$row['email'];
//                     $response[$i]['gender']=$row['gender'];
//                     $i++;
//                 }
//                 echo json_encode($response,JSON_PRETTY_PRINT);
//     }
// }



?>
<iframe src="https://ourworldindata.org/explorers/coronavirus-data-explorer?zoomToSelection=true&time=2020-03-01..latest&facet=none&pickerSort=desc&pickerMetric=total_cases&hideControls=true&Metric=Confirmed+cases&Interval=7-day+rolling+average&Relative+to+Population=false&Align+outbreaks=false&country=~EGY" loading="lazy" style="width: 100%; height: 600px; border: 0px none;"></iframe>