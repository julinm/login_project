<?php
include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\repository\skillsRepository.php');


/**
* Principal function that manages skills
* @lastUpdate 22/03/2023
* */
function manageSkills()
{
    if(isset($_POST['action'])){
        switch($_POST['action'])
        {
            case 'update_skill':
                updateSkill();
            break;
            case 'new':
                newSkill();
            break;
            case 'delete_skill':
                deleteSkill();
            break;
        }
    }

    showSkills();
}


/**
* Function that gets all skills
* @lastUpdate 22/03/2023
* return array $skills
* */
function showSkills()
{
    $skills['soft'] = getSoftSkills();
    $skills['hard']= getHardSkills();
    $skills['all'] = getAllSkills();


    return $skills;

}

/**
* Function that gets the information needed to update a skill
* @lastUpdate 22/03/2023
* */
function updateSkill()
{
    //corroborates that it has the information to update the skill
    if(isset($_POST['skill_id']) && !empty($_POST['skill_id']) && isset($_POST['skill_level']) && !empty($_POST['skill_type'])){
        $skills['name'] = $_POST['skill_name'];
        $skills['id'] = $_POST['skill_id'];
        $skills['level'] = $_POST['skill_level'];
        $skills['type'] = $_POST['skill_type'];

        //updates it
        updateSkills($skills);
        
    }
}

/**
* Function that gets the information needed to insert a new skill
* @lastUpdate 22/03/2023
* */
function newSkill()
{
    //corroborates that it has the information to insert a new skill
    if(isset($_POST['new_skill']) && !empty($_POST['new_skill']) && !empty($_POST['new_skill_level']) && !empty($_POST['skill_type'])){
        $skills['name'] = $_POST['new_skill'];
        $skills['level'] = $_POST['new_skill_level'];
        $skills['type'] = $_POST['skill_type'];

        //updates it
        insertSkills($skills);
    }
}

/**
* Function that deletes a skill
* @lastUpdate 22/03/2023
* */
function deleteSkill()
{
    //corroborates that it has the id needed to delete a skill
    if(isset($_POST['skill_id']) && !empty($_POST['skill_id'])){
       
        $id = $_POST['skill_id'];

        //deletes it
        deleteSkills($id);
        
    }
}
?>