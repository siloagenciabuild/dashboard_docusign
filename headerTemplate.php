<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Flavio Riper">
        
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="dist/css/custom.css" rel="stylesheet">
    
        <title>Dashboard Unimed</title>
    </head>
    <body cz-shortcut-listen="true">
        <div class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0 nav-item nav-link active" href="dashboard.php" style="font-family: unimedbold;">Controle Unimed</a>
            <nav class="nav">
                <a class="nav-link active" href="logout.php" style=" font-family: unimedbold; color: white;">Logout</a>
                <a class="d-lg-none d-xl-none d-md-none nav-item nav-link" id="nav-list-tab" data-toggle="tab" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="false">
                    <i class="fas fa-list" style="color:#fff;"></i><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                </a>
                <a class="d-lg-none d-xl-none d-md-none nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <i class="fas fa-plus" style="color:#fff;"></i><polyline points="13 2 13 9 20 9"></polyline></svg>
                </a>
                <a class="d-lg-none d-xl-none d-md-none nav-item nav-link" id="nav-control-tab" data-toggle="tab" href="#nav-control" role="tab" aria-controls="nav-control" aria-selected="false">
                    <i class="fas fa-users-cog" style="color: #fff;"></i><polyline points="13 2 13 9 20 9"></polyline></svg>
                </a>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="row pt-lg-4 mt-lg-3 pt-5 mt-4 h-100">
                <nav class="col-md-3 d-none d-md-block bg-light sidebar" style="padding: 25px;">

                    <img class="log" src="dist/images/logo.png" style="padding: 20px;">

                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                            <a class="nav-item nav-link" id="nav-list-tab" data-toggle="tab" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="false">
                                <i class="fas fa-list"></i><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                Lista Unimed <span class="sr-only">(current)</span>
                            </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <i class="fas fa-plus"></i><polyline points="13 2 13 9 20 9"></polyline></svg>
                                    Criar Unimed
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link" id="nav-control-tab" data-toggle="tab" href="#nav-control" role="tab" aria-controls="nav-control" aria-selected="false">
                                    <i class="fas fa-users-cog"></i></i><polyline points="13 2 13 9 20 9"></polyline></svg>
                                    Controle Unimed
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-9 tab-content mt-3" id="nav-tabContent">
                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>

                    <script defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js" integrity="sha384-EIHISlAOj4zgYieurP0SdoiBYfGJKkgWedPHH4jCzpCXLmzVsw1ouK59MuUtP4a1" crossorigin="anonymous"></script>