<?php 
    require "db.php";
    $connection = createDBConnection();
?>
<?php
  $method = $_SERVER['REQUEST_METHOD'];
  echo "Method: $method";
?>

<?php
  $dataAsJson = file_get_contents("php://input");
  $dataAsArray = json_decode($dataAsJson, true);
  print_r($dataAsArray);

  function getPostJson(): ?string {
    $dataAsJson = file_get_contents("php://input");
    if (!$dataAsJson) {
      return null;
    }
    return $dataAsJson;
  }
  
  function getPostJsonAsArray(string $dataAsJson): array {
    $dataAsArray = json_decode($dataAsJson, true);
    if (!$dataAsArray) {
      echo 'Не удалось преобразовать JSON в массив! <br>';
      return [];
    }
    return $dataAsArray;
  }
  
  $dataAsJson = getPostJson();
  if ($dataAsJson) {
    print_r($dataAsJson . '<br>');
    print_r(getPostJsonAsArray($dataAsJson));
    echo '<br><br>';
  }

  function saveFile(string $file, string $data): void {
    $myFile = fopen($file, "w");
    if ($myFile) {
      $result = fwrite($myFile, $data);
      if ($result) {
        echo 'Данные успешно сохранены в файл';
      } else {
        echo 'Произошла ошибка при сохранении данных в файл';
      }
      fclose($myFile);
    } else {
      echo 'Произошла ошибка при открытии файла';
    }
  }

  if ($dataAsJson) {
    saveFile('src/post_js.json', $dataAsJson);
  }

  function saveImage(string $imageBase64):string {
    $imageBase64Array = explode(';base64,', $imageBase64);
    $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
    $imageFilePath = "src/images/image_" . uniqid() . '.' . $imgExtention;
    saveFile($imageFilePath, $imageDecoded);
    return $imageFilePath;
  }
  if ($dataAsJson) {
    $dataAsArray = getPostJsonAsArray($dataAsJson);    
    if (($dataAsArray['title']) && ($dataAsArray['subtitle']) && ($dataAsArray['author'])) {
      $dataAsArray['image_url'] = saveImage($dataAsArray['image_url']);
      $dataAsArray['author_url'] = saveImage($dataAsArray['author_url']);
      $dataAsArray['image_content'] = saveImage($dataAsArray['image_content']);
      $dataAsArray['publish_date'] = strtotime(str_replace('-', '/', $dataAsArray['publish_date']));
      uploadPostToDB($connection, $dataAsArray);
      echo 'Пост загружен';
    } else {
      echo 'Не хватает данных';
    }
  }
  closeDBConnection($connection);
?>