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

    function getProjects()
    {
        $projects = [];
        $con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if(!$con = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307))
        {
            die("failed to connect");
        }
        $petition = ('SELECT * FROM projects' );


        if ($result = mysqli_query($con, $petition)) {
            while($row = $result->fetch_assoc()) {

                $projects[$row['id']] = $row;

            }
          }
          
          mysqli_close($con);

        return $projects;
        
    }     
    

    /******************************************************************************
     *                              UPDATE                                        *
    ******************************************************************************/
    /**
     * 
     * @lastUpdate
     * @param 
     * @return 
     *      */

    function updateProjects($params)
    {

        $name = $params['name'];
        $url = $params['url'];
        $img = $params['img'];
        $id = $params['id'];

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "UPDATE projects SET name = '$name', url = '$url', img = '$img' WHERE id = $id";
        $response = $conn->query($petition);

        return $response;
        
    }    
    


    /******************************************************************************
     *                              INSERT                                        *
    ******************************************************************************/
    
    /**
     * 
     * @lastUpdate
     * @param 
     * @return 
     *      */

    function insertProjects($values)
    {

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $name = $values['name'];
        $description = $values['description'];
        $tec = $values ['tec'];
        $url = $values ['url'];
        $img = $values ['img'];
        $end_date = $values ['end_date'];

        $petition = "INSERT INTO projects (id, name, description, tec, url, img, end_date) VALUES ('', '$name', '$description', '$tec', '$url', '$img', '$end_date')";
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
     * @param 
     * @return 
     *      */

    function deleteProjects($id)
    {

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "DELETE FROM projects WHERE id = $id";

        if($conn->query($petition))
        {
            return TRUE;
        } else {
            echo "Error: ". $petition . "<br>" .$conn -> error;
        }
        
    }    


    ?>