<?php
    include('functions.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create a question flow</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
        <script type="text/javascript">
            var modify_array = Array();
            var delete_array = Array();
        </script>
    </head>
    <body>
        <h1 class="titleIcon">Preview of the question flow</h1>
        <div class="preview">
        <?php
            if ($_SESSION['flow'] == NULL)
            {
                echo '<h3 class="titleIcon">No question added yet</h3>';
            }
            for ($i = 0; $i < sizeof($_SESSION['flow']); $i++)
            {
                create_preview_clockface($_SESSION['flow'][$i], $i, $fitbit_colors);
            }
        ?>
        </div>
        <form method="POST" action="result.php" enctype="multipart/form-data">
            <h1 class="titleIcon">Add a question to JSON file</h1>
            <div class="firstPart">
                <div class="row">
                    <div class="cell"><label for="name">Name: </label></div>
                    <div class="cell"><input type="text" name="name" /></div>
                </div>
                <div class="row">
                    <div class="cell"><label for="displayName">Displayed name: </label></div>
                    <div class="cell"><input type="text" name="displayName" /></div>
                </div>
                <div class="row">
                    <div class="cell"><label for="questionText">Question text: </label></div>
                    <div class="cell"><input type="text" name="questionText" /></div>
                </div>
                <div class="row">
                    <div class="cell"><label for="questionSecondText">Second question text: </label></div>
                    <div class="cell"><input type="text" name="questionSecondText" /></div>
                </div>
                <div class="row">
                    <div class="cell"><label for="answersNumber">Number of answers: </label></div>
                    <div class="cell">
                        <select name="answersNumber" id="answersNumber">
                            <option value="2" selected="selected">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
            </div>
            <br />
            <div class="overIcons">
                <div id="topAnswer" class="answer" style="display:none;">
                    <div class="titleIcon">Top icon</div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconTextT">Icon text: </label></div>
                        <div class="cellIcon"><input type="text" name="iconTextT" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconColorT">Icon color: </label></div>
                        <div class="cellIcon"><input type="text" name="iconColorT" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconImageT">Icon image: </label></div>
                        <div class="cellIcon"><input type="hidden" name="MAX_FILE_SIZE" value="300000000" /><input type="file" name="iconImageT" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="nextQuestionT">Next question: </label></div>
                        <div class="cellIcon"><input type="text" name="nextQuestionT"/></div>
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
                        <div class="cellIcon"><input type="text" name="iconTextL" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconColorL">Icon color: </label></div>
                        <div class="cellIcon"><input type="text" name="iconColorL" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconImageL">Icon image: </label></div>
                        <div class="cellIcon"><input type="hidden" name="MAX_FILE_SIZE" value="300000000" /><input type="file" name="iconImageL" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="nextQuestionL">Next question: </label></div>
                        <div class="cellIcon"><input type="text" name="nextQuestionL" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIconHelp">"Next question": <strong>name</strong> of the question to be shown if this icon is pressed. If you want to stop the survey right after this question, enter "end"</div>
                    </div>
                </div>
                <div id="rightAnswer" class="answer">
                    <div class="titleIcon">Right icon</div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconTextR">Icon text: </label></div>
                        <div class="cellIcon"><input type="text" name="iconTextR" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconColorR">Icon color: </label></div>
                        <div class="cellIcon"><input type="text" name="iconColorR" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconImageR">Icon image: </label></div>
                        <div class="cellIcon"><input type="hidden" name="MAX_FILE_SIZE" value="300000000" /><input type="file" name="iconImageR" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="nextQuestionR">Next question: </label></div>
                        <div class="cellIcon"><input type="text" name="nextQuestionR" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIconHelp">"Next question": <strong>name</strong> of the question to be shown if this icon is pressed. If you want to stop the survey right after this question, enter "end"</div>
                    </div>
                </div>
                <div id="bottomAnswer" class="answer" style="display:none;">
                    <div class="titleIcon">Bottom icon</div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconTextB">Icon text: </label></div>
                        <div class="cellIcon"><input type="text" name="iconTextB" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconColorB">Icon color: </label></div>
                        <div class="cellIcon"><input type="text" name="iconColorB" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="iconImageB">Icon image: </label></div>
                        <div class="cellIcon"><input type="hidden" name="MAX_FILE_SIZE" value="300000000" /><input type="file" name="iconImageB" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIcon"><label for="nextQuestionB">Next question: </label></div>
                        <div class="cellIcon"><input type="text" name="nextQuestionB" /></div>
                    </div>
                    <div class="rowIcon">
                        <div class="cellIconHelp">"Next question": <strong>name</strong> of the question to be shown if this icon is pressed. If you want to stop the survey right after this question, enter "end"</div>
                    </div>
                </div>
            </div>
            <br />
            <div class="titleIcon">
                <input type="submit" value="Restart question flow" name="restart_flow"/>
                <input type="submit" value="Add this question" name="add_question"/>
                <input type="submit" value="Get cozie with this question flow" name="end_flow"/>
                <input type="submit" value="Get JSON question flow" name="json_flow"/>
            </div>
            <script type="text/javascript">
                var answersNumber = document.getElementById('answersNumber');

                var leftAnswer = document.getElementById('leftAnswer');
                var rightAnswer = document.getElementById('rightAnswer');
                var topAnswer = document.getElementById('topAnswer');
                var bottomAnswer = document.getElementById('bottomAnswer');

                answersNumber.addEventListener("change", function() {
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
                });

                for (var i = 0; i < modify_array.length; i++)
                {
                    console.log(i);
                    modify_array[i].addEventListener('click', ((arg) => {
                        return function() {
                            window.location.href = 'modify_question.php?id=' + arg.toString();
                        };
                    }) (i));
                }
                for (var i = 0; i < delete_array.length; i++)
                {
                    delete_array[i].addEventListener('click', ((arg) => {
                        return function() {
                            window.location.href = 'delete_question.php?id=' + arg.toString();
                        };
                    }) (i));
                }
            </script>
        </form>
    </body>
</html>