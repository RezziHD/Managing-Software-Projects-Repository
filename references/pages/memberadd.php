<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Add Member</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.5/dist/bootstrap-validate.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">To Go Groceries</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Member
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Add New Member</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--This is the form-->
    <div class="container">

        <form id="memberaddform" novalidate>
            <h1>Add New Member</h1>
            <!--This is a to have two fields together-->
            <div class="row">
                <div class="col">
                    <!--This is a text field-->
                    <div class="mb-3">
                        <label for="FirstName" class="form-label">Given Name</label>
                        <input id="FirstName" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <!--This is a text field-->
                    <div class="mb-3">
                        <label for="MiddleName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="MiddleName" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="LastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="LastName" required>
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!--This is a date field-->
                    <div class="mb-3">
                        <label for="DOB" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" id="DOB">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            You need to be at least 18 years old
                        </div>
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="Email">
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <!--This is a date field-->
                <div class="mb-3">
                    <label for="StreetAddress" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="StreetAddress" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!--This is a text field-->
                    <div class="mb-3">
                        <label for="Suburb" class="form-label">Suburb</label>
                        <input type="text" class="form-control" id="Suburb" required>
                    </div>
                </div>
                <div class="col">
                    <!--This is a text field-->
                    <div class="mb-3">
                        <label for="Postcode" class="form-label">Postcode</label>
                        <input type="text" class="form-control" id="Postcode" required>
                    </div>
                </div>
                <div class="col">
                    <!--This is a text field-->
                    <label for="State" class="form-label">State</label>
                    <select class="form-select" aria-label="Default select example" id="State" required>
                        <option value="0" selected>Select a State</option>
                        <option value="ACT">ACT</option>
                        <option value="NSW">NSW</option>
                        <option value="NT">NT</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="VIC">VIC</option>
                        <option value="WA">WA</option>
                    </select>
                </div>
            </div>
            <div class="row" id="noteError" hidden>
                <div class="col">Fields in red need to be filled
                </div>
            </div>
            <!--This is a button field-->
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>

    <footer></footer>
</body>
<script src="../scripts/validation.js"></script>

</html>