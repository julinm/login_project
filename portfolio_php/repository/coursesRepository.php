<?php

include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\helpers\constants.php');


/******************************************************************************
 *                              GET                                       *
******************************************************************************/

/**
     * 
     * @lastUpdate
     * @param 
     * @return 
     *      */

    function getCourses()
    {
        $courses = [];
        $con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if(!$con = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307))
        {
            die("failed to connect");
        }
        $petition = ('SELECT * FROM courses ORDER BY ini_date DESC LIMIT 7' );


        if ($result = mysqli_query($con, $petition)) {
            
            while($row = $result->fetch_assoc()) {

                $courses[$row['id']] = $row;

            }
          }
          
          mysqli_close($con);

        return $courses;
        
    }     
    

    /******************************************************************************
     *                              UPDATE                                        *
    ******************************************************************************/
    /**
     * 
     * @lastUpdate
     * @param array $values
     * @return $response
     *      */

    function updateCourses($values)
    {

        $id = $values ['id'];
        $name = $values['name'];
        $institution = $values['institution'];
        $ini_date = $values ['ini_date'];
        $end_date = $values ['end_date'];
        $tec = $values ['tec'];


        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "UPDATE courses SET name = '$name', institution = '$institution', tec = '$tec', ini_date ='$ini_date', end_date = '$end_date' WHERE id = $id";

        if($conn->query($petition))
        {
            return TRUE;
        } else {
            echo "Error: ". $petition . "<br>" .$conn -> error;
        }
        
    }    
    


    /******************************************************************************
     *                              INSERT                                        *
    ******************************************************************************/
    
    /**
     * 
     * @lastUpdate 
     * @param array $values
     *      */

    function insertCourses($values)
    {

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $name = $values['name'];
        $institution = $values['institution'];
        $ini_date = $values ['ini_date'];
        $end_date = $values ['end_date'] ?? '';
        $tec = $values ['tec'] ?? '';

        $petition = "INSERT INTO courses (id, name, institution, ini_date, end_date, tec) VALUES ('', '$name', '$institution', '$ini_date', '$end_date', '$tec')";
        if($conn->query($petition))
        {
            return TRUE;
        } else {
            echo "Error: ". $petition . "<br>" .$conn -> error;
        }
        
    }     

    /******************************************************************************
     *                              DELETE                                        *
    ******************************************************************************/
    
    /**
     * 
     * @lastUpdate
     * @param int $nid
     *      */

    function deleteCourses($id)
    {
        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "DELETE FROM courses WHERE id = $id";

        if($conn->query($petition))
        {
            return TRUE;
        } else {
            echo "Error: ". $petition . "<br>" .$conn -> error;
        }
        
    }
