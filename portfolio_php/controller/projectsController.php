<?php
include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\repository\projectsRepository.php');


/**
* Principal function that manages Projects
* @lastUpdate 22/03/2023
* */
function manageProjects()
{
    if(isset($_POST['action'])){
        switch($_POST['action'])
        {
            case 'update_project':
                updateProject();
            break;
            case 'new':
                newProject();
            break;
            case 'delete':
                deleteProject();
            break;
        }
    }

    showProjects();
}

/**
* Function that gets all projects
* @lastUpdate 22/03/2023
* */
function showProjects()
{
    $allProjects = getProjects();

    return $allProjects;
}


/**
 * Function that gets the information needed to updatea project
* @lastUpdate 22/03/2023
* */
function updateProject()
{
    //corroborates that it gets the information needed to update a project information
    if(isset($_POST['project_id']) && !empty($_POST['project_id']) && !empty($_POST['project_name']) && !empty($_POST['project_url'])  && !empty($_POST['project_img'])){
        $projects['id'] = $_POST['project_id'];
        $projects['name'] = $_POST['project_name'];
        $projects['url'] = $_POST['project_url'];
        $projects['img'] = $_POST['project_img'];


        //updates it
        updateProjects($projects);
        
    }
}

/**
* Function that gets the information needed to insert a new project
* @lastUpdate 22/03/2023
* */
function newProject()
{
    //corroborates that it gets the information needed to insert a new project
    if(isset($_POST['new_project']) && !empty($_POST['new_project']) && !empty($_POST['new_project_img']) && !empty($_POST['new_project_url']) && !empty($_POST['new_project_tec']) && !empty($_POST['new_project_description'])){
        $projects['name'] = $_POST['new_project'];
        $projects['description'] = $_POST['new_project_description'];
        $projects['url'] = $_POST['new_project_url'];
        $projects['img'] = $_POST['new_project_img'];
        $projects['tec'] = $_POST['new_project_tec'];
        $projects['end_date'] = $_POST['new_project_end_date'] ?? '';

        //updates it
        insertProjects($projects);
        
    }
}


/**
* Function that deletes a project
* @lastUpdate 22/03/2023
* */
function deleteProject()
{    
    //corroborates that it gets the id needed to delete a project
    if(isset($_POST['project_id']) && !empty($_POST['project_id'])){
        
        $id = $_POST['project_id'];

        //deletes it
        deleteProjects($id);
        
    }
}

?>
