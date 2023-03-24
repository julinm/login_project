<?php

include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\helpers\constants.php');



/******************************************************************************
 *                              GET                                           *
******************************************************************************/

    /**
    * Function that returns all languages
    * @lastUpdate 22/03/2023
    * @return array
    */

    function getLanguages()
    {
        $languages = [];
        $con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if(!$con = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307))
        {
            die("failed to connect");
        }
        $petition = ('SELECT * FROM languages LIMIT 4' );


        if ($result = mysqli_query($con, $petition)) {
            while($row = $result->fetch_assoc()) {

                $languages[$row['id']] = $row;

            }
          }
          
          mysqli_close($con);

        return $languages;
        
    }     
    

    /******************************************************************************
     *                              UPDATE                                        *
    ******************************************************************************/
    /**
     * Function that updates the language data
     * @lastUpdate 22/03/2023
     * @param array $params
     * @return array  
     * */

    function updateLanguage($params)
    {

        $name = $params['name'];
        $level = $params['level'];
        $id = $params['id'];

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "UPDATE languages SET name = '$name', level = '$level' WHERE id = $id";

        $response = $conn->query($petition);

        return $response;
    }    
    


    /******************************************************************************
     *                              INSERT                                        *
    ******************************************************************************/
    
    /**
     * Function that inserts a language in the table
     * @lastUpdate 22/03/2023
     * @param array $values
     * @return bool
     * */

    function insertLanguage($values)
    {

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $name = $values['name'];
        $level = $values['level'];

        $petition = "INSERT INTO languages (id, name, level) VALUES ('', '$name', '$level')";
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
     * Function that deletes a language
     * @lastUpdate 22/03/2023
     * @param $id
     * @return bool
     * */

    function deleteLanguage($id)
    {

        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);

        if($conn -> connect_error)
        {
            die ("Connection failed: ". $conn->connect_error);
        }

        $petition = "DELETE FROM languages WHERE id = $id";

        if($conn->query($petition))
        {
            return TRUE;
        } else {
            echo "Error: ". $petition . "<br>" .$conn -> error;
        }
        
    }    


    ?>