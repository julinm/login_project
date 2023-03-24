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


        <!-- Log In -->
        <div class="modal" tabindex="-1" role="dialog" id="login">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <label for="username"> Your user name:</label>
                            <input type="text" name="username" id="username" placeholder="username" class="form-control">
                            <br>
                            <label for="password"> Your password:</label>
                            <input type="password" name="password" id="password" placeholder="password" class="form-control">
                            <br>
                            <input type="text" name="session" value="true" hidden>
                            <button type="submit" class="btn btn-info">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


               
        
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
                                            <?php if(isset($_SESSION)){ ?>
                                                <a href="..\controller\logoutController.php" class="btn btn-danger">
                                                     <i class="fa fa-user" aria-hidden="true"></i>
                                                </a>
                                                <a href="..\view\editionView.php" class="btn btn-success">
                                                     <i class="fa fa-plus" aria-hidden="true"></i>
                                                </a>
                                                <a href="..\view\updateView.php" class="btn btn-success">
                                                     <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                
                                                <?php } else { ?>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#login">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </button>
                                            <?php }?>                                            
                                        </div>
                                        <?= $personalData[1]['name'].' '.$personalData[1]['last_name']  ?>  -    <?= $personalData[1]['title'] ?>    

                                    </h2>
                                </div>


                                
                                <hr>
                            </div>
                            <div class="p-4 text-black justify-content-center text-center">
                                <div class="d-flex justify-content-center text-center py-1">
                                    <div class="px-3">  
                                        <span class="p-3 m-2"><a href="mailto:<?= $personalData[1]['email'] ?>"><i class="fa fa-envelope"></i></a> <?= $personalData[1]['email'] ?></span>                                        
                                    </div>
                                    <div class="px-3">
                                        <span class="p-3 m-2"><i class="fa fa-mobile" aria-hidden="true"></i> +34 <?= $personalData[1]['phone'] ?></span>
                                    </div>
                                    <div class="px-3">
                                        <span class="p-3 m-2"><a href="<?= $personalData[1]['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></span>
                                    </div>
                                    <div class="px-3">
                                        <span class="p-3 m-2"><a href="<?= $personalData[1]['github'] ?>" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></span>
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
                                        <p><?= $personalData[1]['description'] ?></p>
                                    </div>
                                </div>

                                <!-- WORK EXPERIENCE  -->


                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-1 text-info">Experiencia Laboral</p>
                                </div>
                                <div class="row g-2">
                                    <?php foreach($allJobs as $job) { ?>
                                    <div class="col mb-4 bg-light rounded-left ml-2 pb-5 shadow">
                                       <div class="h-25">
                                            <h3 class="text-center h-25"><?= $job['position'] ?></h3>
                                        </div>
                                        <div>
                                            <img src="<?= 'assets/'.$job['img_company'] ? 'assets/'.$job['img_company'] : 'assets/defaultLogo'  ?>" class="rounded-circle float-left mr-2" style="width: 25px;" alt="logo BeSoccer">
                                            <p class="text-md ml-2">
                                                <?= $job['company'] ?> | <?= date('M Y ', strtotime($job['ini_date']))?>  -  <?= $job['end_date'] != '0000-00-00' ? date('M Y ', strtotime($job['end_date'])) : 'Actualidad' ?></p>
                                            </p>
                                            <p> Mis tareas:</p>
                                            <ul><?php $jobDescriptions = explode('.', $job['description']); ?>
                                            <?php foreach($jobDescriptions as $description) {?>
                                                <?php if(!empty($description)){?>
                                                    <li> <?= $description ?>.</li>
                                                <?php } ?>
                                            <?php } ?>
                                            </ul>
                                            <?php $tec = str_replace(',', ' -', $job['tec']); ?>
                                            <p><?= $tec ?> </p>
                                        </div>
                                    </div>
                                    <?php }?> 
                                </div>
                                <hr>

                            <!-- EDUCACION -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-1 mt-3 text-info">Formación</p>
                                </div>
                                <div class="row g-2">
                                <?php foreach($allCourses as $course) { ?>
                                    <div class="col mb-2 ml-2 bg-light rounded-right shadow">
                                        <div class="h-25 mb-2">
                                            <h4 class="text-center"><?= $course['name'] ?></h4>
                                        </div>
                                        <hr>
                                        <div class="h-25 mb-5">
                                            <p class="text-sm-center"> <?= $course['institution'] ?></p>
                                            <p class="text-sm-center"> <?= date('M Y ', strtotime($course['ini_date']))?> </p>
                                        </div>
                                        <div>
                                            <?php $tec = str_replace(',', ' -', $course['tec']); ?>
                                            <p class="text-sm-center font-weight-bold"> <?= $tec ?> </p>
                                        </div>
                                    </div>
                                    <?php }?> 
                                </div>
                                <hr>
                                

                            <!-- LANGUAGES -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="lead fw-normal mb-1 mt-3 text-info">Idiomas </h4>
                                </div>
                                <div class="row g-2">
                                <?php foreach($allLanguages as $language) { ?>
                                    <div class="col mb-2 ml-2 bg-light rounded-right pt-2 shadow">
                                        <p><?= ucfirst($language['name']) ?></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-animated bg-info" role="progressbar" style="width: <?= $language['level'] ?>%" aria-valuenow="<?= $language['level'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <hr>

                            <!-- HARD AND SOFT SKILLS -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-0 mt-3 text-info">Habilidades</p>
                                </div>
                                <div class="row g-2">
                                <?php foreach($allSkills['hard'] as $skill) { ?>
                                    <div class="col mb-2 ml-2 bg-light rounded-right pt-2 shadow">      
                                        <div class="h-25 mb-5">
                                            <p class="text-center"><?= $skill['name'] ?></p>
                                        </div>

                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $skill['level'] ?>%" aria-valuenow="<?= $skill['level'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <hr>

                                <div class="row g-2">
                                <?php foreach($allSkills['soft'] as $skill) { ?>
                                    <div class="col mb-2 ml-2 bg-light rounded-right pt-2 shadow">  
                                        <div class="h-25 mb-5">
                                            <p class="text-center"><?= $skill['name'] ?></p>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $skill['level'] ?>%" aria-valuenow="<?= $skill['level'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <hr>

                            <!-- PROYECTOS -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-1 mt-3 text-info">Proyectos</p>
                                </div>
                                <div class="row g-2">
                                  <div class="col m-2 rounded-right pt-2">  
                                    <div id="carouselProyects" class="carousel slide" data-ride="carousel">
                                      <div class="carousel-inner">
                                      <?php foreach($allProjects as $project) { ?>
                                        <?php if($project['id'] == 1){$active = 'active';} else {$active = '';}?>
                                        <div class="carousel-item <?= $active ?>">
                                            <div class="text-center">
                                                <img src="<?= 'assets/'.$project['img'] ?  'assets/'.$project['img'] : 'assets/projectDefault.jpeg'?>" alt="<?= $project['name'] ?>">
                                            </div>
                                          
                                            <div class="carousel-caption d-none d-md-block mt-4">
                                                <h5><?= $project['name'] ?></h5>
                                                <a href="<?= $project['url'] ?>" class="btn btn-info"> Ver en GitHub <i class="fa fa-github" aria-hidden="true"></i></a> 
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <hr>

                                      <button class="carousel-control-prev border-0" type="button" data-target="#carouselProyects" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                                      </button>
                                      <button class="carousel-control-next border-0" type="button" data-target="#carouselProyects" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="false"></span>
                                      </button>
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
