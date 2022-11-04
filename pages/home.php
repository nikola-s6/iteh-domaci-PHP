<!doctype html>
<html lang="en">

<head>
    <title>Pivoteka</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/home-bootstrap.css">
    <link rel="stylesheet" href="/css/table.css">
    <link rel="shortcut icon" href="/util/favicon.png" type="image/x-icon">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4 pt-5">
                <!-- <h1><a href="home.php" class="logo">Splash</a></h1> -->
                <img src="/util/logo.png" alt="" srcset="" class="logo" style="width:80%; margin-bottom: 1.7vh; transform: translate(10%)">
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="#addSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Add new </a>
                        <form action="" method="post" id="addSubmenu" class="collapse">
                            <div class="form-group"><input type="text" placeholder="name" class="form-control"></div>
                            <div class="form-group"><input type="text" placeholder="name" class="form-control"></div>
                            <div class="form-group"><input type="text" placeholder="country of origin" class="form-control"></div>
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">Ale</option>
                                    <option value="">Lager</option>
                                    <option value="">Porter</option>
                                    <option value="">Stout</option>
                                    <option value="">Blonde Ale</option>
                                    <option value="">Brown Ale</option>
                                    <option value="">Indian Pale Ale</option>
                                    <option value="">Wheat</option>
                                    <option value="">Pilsner</option>
                                    <option value="">Sour Ale</option>
                                </select>
                            </div>
                            <div class="form-group"><input type="number" placeholder="Alcohol %" class="form-control"></div>
                            <div class="form-group"><input type="number" min="1" max="10" placeholder="Rating (1-10)" class="form-control"></div>
                            <div class="form-group"><button onclick="dugme()" class="btn btn-success btn-block" style="background-color: #FDEEDC; color: #E38B29; border: none;">Add</button></div>


                        </form>
                        <!-- </ul> -->
                    </li>
                    <li>
                        <a href="#searchSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Search</a>
                        <ul class="collapse list-unstyled" id="searchSubmenu">
                            <div class="form-group"><button onclick="dugme()" class="btn btn-success btn-block" style="background-color: #FDEEDC; color: #E38B29; border: none;">Show complete list</button></div>
                            <div class="form-group"><input type="text" placeholder="search by name" class="form-control"></div>
                            <div class="form-group"><input type="text" placeholder="search by id" class="form-control"></div>
                        </ul>
                    </li>

                    <li>

                        <a href="#updateSubmenu" data-toggle="collapse" style="border-top:none;">
                            <button onclick="dugme()" class="btn btn-success btn-block" style="background-color: #FDEEDC; color: #E38B29; border: none;">Update selected</button>
                        </a>

                        <form action="" method="post" id="updateSubmenu" class="collapse">
                            <div class="form-group"><input type="text" placeholder="id" class="form-control" readonly></div>
                            <div class="form-group"><input type="text" placeholder="name" class="form-control"></div>
                            <div class="form-group"><input type="text" placeholder="name" class="form-control"></div>
                            <div class="form-group"><input type="text" placeholder="country of origin" class="form-control"></div>
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">Ale</option>
                                    <option value="">Lager</option>
                                    <option value="">Porter</option>
                                    <option value="">Stout</option>
                                    <option value="">Blonde Ale</option>
                                    <option value="">Brown Ale</option>
                                    <option value="">Indian Pale Ale</option>
                                    <option value="">Wheat</option>
                                    <option value="">Pilsner</option>
                                    <option value="">Sour Ale</option>
                                </select>
                            </div>
                            <div class="form-group"><input type="number" placeholder="Alcohol %" class="form-control"></div>
                            <div class="form-group"><input type="number" min="1" max="10" placeholder="Rating (1-10)" class="form-control"></div>
                            <div class="form-group"><button onclick="dugme()" class="btn btn-success btn-block" style="background-color: #FDEEDC; color: #E38B29; border: none;">Update</button></div>


                        </form>
                    </li>

                    <li>
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <button class="btn btn-danger btn-block" style="margin-top: 1.2vh;">Delete selected</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <a href="login.php"><button class="btn btn-info ">Log out</button></a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <table>
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1"></th>
                                        <th class="column2">Name</th>
                                        <th class="column3">Country of origin</th>
                                        <th class="column4">Type</th>
                                        <th class="column5">Size</th>
                                        <th class="column6">Alcohol %</th>
                                        <th class="column7">Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="column1 radioStyle">
                                            <label class="radio-btn">
                                                <input type="radio" class="form-check-input " name="flexRadioDisabled">
                                                <span class="checkmark"></span>
                                            </label>
                                            <!-- <input type="radio" class="form-check-input " name="flexRadioDisabled"> -->
                                        </td>
                                        <td class="column2">Blanc</td>
                                        <td class="column3">France</td>
                                        <td class="column4">Wheat</td>
                                        <td class="column5">4.5</td>
                                        <td class="column6">0.33</td>
                                        <td class="column7">9.2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/main.js"></script>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/home-bootstrap.js"></script>
</body>

</html>