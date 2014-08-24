<?php
/**
 * Project: captility
 * User: Daniel
 */


/**
 * Class CaptilityShell
 *
 *
 * INFO:
 * Run Shell by command: $ cd /full/path/to/captility/app && Console/cake captility --quiet [args]
 * Attention: app/tmp ans subfolder need to be executable: sudo chmod -R 777 captility/app/tmp
 */

/**
 * CronTask shell function to manage scheduled Events in Captility.
 *
 * See also: CalendarsController::cronTask(), however the shell should preferably be used instead to ensure security.
 *
 * CronTab should look like:
 *
 *  # Captility Event Execution
 *  * /1 * * * * cd /full/path/to/captility/app && Console/cake captility --quiet >> /path/to/captility/app/tmp/logs/cronjob.log
 *  # > /dev/null 2>&1 # alternate null output
 *
 * @param int $hash ValidationHash to ensure security.
 * @throws NotFoundException Returns error with invalid hash.
 */
class CaptilityShell extends AppShell {

    var $uses = array('Event', 'Ticket', 'Device');


    /**
     * Default shell function to invoke 'Captility Tact' for Event-, Ticket-, Device-,.. updates and cleanup services.
     */
    public function main() {


        // #########################################################################################################
        // ################################ CRONJOB TASK INJECTIONS ################################################
        // #########################################################################################################

        // ################################ CLEANUP::Update Urgency Statuses  ######################################
        $this->shortenLogs(); // Keep logfiles in captility/app/tmp/logs under fixed filsize.

        // ################################ TICKETS::Update Urgency Statuses  ######################################
        $this->Ticket->updateUrgencyStatuses();

        // ################################ EVENTS:: Generate new Tickets from WF  #################################
        $jsonResponse = $this->Event->updateTicketsFromWorkflow();

        // #########################################################################################################
        // #########################################################################################################


        // Send response as JSON for log if soemthing was done:
        if (!empty($jsonResponse)) {

            $jsonResponse = date('Y-m-d H:i:s') . ' | ' . json_encode($jsonResponse);
        }

        $this->out(PHP_EOL.'<comment>' . $jsonResponse . '</comment>'.PHP_EOL);


    }

    public function test() {
        $this->out('<comment>CaptilityShell successfully executed.</comment>');
    }


    /**
     * Cleanup service to keep logfiles in captility/app/tmp/logs under fixed filsize.
     */
    private function shortenLogs() {


        $shorten_lines = 100;
        $maxKB = 1;
        $logPath = getcwd() . '/tmp/logs/';
        $logFiles = glob($logPath . '*.log');


        foreach ($logFiles as $log) {

            // Current file size
            $this->out($log . ' - ' . number_format(filesize($log) / 1024, 2) . 'KB', TRUE, Shell::VERBOSE);

            if (number_format(filesize($log) / 1024, 2) >= $maxKB) {

                $content = file($log);
                array_splice($content, 0, $shorten_lines);
                file_put_contents($log, $content);


                $this->out(PHP_EOL . date('Y-m-d H:i:s') . ' | <comment>Log "'.$log.'" was shortened.</comment>' . PHP_EOL, TRUE, Shell::QUIET);
            }
        }


    }
}