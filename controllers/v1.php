<?php

//header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
//header("Access-Control-Max-Age: 3600");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

class V1 extends Controller
{
    private $_error = null;
    private $secretKey = 'secretd';
    private $version = 'V1';

    function __construct()
    {
        parent::__construct();
    }
    function telegram()
    {
        $body = json_decode(file_get_contents("php://input"), TRUE);
        $url = "https://api.telegram.org/bot7043969116:AAE71u62z99z47yryYvyMOmqh65x4n3WUOo/";

        $result = $this->model->command("insert", ["log", "id"], ["body" => json_encode($body)]);
        $chatId = $body["message"]["chat"]["id"];
        $message = $body["message"]["text"];

        if (strpos($message, "\/hi") === 0) {
            $keyboard = array(
                "inline_keyboard" => array(
                    array(
                        array(
                            "text" => "GitHub Repo",
                            "callback_data" => "myCallbackData"
                        )
                    )
                )
            );

            $args = [
                "chat_id" => 1321105370,
                "text" => "Hi",
                "parse_mode" => "HTML",
                //"reply_markup" => json_encode($keyboard),
            ];


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.telegram.org/bot7043969116:AAE71u62z99z47yryYvyMOmqh65x4n3WUOo/sendMessage?chat_id=1321105370&text=hiiiiiiiiiiiiiiii',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;
        }

        die;






        $chatId = [1321105370, 6688616177];

        foreach ($chatId as  $value) {
            $args = [
                "chat_id" => $value,
                "parse_mode" => "HTML",
                "text" => "<a href='https://sepolia.etherscan.io/tx/" . $body[0]["blockHash"] . "'>" . $body[0]["blockHash"] . "</a>"
            ];

            file_get_contents($url . "sendMessage?" . http_build_query($args));
        }



        $operation = '';
        switch ($operation) {
            case "get":
                $this->request_method('GET');
                $data = $this->model->event($_GET['wallet_addr']);
                if (!empty($data) && is_array($data)) {
                    (new Httpresponse)->set(200);
                    echo json_encode($data[0]);
                    exit();
                } else {
                    $this->_error = "Not found any record!";
                    $this->Error();
                }
                break;
            case "chart":
                $this->request_method('GET');
                $data = $this->model->eventChart($_GET['wallet_addr']);
                if (!empty($data) && is_array($data)) {
                    (new Httpresponse)->set(200);
                    echo json_encode($data);
                    exit();
                } else {
                    $this->_error = "Not found any record!";
                    $this->Error();
                }
                break;
            case "add":
                $this->request_method('POST');
                $result = $this->model->addEvent($_GET['username'], $_GET['event'], $_GET['name']);
                if ($result > 0) {
                    (new Httpresponse)->set(202);
                    echo json_encode([
                        "result" => true,
                        "message" => "new record added",
                        "recordId" =>  $result
                    ]);
                    exit();
                }
                break;
            case "update":
                $this->request_method('POST');
                $result = $this->model->command("update", $table, $body, $_GET['wallet_addr']);
                if ($result) {
                    (new Httpresponse)->set(202);
                    echo json_encode([
                        "result" => true,
                        "message" => "Updated"
                    ]);
                    exit();
                }
                break;
        }
    }

    private function request_method($arg)
    {
        //header("Access-Control-Allow-Methods: " . $arg);
        if (strtolower($_SERVER['REQUEST_METHOD']) !== strtolower($arg)) {
            (new Httpresponse)->set(405);
            echo (json_encode(["message" => "Request method must be correct set!"]));
            exit();
        }
    }

    private function _showError()
    {
        if (!empty($this->_error))  $this->Error();
    }

    /**
     * Authorization
     * @param String $key
     */
    private function Error()
    {
        if (isset($this->_error)) {
            if (!empty($this->_error)) {
                (new Httpresponse)->set(400);
                echo json_encode([
                    "result" => false,
                    "message" => $this->_error
                ]);
            }
        } else {
            (new Httpresponse)->set(400);
            echo ('{"message":"Please contact with programmer!"}');
            exit();
        }
    }
}
