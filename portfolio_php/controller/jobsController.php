<?php
include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\repository\jobsRepository.php');
include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\helpers\functionsHelper.php');

/**
* Principal function that manages jobs
* @lastUpdate 22/03/2023
* */
function manageJobs()
{
    if(isset($_POST['action'])){
        switch($_POST['action'])
        {
            case 'update_job':
                updateJob();
            break;
            case 'new_job':
                newJob();
            break;
            case 'delete_job':
                deleteJob();
            break;
        }
    }

    showJobs();
}

/**
* Function that gets all jobs
* @lastUpdate 22/03/2023
* */
function showJobs()
{
    $allJobs = getJobs();

    return $allJobs;

}


/**
* Function that gets the information needed to update a job
* @lastUpdate 22/03/2023
* */
function updateJob()
{
    //corroborates that it gets the information needed to update a job
    if(isset($_POST['job_id']) && !empty($_POST['position']) && !empty($_POST['job_ini_date']) && !empty($_POST['job_id']) && !empty($_POST['company']) && !empty($_POST['job_tec'])){
        $jobs['position'] = cleanString($_POST['position']);
        $jobs['description'] = $_POST['job_description'] ?? '';
        $jobs['company'] = $_POST['company'];
        $jobs['img_company'] = $_POST['img_company'] ?? '';
        $jobs['ini_date'] = escapeCharacters($_POST['job_ini_date']);
        $jobs['end_date'] = escapeCharacters($_POST['job_end_date']) ?? '';
        $jobs['tec'] = escapeCharacters($_POST['job_tec']);
        $jobs['id'] = $_POST['job_id'];

        //updates it
        updateJobs($jobs);
        
    }
}

/**
* Function that gets the information needed to insert a new job
* @lastUpdate 22/03/2023
* */
function newJob()
{
    //corroborates that it gets the information needed to insert a new job
    if(isset($_POST['new_position']) && !empty($_POST['new_position']) && isset($_POST['new_ini_date']) && isset($_POST['new_job_tec']) && !empty($_POST['new_ini_date']) && !empty($_POST['new_company_name'])){
        $jobs['position'] = cleanString($_POST['new_position']);
        $jobs['description'] = $_POST['new_job_description'] ?? '';
        $jobs['company'] = $_POST['new_company_name'];
        $jobs['img_company'] = $_POST['new_img_company'] ?? '';
        $jobs['ini_date'] = $_POST['new_ini_date'];
        $jobs['end_date'] = $_POST['new_end_date'] ?? '';
        $jobs['tec'] = $_POST['new_job_tec'];

        //inserts it
        insertJobs($jobs);
        
    }
}

/**
* Function that deletes a job
* @lastUpdate 22/03/2023
* */
function deleteJob()
{    
    //corroborates that it gets the id needed to delete a job
    if(isset($_POST['job_id']) && !empty($_POST['job_id'])){
        $id = $_POST['job_id'];

        //deletes it
        deleteJobs($id);
    }
}
?>