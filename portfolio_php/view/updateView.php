<?php
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\coursesController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\jobsController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\projectsController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\personalDataController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\skillsController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\languagesController.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\repository\usersRepository.php');
include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\controller\loginController.php');


$allCourses = showCourses();
$allJobs = showJobs();
$allSkills= showSkills();
$allLanguages = showLanguages();
$allProjects = showProjects();
$personalData = showData();

session_start();


//LOGIN


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
        
        <!-- PORTFOLIO  -->
        <section class="h-100 gradient-custom-2">

            <div class="container py-1 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-9 col-xl-10  text-center ">
                        <div class="card">

                        <!-- Foto de perfil y banner  -->
                            <div>
                                <div class="rounded-top d-flex flex-row" style="background-color:  #2a8797; height:200px;">
                                    <div class="d-flex flex-row">
                                        <div style="width: 200px; margin-top: 50px;">
                                            <img src="<?= './assets/'.$personalData[1]['profile_pic'] ?>"
                                            alt="Julia Menardi" class="img-fluid mt-5 rounded-circle ml-5"
                                            style="width: 150px; z-index: 1">
                                        </div>
                                        <div class="d-flex flex-col">
                                            <video style="min-width: 100%;" playsinline autoplay muted loop >          
                                                <source src="./assets/bannerVideo.mp4" type="video/mp4"/>
                                            </video>
                                        </div>  
                                    </div>
                                </div>  
                            </div>
                            <div class="col text-center">
                                <div class="pt-4 text-black d-flex justify-content-center text-center">
                                    <h2>
                                        <div class="pull-left mr-4">
                                            <a href="..\controller\logoutController.php" class="btn btn-danger">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                            </a>     
                                        </div>
                                    </h2>                                          
                                        <div class="mt-2">
                                            <form method="POST">
                                                <label for="name"> Your name:</label>
                                                <input type="text" class= "form-control" name="name" value="<?= $personalData[1]['name'] ?>">
                                                <br>
                                                <label for="last_name"> Your lastname:</label>
                                                <input type="text" class= "form-control" name="lastname" value="<?= $personalData[1]['last_name'] ?>">
                                                <input type="text" class= "form-control" name="id" value="<?= 1 ?>" hidden>
                                                <input type="text" class= "form-control" name="email" value= "<?= $personalData[1]['email'] ?>" hidden>
                                                <input type="text" class= "form-control" name="phone" value= "<?= $personalData[1]['phone'] ?>" hidden>
                                                <input type="text" class= "form-control" name="linkedin" value= "<?= $personalData[1]['linkedin'] ?>" hidden>
                                                <input type="text" class= "form-control" name="github" value= "<?= $personalData[1]['github'] ?>" hidden>
                                                <input type="text" class= "form-control" name="action" value= "update" hidden>    
                                                <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            <div class="p-4 text-black justify-content-center text-center">
                                <div class="d-flex justify-content-center text-center py-1">
                                    <div class="px-3">
                                        <form method="POST">
                                            <label for="email"> Email:</label>
                                            <input type="text" class= "form-control" name="email" value="<?= $personalData[1]['email'] ?>">
                                            <input type="text" class= "form-control" name="id" value="<?= 1 ?>" hidden>
                                            <input type="text" class= "form-control" name="email" value= "<?= $personalData[1]['name'] ?>" hidden>
                                            <input type="text" class= "form-control" name="email" value= "<?= $personalData[1]['last_name'] ?>" hidden>
                                            <input type="text" class= "form-control" name="phone" value= "<?= $personalData[1]['phone'] ?>" hidden>
                                            <input type="text" class= "form-control" name="linkedin" value= "<?= $personalData[1]['linkedin'] ?>" hidden>
                                            <input type="text" class= "form-control" name="github" value= "<?= $personalData[1]['github'] ?>" hidden>
                                            <input type="text" class= "form-control" name="action" value= "update" hidden>
                                            <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                    <hr>
                                    <div class="px-3">                                       
                                        <form method="POST">
                                            <label for="phone"> Phone:</label>
                                            <input type="text" class= "form-control" name="phone" value="<?= $personalData[1]['phone'] ?>">
                                            <input type="text" class= "form-control" name = "id" value="<?= 1 ?>" hidden>
                                            <input type="text" class= "form-control" name="email" value= "<?= $personalData[1]['name'] ?>" hidden>
                                            <input type="text" class= "form-control" name="email" value= "<?= $personalData[1]['last_name'] ?>" hidden>
                                            <input type="text" class= "form-control" name="phone" value= "<?= $personalData[1]['email'] ?>" hidden>
                                            <input type="text" class= "form-control" name="linkedin" value= "<?= $personalData[1]['linkedin'] ?>" hidden>
                                            <input type="text" class= "form-control" name="github" value= "<?= $personalData[1]['github'] ?>" hidden>
                                            <input type="text" class= "form-control" name= "action" value= "update" hidden>
                                            <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                    <hr>
                                    <div class="px-3">
                                        <form method="POST">
                                            <label for="linkedin"> LinkedIn:</label> 
                                            <input type="text" class= "form-control" name="linkedin" value="<?= $personalData[1]['linkedin'] ?>">
                                            <input type="text" class= "form-control" name = "id" value="<?= 1 ?>" hidden>                                            
                                            <input type="text" class= "form-control" name="email" value= "<?= $personalData[1]['name'] ?>" hidden>
                                            <input type="text" class= "form-control" name="email" value= "<?= $personalData[1]['last_name'] ?>" hidden>
                                            <input type="text" class= "form-control" name="phone" value= "<?= $personalData[1]['phone'] ?>" hidden>
                                            <input type="text" class= "form-control" name="linkedin" value= "<?= $personalData[1]['email'] ?>" hidden>
                                            <input type="text" class= "form-control" name="github" value= "<?= $personalData[1]['github'] ?>" hidden>
                                            <input type="text" class= "form-control" name= "action" value= "update" hidden>
                                            <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                    <hr>
                                    <div class="px-3">                                       
                                        <form method="POST">
                                            <label for="github"> GitHub:</label> 
                                            <input type="text" class= "form-control" name="github" value="<?= $personalData[1]['github'] ?>">
                                            <input type="text" class= "form-control" name = "id" value="<?= 1 ?>" hidden>
                                            <input type="text" class= "form-control" name="email" value= "<?= $personalData[1]['name'] ?>" hidden>
                                            <input type="text" class= "form-control" name="email" value= "<?= $personalData[1]['last_name'] ?>" hidden>
                                            <input type="text" class= "form-control" name="phone" value= "<?= $personalData[1]['phone'] ?>" hidden>
                                            <input type="text" class= "form-control" name="linkedin" value= "<?= $personalData[1]['email'] ?>" hidden>
                                            <input type="text" class= "form-control" name="github" value= "<?= $personalData[1]['linkedin'] ?>" hidden>
                                            <input type="text" class= "form-control" name= "action" value= "update" hidden>
                                            <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        </form>
                                        <?php managePersonalData(); ?>
                                   </div>   
                                </div>
                              </div>
                        </div>
                    </div>
                        

                        <!-- PERSONAL INFORMATION  -->
                        
                    <div class="col col-lg-9 col-xl-10">
                        <div class="card mt-2">
                            <div class="card-body p-4 text-blackshadow">
                                <div class="mb-5 shadow">
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                                               
                                        <form method="POST">
                                            <label for="description"> Summary:</label>
                                            <input type="text" class= "form-control" name="description" value="<?= $personalData[1]['description'] ?>">
                                            <input type="text" class= "form-control" name = "id" value="<?= 1 ?>" hidden>
                                            <input type="text" class= "form-control" name= "action" value= "update" hidden>
                                            <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        </form> 
                                            <br>     
                                    <?php managePersonalData();  ?>
                                </div>
                            </div>
                            <hr>

                                <!-- WORK EXPERIENCE  -->


                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-1 text-info">Experiencia Laboral</p>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-4 bg-light rounded-left ml-2 pb-5 shadow">
                                    <?php foreach($allJobs as $job) { ?>
                                                                         
                                        <form method="POST">
                                            <label for="position"> Position: </label>
                                            <input type="text" class= "form-control" name="position" value="<?= $job['position'] ?>">
                                            <br>
                                            <label for="company"> Company:</label>
                                            <input type="text" class= "form-control" name="company" value="<?= $job['company'] ?>">
                                            <br>
                                            <label for="img_company"> Company image:</label>
                                            <input type="text" class= "form-control" name="img_company" value="<?= $job['img_company'] ?>">
                                            <br>
                                            <label for="job_ini_date"> Starting date:</label>
                                            <input type="text" class= "form-control" name="job_ini_date" value="<?= $job['ini_date'] ?>">
                                            <br>
                                            <label for="job_end_date"> Ending date:</label>
                                            <input type="text" class= "form-control" name="job_end_date" value="<?= $job['end_date'] ?>">
                                            <br>
                                            <label for="job_description"> Description: </label>
                                            <input type="text" class= "form-control" name="job_description" value="<?= $job['description'] ?>">
                                            <br>
                                            <label for="job_tec">Technologies:</label>
                                            <input type="text" class= "form-control" name="job_tec" value="<?= $job['tec'] ?>">
                                            <input type="text" class= "form-control" name = "job_id" value="<?= $job['id']?>" hidden>
                                            <input type="text" class= "form-control" name= "action" value= "update_job" hidden>
                                            <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <input type="text" class= "form-control" name="action" value= "delete_job" hidden>    
                                            <button type="submit" class="btn btn-danger pull-left mb-4 mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form> 
                                        <hr>
                                        <br>     
                                    <?php manageJobs(); }?>
                                </div>
                            </div>
                            <hr>

                            <!-- EDUCACION -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-1 mt-3 text-info">Formación</p>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-2 ml-2 bg-light rounded-right shadow">
                                    <?php foreach($allCourses as $course) { ?>
                                        <form method="POST">
                                            <label for="course_name"> Name: </label>
                                            <input type="text" class= "form-control" name="course_name" value="<?= $course['name'] ?>">
                                            <br>
                                            <label for="institution"> Institution </label>
                                            <input type="text" class= "form-control" name="institution" value="<?= $course['institution'] ?>">
                                            <br>
                                            <label for="course_ini_date"> Starting date</label>
                                            <input type="text" class= "form-control" name="course_ini_date" value="<?= $course['ini_date'] ?>">
                                            <br>
                                            <label for="course_end_date"> Ending date </label>
                                            <input type="text" class= "form-control" name="course_end_date" value="<?= $course['end_date'] ?>">
                                            <br>
                                            <label for="course_tec"> Technologies</label>
                                            <input type="text" class= "form-control" name="course_tec" value="<?= $course['tec'] ?>">
                                            <input type="text" class= "form-control" name = "course_id" value="<?= $course['id'] ?>" hidden>
                                            <input type="text" class= "form-control" name= "action" value= "update_course" hidden>
                                            <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <input type="text" class= "form-control" name="action" value= "delete_course" hidden>    
                                            <button type="submit" class="btn btn-danger pull-left mb-4 mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form> 
                                        <hr>
                                        <br>     
                                    <?php manageCourses(); } ?>
                                </div>
                            </div>
                            <hr>
                                

                            <!-- LANGUAGES -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="lead fw-normal mb-1 mt-3 text-info">Idiomas </h4>
                                </div>
                                <div class="row g-2">
                                <div class="col mb-2 ml-2 bg-light rounded-right pt-2 shadow">

                                <?php foreach($allLanguages as $language) { ?>
                                     
                                        <form method="POST">
                                            <label for="language_name"> Language: </label>
                                            <input type="text" class= "form-control" name="language_name" value="<?= $language['name'] ?>">
                                            <br>
                                            <label for="language_level"> Level: </label>
                                            <input type="text" class= "form-control" name="language_level" value="<?= $language['level'] ?>">
                                            <br>
                                            <input type="text" class= "form-control" name = "language_id" value="<?= $language['id'] ?>" hidden>
                                            <input type="text" class= "form-control" name= "action" value= "update_language" hidden>
                                            <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <input type="text" class= "form-control" name="action" value= "delete_language" hidden>    
                                            <button type="submit" class="btn btn-danger pull-left mb-4 mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form> 
                                        <hr>
                                        <br>     
                                        <?php manageLanguages(); } ?>
                                    </div>
                                </div>
                                <hr>

                            <!-- HARD AND SOFT SKILLS -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-0 mt-3 text-info">Habilidades</p>
                                </div>
                                <div class="row g-2">
                                <div class="col mb-2 ml-2 bg-light rounded-right pt-2 shadow">      

                                <?php foreach($allSkills['all'] as $skill) { ?>
                                       
                                       
                                        <form method="POST">
                                            <label for="skill_name"> Skill: </label>
                                            <input type="text" class= "form-control" name="skill_name" value="<?= $skill['name'] ?>">
                                            <br>
                                            <label for="skill_level"> Level: </label>
                                            <input type="text" class= "form-control" name="skill_level" value="<?= $skill['level'] ?>">
                                            <br>
                                            <label for="skill_type"> Type: </label>
                                            <select name="skill_type" class="form-control">
                                                <option value="0" <?= $skill['type'] == 0 ? 'selected' : '' ?>> Soft </option>
                                                <option value="1" <?= $skill['type'] == 1 ? 'selected' : '' ?>>Hard</option>
                                            </select>
                                            <input type="text" class= "form-control" name="skill_id" value="<?= $skill['id'] ?>" hidden>
                                            <input type="text" class= "form-control" name= "action" value= "update_skill" hidden>
                                            <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <input type="text" class= "form-control" name="action" value= "delete_skill" hidden>    
                                            <button type="submit" class="btn btn-danger pull-left mb-4 mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form> 
                                        <hr>
                                        <br>     
                                        <?php manageSkills(); } ?>
                                    </div>
                                </div>
                                <hr>

                            <!-- PROYECTOS -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-1 mt-3 text-info">Proyectos</p>
                                </div>
                                <div class="row g-2">
                                  <div class="col m-2 rounded-right pt-2">  
                                      <?php foreach($allProjects as $project) { ?>
                                        <?php if($project['id'] == 1){$active = 'active';} else {$active = '';}?>
                                         
                                        <form method="POST">
                                            <label for="project_name"> Name:</label>
                                            <input type="text" class= "form-control" name="project_name" value="<?= $project['name'] ?>">
                                            <br>
                                            <label for="project_url"> GitHub link:</label>
                                            <input type="text" class= "form-control" name="project_url" value="<?= $project['url'] ?>">
                                            <br>
                                            <label for="project_name"> Image:</label>
                                            <input type="text" class= "form-control" name="project_img" value="<?= $project['img'] ?>">
                                            <br>
                                            <input type="text" class= "form-control" name="project_id" value="<?= $project['id'] ?>" hidden>
                                            <input type="text" class= "form-control" name= "action" value= "update_project" hidden>
                                            <button type="submit" class="btn btn-info pull-right mb-4 mt-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <input type="text" class= "form-control" name="action" value= "delete" hidden>    
                                            <button type="submit" class="btn btn-danger pull-left mb-4 mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form> 
                                        <hr>
                                        <br>  
                                        <?php manageProjects(); } ?>
                                    </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

 

        <footer class="footer text-center mt-3">
            <p>  </p>
        </footer>
  </body>
</html>
