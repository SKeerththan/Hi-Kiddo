<?php
// Start the session
if (!session_start()) {
    header("location:login.php");
}

?>


<?php
if (isset($_POST['addStudent'])) {
    include 'Database/dbconnect.php';
    $studentName = $_POST['studentName'];
    $studentIndexNumber = $_POST['studentIndexNumber'];
    $age = $_POST['studentAge'];

    $gender = $_POST['flexRadioDefault'];
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $result = $con->query("INSERT INTO `student`(`indexNo`, `name`,`age`,`gender`) VALUES ('$studentIndexNumber','$studentName','$age','$gender')  ");


    if ($result === TRUE) {
        $con->close();
        echo "<script>alert('Record created successfully.'); window.location = 'adminPanel.php';</script>";

        // header("location:admminPanel.php");

    } else {
        $con->close();
        echo "<script>alert('Failed'); window.location = 'adminPanel.php';</script>";
    }
}


?>

<?php


if (isset($_POST['updateStudent'])) {
    include 'Database/dbconnect.php';
    $studentName = $_POST['studentName'];
    $studentIndexNumber = $_POST['studentIndexNumber'];

    $studentIndexNumber = $_POST['studentIndexNumber'];
    $age = $_POST['studentAge'];
    $gender = $_POST['flexRadioDefault'];

    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $result = $con->query("UPDATE `student` SET `indexNo`='$studentIndexNumber',`name`='$studentName',`age`='$age',`gender`='$gender' WHERE `indexNo`=$studentIndexNumber ");


    if ($result === TRUE) {
        $con->close();
        echo "<script>alert('Record Updated successfully');</script>";

        // header("location:admminPanel.php");

    } else {
        $con->close();
        echo "<script>alert('Please check your credintials');</script>";
    }
}


?>

<?php


if (isset($_POST['deleteStudent'])) {
    include 'Database/dbconnect.php';

    $studentIndexNumber = $_POST['to_delete_user'];

    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $result = $con->query("DELETE FROM `student` WHERE `indexNo` =$studentIndexNumber ");


    if ($result === TRUE) {
        $con->close();
        echo "<script>alert('Record Deleted successfully');</script>";

        // header("location:admminPanel.php");

    } else {
        $con->close();
        echo "<script>alert('Choose a person to remove');</script>";
    }
}


?>





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- <link rel="stylesheet" href="CSS/adminPanel.css"> -->
    <style>
        .containerBG {
            background-image: url("Images/2.jpg");
            /* background-repeat: no-repeat;
            background-attachment: fixed; */
            background-size: 100%;




        }

        #notifypop {
            display: none;
        }



        .snow {
            /* width:100%;
            height: 100%; */
            border: 1px solid rgba(255, 255, 255, 0.1);
            background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 50 50' style='enable-background:new 0 0 50 50%3B' xml:space='preserve'%3E%3Cstyle type='text/css'%3E.st1%7Bopacity:0.3%3Bfill:%23FFFFFF%3B%7D.st3%7Bopacity:0.1%3Bfill:%23FFFFFF%3B%7D%3C/style%3E%3Ccircle class='st1' cx='5' cy='8' r='1'/%3E%3Ccircle class='st1' cx='38' cy='3' r='1'/%3E%3Ccircle class='st1' cx='12' cy='4' r='1'/%3E%3Ccircle class='st1' cx='16' cy='16' r='1'/%3E%3Ccircle class='st1' cx='47' cy='46' r='1'/%3E%3Ccircle class='st1' cx='32' cy='10' r='1'/%3E%3Ccircle class='st1' cx='3' cy='46' r='1'/%3E%3Ccircle class='st1' cx='45' cy='13' r='1'/%3E%3Ccircle class='st1' cx='10' cy='28' r='1'/%3E%3Ccircle class='st1' cx='22' cy='35' r='1'/%3E%3Ccircle class='st1' cx='3' cy='21' r='1'/%3E%3Ccircle class='st1' cx='26' cy='20' r='1'/%3E%3Ccircle class='st1' cx='30' cy='45' r='1'/%3E%3Ccircle class='st1' cx='15' cy='45' r='1'/%3E%3Ccircle class='st1' cx='34' cy='36' r='1'/%3E%3Ccircle class='st1' cx='41' cy='32' r='1'/%3E%3C/svg%3E");
            background-position: 0px 0px;
            animation: animatedBackground 10s linear infinite;
        }


        @keyframes animatedBackground {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 0px 300px;
            }
        }
    </style>

