<?php
    include('functions.php');

    if (!empty($_POST['add_question']))
    {
        $array_question = array(
            'name' => $_POST['name'],
            'displayName' => $_POST['displayName'],
            'type' => 'icon',
            'questionText' => $_POST['questionText'],
            'questionSecondText' => $_POST['questionSecondText'],
            'answersNumber' => $_POST['answersNumber'],
            'answerDirectTo' => array(
                11 => [ 'next' => $_POST['nextQuestionL'] ],
                10 => [ 'next' => $_POST['nextQuestionR'] ]
            ),
            'iconText' => [ $_POST['iconTextL'], $_POST['iconTextR'] ],
            'iconColors' => [ $_POST['iconColorL'], $_POST['iconColorR'] ],
            'iconImages' => [ 'images/icons/main-flow/' . $_FILES['iconImageL']['name'], 'images/icons/main-flow/' . $_FILES['iconImageR']['name'] ],
        );

        save_file('images/icons/main-flow/', 'iconImageL');
        save_file('images/icons/main-flow/', 'iconImageR');

        if (intval($_POST['answersNumber']) >= 3)
        {
            array_push($array_question['iconText'], $_POST['iconTextT']);
            array_push($array_question['iconColors'], $_POST['iconColorT']);
            array_push($array_question['iconImages'], 'images/icons/main-flow/' . $_FILES['iconImageT']['name']);
            $array_question['answerDirectTo'] += [ 9 => [ 'next' => $_POST['nextQuestionT'] ] ];
            save_file('images/icons/main-flow/', 'iconImageT');
        }
        if (intval($_POST['answersNumber']) == 4)
        {
            array_push($array_question['iconText'], $_POST['iconTextB']);
            array_push($array_question['iconColors'], $_POST['iconColorB']);
            array_push($array_question['iconImages'], 'images/icons/main-flow/' . $_FILES['iconImageB']['name']);
            $array_question['answerDirectTo'] += [ 12 => [ 'next' => $_POST['nextQuestionB'] ] ];
            save_file('images/icons/main-flow/', 'iconImageB');
        }

        array_push($_SESSION['flow'], $array_question);
        header('Location:add_question.php');
    }

    if (!empty($_POST['end_flow']))
    {
        $json_array = json_encode($_SESSION['flow'], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        file_put_contents('main-flow.js', 'export default ' . $json_array);

        copy('main-flow.js', 'cozie-researcher/resources/flows/main-flow.js');
        for ($i = 0; $i < sizeof($_SESSION['flow']); $i++)
        {
            copy($_SESSION['flow'][$i]['iconImages'][0], 'cozie-researcher/resources/' . $_SESSION['flow'][$i]['iconImages'][0]);
            copy($_SESSION['flow'][$i]['iconImages'][1], 'cozie-researcher/resources/' . $_SESSION['flow'][$i]['iconImages'][1]);
            if (sizeof($_SESSION['flow'][$i]['iconImages']) >= 3)
                copy($_SESSION['flow'][$i]['iconImages'][2], 'cozie-researcher/resources/' . $_SESSION['flow'][$i]['iconImages'][2]);
            if (sizeof($_SESSION['flow'][$i]['iconImages']) == 4)
                copy($_SESSION['flow'][$i]['iconImages'][3], 'cozie-researcher/resources/' . $_SESSION['flow'][$i]['iconImages'][3]);
        }

        // Get real path for our folder
        $rootPath = realpath('cozie-researcher');

        // Initialize archive object
        $zip = new ZipArchive();
        $zip->open('cozie-researcher.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

        // Zip archive will be created only after closing object
        $zip->close();

        for ($i = 0; $i < sizeof($_SESSION['flow']); $i++)
        {
            unlink('cozie-researcher/resources/' . $_SESSION['flow'][$i]['iconImages'][0]);
            unlink('cozie-researcher/resources/' . $_SESSION['flow'][$i]['iconImages'][1]);
            if (sizeof($_SESSION['flow'][$i]['iconImages']) >= 3)
                unlink('cozie-researcher/resources/' . $_SESSION['flow'][$i]['iconImages'][2]);
            if (sizeof($_SESSION['flow'][$i]['iconImages']) == 4)
                unlink('cozie-researcher/resources/' . $_SESSION['flow'][$i]['iconImages'][3]);
        }
        header('Location:cozie-researcher.zip');
    }

    if (!empty($_POST['restart_flow']))
    {
        for ($i = 0; $i < sizeof($_SESSION['flow']); $i++)
        {
            unlink($_SESSION['flow'][$i]['iconImages'][0]);
            unlink($_SESSION['flow'][$i]['iconImages'][1]);
            if (sizeof($_SESSION['flow'][$i]['iconImages']) >= 3)
                unlink($_SESSION['flow'][$i]['iconImages'][2]);
            if (sizeof($_SESSION['flow'][$i]['iconImages']) == 4)
                unlink($_SESSION['flow'][$i]['iconImages'][3]);
        }
        $_SESSION['flow'] = array();
        file_put_contents('main-flow.js', '');
        header('Location:add_question.php');
    }

    if (!empty($_POST['json_flow']))
    {
        $json_array = json_encode($_SESSION['flow'], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        file_put_contents('main-flow.json', 'export default ' . $json_array);
        header('Location:main-flow.json');
    }
?>