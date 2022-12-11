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
    $con = new mysqli("localhost", "root", "", DB_DATABASE);
    $result = $con->query("INSERT INTO `student`(`indexNo`, `name`) VALUES ('$studentIndexNumber','$studentName')  ");


    if ($result === TRUE) {
        $con->close();
        echo "<script>alert('New record created successfully'); window.location = 'adminPanel.php';</script>";

        // header("location:admminPanel.php");

    } else {
        $con->close();
        echo "<script>alert('Duplicate value : check indexNo'); window.location = 'adminPanel.php';</script>";
    }
}


?>

<?php


if (isset($_POST['updateStudent'])) {
    include 'Database/dbconnect.php';
    $studentName = $_POST['studentName'];
    $studentIndexNumber = $_POST['studentIndexNumber'];
    $con = new mysqli("localhost", "root", "", DB_DATABASE);
    $result = $con->query("UPDATE `student` SET `indexNo`='$studentIndexNumber',`name`='$studentName' WHERE `indexNo`=$studentIndexNumber ");


    if ($result === TRUE) {
        $con->close();
        echo "<script>alert('Record Updated successfully');</script>";

        // header("location:admminPanel.php");

    } else {
        $con->close();
        echo "<script>alert('Please check your credintials : check indexNo');</script>";
    }
}


?>

<?php


if (isset($_POST['deleteStudent'])) {
    include 'Database/dbconnect.php';

    $studentIndexNumber = $_POST['to_delete_user'];

    $con = new mysqli("localhost", "root", "", DB_DATABASE);
    $result = $con->query("DELETE FROM `student` WHERE `indexNo` =$studentIndexNumber ");


    if ($result === TRUE) {
        $con->close();
        echo "<script>alert('Record Deleted successfully');</script>";

        // header("location:admminPanel.php");

    } else {
        $con->close();
        echo "<script>alert('Please check your credintials : check indexNo');</script>";
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
    <!-- <link rel="stylesheet" href="CSS/adminPanel.css"> -->
    <style>
        .containerBG {
            background-image: url("Images/6.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: auto;



        }
        #notifypop{ display:none;}
    </style>

</head>

<body class="containerBG" onload="autoNotify()">


    <div class="container p-1 shadow-lg rounded  fixed-top bg-warning">
        <div class="row text-center ">
            <div class="col-12 ">
                <h1 class="text-light"><b>Welcome Kiddo's Admin</b> </h1>
                <audio id="notifypop">
                    <!--Source the audio file. -->

                    <source src="Audio/welcome.mp3" type="audio/mp3">

                </audio>
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

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row ">
            <div class="col-6  p-2">
                <form method="post" action="adminPanel.php">
                    <div class="mb-3">
                        <h2>Add & Update Student</h2>
                        <label for="exampleInputEmail1" class="form-label">Index No</label>
                        <input type="text" class="form-control" name="studentIndexNumber" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kiddo">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="studentName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kiddo123">
                    </div>

                    <button type="submit" class="btn btn-success" name="addStudent">Add</button>
                    <button type="submit" class="btn btn-warning" name="updateStudent">Update</button>
                </form>

            </div>
            <div class="col-6 p-2">
                <form method="post" action="adminPanel.php">
                    <div class="mb-3">
                        <h2>Delete Student & Generate Reports</h2>
                        <label for="exampleInputEmail1" class="form-label">Details</label>
                        <select class="form-select" name="to_delete_user" aria-label="Default select example">
                            <option selected>Kiddo</option>
                            <?php
                            include 'Database/dbconnect.php';
                            $con = new mysqli("localhost", "root", "", DB_DATABASE);
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
                <table class="table table-hover table-dark">

                    <tr>
                        <th>Index No</th>
                        <th>Name</th>
                        <th>Level-1</th>
                        <th>Level-2</th>
                        <th>Level-3</th>
                        <th>Level-4</th>
                        <th>Level-5</th>
                        <th>Level-6</th>

                    </tr>
                    <?php





                    //include 'Database/dbconnect.php'; 
                    $con = new mysqli("localhost", "root", "", DB_DATABASE);
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
            <div>

            </div>

        </div>



    </div>
    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 1</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Attemps Vs Time</p>
                <canvas id="level1" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>

    </div>

    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 2</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Attemps Vs Time</p>
                <canvas id="level2" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>

    </div>
    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 3</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Attemps Vs Time</p>
                <canvas id="level3" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>

    </div>
    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 4</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Attemps Vs Time</p>
                <canvas id="level4" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>

    </div>
    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 5</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Attemps Vs Time</p>
                <canvas id="level5" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>

    </div>
    <br>

    <div class="container p-5 shadow-lg rounded bg-light">
        <div class="row  ">
            <div class="col-12 p-2 overflow-auto">
                <p class="text-center h2 font-weight-bold"> Level - 6</p>
                <p class="text-center h2 font-weight-bold"> Count Vs Attemps Vs Time</p>
                <canvas id="level6" style="width:100%;max-width:600px;margin: 0 auto;"></canvas>

            </div>
        </div>
    </div>

    </div>
    <br>
    <br>
    <br>
    <br>






    <?php
    if (isset($_POST['generateReport'])) {
        $studentIndexNumber = $_POST['to_delete_user'];
        $con = new mysqli("localhost", "root", "", DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `levelonetable` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                        let xValue =[];
                        let attemps =[];
                        let duration =[];
                        let count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                            attemps.push( " . $row['attemps'] . ");
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
        $con = new mysqli("localhost", "root", "", DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `leveltwotable` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                        xValue =[];
                        attemps =[];
                        duration =[];
                       count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                            attemps.push( " . $row['attemps'] . ");
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
        $con = new mysqli("localhost", "root", "", DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `levelthreetable` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                        xValue =[];
                        attemps =[];
                        duration =[];
                       count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                            attemps.push( " . $row['attemps'] . ");
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
        $con = new mysqli("localhost", "root", "", DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `levelfourtable` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                      xValue =[];
                      attemps =[];
                      duration =[];
                     count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                          attemps.push( " . $row['attemps'] . ");
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
        $con = new mysqli("localhost", "root", "", DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `levelfiveable` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                          xValue =[];
                          attemps =[];
                          duration =[];
                         count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                              attemps.push( " . $row['attemps'] . ");
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
        $con = new mysqli("localhost", "root", "", DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `levelsixtable` WHERE `studentIndexNo` =$studentIndexNumber");
        $row = mysqli_num_rows($sql);
        $con->close();
        echo "    <script>
                        xValue =[];
                        attemps =[];
                        duration =[];
                       count =0;  ";

        while ($row = mysqli_fetch_array($sql)) {

            echo " xValue.push(++count) ;
                            attemps.push( " . $row['attemps'] . ");
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







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>