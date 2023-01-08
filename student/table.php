<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: studentlogin.php");
  exit;
};
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bod" background-image: url(heer.jpeg); >
<b>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
<style>
.bod{
background-image: url(heer.jpeg); 
background-repeat: no-repeat; 
background-size: cover;
color:aliceblue;

}
img heer.jpeg{
position:relative;
right:100rem;
}
</style>
<?php require "nav.php" ; ?>
<div class="container">

    <center><h1 class="display-1 text-primary-emphasis"><b>About Methodist<b\></h1></center>
    
    
    <p class="fs-5" data-aos="fade-left">
       
      Methodist College of Engineering and Technology (MCET) and The EXECU BOARD OF THE METHODIST CHURCH in
        India is a Non-Minority Educational institution, was established in the year 2008
        on a sprawling 5.0 acres of historic Methodist campus at Abids, Hyderabad.
       The college provides a serene and tranquil environment to the students boosting their mental
       potential and preparing them in all aspects to face the global competition with a smile and
       emerge victorious.
    </p>
    
    <p class="fs-5" data-aos="fade-right">
       The MCET is approved by AICTE, New Delhi and affiliated to Osmania University, Hyderabad. The College is accredited by NAAC with A+ Grade and all eligible Under Graduate– B.E Programmes are accredited by National Board of Accreditation (NBA).
       <br>
        The UGC has granted autonomy to the college for ten years with effect from the Academic Year 2021-22.
    
    The MCET has been established with the support of Executive board of Methodist Church in India that has been gracious and instrumental in making the vision of an Engineering College a reality.
    <br>
       <br>
    <p class="fs-5" data-aos="fade-left">
    The vision is being accomplished by the innovative endeavors of Sri K. Krishna Rao, Correspondent, Methodist College of Engineering and Technology and Edupreneur.
    <br>
    <br>
    Methodist College of Engineering and Technology strives towards excellence by imparting essential technical skills as well as a holistic approach towards grooming the students into responsible, worthy citizens of the future.
    <br>
    <br>
    </p>
        <center><h2 class="display-1 text-primary-emphasis" style="color:aliceblue"><b> Vision </b></h2></center>
    <p class="fs-5" data-aos="fade-left">To create a world where every person has the opportunity to find meaningful employment that aligns with their skills, values, and goals.
    <br>
    - To revolutionize the way people find and apply for jobs, and the way employers find and hire employees, by leveraging technology and data to create a more efficient, effective, and fair hiring process.
    <br>
    - To create a more inclusive and equitable job market by breaking down barriers and providing equal access to job opportunities for all individuals, regardless of their background, experience, or location.
    <br>
    - To develop a placement management system that helps to level the playing field for job seekers, by providing access to a wide range of job openings and helping to match individuals with opportunities that align with their skills and goals, and to assist employers in building diverse and inclusive teams.</p>
    
    <center><h2 class="display-1 text-primary-emphasis"><b>Mission<b\></h2> </center>
    <p class="fs-5" data-aos="fade-right" >
    To connect job seekers with job opportunities that fit their unique profiles and to provide employers with a diverse pool of qualified candidates, enabling them to build strong and successful teams.
    - To develop and maintain a cutting-edge placement management system that utilizes advanced algorithms and machine learning to match job seekers with job openings, and to provide users with a user-friendly, intuitive platform for searching and applying for jobs, as well as tracking their progress and success.
    - To develop a placement management system that helps to level the playing field for job seekers, by providing access to a wide range of job openings and helping to match individuals with opportunities that align with their skills and goals, and to assist employers in building diverse and inclusive teams.
    </p>
    <div >
                <center><img src="download.png" alt="GDSC-MCET" width=" 250 "> </center>
           </div>
    </p>
</div>

</body>
</html>