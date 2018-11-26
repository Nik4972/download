<?php

namespace knn\download;

class Download
{
     /**
     * Метод копирования файла из $url в $target
     * @param string $url
     * @param string $target
     * @return true or error
     */
    static public function downloadFile($url, $target) 
    {

      try {

        // Загружаем данные из файла
      $data = file_get_contents($url);

        // Записываем данные в локальный файл 
      $data = file_put_contents($target, $data);

      if (!$data){
      
        return false;

      } else {
        
        return true;
      }

      } catch (Throwable $t) {
            echo $t->getMessage() . "\n";
      } catch (Exception $e) {
            echo $e->getMessage() . "\n";
      }	
    }
}
