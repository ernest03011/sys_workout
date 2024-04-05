<?php 

namespace Http\controller\Curl;

class CurlController{

  private $curl;
  const HEADER = [
    "X-RapidAPI-Host: exercisedb.p.rapidapi.com",
    "X-RapidAPI-Key: ea75e19c82msh781fafff442f79cp1055b9jsnea6de9717e62"
  ];
  private $url;
  private $params;

  function __construct(string $url, array | string $params) {
    $this->url = $url;
    $this->params = $params;
    $this->curl = curl_init();
  }

  function execute() : array
  {

    curl_setopt_array($this->curl, [
      CURLOPT_URL => $this->url . $this->params,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => self::HEADER,
    ]);

    $response = curl_exec($this->curl);
    $err = curl_error($this->curl);

    return [$response, $err];
  }

  public function close() : void
  {
    curl_close($this->curl);
  }

  public function getErrors(){
    return curl_error($this->curl);
  }
  
}

