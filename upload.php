<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo '<a href="index.php" style="display:inline-block; margin: 20px; font-size: 18px;"> Return to Home</a><br>';
    
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileInfo = pathinfo($_FILES["image"]["name"]);
    $imageFileType = strtolower($fileInfo["extension"]);
    $filename = uniqid("img_", true) . "." . $imageFileType;
    $targetFile = $targetDir . $filename;
    $uploadOk = 1;

    // Check if image file is a actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain formats
    if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Resize image to slider dimensions (auto-scale to width)
            list($width, $height) = getimagesize($targetFile);
            $newWidth = 1200;
            $newHeight = ($height / $width) * $newWidth;

            $srcImage = null;
            switch ($imageFileType) {
                case "jpg":
                case "jpeg":
                    $srcImage = imagecreatefromjpeg($targetFile);
                    break;
                case "png":
                    $srcImage = imagecreatefrompng($targetFile);
                    break;
                case "gif":
                    $srcImage = imagecreatefromgif($targetFile);
                    break;
            }

            if ($srcImage) {
                $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($resizedImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                switch ($imageFileType) {
                    case "jpg":
                    case "jpeg":
                        imagejpeg($resizedImage, $targetFile);
                        break;
                    case "png":
                        imagepng($resizedImage, $targetFile);
                        break;
                    case "gif":
                        imagegif($resizedImage, $targetFile);
                        break;
                }
                imagedestroy($srcImage);
                imagedestroy($resizedImage);
            }

            echo "The file " . htmlspecialchars($filename) . " has been uploaded and resized.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
