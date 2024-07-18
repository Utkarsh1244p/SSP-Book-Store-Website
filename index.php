<?php
include ('db_connect.php');
$country = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <link rel="stylesheet" href="styles.css">


    <title>Books Store</title>
</head>

<body>


    <!-- NAVBAR SECTION START -->
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                </ul>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal"
                        data-bs-target="#login">Login</button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">Sign-up</button>
                </div>
            </div>
        </div>
    </header>
    <!-- NAVBAR ENDS -->



    <!-- SIGNUP MODAL START -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="signup.php" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-group my-2">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="fname" required>
                            <br>
                        </div>

                        <div class="form-group my-2">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" required>
                            <br>
                        </div>

                        <div class="form-group my-2">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10" required><br>
                        </div>

                        <div class="form-group my-2">
                            <label for="country">Country:</label>
                            <select id="country" name="country" required>
                                <option value="">Select Country</option>
                                <?php

                                $sql = "SELECT DISTINCT country FROM csc_names ORDER BY country ASC";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . htmlspecialchars($row["country"]) . '">' . htmlspecialchars($row["country"]) . '</option>';
                                    //print_r($row);
                                    // var_dump($row["country"]);
                                }


                                ?>

                            </select>
                        </div>


                        <div class="form-group my-2">
                            <label for="state">State:</label>
                            <select id="state" name="state" disabled required>
                                <option value="">Select State </option>
                            </select>
                        </div>

                        <div class="form-group my-2">
                            <label for="city">City:</label>
                            <select id="city" name="city" disabled required>
                                <option value="">Select City</option>
                            </select>
                        </div>


                        <div class="form-group my-2">
                            <label for="street">Street Address:</label>
                            <input type="text" id="street" name="street" required>
                            <br>
                        </div>

                        <div class="form-group my-2">
                            <label for="postalCode">Zip Code:</label>
                            <input type="text" id="postalCode" name="postalCode" maxlength="5" pattern="\d{5}" required>
                            <br>
                        </div>



                        <!-- Aadhaar Card File Upload -->
                        <div class="form-group my-2">
                            <label for="aadhar">Upload Aadhaar Card:</label>
                            <input type="file" id="aadhar" name="aadhar" accept=".pdf, .jpg, .jpeg, .png" required>
                        </div>

                        <!-- PAN Card File Upload -->
                        <div class="form-group my-2">
                            <label for="pan">Upload PAN Card:</label>
                            <input type="file" id="pan" name="pan" accept=".pdf, .jpg, .jpeg, .png" required>
                        </div>

                        <!-- PAN Card Number Input -->
                        <div class="form-group my-2">
                            <label for="panNumber">PAN Card Number:</label>
                            <input type="text" id="panNumber" name="panNumber" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
                                maxlength="10" required>
                        </div>

                        <!-- Aadhaar Card Number Input -->
                        <div class="form-group my-2">
                            <label for="aadharNumber">Aadhaar Card Number:</label>
                            <input type="text" id="aadharNumber" name="aadharNumber" pattern="\d{4}\s\d{4}\s\d{4}"
                                maxlength="14" placeholder="XXXX XXXX XXXX" required>
                        </div>

                        <!-- Gender Dropdown -->
                        <div class="form-group my-2">
                            <label for="gender">Gender:</label>
                            <select id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Blood Group Dropdown -->
                        <div class="form-group my-2">
                            <label for="bloodGroup">Blood Group:</label>
                            <select id="bloodGroup" name="bloodGroup" required>
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success my-3">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- SIGNUP MODAL END -->



    <!-- LOGIN MODAL START -->
    <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Login Here</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="wrapper">

                            <form action="login.php" method="POST" autocomplete="off">
                                <div class="row">
                                    <i class="fas fa-user"></i>
                                    <input id='email' name='email' type="email" placeholder="Email" required>
                                </div>
                                <div class="row">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" placeholder="Password" id="Password" name="Password"
                                        required>
                                </div>
                                <!-- <div class="pass"><a href="#">Forgot password?</a></div>-->
                                <div class="row button">
                                    <input type="submit" value="Login">
                                </div>

                                <div class="signup-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Not a
                                    member? <a href="#">Signup now</a></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- LOGIN MODAL START -->



    <!-- HERO SECTION START-->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="images/lib_bg.jpeg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                    height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                    system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div>
            </div>
        </div>
    </div>
    <!-- HERO SECTION END-->




    <!-- FEATURE SECTION START -->
    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">Columns with icons</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#collection"></use>
                    </svg>
                </div>
                <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                    and probably just keep going until we run out of words.</p>
                <a href="#" class="icon-link">
                    Call to action
                    <svg class="bi">
                        <use xlink:href="#chevron-right"></use>
                    </svg>
                </a>
            </div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                </div>
                <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                    and probably just keep going until we run out of words.</p>
                <a href="#" class="icon-link">
                    Call to action
                    <svg class="bi">
                        <use xlink:href="#chevron-right"></use>
                    </svg>
                </a>
            </div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#toggles2"></use>
                    </svg>
                </div>
                <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                    and probably just keep going until we run out of words.</p>
                <a href="#" class="icon-link">
                    Call to action
                    <svg class="bi">
                        <use xlink:href="#chevron-right"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!-- FEATURE SECTION END -->









    <!-- FOOTER SECTION START -->
    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <p class="text-body-secondary">© 2024</p>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>
        </footer>
    </div>
    <!-- FOOTER SECTION END -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- CODE FOR DISABLE STATE & CITY INPUT FIELD TILL COUNTRY IS ENTERED -->
    <script>
        document.getElementById('country').addEventListener('change', function () {
            let country = this.value;
            let stateSelect = document.getElementById('state');
            let citySelect = document.getElementById('city');

            if (country) {
                stateSelect.disabled = false;

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("state").innerHTML = this.responseText;
                    }
                }

                xmlhttp.open("GET", "fetch_states.php?q=" + country, true);
                xmlhttp.send();

            }
        });

        document.getElementById('state').addEventListener('change', function () {
            let state = this.value;
            let citySelect = document.getElementById('city');


            if (state) {

                citySelect.disabled = false;

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("city").innerHTML = this.responseText;
                    }
                }

                xmlhttp.open("GET", "fetch_states.php?state=" + state, true);
                xmlhttp.send();

            }
        });



    </script>


</body>

</html>