<?php

require "../database/dbBroker.php";
require "../model/beer.php";

session_start();

if ($_SESSION['isLogged'] != "true") {
    header("Location: login.php");
    die();
}

$beers = Beer::getAllBeers($_SESSION['userID'], $conn);

if (!$beers) {
    echo "Error";
}



?>




<!doctype html>
<html lang="en">

<head>
    <title>Pivoteka</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/home-bootstrap.css">
    <link rel="stylesheet" href="/css/table.css">
    <link rel="shortcut icon" href="/util/favicon.png" type="image/x-icon">




</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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
                        <form method="POST" id="addSubmenu" class="collapse">
                            <div class="form-group"><input type="text" placeholder="name" class="form-control" name="name" id="addFormName"></div>
                            <div class="form-group"><input type="text" placeholder="country of origin" class="form-control" name="country" id="addFormCountry"></div>
                            <div class="form-group">
                                <select id="typeSelectionAdd" class="form-control" name="type">
                                    <option value="Ale">Ale</option>
                                    <option value="Lager">Lager</option>
                                    <option value="Porter">Porter</option>
                                    <option value="Stout">Stout</option>
                                    <option value="Blonde Ale">Blonde Ale</option>
                                    <option value="Brown Ale">Brown Ale</option>
                                    <option value="Indian Pale Ale">Indian Pale Ale</option>
                                    <option value="Wheat">Wheat</option>
                                    <option value="Pilsner">Pilsner</option>
                                    <option value="Sour Ale">Sour Ale</option>
                                </select>
                            </div>
                            <div class="form-group"><input type="number" step="0.01" placeholder="Alcohol %" class="form-control" name="alcohol" id="addFormAlcohol"></div>
                            <div class="form-group">
                                <select id="sizeSelectionAdd" class="form-control" name="size">
                                    <option value="0.33">0.33</option>
                                    <option value="0.5">0.5</option>
                                </select>
                            </div>
                            <div class="form-group"><input type="number" step="0.01" max="10" min="1" placeholder="Rating (1-10)" class="form-control" name="rating" id="addFormRating"></div>
                            <div class="form-group"><input type="submit" class="btn btn-block" value="Add" style="background-color: #FDEEDC; color: #E38B29; border: none;"></div>

                        </form>
                        <!-- </ul> -->
                    </li>
                    <li>
                        <a href="#searchSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Search</a>
                        <ul class="collapse list-unstyled" id="searchSubmenu">
                            <div class="form-group"><button id="btnShowCompleteList" class="btn btn-success btn-block" style="background-color: #FDEEDC; color: #E38B29; border: none;">Show complete list</button></div>
                            <div class="form-group"><input type="text" placeholder="search by name" class="form-control" id="searchByNameField"></div>
                            <div class="form-group"><input type="text" placeholder="search by id" class="form-control" id="searchByIdField"></div>
                        </ul>
                    </li>

                    <li>
                        <a href="#orderSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Order</a>
                        <ul class="collapse list-unstyled" id="orderSubmenu">
                            <div class="form-group"><button onclick="dugme()" class="btn btn-success btn-block" style="background-color: #FDEEDC; color: #E38B29; border: none;">Order by Rating</button></div>
                            <div class="form-group"><button onclick="dugme()" class="btn btn-success btn-block" style="background-color: #FDEEDC; color: #E38B29; border: none;">Order by Name</button></div>
                        </ul>
                    </li>

                    <li>

                        <a href="#updateSubmenu" data-toggle="collapse" style="border-top:none;">
                            <button id="btnUpdate" class="btn btn-success btn-block" style="background-color: #FDEEDC; color: #E38B29; border: none;">Update selected</button>
                        </a>

                        <form method="POST" id="updateSubmenu" class="collapse">
                            <div class="form-group"><input type="text" name="beerID" placeholder="id" class="form-control" id="updateIdField" readonly></div>
                            <div class="form-group"><input id="updateNameField" name="name" type="text" placeholder="name" class="form-control"></div>
                            <div class="form-group"><input id="updateCountryField" name="country" type="text" placeholder="country of origin" class="form-control"></div>
                            <div class="form-group">
                                <select name="type" id="typeSelectionUpdate" class="form-control">
                                    <option value="Ale">Ale</option>
                                    <option value="Lager">Lager</option>
                                    <option value="Porter">Porter</option>
                                    <option value="Stout">Stout</option>
                                    <option value="Blonde Ale">Blonde Ale</option>
                                    <option value="Brown Ale">Brown Ale</option>
                                    <option value="Indian Pale Ale">Indian Pale Ale</option>
                                    <option value="Wheat">Wheat</option>
                                    <option value="Pilsner">Pilsner</option>
                                    <option value="Sour Ale">Sour Ale</option>
                                </select>
                            </div>
                            <div class="form-group"><input type="number" step="0.01" placeholder="Alcohol %" class="form-control" id="updateFormAlcohol" name="alcohol"></div>
                            <div class="form-group">
                                <select name="size" id="sizeSelectionUpdate" class="form-control">
                                    <option value="0.33">0.33</option>
                                    <option value="0.5">0.5</option>
                                </select>
                            </div>
                            <div class="form-group"><input type="number" name="rating" step="0.01" min="1" max="10" placeholder="Rating (1-10)" class="form-control" id="updateFormRating"></div>
                            <div class="form-group"><input type="submit" class="btn btn-block" value="Save changes" style="background-color: #FDEEDC; color: #E38B29; border: none;"></div>


                        </form>
                    </li>

                    <li>
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <button class="btn btn-danger btn-block" style="margin-top: 1.2vh;" id="btnDeleteBeer">Delete selected</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <a href="../handler/logut.php"><button class="btn btn-info ">Log out</button></a>
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
                            <table id="table">
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
                                    <?php
                                    while ($row = $beers->fetch_array()) {
                                    ?>
                                        <tr id="tr-<?php echo $row["beerID"] ?>">
                                            <td class="column1 radioStyle">
                                                <label class="radio-btn">
                                                    <input type="radio" class="form-check-input " name="flexRadioDisabled" id="radiobtn" value=<?php echo $row["beerID"] ?>>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td class="column2"><?php echo $row["name"] ?></td>
                                            <td class="column3"><?php echo $row["country"] ?></td>
                                            <td class="column4"><?php echo $row["type"] ?></td>
                                            <td class="column5"><?php echo $row["size"] ?></td>
                                            <td class="column6"><?php echo $row["alcohol"] ?></td>
                                            <td class="column7"><?php echo $row["rating"] ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/main.js"></script>

    <!-- <script src="/js/jquery.min.js"></script> -->
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/home-bootstrap.js"></script>
</body>

</html>