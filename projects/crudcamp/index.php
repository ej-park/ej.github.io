<?php
include('database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $field_msg = [];
    $enroll_msg = [];
    $table_msg = [];

    if(empty($_POST['first_name'])) {
        $field_msg[0] = 'You forgot to enter your first name!';
    } else {
        $first_name = trim($_POST['first_name']);
    }

    if(empty($_POST['last_name'])) {
        $field_msg[1] = 'You forgot to enter your last name!';
    } else {
        $last_name = trim($_POST['last_name']);
    }

    if(empty($_POST['email'])) {
        $field_msg[2] = 'You forgot to enter your email!';
    } else {
        $email = trim($_POST['email']);
    }

    if(!empty($_POST['pass1'])) {
        if($_POST['pass1'] != $_POST['pass2']) {
            $field_msg[3] = 'Your passwords did not match.';
        } else {
            $password = trim($_POST['pass1']);
        }
    } else {
        $field_msg[4] = 'You forgot to enter a password!';
    }

    if(empty($field_msg)) {
        $insert_query   = "INSERT INTO campers (first_name, last_name, email, password)
                                   VALUES ('$first_name', '$last_name', '$email', '$password')";

        if($result = mysqli_query($conn, $insert_query)) {
            $enroll_msg[0] = 'You\'ve successfully enrolled!';
        } else {
            $enroll_msg[1] = 'There was an error in your enrollment, please try again.';
        }
    }
}

$query = 'SELECT * FROM campers';
$result = mysqli_query($conn, $query);

if($result) {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $table_msg[0] = 'There was an error generating the user table.';
}

include('header.php');

?>

   
        <section>
            <h2>CRUD Camp</h2>
            <p class="blurb">The adventure of a lifetime awaits at CRUD Camp, a sleep-away camp focusing on tech for children ages 10-17.
            Each camper's experience is unique: from coding, to robotics, animation, and more. CRUD Camp has all the resources
            and tools your tech-loving kid needs to succeed in the future. Not only will campers learn about tech fields and get
            hands-on experience creating and designing, they will have plenty of opportunities to swim, hike, and have outdoor
            adventures. </p>
            <p class="blurb">CRUD campers develop new skills, form lifelong friendships, and create lasting memories.
            Don't miss out, enroll your kids today!</p>
        </section>
        
        <section>
            <h2>Application</h2>
            <p>Complete the form to enroll for CRUD Camp. <span class="required">*</span> marks a required field. Submitted information will be saved and displayed on this page, please do not share sensitive information!</p>
            <form action="" method="POST">

                <div class="field">
                    <label for="first_name">First Name<span class="required">*</span></label>
                    <input type="text" id="first_name" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];  ?>">
                </div>
                <?php
                    if(isset($field_msg[0])) {
                        echo '<p class="error">' . $field_msg[0] . '</p>';
                    }
                ?>

                <div class="field">
                    <label for="last_name">Last Name<span class="required">*</span></label>
                    <input type="text" id="last_name" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'];  ?>">
                </div>
                <?php
                    if(isset($field_msg[1])) {
                        echo '<p class="error">' . $field_msg[1] . '</p>';
                    }
                ?>
                
                <div class="field">
                    <label for="email">Email<span class="required">*</span></label>
                    <input type="email" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];  ?>">
                </div>
                <?php
                    if(isset($field_msg[2])) {
                        echo '<p class="error">' . $field_msg[2] . '</p>';
                    }
                ?>

                <div class="field">
                    <label for="pass1">Password<span class="required">*</span></label>
                    <input type="password" id="pass1" name="pass1">
                </div>
                <?php
                    if(isset($field_msg[4])) {
                        echo '<p class="error">' . $field_msg[4] . '</p>';
                    }
                ?>
                
                <div class="field">
                    <label for="pass2">Confirm Password<span class="required">*</span></label>
                    <input type="password" id="pass2" name="pass2">
                </div>
                <?php
                    if(isset($field_msg[3])) {
                        echo '<p class="error">' . $field_msg[3] . '</p>';
                    }
                ?>
                

                <button>Enroll</button>

                <?php
                    if(isset($enroll_msg[0])) {
                        echo '<p class="success">' . $enroll_msg[0] . '</p>';
                    }
                    if(isset($enroll_msg[1])) {
                        echo '<p class="error">' . $enroll_msg[1] . '</p>';
                    }
                ?>
            </form>
        </section>
        
        <section>
            <h2>Join These Campers!</h2>
            <p>Hey tech superstar-in-the-making! If you've registered but your information has since changed, you can update your registration by clicking edit below.</p>
            <div id="table">
                <div class="row">
                    <span class="row-item">Name</span>
                    <span class="row-item">Email</span>
                    <span class="row-item">Edit</span>
                </div>

                <?php
                foreach($rows as $row) {
                    echo '<div class="row">
                        <span class="row-item">' . $row['first_name'] . ' ' . $row['last_name'] . '</span>
                        <span class="row-item">' . $row['email'] . '</span>
                        <span class="row-item"><a href="update.php?id=' . $row['id'] . '"><i class="fas fa-edit"></i></a></span>
                    </div>';
                }
                ?>
                
            </div>
            <?php
                if(isset($table_msg[0])) {
                    echo '<p class="error">' . $table_msg[0] . '</p>';
                }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2019 Grace Park for COSW30</p>
    </footer>
</body>
</html>