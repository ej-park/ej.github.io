<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error_msg = [];
    
    if(empty($_POST['name'])) {
        $error_msg[0] = 'Please enter a name.';
    } else {
        $name = trim($_POST['name']);
    }

    if ((new DateTime() > new DateTime($_POST['date1'])) || !($_POST['date1'])) {
        $error_msg[1] = 'Please choose a valid date.';
    } else {
        $startDate = trim(strtotime($_POST['date1']));
        $formatDate = date_format(date_create_from_format('Y-m-d', $_POST["date1"]), 'm/d/Y');
    }
    
    if ((new DateTime($_POST['date2']) < new DateTime($_POST['date1'])) || !($_POST['date2'])) {
        $error_msg[2] = 'Please choose a valid date.';
    } else {
        $endDate = trim(strtotime($_POST['date2']));
    }

    if($_POST['guests'] < 1) {
        $error_msg[3] = 'This value must be greater than 0.';
    } else {
        $guests = trim($_POST['guests']);
    }
    
    $visit = $endDate-$startDate;
    $visit = floor($visit / (24 * 60 * 60 )) + 1;

    if(empty($error_msg)) {
        $success = "Thank you $name for booking a stay with us for $visit day(s) for $guests guest(s). See you on $formatDate.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stop. Relax. Breathe.</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Livvic|Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <div id="logo">
                <h1>SRB Retreat & Spa</h1>
            </div>
            <ul>
                <li><a href="#nav_retreat">Retreats</a></li>
                <li><a href="#nav_spa">Spa</a></li>
                <li><a href="#nav_about">About</a></li>
                <li><a href="#nav_contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="blurb" id="nav_retreat">
            <div class="panels">
                <div class="panel panel1">
                    <h2>Stop</h2>
                    <p>When you feel stress or anxiety building within you, stop and notice your surroundings. Identify five things you can see, four things you can hear, three things you can feel, two things you can smell, and one thing you can taste.</p>
                </div>
                <div class="panel panel2">
                    <h2>Relax</h2>
                    <p>Take a few minutes to calm your nerves. Think about a peaceful day, what does that look like for you? Imagine the things you see, hear, and smell in this world. How does that make you feel?</p>
                </div>
                <div class="panel panel3">
                    <h2>Breathe</h2>
                    <p>Help regulate your body's reaction to stressors by doing some breathing exercises. Breathe in for four seconds, hold it for four seconds, and breathe out for six seconds. This helps decelerate your heartbeat, relax your muscles, and calm you down.</p>
                </div>
            </div>
        </section>

        <section class="reservation" id="nav_spa">
            <?php if(isset($success)) { echo '<p class="text-success">' . $success . '</p>'; } ?>
            
            <h3>Make a Reservation</h3>
            
            <form action="" method="POST">
                
                <div class="question">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $_POST['name'];  ?>">
                    <?php if(isset($error_msg[0])) { echo '<p class="text-danger">' . $error_msg[0] . '</p>'; } ?>
                </div>
                
                <div class="question">
                    <label for="date1">Check In</label>
                    <input type="date" name="date1" id="date1" value="<?php echo $_POST['date1'];  ?>">
                    <?php if(isset($error_msg[1])) { echo '<p class="text-danger">' . $error_msg[1] . '</p>'; } ?>
                </div>
                
                <div class="question">
                    <label for="date2">Check Out</label>
                    <input type="date" name="date2" id="date2" value="<?php echo $_POST['date2'];  ?>">
                    <?php if(isset($error_msg[2])) { echo '<p class="text-danger">' . $error_msg[2] . '</p>'; } ?>
                </div>

                <div class="question">
                    <label for="guests">Guests</label>
                    <input type="number" name="guests" id="guests" value="<?php echo $_POST['guests'];  ?>">
                    <?php if(isset($error_msg[3])) { echo '<p class="text-danger">' . $error_msg[3] . '</p>'; } ?>
                </div>

                
                <button>Reserve</button>
            </form>
        </section>

        <section class="blurb" id="nav_about">
            <h3>Take a Load Off</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Cras semper auctor neque vitae tempus quam pellentesque. Pulvinar mattis nunc sed blandit libero volutpat sed. Aliquam nulla facilisi cras fermentum odio. Interdum velit euismod in pellentesque massa. Eget felis eget nunc lobortis mattis aliquam faucibus purus in. Ac felis donec et odio. Cursus metus aliquam eleifend mi in nulla posuere sollicitudin aliquam. Tellus molestie nunc non blandit massa enim nec dui. Maecenas accumsan lacus vel facilisis. Proin sagittis nisl rhoncus mattis.</p>
            <h3>Sun, Fun, and Relaxation</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Cras semper auctor neque vitae tempus quam pellentesque. Pulvinar mattis nunc sed blandit libero volutpat sed. Aliquam nulla facilisi cras fermentum odio. Interdum velit euismod in pellentesque massa. Eget felis eget nunc lobortis mattis aliquam faucibus purus in. Ac felis donec et odio. Cursus metus aliquam eleifend mi in nulla posuere sollicitudin aliquam. Tellus molestie nunc non blandit massa enim nec dui. Maecenas accumsan lacus vel facilisis. Proin sagittis nisl rhoncus mattis.</p>
        </section>

        <section class="gallery">
            <div class="image">
                <img src="images/bungalows.jpg" alt="bungalows">
            </div>
            <div class="image">
                <img src="images/yoga.jpg" alt="beach yoga">
            </div>
            <div class="image">
                <img src="images/fruitbowl.jpg" alt="fruit bowl">
            </div>
            <div class="image">
                <img src="images/cocktails.jpg" alt="cocktails on the beach">
            </div>
        </section>

        <section class="blurb">
            <h3>See You Soon</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Cras semper auctor neque vitae tempus quam pellentesque. Pulvinar mattis nunc sed blandit libero volutpat sed. Aliquam nulla facilisi cras fermentum odio. Interdum velit euismod in pellentesque massa. Eget felis eget nunc lobortis mattis aliquam faucibus purus in. Ac felis donec et odio. Cursus metus aliquam eleifend mi in nulla posuere sollicitudin aliquam. Tellus molestie nunc non blandit massa enim nec dui. Maecenas accumsan lacus vel facilisis. Proin sagittis nisl rhoncus mattis.</p>
        </section>

    </main>

    <footer id="nav_contact">
        <p id="contact"><a href="http://www.developergrace.com" target="_blank">@developergrace</a></p>
        <p >Contact Me There</p>
    </footer>

    <script>
        const panels = document.querySelectorAll('.panel');
        function toggleOpen() {
            this.classList.toggle('open');
        }
        function toggleActive(e) {
            if(e.propertyName.includes('flex')) { 
                this.classList.toggle('open-active');
            }
        }
        panels.forEach(panel => panel.addEventListener('click', toggleOpen));
        panels.forEach(panel => panel.addEventListener('transitionend', toggleActive));
    </script>
</body>
</html>