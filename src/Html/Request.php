<?php
 
 namespace App\Html;

 use App\RestApiClient\Client;
 
 class Request
 {
     static function handle()
     {
         switch ($_SERVER["REQUEST_METHOD"]) {
             case "POST":
                 self::postRequest();
                 break;
             case "GET":
                 self::getCounties();
                 break;
             case "DELETE":
                 self::deleteCounty();
                 break;
             default:
                 self::getCounties();
                 break;
         }
     }
 
     private static function postRequest()
     {
         $request = $_REQUEST;
 
         if (isset($request['btn-home'])) {
             echo 'Ez itt a kezdőlap.';
         }
 
         if (isset($request['btn-counties'])) {
             PageCounties::table(self::getCounties());
         }
 
         if (isset($request['btn-del-county'])) {
            self::deleteCounty();
            PageCounties::table(self::getCounties());
             
         }
 
         if (isset($request['btn-save-county'])) {
             $data = ['name' => $_POST['name']];
             if (isset($_POST['id']) && $_POST['id'] != "") {
                 // Update the county
                 self::updateCounty($_POST['id'], $data);
                 PageCounties::table(self::getCounties());
             } else {
                 // Create new county
                 self::createCounty($data);
             }
         }
 
         if (isset($request['btn-update-county'])) {
            PageCounties::table(self::getCounties());
            
         }
     }
 
     private static function getCounties(): array
     {
         $client = new Client();
         $response = $client->get('counties');
         return $response['data'];
     }
 
     private static function createCounty($data)
     {
         $client = new Client();
         $response = $client->post('counties', $data);
         if ($response && isset($response['data'])) {
             PageCounties::table(self::getCounties());
         }
     }
 
     private static function updateCounty($id, $data)
     {
         $client = new Client();
         $response = $client->put('counties/' . $id, $data);
         if ($response && isset($response['data'])) {
             PageCounties::table(self::getCounties());
         }
     }
 
     private static function deleteCounty()
     {
         $requestData = $_POST["btn-del-county"];
         $client = new Client();
         $response = $client->delete('counties', $requestData);
         //header("refresh:0");
     }
 }
 
 
?>