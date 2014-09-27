<?php

class Download extends \Thread {
  public $url;
  public $data;

  public function download($url){
    $this->url = $url;
  }

  public function run(){
    if($this->url){
      echo $this->url."\n";
      $this->data = file_get_contents($this->url);
      preg_match_all("/(url=)(.*?)(')/s",$this->data,$data);
      foreach ($data[2] as $d) {
        echo "URL: ".print_r($d);
        echo "Copiando ...";
        $nome = substr($d, strpos($d, 'JAZZMASTERS'));
        try{
          copy($d,'./'.$nome);
          echo "Copiado!";
      }catch(Exception $e){
        print_r($e);
      }

        echo "\n";
        echo "\n";
      }
    }
  }

}
