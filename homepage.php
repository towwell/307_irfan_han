<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
session_start();
$_SESSION['counter'] = 0;
$_SESSION['totalpoints'] = 0;
?>
<head>
    <title>Funny Quiz - Homepage</title>
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
            <h1>Funny quiz</h1>
            <p>By Irfan and Zhen Ghan</p>
        </div>
    </div>
    <div class="row homepage_content">
        <form action="quizpage.php" method="get">
            <div class="form-group">
                <label for="nickname">Nickname</label> <input type="text" class="form-control nickname_input" name="name"><br>
                <div class="form-group">
                    <label for="quiztype">Quiz type</label>
                    <div class="radio"><input type="radio" name="quiztype" value="sports">Sports</div>
                    <div class="radio"><input type="radio" name="quiztype" value="movies">Movies</div>
                </div>
                <input type="submit" class="btn btn-primary">
        </form>
    </div>
    <button type="button" class="btn btn-warning">View Leaderboards</button>
</body>
</html>