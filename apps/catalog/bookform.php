<?php

include __DIR__ . '/Model.php';


if (isset($_POST['id']) && $_POST['action'] == "Edit") {
    $instanse = new CatalogModel();
    $book = $instanse->getBookById();
    $submit = "Update";
    include __DIR__ . '/../../views/bookform.html.php';
}

if (isset($_POST['id']) && $_POST['action'] == "Delete") {
    $instanse = new CatalogModel();
    $book = $instanse->deleteBookById();
}

