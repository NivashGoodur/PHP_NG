<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $users = [

            [
                'firstname' => 'name1',
                'name' => 'firstname1',
                'info' => 'info1'
            ],
            [
                'firstname' => 'name2',
                'name' => 'firstname2',
                'info' => 'info2'
            ],
            [
                'firstname' => 'name3',
                'name' => 'firstname3',
                'info' => 'info3'
            ],
            [
                'firstname' => 'name4',
                'name' => 'firstname4',
                'info' => 'info4'
            ],
            [
                'firstname' => 'name5',
                'name' => 'firstname5',
                'info' => 'info5'
            ]
        ];

        foreach($users as $i){
            echo '<h1>'.$i['name'].'</h1>';
            echo '<p>son nom : '.$i['firstname'].' Son information : '.$i['info'].'</p>';
        }











    ?>

</body>
</html>


