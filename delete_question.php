<?php
    include('functions.php');

    if (isset($_GET['id']) && $_GET['id'] < sizeof($_SESSION['flow']))
    {
        $id = $_GET['id'];
        if ($id == 0)
        {
            echo '<script type="text/javascript">window.location.href="start.php"</script>';
        }
        else
        {
            if ($id != sizeof($_SESSION['flow']) - 1)
            {
                for ($i = $id; $i < sizeof($_SESSION['flow']) - 1; $i++)
                {
                    $_SESSION['flow'][$i] = $_SESSION['flow'][$i+1];
                }
            }
            array_pop($_SESSION['flow']);
            echo '<script type="text/javascript">window.location.href="add_question.php"</script>';
        }
    }
?>
