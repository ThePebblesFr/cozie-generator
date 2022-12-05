<?php
    session_start();

    function save_file($folder,$name_file)
	{
		$dossier = $folder;
		$fichier = basename($_FILES[''.$name_file.'']['name']);
		$taille_maxi = 100000000000;
		$taille = filesize($_FILES[''.$name_file.'']['tmp_name']);
		$extensions = array('.png', '.pdf', '.jpg', '.jpeg');
		$extension = strrchr($_FILES[''.$name_file.'']['name'], '.'); 
		if(!in_array($extension, $extensions))
		{
			 $erreur = 'Wrong file type, allowed types: png, pdf, jpg or jpeg...';
		}
		if($taille>$taille_maxi)
		{
			 $erreur = 'This file is too large...';
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
			move_uploaded_file($_FILES[''.$name_file.'']['tmp_name'], $dossier . $fichier);
		}
		else
		{
			echo $erreur;
		}
	}

    $fitbit_colors = array(
        'fb-aqua' => '#3BF7DE',
        'fb-black' => '#000000',
        'fb-blue' => '#4D86FF',
        'fb-cerulean' => '#8080FF',
        'fb-cyan' => '#15B9ED',
        'fb-dark-gray' => '#505050',
        'fb-extra-dark-gray' => '#303030',
        'fb-green' => '#2CB574',
        'fb-green-press' => '#134022',
        'fb-indigo' => '#5B4CFF',
        'fb-lavender' => '#8173FF',
        'fb-light-gray' => '#A0A0A0',
        'fb-lime' => '#72B314',
        'fb-magenta' => '#F1247C',
        'fb-mint' => '#5BE37D',
        'fb-orange' => '#FF752D',
        'fb-peach' => '#FFCC33',
        'fb-pink' => '#FF78B7',
        'fb-plum' => '#A51E7C',
        'fb-purple' => '#C658FB',
        'fb-red' => '#FA4D61',
        'fb-slate' => '#7090B5',
        'fb-slate-press' => '#1B2C40',
        'fb-violet' => '#D828B8',
        'fb-white' => '#FFFFFF',
        'fb-yellow' => '#F0A500',
        'fb-yellow-press' => '#394003'
    );

    function is_fitbit_color($color, $array)
    {
        $i = 0;
        $keys = array_keys($array);
        while ($i < sizeof($array) && $color !== $keys[$i])
        {
            $i++;
        }
        if ($i != sizeof($array))
            return $array[$color];
        else
            return -1;
    }

    function create_preview_clockface($data, $i, $fitbit_colors) {
    ?>
    <section class="overClockface">
        <div class="clockface">
            <div class="titleQuestion">
                <div class="previewText"><?php echo $data['questionText']; ?></div>
                <div class="previewText">
                <?php
                    echo ($data['questionSecondText'] !== '') ? $data['questionSecondText'] : '&emsp;';
                ?>
                </div>
            </div>
            <div  class="previewIcons">
                <div class="previewIcon">
                <?php
                    if (sizeof($data['iconText']) >= 3)
                    {
                        $colorT = (is_fitbit_color($data['iconColors'][2], $fitbit_colors) == -1) ? $data['iconColors'][2] : is_fitbit_color($data['iconColors'][2], $fitbit_colors);
                        echo '<style>#imgT' . $i . ' { background-color: ' . $colorT . '; }</style>';
                    ?>
                    <div class="previewIconImage" id="imgT<?php echo $i; ?>"><img src="<?php echo $data['iconImages'][2]; ?>" class="iconIMG"/></div>
                    <div class="previewIconText"><?php echo $data['iconText'][2]; ?></div>
                <?php
                    }
                    else
                    {
                    ?>
                    <div class="previewIconImage" style="border: 0;"></div>
                    <div class="previewIconText">&emsp;</div>
                    <?php
                    }
                ?>
                </div>
            </div>
            <div  class="previewIcons">
                <?php
                    $colorL = (is_fitbit_color($data['iconColors'][0], $fitbit_colors) == -1) ? $data['iconColors'][0] : is_fitbit_color($data['iconColors'][0], $fitbit_colors);
                    $colorR = (is_fitbit_color($data['iconColors'][1], $fitbit_colors) == -1) ? $data['iconColors'][1] : is_fitbit_color($data['iconColors'][1], $fitbit_colors);
                    echo '<style>#imgL' . $i . ' { background-color: ' . $colorL . '; } #imgR' . $i. ' { background-color: ' . $colorR . '; }</style>';
                ?>
                <div class="previewIcon">
                    <div class="previewIconImage" id="imgL<?php echo $i; ?>"><img src="<?php echo $data['iconImages'][0]; ?>" class="iconIMG"/></div>
                    <div class="previewIconText"><?php echo $data['iconText'][0]; ?></div>
                </div>
                <div class="previewIcon">
                    <div class="previewIconImage" id="imgR<?php echo $i; ?>"><img src="<?php echo $data['iconImages'][1]; ?>" class="iconIMG"/></div>
                    <div class="previewIconText"><?php echo $data['iconText'][1]; ?></div>
                </div>
                <div class="previewIcon">
                <?php
                    if (sizeof($data['iconText']) == 4)
                    {
                        $colorB = (is_fitbit_color($data['iconColors'][3], $fitbit_colors) == -1) ? $data['iconColors'][3] : is_fitbit_color($data['iconColors'][3], $fitbit_colors);
                        echo '<style>#imgB' . $i . ' { background-color: ' . $colorB . '; }</style>';
                    ?>
                    <div class="previewIconImage" id="imgB<?php echo $i; ?>"><img src="<?php echo $data['iconImages'][3]; ?>" class="iconIMG"/></div>
                    <div class="previewIconText"><?php echo $data['iconText'][3]; ?></div>
                <?php
                    }
                    else
                    {
                    ?>
                    <div class="previewIconImage" style="border: 0;"></div>
                    <div class="previewIconText">&emsp;</div>
                    <?php
                    }
                ?>
                </div>
            </div>
        </div>
        <div class="actionsContainer">
            <div class="action" id="modify<?php echo $i; ?>"><img src="images/modify.png" class="imgAction" /></div>
            <div class="action" id="delete<?php echo $i; ?>"><img src="images/delete.png" class="imgAction" /></div>
        </div>
        <script type="text/javascript">
            modify_array.push(document.getElementById('modify' + <?php echo json_encode($i); ?>));
            delete_array.push(document.getElementById('delete' + <?php echo json_encode($i); ?>));
        </script>
    </section>
    <?php
    }
?>