<?php
include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\repository\languagesRepository.php');


/**
* Principal function that manages languages
* @lastUpdate 22/03/2023
* */
function manageLanguages()
{
    if(isset($_POST['action'])){
        switch($_POST['action'])
        {
            case 'update_language':
                updateLanguages();
            break;
            case 'new':
                newLanguages();
            break;
            case 'delete_language':
                deleteLanguages();
            break;
        }
    }

    showLanguages();
}

/**
 * Function that shows all language
 * @lastUpdate 22/03/2023
 * */
function showLanguages()
{
    $languages = getLanguages();

    return $languages;

}

/**
* Function that gets the information needed to update a language
* @lastUpdate 22/03/2023
* */
function updateLanguages()
{
    //corroborates if it gets the information needed to update a language
    if(!empty($_POST['language_name']) && !empty($_POST['language_level']) && !empty($_POST['language_id'])){
        $languages['id'] = $_POST['language_id'];
        $languages['name'] = $_POST['language_name'];
        $languages['level'] = $_POST['language_level'];

        //updates it
        updatelanguage($languages);
        
    }
}

/**
* Function thats get the information needed to insert a new language
* @lastUpdate 22/03/2023
* */
function newLanguages()
{
    //corroborates that it gets the information needed to insert a new language
    if(isset($_POST['new_language']) && !empty($_POST['new_language']) && isset($_POST['new_language_level']) && !empty($_POST['new_language_level'])){
        $languages['name'] = $_POST['new_language'];
        $languages['level'] = $_POST['new_language_level'];

        //inserts it
        insertLanguage($languages);
        
    }
}

/**
* Function that deletes a language
* @lastUpdate 22/03/2023
* */
function deleteLanguages()
{
    //corroborates that it gets the id needed to delete a language
    if(isset($_POST['language_id']) && !empty($_POST['language_id'])){
        $id = $_POST['language_id'];

        //deletes it
        deleteLanguage($id);
        
    }
}

?>
