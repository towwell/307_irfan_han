<?php
session_start();
//Session nickname storage
$_SESSION["nickname"] = $_GET["name"];

$name = $_GET["name"];
$quiztype = $_GET["quiztype"];
$txt = 'Good luck ' . $name . '!';
echo $txt, "<br>";

//Read quiztype and get questions
//Sports - Fill in the blank
if ($quiztype == 'sports'){
    $quizpool = array( 1=>array('question'=>'A soccer ball consists of hexagon and __ shapes?', 'answer'=> 'pentagon'),
                   2=>array('question'=>'Grand slam is associated with what sport?', 'answer'=> 'tennis'),
                   3=>array('question'=>'Joseph Schooling participates in what sport?','answer'=> 'swimming'),
                   4=>array('question'=>'What is 1 under par called in golf?','answer'=> 'birdie'),
                   5=>array('question'=>'The olympic rings are made up of colours blue, yellow, black, green and __','answer'=> 'red'),
                   6=>array('question'=>'In baseball, what is it called when the batter hits the ball out of the stadium', 'answer'=> 'home run')
    );
}
//Movies - Multiple choice
else if ($quiztype == 'movies'){
    $quizpool = array(  1=>array('question'=>'What is my name?', 'answer'=> 'Irfan'),
                    2=>array('question'=>'What is the module code?', 'answer'=> '307'),
                    3=>array('question'=>'What sport uses bouncing balls?','answer'=> 'Basketball'),
                    4=>array('question'=>'What comes after 3?','answer'=> '4')
    );
}



//Picks 3 numbers from questions array and returns the 3 key as array value
$qtspick_key = array_rand($quizpool, 3);
$pickqts = array();
$i = 0;
foreach($qtspick_key as $key){
    $pickqts[$i] = $quizpool[$key]; $i++;
}
//  foreach($pickqts as $questionNo => $value){
//      echo "key=", $questionNo, " value=", $value['question'], "<br>";
//  }
?>
<html>
<head>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- END Bootstrap -->
</head>
<body>
<form action="results.php" method="post">
    <?php foreach($pickqts as $questionNo => $value){ echo $value['question']; ?>
    <input type="text" name="user_ans_<?php echo $questionNo;?>">
    <input type="hidden" name="answer_<?php echo $questionNo;?>" value="<?php echo $value['answer'];?>">
    <br>
    <?php } ?>
    <input type="submit">
</form>
</body>