<?php
    require "php/crud.php";
    SessionController::startSession();
    if (!SessionController::isLoggedIn()) {
        SessionController::redirectUserAdmin();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h1>Change Password</h1>

            <!-- Username Field -->
            <div class="inp-bx user-field">
                <input type="text" placeholder="Username" name="usr_name" autocomplete="off"> <i class='bx bx-user' ></i>
                <span class="username-error error">
                    <i class='bx bx-error-circle error-icon'></i>
                    <p class="error-text"></p>
                </span>
            </div>

            <!-- Password Field -->
            <div class="inp-bx pass-field">
                <input type="password" placeholder="Current password" name="usr_pass" autocomplete="off">
                <i class='bx bx-lock-alt'></i>
                <span class="pass-error error">
                    <i class='bx bx-error-circle error-icon'></i>
                    <p class="error-text">Incorrect password</p>
                </span>
            </div>
            <!-- Password Field -->
            <div class="inp-bx chng-pass-field">
                <input type="password" placeholder="New password" name="usr_pass_upd" autocomplete="off">
                <i class='bx bx-lock-alt'></i>
                <span class="pass-error error">
                    <i class='bx bx-error-circle error-icon'></i>
                    <p class="error-text">required</p>
                </span>
            </div>

            <div class="toggler-forgot">
                <div class="show-hide">
                    <input type="checkbox" id="password__toggler">
                    <label for="password__toggler">Show password</label>
                </div>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" name="login" class="btn">Change</button>
        </form>

        <?php
            
        if (isset($_POST['login'])) {
            $conn = new Database();
            $usr = htmlspecialchars($_POST['usr_name']);
            $usr_pass = htmlspecialchars($_POST['usr_pass']);
            $usr_upd = htmlspecialchars($_POST['usr_pass_upd']);
            $authResult = $conn->updateUserPassword($usr, $usr_pass, $usr_upd);

            if ($authResult === true) {
                echo '<div class="login-success">' . implode(" ", $conn->getResult()) . '</div>';
                SessionController::startSession();
                SessionController::destroySession();
                header("Location: http://localhost/znm/admin/index.php");
                exit;
            }else{
                echo '<div class="login-error">' . implode(" ", $conn->getResult()) . '</div>';
            }       
        }

        ?>

    </div>
    <script src="./js/script.js"></script>
</body>
</html>