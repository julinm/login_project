<?php
include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\repository\personalDataRepository.php');
include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\helpers\functionsHelper.php');


/**
* Principal function that manages PersonalData
* @lastUpdate 22/03/2023
* */
function managePersonalData()
{
    if(isset($_POST['action'])){
        switch($_POST['action'])
        {
            case 'update':
                updateData();
            break;
            case 'new':
                newData();
            break;
        }
    } 

}

/**
* Function that gets personal data
* @lastUpdate 22/03/2023
* */
function showData()
{
    
    return getPersonalData();
}

/**
* Function that gets the information needed to update the personal data
* @lastUpdate 22/03/2023
* */
function updateData()
{
    //corroborates that it has the information needed to update personal data
    if(isset($_POST['name']) && !empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['phone'])){
        var_dump('entra');

        $data['name'] = cleanString($_POST['name']);
        $data['lastname'] = cleanString($_POST['lastname']);
        $data['phone'] = $_POST['phone'];
        $data['email'] = $_POST['email'];

        //updates it
        updatePersonalData($data);
        
    }
}

/**
* Function that gets the information needed to insert new personal data
* @lastUpdate 22/03/2023
* */
function newData()
{
    //corroborates that it has the information needed to insert new data
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['lastname']) && !empty($_POST['lastname'])){
        $data['name'] = cleanString($_POST['name']);
        $data['lastname'] = cleanString($_POST['lastname']);
        $data['phone'] = $_POST['phone'];
        $data['email'] = $_POST['email'];

        //inserts it
        insertPersonalData($data);
        
    }
}

?>