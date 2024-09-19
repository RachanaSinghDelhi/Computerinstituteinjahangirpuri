<?php include("includes/conn.php");

if(isset($_POST["course"])){
$display_course=mysqli_query($con, "select*from course");
   
    if(mysqli_num_rows($display_course)>0){
          while ($row=mysqli_fetch_array($display_course)){
              $cid=$row["id"];
              $course_title=$row["course_title"];
             
              echo "
         
              <li><a class='dropdown-item' href='#' cid='$cid'>$course_title</a></li>
              
              ";
          }
    }
}

if(isset($_POST["about"])){
$display_about=mysqli_query($con, "select*from about");
   
    if(mysqli_num_rows($display_about)>0){
          while ($row=mysqli_fetch_array($display_about)){
              $aid=$row["id"];
              $about_title=$row["title"];
              $about_desc=$row["des"];
              $about_content=$row["content"];
             
              echo "$about_content";
          }
    }
}

if(isset($_POST["sidebar"])){
$display_side=mysqli_query($con, "select*from sidebar");
   
    if(mysqli_num_rows($display_side)>0){
          while ($row=mysqli_fetch_array($display_side)){
              $aid=$row["id"];
              $side_content=$row["content"];
             
              echo "$side_content";
          }
    }
}

if(isset($_POST["header"])){
$display_header=mysqli_query($con, "select*from header");
   
    if(mysqli_num_rows($display_header)>0){
          while ($row=mysqli_fetch_array($display_header)){
              $id=$row["id"];
              $header_content=$row["content"];
             
              echo "$header_content";
          }
    }
    
}

        ?>
      
     
    