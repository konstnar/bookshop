<?php

include __DIR__ . '/../catalog/Model.php';

$instanse = new CatalogModel();
$books = $instanse->getAllBooks();

include __DIR__ . '/../../views/catalog.html.php';