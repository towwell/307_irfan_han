<?php
$userArray = array($_POST["user_ans_0"],$_POST["user_ans_1"],$_POST["user_ans_2"]);
print_r($userArray);
$answerArray = array($_POST["answer_0"],$_POST["answer_1"],$_POST["answer_2"]);
print_r($answerArray);

$qns_wrong = 0;
$qns_correct = 0; 

for($x = 0; $x <= 2; $x++){
    if(strtolower($userArray[$x]) == $answerArray[$x]){
        print_r("Is correct");
        $qns_correct++;
    }
    else{
        print_r("Is wrong");
        $qns_wrong++;
    }
}

$total_points = 0;
$total_points = ($qns_correct*5) - ($qns_wrong*3);

echo $total_points;
?>