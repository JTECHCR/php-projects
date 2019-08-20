<html>
    <head>
        <title>Search Results</title>
    </head>
    <body>
        <h1>Search Results</h1>
        <?php
            //Assign PHP variables for connection code
            $servername="localhost";
            $username="root";
            $password="";
            $database="Computing";

            //Connect to the database and check connections
            $link = mysqli_connect($servername, $username, $password);
            mysqli_select_db($link, $database) or die("Connection with database failed!");

            //Assign values to variables
            $searchSurname=$_GET["Surname"];
            $searchForename=$_GET["Forename"];

            //Check that search criteria has been entered
            if ($searchSurname == "" && $searchForename == "") {
              echo "You must enter a search criteria";
            } else {
              if ($searchSurname !== "") {
                //If $searchSurname variable is not empty SQL query uses searchSurname variable
                $queryString=("SELECT pupilID, Forename, Surname, CourseworkMark, ExamMark FROM results WHERE Surname = '$searchSurname'");
              } else {
                //If $searchSurname variable is empty SQL query uses searchForename variable
                $queryString=("SELECT pupilID, Forename, Surname, CourseworkMark, ExamMark FROM results WHERE Forename = '$searchForename'");
              }
              //Query database and return results to variable
              $qry_result = mysqli_query($link, $queryString) or die(mysqli_error($link));
              //Check that a result has been returned and if not send error message
              if (mysqli_num_rows($qry_result)==0) {
                echo "No person with that name in the database";
              } else {
                //Create table heddings
                echo '<table border="1">
                      <tr>
                        <th>ID</th>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Coursework</th>
                        <th>Exam</th>
                      </tr>';
                while ($row = mysqli_fetch_array($qry_result)) {
                  //Repeat for all rows returned
                  echo '<tr>
                          <td>'.$row['pupilID'].'</td>
                          <td>'.$row['Forename'].'</td>
                          <td>'.$row['Surname'].'</td>
                          <td>'.$row['CourseworkMark'].'</td>
                          <td>'.$row['ExamMark'].'</td>
                        </tr>';
                }
              }
            }
        ?>
        </tbody>
        </table>
        <p><a href="home.html">Click here to return to the Home Page</a></p>
    </body>
</html>
