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
    
</body>