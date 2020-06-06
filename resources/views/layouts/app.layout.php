<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/material-kit.min.css">
    <title>{% block title %}{% endblock %}</title>
</head>
<body>
    <!-- include navigation bar -->
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="btn btn-info" href="https://sigesonline.univ-dschang.org/" class="float-left">
                    login to sigesonline</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <!-- TODO: Restore this when having other options -->
                    <li class="d-none dropdown nav-item">
                        <a class="btn btn-warning" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">apps</i> Components
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a  href="../index.html" class="dropdown-item">
                                <i class="material-icons">layers</i> All Components
                            </a>
                            <a href="https://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
                                <i class="material-icons">content_paste</i> Documentation
                            </a>
                        </div>
                    </li>
                    <li class="nav-item mr-lg-3">
                        <a class="nav-link" href="account/dashboard.php">
                            dashboard
                        </a>
                    </li>
                    <li class="nav-item mr-lg-3">
                        <a class="btn btn-info" href="account/dashboard.php">
                            About Y'G
                        </a>
                    </li>
                    <?php if(isset($_SESSION['active_user'])): ?>
                        <li class="nav-item mr-lg-3">
                            <a class="btn btn-info" href="logout.php">
                                logout
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item mr-lg-3">

                            <a class="btn btn-info" href="login.php">
                                login
                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-warning" href="register.php">
                                register
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- include the page header -->
    <div class="page-header header-filter clear-filter dangerS-filter" data-parallax="true" style="background-image: url('assets/images/intro.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand text-center">
                        <h1>Welcome to IUT-FV Bandjoun</h1>
                        <h3>Get results and updates from your department in real time</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main site content -->
    <div class="main main-raised py-5">
        <div class="container">
            {% block content %}{% endblock %}
        </div>
    </div>

    <!-- incluce the footer of the site -->
    <footer class="footer" data-background-color="black">
        <div class="container">
        <div class="brand text-center">
                    <div>   <h1>WHAT WE OFFER AT IUT-FV DE BANDJOUN</h1>
                        <h3>la formation a l'iut fotso victor de bandjoun</h3>
                    </div>
            <nav class="float-left">  
                <ul>
                    <li>
                        <a href="https://www.creative-tim.com/">

                        <p1  class="btn btn-warning">Diplome Universitaire de Technologie(DUT), Mention :<p1><br><br>
                        <p class="float-left">-Maintenance Industrielle et productique (MIP)</p><br>
                        <p class="float-left">-Genie Civil (GC)</p><br>
                        <p class="float-left">-Genie des Telecommunication et Reseaux (GTR)</p><br>
                        <p class="float-left">-Genie Thermique Energie et Environnement(GTEE)</p><br>
                        <p class="float-left">-Genie informatique (GI)</p><br>
                        <p class="float-left">-Genie Electric(GE) (Electronique et Electronique)</p><br>
                        <p class="float-left">-Mecatronique Automobile (MKA)</p><br>

                        
                        
                        
                      

                       
                    </li>
                    <li>
                        <div>
                         <p1  class="btn btn-warning">Brevet Technicien Superieur(BTS), Mention :<p1><br><br>
                         <p class="float-left">-Genie Civil (GC)</p><br>
                         <p class="float-left">-Comptabiulite et Gestion des Entreprise  </p><br>
                         <p class="float-left">-Action commerciale (ACo)</p><br>
                         <p class="float-left">-Secretariat de Direction (SD)</p><br>
                         <p class="float-left">-Elecronique (EL)</p><br>
                         <p class="float-left">-Comptabiulite et Gestion des Entreprise  </p><br>
                         <p class="float-left">-Banque (Bq)</p><br>
                        </div>

                            
                        
                    </li>
                    <li>
                        <a href="https://www.creative-tim.com/blog">
                        <p1  class="btn btn-info">Licencede Technologie (LT), Mention :<p1><br><br>
                        <p class="float-left">-Genie Civil (GC)</p><br>
                        <p class="float-left">-maintenace industrielle et Production</p><br>
                        <p class="float-left">-Informatique et reseaux (IR) </p><br>
                        <p class="float-left">-Ingenierie des Reseaux et Telecommunication</p><br>
                        <p class="float-left">-Genie Electrique (GE)</p><br>
                        <p class="float-left">- Gestion et maintenance Industrielle Eergetic (GMIE)</p><br>
                        <p class="float-left">-Genie Geomatique</p><br>


                        </a>
                    </li>
                    <li>
                        <a href="https://www.creative-tim.com/license">
                        <p1  class="btn btn-info">Licencede Professionnelle(LP), Mention :<p1><br><br>
                        <p class="float-left">-Gestion comptable et Financiere (GCF)</p><br>
                        <p class="float-left">-Gestion Administrative,Management des </p><br>
                        <p class="float-left">-Commerce Marketing (CM)  </p><br>
                        <p class="float-left">- Banque Gestion des Relations CLientele</p><br>
                        
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a> for a better web.
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="assets/js/bootstrap-datetimepicker.js"></script>
    <script src="assets/js/jquery.sharrre.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/nouislider.min.js"></script>
</body>

</html>