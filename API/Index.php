<?php 
    // Gør at man for flere fjel beskeder frem
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("./GET.php");
    include_once("./POST.php");
    include_once("./PUT.php");
    include_once("./DELETE.php");

    $httpMehod = $_SERVER['REQUEST_METHOD'];

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");
    if($httpMehod == "OPTIONS"){
        die();    
    }

    $uri = $_SERVER['REQUEST_URI'];

    $tempUri = explode("/", $uri);

    $antalUri = count($tempUri);
    for ($i = 0; $i < $antalUri; $i++) { 
        if($tempUri[$i] == "api"){
            break;
        }
        unset($tempUri[$i]);
    }

    $uri = array_values($tempUri);

    $headers = apache_request_headers();
    $accept = str_replace(' ', '', $headers['Accept']);
    $accept = explode(',', $accept);

    if($httpMehod === "POST"){
        $contentType = str_replace(' ', '', $headers['Content-Type']);
        $contentType = explode(',', $contentType);
    }

    /*************************************************/
    /*                       stien                   */
    /*************************************************/
    switch ($httpMehod) {
        case 'GET':
            $GET = new GET();
            $GET->findRoute($uri, $accept);
            break;
        case 'POST':
            $POST = new POST();
            $POST->findRoute($uri, $accept, $contentType);
            break;
        case 'PUT':
            $PUT = new PUT();
            $PUT->findRoute($uri, $accept);
            break;
        case 'DELETE':
            $DELETE = new DELETE();
            $DELETE->findRoute($uri, $accept);
            break;
        default:
            http_response_code(400);
            die("400 - bad request method!");
            break;
    }
?>