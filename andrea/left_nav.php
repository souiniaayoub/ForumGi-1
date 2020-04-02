<?php

$user = 'root';
$pass = '';
$dsn = 'mysql:host=localhost;dbname=forum';

try {
    $dbh = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    print "Erreur ! : " . $e->getMessage() . "<br/>";
    die();
}


// Acceess to database 
if ($dbh) {




    $sql = "SELECT * FROM event  ORDER By id desc LIMIT 3 ";

    $st = $dbh->query($sql);

    if ($st) {
        $events = $st->fetchAll(PDO::FETCH_ASSOC);
    } else {
    }

    $dbh = NULL; // Close PDO connexion
}

?>


<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">


    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Popular Events</h3>

        <?php foreach ($events as $event) { ?>



            <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url('<?php echo $event['imageEvent']; ?>');"></a>
                <div class="text">
                    <h3 class="heading"><a href="#"> <?php echo $event['nameEvent'];  ?> </a></h3>
                    <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> <?php echo $event['dateEvent'];  ?></a></div>
                        <div><a href="#"><span class="icon-"></span> <?php echo $event['locationEvent'];  ?></a></div>
                    </div>
                </div>
            </div>


        <?php  } ?>


    </div>

</div>