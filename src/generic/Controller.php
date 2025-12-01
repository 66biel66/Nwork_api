<?php 


class Controller {
    public function jason($dadoos, int $status = 200) {
    
        http_response_code($status);
        echo json_encode($dadoos);

    }
}

