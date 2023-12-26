<?php
namespace app;
class ConversionView
{
    public static function renderFileSelectionView($params = '')
    {
        if($params){
            echo $params;
        }
        include_once str_replace('\\', '/', __DIR__ . '\views\index.html');
    }
    
}
