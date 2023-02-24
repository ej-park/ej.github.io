<?php
include('database.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: index.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update_msg = [];

    if(empty($_POST['first_name'])) {
        $update_msg[0] = 'One or more fields were left empty, please try again.';
    } else {
        $first_name = trim($_POST['first_name']);
    }

    if(empty($_POST['last_name'])) {
        $update_msg[0] = 'One or more fields were left empty, please try again.';
    } else {
        $last_name = trim($_POST['last_name']);
    }

    if(empty($_POST['email'])) {
        $update_msg[0] = 'One or more fields were left empty, please try again.';
    } else {
        $email = trim($_POST['email']);
    }

    if(!empty($_POST['pass1'])) {
        if($_POST['pass1'] != $_POST['pass2']) {
            $update_msg[1] = 'Your passwords did not match, please try again.';
        } else {
            $password = trim($_POST['pass1']);
        }
    } else {
        $update_msg[0] = 'One or more fields were left empty, please try again.';
    }

    if(empty($update_msg)) {
        $update_query = "UPDATE campers
                         SET first_name     = '$first_name',
                             last_name      = '$last_name',
                             email          = '$email',
                             password       = '$password'
                         WHERE id      =  $id";

        if($result = mysqli_query($conn, $update_query)) {
                header('Location: index.php');
                exit;
        } else {
            echo 'There was an error updating your enrollment, please try again.'; 
        }
    }  
}

$query = "SELECT * FROM campers WHERE id = $id";

$result = mysqli_query($conn, $query);

if($result) {
    $user = mysqli_fetch_assoc($result);
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $email = $user['email'];
    $password = $user['password'];
} 

include('header.php');

?>

        <h2>Update Application</h2>
        <p class="blurb">Complete <strong>all</strong> fields below to edit your application. Once completed, click the Update button to submit and return to the home page.</p>

        <?php
            if(isset($update_msg[0])) {
                echo '<p class="error">' . $update_msg[0] . '</p>';
            }
            if(isset($update_msg[1])) {
                echo '<p class="error">' . $update_msg[1] . '</p>';
            }
        ?>

        <form action="update.php?id=<?php echo $id; ?>" method="POST">

            <div class="field">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
            </div>

            <div class="field">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $last_name;  ?>">
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email;  ?>">
            </div>

            <div class="field">
                <label for="pass1">Password</label>
                <input type="text" id="pass1" name="pass1" value="<?php echo $password;  ?>">
            </div>

            <div class="field">
                <label for="pass2">Confirm Password</label>
                <input type="text" id="pass2" name="pass2" value="<?php echo $password;  ?>">
            </div>

            <button>Update</button>
        </form>
        <a href="index.php" class="button_cancel"><button>Cancel</button></a>
    </main>

    <footer>
        <p>&copy; 2019 Grace Park for COSW30</p>
    </footer>
</body>
</html>