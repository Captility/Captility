<?php

require_once "ParallelCurl.php";

class DeviceCurl extends ParallelCurl {


    public function startCurl($curl_options, $callback, $user_data = array(), $post_fields = null) {

        if ($this->max_requests > 0)
            $this->waitForOutstandingRequestsToDropBelow($this->max_requests);

        $ch = curl_init();
        curl_setopt_array($ch, $curl_options);

        if (isset($post_fields)) {
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        }

        curl_multi_add_handle($this->multi_handle, $ch);

        $ch_array_key = (int)$ch;

        $this->outstanding_requests[$ch_array_key] = array(
            'url' => $curl_options[CURLOPT_URL],
            'callback' => $callback,
            'user_data' => $user_data,
        );

        $this->checkForCompletedRequests();
    }

}

?>