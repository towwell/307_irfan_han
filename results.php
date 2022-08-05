<?php
session_start();
if (isset($_SESSION['counter'])) {
    $_SESSION['counter'] += 1;
} else {
    $_SESSION['counter'] = 1;
}
$userArray = array($_POST["user_ans_0"], $_POST["user_ans_1"], $_POST["user_ans_2"]);
$answerArray = array($_POST["answer_0"], $_POST["answer_1"], $_POST["answer_2"]);
$arrayResults = [];
$arrayPoints = [];

$qns_wrong = 0;
$qns_correct = 0;

for ($x = 0; $x <= 2; $x++) {
    if (strtolower($userArray[$x]) == $answerArray[$x]) {
        array_push($arrayResults, 'Correct');
        array_push($arrayPoints, '5');
        $qns_correct++;
    } else {
        array_push($arrayResults, 'Wrong');
        array_push($arrayPoints, '-3');
        $qns_wrong++;
    }
}

$total_points = 0;
$total_points = ($qns_correct * 5) - ($qns_wrong * 3);
//echo $total_points;

$_SESSION['totalpoints'] += $total_points;

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
            <h1>Quiz results</h1>
        </div>
    </div>
    <div class="row" id="questionResults">
        <table class="table tablequiz">
            <thead>
                <tr>
                    <th>Question No.</th>
                    <th>Answer</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><?php echo $arrayResults[0]; ?></td>
                    <td><?php echo $arrayPoints[0]; ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><?php echo $arrayResults[1]; ?></td>
                    <td><?php echo $arrayPoints[1]; ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><?php echo $arrayResults[2]; ?></td>
                    <td><?php echo $arrayPoints[2]; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <table class="table tablequiz">
            <thead>
                <tr>
                    <th>Nickname</th>
                    <th>Attempt</th>
                    <th>Points from attempt</th>
                    <th>Total Points all attempts</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $_SESSION["nickname"]; ?></td>
                    <td><?php echo $_SESSION['counter']; ?></td>
                    <td><?php echo $total_points; ?></td>
                    <td><?php echo $_SESSION['totalpoints']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row homepage_content">
        <form action="quizpage.php" method="get">
            <div class="form-group">
                <input type="hidden" name="name" value="<?php echo $_SESSION["nickname"] ?>">
                <div class="form-group">
                    <label for="quiztype">Attempt new Quiz</label>
                    <div class="radio"><input type="radio" name="quiztype" value="sports">Sports</div>
                    <div class="radio"><input type="radio" name="quiztype" value="movies">Movies</div>
                </div>
                <input type="submit" class="btn btn-primary">
        </form>
    </div>
    <div class="saveAttempt">
        <form action="finalAttempt.php" method="get">
            <input type="submit" class="btn btn-success" name="saveScore" value="Save Attempt to Leaderboard" />
        </form>
    </div>
</body>