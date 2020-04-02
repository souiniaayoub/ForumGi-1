<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>GI Forum</title>
</head>
<style>
    a {
        text-decoration: none !important;
    }
</style>

<body>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <?php
        if (isset($_GET['login'])) {
            $email = $_GET['email'];
            $date = new DateTime($_GET['date']);
            $formatted = date_format($date, 'd-m-Y H:i:s');
            // $date = date_format(strtodat($_GET['date']), "Y/m/d H:i:s");
            if ($_GET['login'] == 'unverified') {
                echo '<h1 class="display-4">This account has not been verified</h1>';
                echo "<p class=\"lead\">An email was sent to $email </p>";
                echo "<p class=\"lead\"> on $formatted</p>";
                echo '<img src="../../assets/images/block.svg" height="100" width="100" />';
            }
        } else if (isset($_GET['deja'])) {
            echo '<h1 class="display-4">Sorry !</h1>';
            echo '<p class="lead">This account is invalid or already verified</p>';
            echo '<img src="../../assets/images/block.svg" height="100" width="100" />';
        }
        ?>
    </div>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.js"></script>
</body>

</html>