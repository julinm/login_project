<?php
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\coursesController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\jobsController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\projectsController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\personalDataController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\skillsController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\languagesController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\repository\usersRepository.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\loginController.php');

session_start();
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="utf-8">
        <title>Julia Menardi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <link rel="stylesheet" href="styles.css" />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous"
        />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body class="bg-light text-dark" >
        <div class="container py-1 h-100">
            <div class="card mt-2 shadow">
                <div class="card-body p-4 text-blackshadow">
                    <div class="mb-5 shadow">
                        <div class="p-4" style="background-color: #f8f9fa;">
                            <h1> What would you like to add?</h1>
                            <form method="GET">
                                <select name="section" id="section" class="form-control">
                                    <?php if(isset($_GET['section'])) {?>
                                        <option value="<?=$_GET['section']?>"><?= ucfirst($_GET['section']) ?> </option>
                                    <?php } ?>
                                    <option value=""> -- SELECT -- </option>
                                    <option value="jobs"> Jobs </option>
                                    <option value="courses"> Education </option>
                                    <option value="skills"> Skills </option>
                                    <option value="language"> Language </option>
                                    <option value="projects"> Projects </option>                                    
                                </select>
                                <button type="submit" class="btn btn-success mt-5 pull-right"> <i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <!-- NEW JOB EXPERIENCE -->
            <div class="card mt-2 shadow">
                <div class="card-body p-4 text-blackshadow">
                <?php if(isset($_GET['section']) && $_GET['section'] == 'jobs'){?>
                    <div class="mr-4 ml-4">
                        <h1> Add a new job experience </h1>
                        <form method="POST">
                            <label for="new_position"> New position: </label>
                            <input type="text" class= "form-control" name="new_position" placeholder="the name of your new position" required>
                            <br>

                            <label for="new_company_name"> Company name: </label>
                            <input type="text" class= "form-control" name="new_company_name" placeholder="the name of the company" required>
                            <br>

                            <label for="new_img_company"> Company logo: </label>
                            <input type="text" class= "form-control" name="new_img_company" placeholder="the name of the jpg file">
                            <br>

                            <label for="new_ini_date"> Starting date: </label>
                            <input type="date" class= "form-control" name="new_ini_date" required>
                            <br>

                            <label for="new_end_date"> Ending date: </label>
                            <input type="date" class= "form-control" name="new_end_date">
                            <br>

                            <label for="new_job_description"> Job description: </label>
                            <textarea  class= "form-control" name="new_job_description">  </textarea>
                            <br>

                            <label for="new_job_tec"> Technologies used:</label>
                            <input type="text" class= "form-control" name="new_job_tec" placeholder="the technologies you use in this new position" required>
                            <br>

                            <input type="text" class= "form-control" name= "action" value= "new_job" hidden>

                            <button type="submit" class="btn btn-success mt-5 pull-right"><i class="fa fa-save" aria-hidden="true"></i></button>
                            <br>
                        </form>
                    </div>
                    
                <?php manageJobs(); } ?>


                <!-- NEW COURSE -->

                <?php if(isset($_GET['section']) && $_GET['section'] == 'courses'){?>
                    <div class="mr-4 ml-4">
                        <h1> Add a new course </h1>
                        <form method="POST">
                            <label for="new_course">Course name: </label>
                            <input type="text" class= "form-control" name="new_course" placeholder= "the name of the course" required>
                            <br>

                            <label for="new_institution">Institution name: </label>
                            <input type="text" class= "form-control" name="new_institution" placeholder="the name of institution" required>
                            <br>

                            <label for="new_course_ini_date"> Starting date: </label>
                            <input type="date" class= "form-control" name="new_course_ini_date" required>
                            <br>

                            <label for="new_course_end_date"> Ending date: </label>
                            <input type="date" class= "form-control" name="new_course_end_date">
                            <br>

                            <label for="new_course_tec"> Content of the course:</label>
                            <input type="text" class= "form-control" name="new_course_tec" placeholder="the technologies you learnt" required>
                            <br>

                            <input type="text" class= "form-control" name= "action" value= "new" hidden>

                            <button type="submit" class="btn btn-success mt-5 pull-right"><i class="fa fa-save" aria-hidden="true"></i></button>
                            <br>
                        </form>
                    </div>
                    
                <?php manageCourses(); } ?>

                <!-- NEW LANGUAGE -->

                <?php if(isset($_GET['section']) && $_GET['section'] == 'language'){?>
                    <div class="mr-4 ml-4">
                        <h1> Add a new language </h1>
                        <form method="POST">
                            <label for="new_language"> New language: </label>
                            <input type="text" class= "form-control" name="new_language" placeholder="language" required>
                            <br>

                            <label for="new_language_level"> Level: </label>
                            <input type="number" class= "form-control" name="new_language_level" placeholder="a number from 0 to 100" required>
                            <br>

                            <input type="text" class= "form-control" name= "action" value= "new" hidden>

                            <button type="submit" class="btn btn-success mt-5 pull-right"><i class="fa fa-save" aria-hidden="true"></i></button>
                            <br>
                        </form>
                    </div>
                    
                    <?php manageLanguages(); } ?>

                <!-- NEW SKILL -->

                <?php if(isset($_GET['section']) && $_GET['section'] == 'skills'){?>
                    <div class="mr-4 ml-4">
                        <h1> Add a new skill </h1>
                        <form method="POST">
                            <label for="new_skill"> New skill: </label>
                            <input type="text" class= "form-control" name="new_skill" placeholder="the skill" required>
                            <br>

                            <label for="new_skill_level"> Level: </label>
                            <input type="number" class= "form-control" name="new_skill_level" placeholder="a number from 0 to 100" required>
                            <br>

                            <label for="skill_type"> Is it a hard or a soft skill? </label>
                            <select name="skill_type" class="form-control" required>
                                <option value=""> -- SELECT -- </option>
                                <option value="1"> Hard Skill </option>
                                <option value="0"> Soft Skill </option>
                            </select>
                            <br>

                            <input type="text" class= "form-control" name= "action" value= "new" hidden>

                            <button type="submit" class="btn btn-success mt-5 pull-right"><i class="fa fa-save" aria-hidden="true"></i></button>
                            <br>
                        </form>
                    </div>       
                    <?php manageSkills(); } ?>

    <!-- NEW PROJECT -->

            <?php if(isset($_GET['section']) && $_GET['section'] == 'projects'){?>
                <div class="mr-4 ml-4">
                    <h1> Add a new project </h1>
                    <form method="POST">
                        <label for="new_project"> New project: </label>
                        <input type="text" class= "form-control" name="new_project" placeholder="the name of your new project" required>
                        <br>

                        <label for="new_project_img"> A nice picture of your project: </label>
                        <input type="text" class= "form-control" name="new_project_img" placeholder="the name of the jpg file" required>
                        <br>

                        <label for="new_project_description"> Description of your new project: </label>
                        <input type="text" class= "form-control" name="new_project_description" required>
                        <br>

                        <label for="new_project_url"> The url to find it in GitHub: </label>
                        <input type="text" class= "form-control" name="new_project_url" required>
                        <br>

                        <label for="new_project_end_date"> When did you finish it? </label>
                        <input type="date" class= "form-control" name="new_project_end_date">
                        <br>

                        <label for="new_project_tec"> What technologies did you use? </label>
                        <input type="text" class= "form-control" name="new_project_tec" required>
                        <br>

                        <input type="text" class= "form-control" name= "action" value= "new" hidden>

                        <button type="submit" class="btn btn-success mt-5 pull-right"><i class="fa fa-save" aria-hidden="true"></i></button>
                        <br>
                    </form>
                </div>   
                <?php manageProjects(); } ?>

            </div>
        <footer class="footer text-center mt-3">
            <p>  </p>
        </footer>
    </body>
</html>
