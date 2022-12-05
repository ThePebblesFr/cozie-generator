<?php
    include('functions.php');

    if (isset($_GET['id']) && $_GET['id'] < sizeof($_SESSION['flow']))
    {
        $id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit a question</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <form method="POST" action="" enctype="multipart/form-data">
            <h1 class="titleIcon">Edit a question</h1>
            <div class="firstPart">
                <div class="row">
                    <div class="cell"><label for="name">Name: </label></div>
                    <div class="cell"><input type="text" name="name" value="<?php echo $_SESSION['flow'][$id]['name']; ?>"/></div>
                </div>
                <div class="row">
                    <div class="cell"><label for="displayName">Displayed name: </label></div>
                    <div class="cell"><input type="text" name="displayName" value="<?php echo $_SESSION['flow'][$id]['displayName']; ?>" /></div>
                </div>
                <div class="row">
                    <div class="cell"><label for="questionText">Question text: </label></div>
                    <div class="cell"><input type="text" name="questionText" value="<?php echo $_SESSION['flow'][$id]['questionText']; ?>" /></div>
                </div>
                <div class="row">
                    <div class="cell"><label for="questionSecondText">Second question text: </label></div>
                    <div class="cell"><input type="text" name="questionSecondText" value="<?php echo $_SESSION['flow'][$id]['questionSecondText']; ?>" /></div>
                </div>
                <div class="row">
                    <div class="cell"><label for="answersNumber">Number of answers: </label></div>
                    <div class="cell">
                        <select name="answersNumber" id="answersNumber">
                            <option value="2" id="2" selected="selected">2</option>
                            <option value="3" id="3">3</option>
                            <option value="4" id="4">4</option>
                        </select>
                        <script type="text/javascript">
                            document.getElementById(<?php echo json_encode($_SESSION['flow'][$id]['answersNumber']); ?>).selected = true;
                        </script>
                    </div>
                </div>
            </div>
            <br />
            <div class="overIcons">
                <div id="topAnswer" class="answer" style="display:none;">
                    <div class="titleIcon">Top icon</div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconTextT">Icon text: </label></div>
                        <div class="cellIcon"><input type="text" name="iconTextT" value="<?php echo $_SESSION['flow'][$id]['iconText'][2]; ?>"/></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconColorT">Icon color: </label></div>
                        <div class="cellIcon"><input type="text" name="iconColorT" value="<?php echo $_SESSION['flow'][$id]['iconColors'][2]; ?>"/></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconImageT">Icon image: </label></div>
                        <div class="cellIcon"><input type="hidden" name="MAX_FILE_SIZE" value="300000000" /><input type="file" name="iconImageT" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="nextQuestionT">Next question: </label></div>
                        <div class="cellIcon"><input type="text" name="nextQuestionT" value="<?php echo $_SESSION['flow'][$id]['answerDirectTo'][9]['next']; ?>"/></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIconHelp">"Next question": <strong>name</strong> of the question to be shown if this icon is pressed. If you want to stop the survey right after this question, enter "end"</div>
                    </div>
                </div>
            </div>
            <div class="overIcons">
                <div id="leftAnswer" class="answer">
                    <div class="titleIcon">Left icon</div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconTextL">Icon text: </label></div>
                        <div class="cellIcon"><input type="text" name="iconTextL" value="<?php echo $_SESSION['flow'][$id]['iconText'][0]; ?>"/></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconColorL">Icon color: </label></div>
                        <div class="cellIcon"><input type="text" name="iconColorL" value="<?php echo $_SESSION['flow'][$id]['iconColors'][0]; ?>" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconImageL">Icon image: </label></div>
                        <div class="cellIcon"><input type="hidden" name="MAX_FILE_SIZE" value="300000000" /><input type="file" name="iconImageL" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="nextQuestionL">Next question: </label></div>
                        <div class="cellIcon"><input type="text" name="nextQuestionL"  value="<?php echo $_SESSION['flow'][$id]['answerDirectTo'][11]['next']; ?>"/></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIconHelp">"Next question": <strong>name</strong> of the question to be shown if this icon is pressed. If you want to stop the survey right after this question, enter "end"</div>
                    </div>
                </div>
                <div id="rightAnswer" class="answer">
                    <div class="titleIcon">Right icon</div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconTextR">Icon text: </label></div>
                        <div class="cellIcon"><input type="text" name="iconTextR" value="<?php echo $_SESSION['flow'][$id]['iconText'][1]; ?>"/></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconColorR">Icon color: </label></div>
                        <div class="cellIcon"><input type="text" name="iconColorR" value="<?php echo $_SESSION['flow'][$id]['iconColors'][1]; ?>" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconImageR">Icon image: </label></div>
                        <div class="cellIcon"><input type="hidden" name="MAX_FILE_SIZE" value="300000000" /><input type="file" name="iconImageR" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="nextQuestionR">Next question: </label></div>
                        <div class="cellIcon"><input type="text" name="nextQuestionR" value="<?php echo $_SESSION['flow'][$id]['answerDirectTo'][10]['next']; ?>" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIconHelp">"Next question": <strong>name</strong> of the question to be shown if this icon is pressed. If you want to stop the survey right after this question, enter "end"</div>
                    </div>
                </div>
                <div id="bottomAnswer" class="answer" style="display:none;">
                    <div class="titleIcon">Bottom icon</div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconTextB">Icon text: </label></div>
                        <div class="cellIcon"><input type="text" name="iconTextB" value="<?php echo $_SESSION['flow'][$id]['iconText'][3]; ?>"/></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconColorB">Icon color: </label></div>
                        <div class="cellIcon"><input type="text" name="iconColorB" value="<?php echo $_SESSION['flow'][$id]['iconColors'][3]; ?>" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconImageB">Icon image: </label></div>
                        <div class="cellIcon"><input type="hidden" name="MAX_FILE_SIZE" value="300000000" /><input type="file" name="iconImageB" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="nextQuestionB">Next question: </label></div>
                        <div class="cellIcon"><input type="text" name="nextQuestionB" value="<?php echo $_SESSION['flow'][$id]['answerDirectTo'][12]['next']; ?>" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIconHelp">"Next question": <strong>name</strong> of the question to be shown if this icon is pressed. If you want to stop the survey right after this question, enter "end"</div>
                    </div>
                </div>
            </div>
            <br />
            <div class="titleIcon">
                <input type="submit" value="Save changes" name="modify_question_<?php echo $id; ?>"/>
                <input type="button" value="Back" id="backButton"/>
            </div>
            <script type="text/javascript">
                var answersNumber = document.getElementById('answersNumber');

                var leftAnswer = document.getElementById('leftAnswer');
                var rightAnswer = document.getElementById('rightAnswer');
                var topAnswer = document.getElementById('topAnswer');
                var bottomAnswer = document.getElementById('bottomAnswer');

                function nbAnswersToShow() {
                    if (answersNumber.value == 3)
                    {
                        topAnswer.style.display = 'block';
                        bottomAnswer.style.display = 'none';
                    }
                    else if (answersNumber.value == 4)
                    {
                        bottomAnswer.style.display = 'block';
                        topAnswer.style.display = 'block';
                    }
                    else
                    {
                        bottomAnswer.style.display = 'none';
                        topAnswer.style.display = 'none';
                    }
                }
                nbAnswersToShow();
                
                answersNumber.addEventListener("change", function() {
                    nbAnswersToShow();
                });

                var backButton = document.getElementById('backButton');
                backButton.addEventListener('click', () => {
                    window.location.href = 'add_question.php';
                })
            </script>
        </form>
    </body>
</html>
<?php
        if (isset($_POST['modify_question_'.$id]))
        {
            if ($_POST['name'] !== '')
                $_SESSION['flow'][$id]['name'] = $_POST['name'];
            if ($_POST['displayName'] !== '')
                $_SESSION['flow'][$id]['displayName'] = $_POST['displayName'];
            if ($_POST['questionText'] !== '')
                $_SESSION['flow'][$id]['questionText'] = $_POST['questionText'];
            if ($_POST['questionSecondText'] !== '')
                $_SESSION['flow'][$id]['questionSecondText'] = $_POST['questionSecondText'];
            if ($_POST['answersNumber'] !== '')
                $_SESSION['flow'][$id]['answersNumber'] = $_POST['answersNumber'];
            if ($_POST['iconTextL'] !== '')
                $_SESSION['flow'][$id]['iconText'][0] = $_POST['iconTextL'];
            if ($_POST['iconTextR'] !== '')
                $_SESSION['flow'][$id]['iconText'][1] = $_POST['iconTextR'];
            if ($_SESSION['flow'][$id]['answersNumber'] >= 3 && $_POST['iconTextT'] !== '')
                $_SESSION['flow'][$id]['iconText'][2] = $_POST['iconTextT'];
            if ($_SESSION['flow'][$id]['answersNumber'] == 4 && $_POST['iconTextB'] !== '')
                $_SESSION['flow'][$id]['iconText'][3] = $_POST['iconTextB'];
            if ($_POST['iconColorL'] !== '')
                $_SESSION['flow'][$id]['iconColors'][0] = $_POST['iconColorL'];
            if ($_POST['iconColorR'] !== '')
                $_SESSION['flow'][$id]['iconColors'][1] = $_POST['iconColorR'];
            if ($_SESSION['flow'][$id]['answersNumber'] >= 3 && $_POST['iconColorT'] !== '')
                $_SESSION['flow'][$id]['iconColors'][2] = $_POST['iconColorT'];
            if ($_SESSION['flow'][$id]['answersNumber'] == 4 && $_POST['iconColorB'] !== '')
                $_SESSION['flow'][$id]['iconColors'][3] = $_POST['iconColorB'];
            if ($_FILES['iconImageL']['name'] !== '')
            {
                //unlink($_SESSION['flow'][$id]['iconImages'][0]);
                save_file('images/icons/main-flow/', 'iconImageL');
                $_SESSION['flow'][$id]['iconImages'][0] = 'images/icons/main-flow/' . $_FILES['iconImageL']['name'];
            }
            if ($_FILES['iconImageR']['name'] !== '')
            {
                //unlink($_SESSION['flow'][$id]['iconImages'][1]);
                save_file('images/icons/main-flow/', 'iconImageR');
                $_SESSION['flow'][$id]['iconImages'][1] = 'images/icons/main-flow/' . $_FILES['iconImageR']['name'];
            }
            if ($_SESSION['flow'][$id]['answersNumber'] >= 3 && $_FILES['iconImageT']['name'] !== '')
            {
                //unlink($_SESSION['flow'][$id]['iconImages'][2]);
                save_file('images/icons/main-flow/', 'iconImageT');
                $_SESSION['flow'][$id]['iconImages'][2] = 'images/icons/main-flow/' . $_FILES['iconImageT']['name'];
            }
            if ($_SESSION['flow'][$id]['answersNumber'] == 4 && $_FILES['iconImageB']['name'] !== '')
            {
                //unlink($_SESSION['flow'][$id]['iconImages'][3]);
                save_file('images/icons/main-flow/', 'iconImageB');
                $_SESSION['flow'][$id]['iconImages'][3] = 'images/icons/main-flow/' . $_FILES['iconImageB']['name'];
            }
            if ($_POST['nextQuestionL'] !== '')
                $_SESSION['flow'][$id]['answerDirectTo'][11]['next'] = $_POST['nextQuestionL'];
            if ($_POST['nextQuestionR'] !== '')
                $_SESSION['flow'][$id]['answerDirectTo'][10]['next'] = $_POST['nextQuestionR'];
            if ($_SESSION['flow'][$id]['answersNumber'] >= 3 && $_POST['nextQuestionT'] !== '')
                $_SESSION['flow'][$id]['answerDirectTo'][9]['next'] = $_POST['nextQuestionT'];
            if ($_SESSION['flow'][$id]['answersNumber'] == 4 && $_POST['nextQuestionB'] !== '')
                $_SESSION['flow'][$id]['answerDirectTo'][12]['next'] = $_POST['nextQuestionB'];

            echo '<script type="text/javascript">window.location.href="add_question.php"</script>';
        }
    }
    else
    {
        header('Location:add_question.php');
    }
?>