<?php
include_once 'init.php';
use app\ConversionApp;
use app\ConversionView;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['outputFormat'], $_FILES['xmlFile']) && $_FILES['xmlFile']['error'] === UPLOAD_ERR_OK) {
        $app = new ConversionApp();
        $output_format = $_POST['outputFormat'];
        $app->run($_FILES['xmlFile']['tmp_name'], $output_format);
    }
} else {
    ConversionView::renderFileSelectionView();
}
