<?php
class DeviceRecordHandlerBehavior extends ModelBehavior {

    /**
     * Send parallel CURL requests to selected lecture recorder devices with selected command to start or stop recording.
     * Parallel curl used to ensure performance.
     */
    public function curlLectureRecorders(Model $Model, $devices, $command) {


        // REQUEST PREPARATION  ########################################################################################


        // handles for parallel curls and responses
        $parallelCurls = curl_multi_init();
        $handles = array();


        //for ($i = 0; $i < 5; $i++) {
        foreach ($devices as $device) {

            $curl = curl_init();

            curl_setopt_array($curl, array(

                CURLOPT_URL => $device['Device']['ip_adress'] . $command,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                CURLOPT_USERPWD => $device['Device']['username'] . ":" . $device['Device']['device_pwd'],
                CURLOPT_FRESH_CONNECT => TRUE,
                CURLOPT_FORBID_REUSE => TRUE,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_TIMEOUT, 60
            ));

            curl_multi_add_handle($parallelCurls, $curl);
            $handles[] = array('Curl' => $curl, "Device" => $device['Device'], 'Event' => $device['Event']);

        }
        //}

        // REQUEST EXECUTION  ##########################################################################################

        // execute requests and poll periodically until all have completed
        // While we're still active, execute curl
        $active = null;
        do {
            $mrc = curl_multi_exec($parallelCurls, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);

        while ($active && $mrc == CURLM_OK) {
            // Wait for activity on any curl-connection
            if (curl_multi_select($parallelCurls) == -1) {
                continue;
            }

            // Continue to exec until curl is ready to
            // give us more data
            do {
                $mrc = curl_multi_exec($parallelCurls, $active);
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);
        }


        // REQUEST RESPONSE  ##########################################################################################

        // fetch output of each request
        $response = '';


        foreach ($handles as $handle) {


            $httpcode = curl_getinfo($handle['Curl'], CURLINFO_HTTP_CODE);
            $total_time = curl_getinfo($handle['Curl'], CURLINFO_TOTAL_TIME);

            $lr = 'Lecture Recorder ' . $handle['Device']['name'] . '[' . $handle['Device']['location'] . '] with IP:' . $handle['Device']['ip_adress'];


            if ($httpcode == 200) {

                $response .= 'DeviceRecordHandler: Successful request to ' . $lr . ' [' . $total_time . 's].' . PHP_EOL;
                $response .= 'Request: ' . curl_getinfo($handle['Curl'], CURLINFO_EFFECTIVE_URL) . PHP_EOL . PHP_EOL;
            }

            if ($httpcode !== 200) {

                $response .= 'DeviceRecordHandler: FAILED REQUEST to ' . $lr . ' [' . $total_time . 's].' . PHP_EOL;

                $response .= print_r(curl_getinfo($handle['Curl']));

                //TODO Show event info
            }

            curl_multi_remove_handle($parallelCurls, $handle['Curl']);
        }

        curl_multi_close($parallelCurls);

        return $response;
    }


    public function getLectureRecorderStatus(Model $Model, $device, $command) {


        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => $device['Device']['ip_adress'] . $command,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $device['Device']['username'] . ":" . $device['Device']['device_pwd'],
            CURLOPT_FRESH_CONNECT => TRUE,
            CURLOPT_FORBID_REUSE => TRUE,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT, 60

        ));

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);


        curl_close($curl);

        if (!($httpcode === 200)) {

            throw new NotFoundException();
        }

        return $response;

    }
}