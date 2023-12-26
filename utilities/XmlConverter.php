<?php
namespace utilities;
use app\ConversionView;

class XmlConverter
{
    public static function convertToXml($file_content){
       $feed_structure = self::identifyFeedStructure($file_content);
        if($feed_structure == 'facebook'){
            $data = self::facebookFeed($file_content);
            ConversionView::renderFileSelectionView($data);
        }else{
            $data = self::googleFeed($file_content);
            ConversionView::renderFileSelectionView($data);
        }
    }
    public static function convertToExcel($file_content){
        $feed_structure = self::identifyFeedStructure($file_content);
        if($feed_structure == 'facebook'){
            self::facebookFeed($file_content);
        }else{
            self::googleFeed($file_content);
        }
    }
    public static function identifyFeedStructure($xmlContent){
        if (strpos($xmlContent, "google")) {
            return 'google';
        }
        if (strpos($xmlContent, 'facebook')) {
            return 'facebook';
        }
        return 'unknown';
    }
    public static function facebookFeed($file_content){
        return "facebookFeed file converted";
    }
    public static function googleFeed($file_content){
        return "googleFeed file converted";
    }

       
}
