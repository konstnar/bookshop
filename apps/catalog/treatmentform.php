<?php

include __DIR__ . '/Model.php';

switch ($_POST['submit']) {
    case 'Update':
        $instanse = new CatalogModel();
        $instanse->updateBookById();
        break;
    case 'Add Book':
        $instanse = new CatalogModel();
        $instanse->addBook();
        break;
    default:
        //
        break;
}