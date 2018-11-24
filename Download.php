<?php

class Download
{
    static public function download($url, $target) 
    {
      try {

        if (!$hfile = fopen($target, "w")) {
        	throw new Exception('Ошибка создания файла!');
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FILE, $hfile);

        if (!curl_exec($ch)) {
            curl_close($ch);
            fclose($hfile);
            unlink($target);
            throw new Exception('Ошибка загрузки файла!');
        }

        fflush($hfile);
        fclose($hfile);
        curl_close($ch);
        return true;

      } catch (Throwable $t) {
        	echo $t->getMessage(), "\n";
      } catch (Exception $e) {
            echo $e->getMessage(), "\n";
      }	
    }
}
