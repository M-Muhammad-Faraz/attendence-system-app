<?php
echo "i am teacher";
$newList = $usr->getListOfStudents($users);

?>

<main>
    <h1>List Of Students:</h1>
    <ul>
        <?php foreach ($newList as $item) : ?>
            <li><?php echo $item->name; ?></li>
        <?php endforeach; ?>
    </ul>
</main>