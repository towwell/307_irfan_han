<?php
session_start();
//Session nickname storage
$_SESSION["nickname"] = $_GET["name"];
$_SESSION["quiztype"] = $_GET["quiztype"];

$name = $_GET["name"];
$quiztype = $_GET["quiztype"];
$txt = 'Good luck ' . $name . '!';

//Read quiztype and get questions
//Sports - Fill in the blank
if ($quiztype == 'sports') {
    if (file_exists("sportquestion.txt") && ($handle = fopen("sportquestion.txt", "r")) == TRUE) {
        $newquizpool = array();
        $row = 0;
        $fileopen = TRUE;
        while (($data = fgetcsv($handle, 1000, ",")) == TRUE) {
            $num = count($data);
            for ($c = 0; $c < $num; $c++) {
                $questionNo[$row] = $data[0];
                $question[$row] = $data[1];
                $answer[$row] = $data[2];
                $keyval[$questionNo[$row]] = array($question[$row], $answer[$row]);
                $row++;
            }
        }
        fclose($handle);
    } else {
        echo "File does not exist", "<br>";
    }
    $moviehide = "style='display:none;'";
    $sportshide = "style='display:block;'";
}
//Movies - Multiple choice
else if ($quiztype == 'movies') {
    if (file_exists("moviequestion.txt") && ($handle = fopen("moviequestion.txt", "r")) == TRUE) {
        $newquizpool = array();
        $row = 0;
        $fileopen = TRUE;
        while (($data = fgetcsv($handle, 1000, ",")) == TRUE) {
            $num = count($data);
            for ($c = 0; $c < $num; $c++) {
                $questionNo[$row] = $data[0];
                $question[$row] = $data[1];
                $answer[$row] = $data[2];
                $option1[$row] = $data[3];
                $option2[$row] = $data[4];
                $option3[$row] = $data[5];
                $option4[$row] = $data[6];
                $keyval[$questionNo[$row]] = array($question[$row], $answer[$row], $option1[$row], $option2[$row], $option3[$row], $option4[$row]);
                $row++;
            }
        }

        fclose($handle);
    } else {
        echo "File does not exist", "<br>";
    }
    $sportshide = "style='display:none;'";
    $moviehide = "style='display:block;'";
}

//Picks 3 numbers from questions array and returns the 3 key as array value
$qtspick_key = array_rand($keyval, 3);
$pickqts = array();
$i = 0;
foreach ($qtspick_key as $key) {
    $pickqts[$i] = $keyval[$key];
    $i++;
}
?>
<html>

<head>
    <title>Funny Quiz - Quiz page</title>
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
            <h1>Quiz Page</h1>
            <p><?php echo $txt ?></p>
        </div>
    </div>
    <form action="results.php" method="post">
        <div class="homepage_content">
        <?php foreach ($pickqts as $questionNo => $value) { ?>
            <label class="titleQns"><?php echo $value[0]; ?></label>
            <div class="sports" <?php echo $sportshide; ?>>
                <input type="text" name="user_ans_<?php echo $questionNo; ?>">
            </div>
            <div class="form-group" <?php echo $moviehide; ?>>
                <div class="radio"><input type="radio" name="user_ans_<?php echo $questionNo; ?>" value="<?php echo $value[2]; ?>"><?php echo $value[2]; ?></div>
                <div class="radio"><input type="radio" name="user_ans_<?php echo $questionNo; ?>" value="<?php echo $value[3]; ?>"><?php echo $value[3]; ?></div>
                <div class="radio"><input type="radio" name="user_ans_<?php echo $questionNo; ?>" value="<?php echo $value[4]; ?>"><?php echo $value[4]; ?></div>
                <div class="radio"><input type="radio" name="user_ans_<?php echo $questionNo; ?>" value="<?php echo $value[5]; ?>"><?php echo $value[5]; ?></div>
            </div>
            <input type="hidden" name="answer_<?php echo $questionNo; ?>" value="<?php echo $value[1]; ?>">
            <br>
        <?php } ?>
        <input type="submit" class="btn btn-success">
        </div>
    </form>
    
</body>