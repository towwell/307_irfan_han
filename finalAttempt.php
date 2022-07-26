<?php
session_start();

$nickname = $_SESSION['nickname'];
$totalAttempts = $_SESSION['counter'];
$totalPoints = $_SESSION['totalpoints'];
$txt = $nickname . "," . $totalAttempts . "," . $totalPoints . "\n";

if (file_exists("leaderboard.txt") && ($handle = fopen("leaderboard.txt","r")) == TRUE)
{
    $row = 0;
    $fileopen = TRUE;
    while (($data = fgetcsv($handle, 1000, ","))==TRUE){
        $num = count($data);
        for ($c = 0; $c < $num; $c++){
            $name[$row] = $data[0];
            $attempts[$row] = $data[1];
            $points[$row] = $data[2];
            $keyval[$name[$row]] = array($attempts[$row], $points[$row]);
            $row++;
        }
    }
    fclose($handle);
}
else{
    echo "File does not exist","<br>";
}

if ($fileopen && array_key_exists($nickname, $keyval))
{
    $headerText = "Duplicate nickname, unable to save score";
}
else{
    $myfile = fopen("leaderboard.txt", "a")
    or die("Error opening file");

    fwrite($myfile,$txt);
    fclose($myfile);

    $headerText = "Score successfully saved";
}
?>


<head>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- END Bootstrap -->
    <!-- Local stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- END Local stylesheet -->
</head>

<body>
    <div class="row">
        <div class="jumbotron text-center">
            <h1><?php echo $headerText ?></h1>
        </div>
    </div>
    <div class="row">
        <table class="table tablequiz">
            <thead>
                <tr>
                    <th>Nickname</th>
                    <th>Attempt</th>
                    <th>Total Points all attempts</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $_SESSION["nickname"]; ?></td>
                    <td><?php echo $_SESSION['counter']; ?></td>
                    <td><?php echo $_SESSION['totalpoints']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row homepage_content">
        <form action="leaderboard.php" method="post" style="display:inline-flex;">
            <input type="submit" class="btn btn-warning" name="saveLeaderboard" value="View Leaderboards" style="margin-right: 5%;" />
        </form>
        <form action="homepage.php" method="post" style="display:inline-block;">
            <input type="submit" class="btn btn-danger" name="exitHomepage" value="Exit" style="margin-left: 5%;" />
        </form>
    </div>
</body>