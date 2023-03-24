<?php

include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\helpers\constants.php');


/******************************************************************************
     *                              GET                                           *
******************************************************************************/

/**
     * 
     * @lastUpdate
     * @param 
     * @return 
     *      */

    function getJobs()
    {
        $jobs = [];
        $con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if(!$con = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307))
        {
            die("failed to connect");
        }
        $petition = ('SELECT * FROM jobs ORDER BY ini_date DESC LIMIT 3' );


        if ($result = mysqli_query($con, $petition)) {
            while($row = $result->fetch_assoc()) {

                $jobs[$row['id']] = $row;

            }
          }
          
          mysqli_close($con);

        return $jobs;
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

    function updateJobs($values)
    {
        $id = $values ['id'];
        $position = $values['position'];
        $description = $values['description'];
        $ini_date = $values ['ini_date'];
        $end_date = $values ['end_date'];
        $company = $values ['company'];
        $img_company = $values ['img_company'];
        $tec = $values ['tec'];


        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "UPDATE jobs SET position = '$position', description = '$description', tec = '$tec', ini_date='$ini_date', end_date = '$end_date', company = '$company', img_company = '$img_company' WHERE id = $id";

        $response = $conn->query($petition);

        return $response;
        
    }    
    


    /******************************************************************************
     *                              INSERT                                        *
    ******************************************************************************/
    
    /**
     * 
     * @lastUpdate
     * @param array $values
     * @return 
     *      */

    function insertJobs($values)
    {
        $position = $values['position'];
        $description = $values['description'];
        $ini_date = $values ['ini_date'];
        $end_date = $values ['end_date'];
        $company = $values ['company'];
        $img_company = $values ['img_company'];
        $tec = $values ['tec'];

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }



        $petition = "INSERT INTO jobs (id, position, description, ini_date, end_date, company, img_company, tec) VALUES ('', '$position', '$description', '$ini_date', '$end_date', '$company', '$img_company', '$tec')";

        if($conn->query($petition))
        {
            return TRUE;
        } else {
            echo "Error: ". $petition . "<br>" .$conn -> error;
        }

        mysqli_close($conn);

        
    }     

    /******************************************************************************
     *                              DELETE                                        *
    ******************************************************************************/
    
    /**
     * 
     * @lastUpdate
     * @param 
     * @return 
     *      */

    function deleteJobs($id)
    {

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "DELETE FROM jobs WHERE id = $id";

        if($conn->query($petition))
        {
            return TRUE;
        } else {
            echo "Error: ". $petition . "<br>" .$conn -> error;
        }
        
    }    


    ?>