</head>

<body class="containerBG " onload="autoNotify()">


    <div class="container p-1 shadow-lg rounded bg-warning fixed-top snow">
        <div class="row align-items-center">
            <div class="col-2"></div> <!-- Empty div to center the content -->
            <div class="col-8 text-center">
                <h1 class="text-light" style="font-family: 'Brush Script MT', cursive; text-shadow: 2px 2px 5px black;">
                    <b>Math-4-Mind</b>
                    <audio id="notifypop">
                        <source src="Audio/welcomee.mp3" type="audio/mp3">
                    </audio>
                </h1>
            </div>
            <div class="col-2">
                <a href="logoutAdmin.php">
                    <i style="color: black; font-size: 20px;" class="fa-solid fa-right-from-bracket"></i>

                </a>
            </div>

        </div>
    </div>

    <script>
        var popupsound = document.getElementById("notifypop");

        function autoNotify() {
            popupsound.play(); //play the audio file
        }
    </script>
    <br>
    <br>
    <br>
    <br>

    <div class="container p-5 shadow-lg rounded bg-light   ">
        <div class="row ">
            <div class=" col-sm p-2">
                <form method="post" action="adminPanel.php">
                    <div class="mb-3">
                        <h2>Add & Update Student</h2>
                        <label for="exampleInputEmail1" class="form-label">Index No</label>
                        <input type="number" class="form-control" name="studentIndexNumber" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="001">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="studentName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kiddo">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">age</label>
                        <input type="number" class="form-control" name="studentAge" id="studentAge" aria-describedby="emailHelp" placeholder="12">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="Male" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="Female" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-success" name="addStudent">Add</button>
                    <button type="submit" class="btn btn-warning" name="updateStudent">Update</button>
                </form>

            </div>
            <div class=" col-sm p-2 ">
                <form method="post" action="adminPanel.php">
                    <div class="mb-3">
                        <h2>Delete Student & Generate Reports</h2>
                        <label for="exampleInputEmail1" class="form-label">Details</label>
                        <select class="form-select" name="to_delete_user" aria-label="Default select example">
                            <option selected>Kiddo</option>
                            <?php
                            include 'Database/dbconnect.php';
                            $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                            $sql = mysqli_query($con, "SELECT `indexNo`, `name` FROM `student` ");
                            $row = mysqli_num_rows($sql);
                            while ($row = mysqli_fetch_array($sql)) {
                                echo "<option value='" . $row['indexNo'] . "'>" . $row['indexNo'] . " - " . $row['name'] . "</option>";
                            }
                            $con->close();
                            ?>

                        </select>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-danger" name="deleteStudent">Delete</button>
                    <button type="submit" class="btn btn-primary" name="generateReport">Generate</button>
                </form>

            </div>

        </div>
    </div>
    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Answered Questions Count</p>
                <br>
                <table class="table table-hover bg-light">

                    <tr>
                        <th>Index No</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Level-1</th>
                        <th>Level-2</th>
                        <th>Level-3</th>
                        <th>Level-4</th>
                        <th>Level-5</th>
                        <th>Level-6</th>

                    </tr>
                    <?php





                    //include 'Database/dbconnect.php'; 
                    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                    $sql = mysqli_query($con, "SELECT * FROM `student` ");
                    $row = mysqli_num_rows($sql);
                    $con->close();
                    while ($row = mysqli_fetch_array($sql)) {

                    ?>
                        <tr>

                            <td>
                                <?php echo $row['indexNo']; ?>
                            </td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['age']; ?>
                            </td>
                            <td>
                                <?php echo $row['gender']; ?>
                            </td>
                            <td>
                                <?php echo $row['levelOne']; ?>
                            </td>
                            <td>
                                <?php echo $row['levelTwo']; ?>
                            </td>
                            <td>
                                <?php echo $row['levelThree']; ?>
                            </td>
                            <td>
                                <?php echo $row['levelFour']; ?>
                            </td>
                            <td>
                                <?php echo $row['levelFive']; ?>
                            </td>
                            <td>
                                <?php echo $row['levelSix']; ?>
                            </td>


                        </tr>
                    <?php
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
    <br>

    <div class=" container p-5 shadow-lg rounded bg-light">
        <div class="row">
            <div class=" col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Levels Vs Gender</p>
                <canvas id="levelGender" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>
    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 1</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Time Vs Right/Wrong</p>
                <canvas id="level1" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>



    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 2</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Time Vs Right/Wrong</p>
                <canvas id="level2" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>


    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 3</p>
                <p class="text-center h2 font-weight-bold">Count Vs Time Vs Right/Wrong</p>
                <canvas id="level3" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>


    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 4</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Time Vs Right/Wrong</p>
                <canvas id="level4" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>


    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 5</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Time Vs Right/Wrong</p>
                <canvas id="level5" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>


    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 6</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Time Vs Right/Wrong</p>
                <canvas id="level6" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>
    <br>
    <br>

    <footer>
        <div class="container  p-1 shadow-lg rounded bg-warning    snow ">
            <div class="row text-center ">
                <div class="col-12 ">
                    <h1 class="text-light " style="  font-family: 'Brush Script MT', cursive;text-shadow: 2px 2px 5px black;"><b>Thank you </b></h1>
                    <audio id="notifypop">
                        <source src="Audio/welcomee.mp3" type="audio/mp3">
                    </audio>
                </div>
            </div>

        </div>
    </footer>

    <br>
    <br>







    <?php

    //Level Vs Gender
    echo "    <script>
    let xValue =['','Level 1','Level 2','Level 3','Level 4','Level 5','Level 6'];
    let maleCount =[0];
    let femaleCount =[0];
    let count =0; ";

    //Level one Male and Female Details
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Male' AND levelOne>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "maleCount.push( " . $data . ");";

    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Female' AND levelOne>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "femaleCount.push( " . $data . ");";

    //Level Two Male and Female Details
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Male' AND levelTwo>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "maleCount.push( " . $data . ");";

    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Female' AND levelTwo>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "femaleCount.push( " . $data . ");";

    //Level Three Male and Female Details
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Male' AND levelThree>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "maleCount.push( " . $data . ");";

    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Female' AND levelThree>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "femaleCount.push( " . $data . ");";

    //Level Four Male and Female Details
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Male' AND levelFour>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "maleCount.push( " . $data . ");";

    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Female' AND levelFour>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "femaleCount.push( " . $data . ");";

    //Level Five Male and Female Details
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Male' AND levelFive>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "maleCount.push( " . $data . ");";

    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Female' AND levelFive>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "femaleCount.push( " . $data . ");";

    //Level Six Male and Female Details
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Male' AND levelSix>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "maleCount.push( " . $data . ");";

    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(indexNo) as maleCount FROM student WHERE gender= 'Female' AND levelSix>=10";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['maleCount'];
    echo "femaleCount.push( " . $data . ");";



    echo "new Chart('levelGender', {
        type: 'bar',
        data: {
          labels: xValue,
          datasets: [{ 
            data:maleCount,
            borderColor: 'red',
            fill: false
          }, { 
            data:femaleCount,
            borderColor: 'green',
            fill: false
          }]
        },
        options: {
          legend: {display: false}
        }
      });

      console.log(xValue,attemps,duration);
      </script>";




    if (isset($_POST['generateReport'])) {
        //Level 1
        $studentIndexNumber = $_POST['to_delete_user'];
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `levelone` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                        xValue =[];
                        attemps =[];
                        duration =[];
                       count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                            attemps.push( " . $row['status'] . ");
                            duration.push(" . $row['time'] . " );";
        }
        echo "new Chart('level1', {
                            type: 'line',
                            data: {
                              labels: xValue,
                              datasets: [{ 
                                data:attemps,
                                borderColor: 'red',
                                fill: false
                              }, { 
                                data:duration,
                                borderColor: 'green',
                                fill: false
                              }]
                            },
                            options: {
                              legend: {display: false}
                            }
                          });
  
                          console.log(xValue,attemps,duration);
                          </script>";



        //level-2
        $studentIndexNumber = $_POST['to_delete_user'];
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `leveltwo` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                        xValue =[];
                        attemps =[];
                        duration =[];
                       count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                            attemps.push( " . $row['status'] . ");
                            duration.push(" . $row['time'] . " );";
        }
        echo "new Chart('level2', {
                            type: 'line',
                            data: {
                              labels: xValue,
                              datasets: [{ 
                                data:attemps,
                                borderColor: 'red',
                                fill: false
                              }, { 
                                data:duration,
                                borderColor: 'green',
                                fill: false
                              }]
                            },
                            options: {
                              legend: {display: false}
                            }
                          });
  
                          console.log(xValue,attemps,duration);
                          </script>";

        //level-3
        $studentIndexNumber = $_POST['to_delete_user'];
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `levelthree` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                        xValue =[];
                        attemps =[];
                        duration =[];
                       count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                            attemps.push( " . $row['status'] . ");
                            duration.push(" . $row['time'] . " );";
        }
        echo "new Chart('level3', {
                            type: 'line',
                            data: {
                              labels: xValue,
                              datasets: [{ 
                                data:attemps,
                                borderColor: 'red',
                                fill: false
                              }, { 
                                data:duration,
                                borderColor: 'green',
                                fill: false
                              }]
                            },
                            options: {
                              legend: {display: false}
                            }
                          });
  
                          console.log(xValue,attemps,duration);
                          </script>";






        //level-4
        $studentIndexNumber = $_POST['to_delete_user'];
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `levelfour` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                      xValue =[];
                      attemps =[];
                      duration =[];
                     count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                          attemps.push( " . $row['status'] . ");
                          duration.push(" . $row['time'] . " );";
        }
        echo "new Chart('level4', {
                          type: 'line',
                          data: {
                            labels: xValue,
                            datasets: [{ 
                              data:attemps,
                              borderColor: 'red',
                              fill: false
                            }, { 
                              data:duration,
                              borderColor: 'green',
                              fill: false
                            }]
                          },
                          options: {
                            legend: {display: false}
                          }
                        });

                        console.log(xValue,attemps,duration);
                        </script>";

        //level-5
        $studentIndexNumber = $_POST['to_delete_user'];
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `levelfive` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                          xValue =[];
                          attemps =[];
                          duration =[];
                         count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                              attemps.push( " . $row['status'] . ");
                              duration.push(" . $row['time'] . " );";
        }
        echo "new Chart('level5', {
                              type: 'line',
                              data: {
                                labels: xValue,
                                datasets: [{ 
                                  data:attemps,
                                  borderColor: 'red',
                                  fill: false
                                }, { 
                                  data:duration,
                                  borderColor: 'green',
                                  fill: false
                                }]
                              },
                              options: {
                                legend: {display: false}
                              }
                            });
    
                            console.log(xValue,attemps,duration);
                            </script>";

        //level-6
        $studentIndexNumber = $_POST['to_delete_user'];
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `levelsix` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                        xValue =[];
                        attemps =[];
                        duration =[];
                       count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                            attemps.push( " . $row['status'] . ");
                            duration.push(" . $row['time'] . " );";
        }
        echo "new Chart('level6', {
                            type: 'line',
                            data: {
                              labels: xValue,
                              datasets: [{ 
                                data:attemps,
                                borderColor: 'red',
                                fill: false
                              }, { 
                                data:duration,
                                borderColor: 'green',
                                fill: false
                              }]
                            },
                            options: {
                              legend: {display: false}
                            }
                          });
  
                          console.log(xValue,attemps,duration);
                          </script>";
    }
    ?>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>