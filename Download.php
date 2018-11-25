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
            // Создаем и открываем файл для записи
        if (!$hfile = fopen($target, "w")) {
            throw new Exception('Ошибка создания файла!');
        }

            // Создаем cURL запрос для загрузки файла из $url
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FILE, $hfile);

        if (!curl_exec($ch)) { // Выполняем запрос. Если неудачный - освобождаем ресурсы, выдаем ошибку.
            curl_close($ch);
            fclose($hfile);
            unlink($target);
            throw new Exception('Ошибка загрузки файла!');
        }
          // Если удачный - сохраняем файл,освобождаем ресурсы, возвращаем true.
        fflush($hfile);
        fclose($hfile);
        curl_close($ch);
        return true;

      } catch (Throwable $t) {
            echo $t->getMessage() . "\n";
      } catch (Exception $e) {
            echo $e->getMessage() . "\n";
      }	
    }
}

