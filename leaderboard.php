<?php
session_start();
$headerText = "You are currently viewing the Leaderboard";
?>


<?php
function SBN()
{
    $lines = file("leaderboard.txt");
    natsort($lines);
    file_put_contents("leaderboard.txt", implode("", $lines));
}


if (array_key_exists('Sort_BN', $_POST)) {
    SBN();
}
?>
<?php
function SBS()
{
    $lines = file("leaderboard.txt");
    $dataArray = [];
    foreach ($lines as $string) {
        $row = explode(',', $string);
        $key = $row[2];
        $value = $row[0] . "," . $row[1];
        $dataArray += array($key => $value);
    }
    krsort($dataArray, SORT_NUMERIC);
    $txt = '';

    foreach ($dataArray as $key => $value) {
        $explodedVal = explode(',', $value);
        $txt .= $explodedVal[0] . ',' . $explodedVal[1] . ',' . $key;

    }
    $myfile = fopen("leaderboard.txt", "w")
    or die("Error opening file");

    fwrite($myfile, $txt);
    fclose($myfile);
}


if (array_key_exists('Sort_BS', $_POST)) {
    SBS();
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
                    <td><?php $file = fopen("leaderboard.txt", "r") or die("Unable to open file!");
                        while (!feof($file)) {
                            $data = fgets($file);
                            echo "<tr><td>" . str_replace(',', '</td><td>', $data) . '</td></tr>';
                        }
                        echo '</table>';
                        fclose($file); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row homepage_content">
        <form method="post" style="display:inline-block;">
            <input type="submit" class="btn btn-primary" name="Sort_BN" id="Sort_BN" value="Sort By Name" />
        </form>
        <form method="post" style="display:inline-block;">
            <input type="submit" class="btn btn-primary" name="Sort_BS" id="Sort_BS" value="Sort By Score" />
        </form>
        <form action="homepage.php" method="post" style="display:inline-block;">
            <input type="submit" class="btn btn-danger" name="exitHomepage" value="Exit" style="margin-left: 5%;" />
        </form>
    </div>
</body>