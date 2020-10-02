<?php

class Utils
{ 
    public static function buildError($endPoint, $exception)
    {
        return 'Excepción en ' . $endPoint . ': ' . $exception->getMessage();  
    }

    public static function getValue($varName, $isPost)
    {
        $res = null;

        if ($isPost) {
            $arr = $_POST;
        } else {
            parse_str(file_get_contents("php://input"), $_PUT);
            $arr = $_PUT;
        }
        
        if (isset($arr[$varName]) && empty($arr[$varName]) === false) {
            $res = $arr[$varName];
        }
        return $res;
    }

    public static function getJsonContent()
    {
        return json_decode(file_get_contents("php://input"), true);
    } 

    public static function GetLastInsertedId($db)
    {
        $query = $db->query('SELECT LAST_INSERT_ID()');
        return $query->fetchColumn();
    }

    public static function uploadImage()
    {
        $res = -1;
        $didUpload = false;
        $fileName = null;
        $fileSize = 0;

        if (isset($_FILES["filename"])) {
            $attachedImage = $_FILES["filename"]["error"] != 4;
    
            if ($attachedImage) {            
                if ($imageName != '') {
                    $filenamePath = IMG_DIR . $imageName;
                    unlink($filenamePath);
                }
        
                // Get upload data
                $fileName = $_FILES['filename']['name'];
                $fileSize = $_FILES['filename']['size'];
                $fileTmpName  = $_FILES['filename']['tmp_name'];
                $uploadPath = IMG_DIR . basename($fileName);
                
                //Format validation
                $check = getimagesize($fileTmpName);
                if ($check === false)
                {
                    $res = 2;
                }
    
                // Size validation
                if ($fileSize > MAX_IMAGE_SIZE) {
                    $res = 1;
                } 
                
                if ($res == -1)
                {
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                }
                if ($didUpload)
                {
                    $res = 0;
                }            
            }
        }

        return $res;
    }
}