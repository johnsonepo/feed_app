<?php
namespace app;
use utilities\XmlConverter;
class ConversionApp
{
    public function run($uploadedFile = null, $output_format = "")
    {
        if (isset($_FILES['xmlFile']) && $_FILES['xmlFile']['error'] === UPLOAD_ERR_OK) {    
            $tempFilePath = $_FILES['xmlFile']['tmp_name'];
            $fileContent = file_get_contents($tempFilePath); 

            if($output_format == 'xml'){
                XmlConverter::convertToXml($fileContent);
            }
                XmlConverter::convertToExcel($fileContent);
        }
    }
}

if (basename($_SERVER['SCRIPT_FILENAME']) === basename(__FILE__)) {
    $app = new ConversionApp();
    $app->run();
}