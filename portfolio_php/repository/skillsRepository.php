<?php

include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\helpers\constants.php');


/******************************************************************************
     *                              GET                                           *
******************************************************************************/

/**
     * 
     * @lastUpdate
     * @return 
     *      */

    function getAllSkills()
    {
        $skills = [];
        $con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if(!$con = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307))
        {
            die("failed to connect");
        }
        $petition = ('SELECT * FROM skills' );


        if ($result = mysqli_query($con, $petition)) {
            while($row = $result->fetch_assoc()) {

                $skills[$row['id']] = $row;

            }
          }
          
          mysqli_close($con);

        return $skills;
        
    }     


/**
    * 
    * @lastUpdate
    * @param 
    * @return 
    *      */

    function getSoftSkills()
    {
        $softSkills = [];
        $con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if(!$con = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307))
        {
            die("failed to connect");
        }
        $petition = ('SELECT * FROM skills WHERE type = 0 LIMIT 5' );


        if ($result = mysqli_query($con, $petition)) {
            while($row = $result->fetch_assoc()) {

                $softSkills[$row['id']] = $row;

            }
          }
          
          mysqli_close($con);

        return $softSkills;
        
        
    }     

    /**
    * 
    * @lastUpdate
    * @param 
    * @return 
    *      */

    function getHardSkills()
    {
        $hardSkills = [];
        $con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if(!$con = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307))
        {
            die("failed to connect");
        }
        $petition = ('SELECT * FROM skills WHERE type = 1 LIMIT 5' );


        if ($result = mysqli_query($con, $petition)) {
            while($row = $result->fetch_assoc()) {

                $hardSkills[$row['id']] = $row;

            }
          }
          
          mysqli_close($con);

        return $hardSkills;
        
    }     
    

    /******************************************************************************
     *                              UPDATE                                           *
    ******************************************************************************/
    /**
     * 
     * @lastUpdate
     * @param 
     * @return 
     *      */

    function updateSkills($params)
    {

        $name = $params['name'];
        $level = $params['level'];
        $type = $params['type'];
        $id = $params['id'];

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "UPDATE skills SET name = '$name', level = '$level', type = '$type'  WHERE id = $id";

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

    function insertSkills($values)
    {

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $name = $values['name'];
        $type = $values['type'];
        $level = $values ['level'];

        $petition = "INSERT INTO skills (name, type, level) VALUES ('$name', '$type', '$level')";
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
     * @param int $id
     **/

    function deleteSkills($id)
    {

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "DELETE FROM skills WHERE id = $id";

        if($conn->query($petition))
        {
            return TRUE;
        } else {
            echo "Error: ". $petition . "<br>" .$conn -> error;
        }
        
    }    


    ?>