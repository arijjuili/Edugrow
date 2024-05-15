<?php
session_start();




?> 


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>edu_grow platforme
        </title>
       
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/logo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="login.php">se connecter</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="./public/index.php">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">à propos</a></li>
                       <!--- <li class="nav-item"><a class="nav-link" href="#team">Team</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="Client/ListProduits.php">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">log out</a></li>
                        <li class="nav-item"><a class="nav-link" href="reclamation file mteek.php">Reclamation</a></li>
                        <li class="nav-item"><a class="nav-link" href="Forumf ile teek.php">Forum</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <!--<div class="masthead-subheading">Welcome To Our Studio!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>-->
                <div class="masthead-subheading">Bienvenue chez edu_grow</div>
                <div class="masthead-heading text-uppercase">Ravi de vous rencontrer</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Dis m'en plus</a>
                
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <a href="../front/view/listCours.php"><h4 class="my-3">Les Cours</h4></a>
                        <p class="text-muted">Compatibilité avec les lecteurs d'écran pour les utilisateurs aveugles ou malvoyants.
                            Sous-titres codés pour les utilisateurs sourds ou malentendants et 
                            Descriptions audio pour les images et les vidéos.
                           </p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <a href="../front/view/listMatiere.php"><h4 class="my-3">Les Matiéres</h4></a>
                        <p class="text-muted">Tutoriels interactifs pour aider les utilisateurs à apprendre à leur propre rythme,
                            Quiz et évaluations pour mesurer les progrès et
                            Forums de discussion pour interagir avec d'autres étudiants et des instructeurs.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Certifications</h4>
                        <p class="text-muted">Certificats d'achèvement pour les cours terminés et
                            Certifications professionnelles pour des compétences spécifiques.</p>
                    </div>
                </div>
            </div>
        </section>
       
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">à propos</h2>
                    
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2023-2024</h4>
                                <h4 class="subheading">Lancement officiel de la plateforme</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted"> edu_grow Célébre le lancement de notre  plateforme avec un webinaire ou un événement en ligne.
                                Invite des intervenants de renom dans le domaine du handicap et de l'éducation.
                                Propose des démonstrations de la plateforme et de ses fonctionnalités.
                                Offre des réductions ou des promotions pour inciter les gens à s'inscrire.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Janvier 2024</h4>
                                <h4 class="subheading">Journée portes ouvertes virtuelle</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted"> edu_grow Organise une journée portes ouvertes virtuelle pour permettre aux gens de découvrir votre plateforme.
                                Propose des ateliers et des démonstrations de la plateforme.
                                Offre des consultations gratuites avec des experts en accessibilité et en éducation.
                                Réponde aux questions des participants et collectez leurs commentaires.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>février 2024</h4>
                                <h4 class="subheading">Concours de création de contenu</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">edu_grow Organise un concours pour encourager les utilisateurs à créer du contenu éducatif pour la plateforme.
                                Définisse des catégories pour le contenu, comme les tutoriels, les témoignages et les articles de blog.
                                Offre des prix aux gagnants, comme des abonnements gratuits à la plateforme ou des bons d'achat.
                                Faite la promotion du concours sur les réseaux sociaux et auprès de vos partenaires.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>mars 2024</h4>
                                <h4 class="subheading">Bâtir une communauté</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted"> edu_grow Organise une conférence annuelle sur l'éducation accessible et l'inclusion.
                                Invite des conférenciers de renommée internationale.
                                Propose des ateliers et des sessions de formation sur les technologies d'assistance et les meilleures pratiques d'enseignement.
                                Réunisse les enseignants, les étudiants, les familles et les professionnels du handicap.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                faites partie 
                                <br />
                                de notre
                                <br />
                                histoire!
                               
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
       
      
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contactez-nous</h2>
                   
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Vote Nom* *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Votre Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Votre Tel *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Votre Message *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">                   </div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!"></a>
                        <a class="link-dark text-decoration-none" href="#!"></a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>