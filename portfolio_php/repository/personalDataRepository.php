<?php

include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\helpers\constants.php');



/******************************************************************************
     *                              GET                                           *
******************************************************************************/

/**
     * 
     * @lastUpdate 
     * @return array
     *      */

    function getPersonalData()
    {
        $personalData = [];
        $con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if(!$con = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307))
        {
            die("failed to connect");
        }
        $petition = ('SELECT * FROM personal_data' );


        if ($result = mysqli_query($con, $petition)) {
            while($row = $result->fetch_assoc()) {

                $personalData[$row['id']] = $row;

            }
          }
          
          mysqli_close($con);

        return $personalData;
        
    }     
    

    /******************************************************************************
     *                              UPDATE                                          *
    ******************************************************************************/
    /**
     * 
     * @lastUpdate
     * @param array $params
     * @return $response
     *      */

    function updatepersonalData($params)
    {

        $name = $params['name'];
        $lastname = $params['lastname'];
        $email = $params['email'];
        $phone = $params['phone'];
        $id = 1;

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "UPDATE personal_data SET name = '$name', last_name = '$lastname', email = '$email', phone = '$phone' WHERE id= $id";
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

    function insertPersonalData($values)
    {

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $name = $values['name'];
        $url = $values['url'];
        $img = $values ['img'];

        $petition = "INSERT INTO personalData (name, url, img) VALUES ('$name', '$url', '$img')";
        if($conn->query($petition))
        {
            return TRUE;
        } else {
            echo "Error: ". $petition . "<br>" .$conn -> error;
        }
        
    }     

?>