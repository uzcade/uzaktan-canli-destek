<?php  
  
  function base_url($url = null) {
    if($url) {
      return BASE_URL ."/". trim($url);
    } else {
      return BASE_URL;
    }
  }

  function redirect($url = null) {
    if(!$url) {
      header("Location:" . base_url());
    } else {
      header("Location:" . base_url(trim($url)));
    }
  }

?>