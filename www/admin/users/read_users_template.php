<?php
global $user_srv;
// display the table if the number of users retrieved was greater than zero
?>
    <div class="list">
    <ul>
        <li class="list-header">
            <span class="li-name">Firstname</span>
            <span class="li-name">Lastname</span>
            <span class="li-name">Email</span>
            <span class="li-name">Contact Number</span>
            <span class="li-price">Access Level</span>
        </li>
    </ul>
        <ul>
    <?php
    foreach ($usersList as $user){

        echo    "<li class='list-item'>";
        echo        "<span class='li-name'> {$user->getFirstName()} </span>";
        echo        "<span class='li-name'> {$user->getLastName()} </span>";
        echo        "<span class='li-name'> {$user->getEmail()} </span>";
        echo        "<span class='li-name'> {$user->getContactNumber()} </span>";
        echo        "<span class='li-name'> {$user->getAccessLevel()} </span>";
        echo    "</li>";
    } ?>
        </ul>
    <?php
    $page_url="read_users.php?";
    $total_rows = count($user_srv->ReadAllUser());


    include_once 'paging.php';
?>