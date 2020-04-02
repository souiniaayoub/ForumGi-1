<?php require '../Forum-index/inc/dbh.inc.php';
session_start(); ?>
<aside id="colorlib-aside" role="complementary" class="js-fullheight">
    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            <li class=""><a href="index.php">News</a></li>
            <li><a href="Courses.php">Courses</a></li>
            <li><a href="questions.php">Questions</a></li>
            <li><a href="messages.php">Messages</a></li>
            <li><a href="events.php">Events</a></li>
            <form action="logout.php">
                <li><button class="btn btn-warning" type="submit" name="logout">Log Out</button></li>
            </form>
        </ul>
    </nav>

    <div class="colorlib-footer">
        <h1 id="colorlib-logo" class="mb-4"><span><span>FORUM</span><span style="color: orange">Ino</span></span></h1>
        <p class="pfooter">

            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
    </div>
</aside>