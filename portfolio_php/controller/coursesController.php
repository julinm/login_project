<?php
include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\repository\coursesRepository.php');

/**
* Principal function that manages Courses
* @lastUpdate 22/03/2023
* */
function manageCourses()
{
    if(isset($_POST['action'])){
        switch($_POST['action'])
        {
            case 'update_course':
                updateCourse();
            break;
            case 'new':
                newCourse();
            break;
            case 'delete_course':
                deleteCourse();
            break;
        }
    }

    showCourses();
}

/**
* Function that gets all courses
* @lastUpdate 22/03/2023
* */
function showCourses()
{
    $courses = getCourses();

    return  $courses;

}


/**
* Function that gets the information needed to update a course
* @lastUpdate 22/03/2023
* */
function updateCourse()
{

    //corroborates that it gets the information needed to update a course
    if(isset($_POST['course_id']) && !empty($_POST['course_name']) && !empty($_POST['course_ini_date']) && !empty($_POST['institution']) && !empty($_POST['course_tec']) && !empty($_POST['course_id'])){

        $course['name'] = $_POST['course_name'];
        $course['institution'] = $_POST['institution'];
        $course['ini_date'] = $_POST['course_ini_date'];
        $course['end_date'] = $_POST['course_end_date'] ?? '';
        $course['tec'] = $_POST['course_tec'];
        $course['id'] = $_POST['course_id'];

        //updates it
        updateCourses($course);
        
    }
}

/**
* Function that gets the information needed to insert a course
* @lastUpdate 22/03/2023
* */
function newCourse()
{
     //corroborates that it gets the information needed to insert a new course
    if(isset($_POST['new_course']) && !empty($_POST['new_course']) && !empty($_POST['new_institution']) && !empty($_POST['new_course_ini_date']) && !empty($_POST['new_course_tec'])){
        
        $course['name'] = $_POST['new_course'];
        $course['institution'] = $_POST['new_institution'];
        $course['ini_date'] = $_POST['new_course_ini_date'];
        $course['end_date'] = $_POST['new_course_end_date'];
        $course['tec'] = $_POST['new_course_tec'];

        //inserts it
        insertCourses($course);
        
    }
}

/**
* Function that deletes a course
* @lastUpdate 22/03/2023
* */
function deleteCourse()
{
    //corroborates that it gets the id needed to delete a course
    if(isset($_POST['course_id']) && !empty($_POST['course_id'])){

        $id = $_POST['course_id'];

        //deletes it
        deleteCourses($id);
        
    }
}

?>