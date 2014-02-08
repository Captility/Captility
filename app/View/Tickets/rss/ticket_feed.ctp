<?php
/**
 * Project: captility
 * User: Daniel
 * Date: 08.02.14
 * Time: 00:19
 * Created with JetBrains PhpStorm.
 */


$this->set('channelData', array(
    'title' => __('New Tickets'),
    'link' => $this->Html->url('/', true),
    'description' => __('Show Tickets'),
    'language' => 'en-us'
));

foreach ($tickets as $ticket) {


    $postTime = strtotime($ticket['Ticket']['modified']);

    $postLink = array(
        'controller' => 'tickets',
        'action' => 'view/' . $ticket['Ticket']['ticket_id']
    );

    // Remove & escape any HTML to make sure the feed content will validate.
    $bodyText = $ticket['Event']['title'] . '<br/>' . $this->Captility->calcDate($ticket['Event']['start'], '%A, %d. %B %Y, %H:%M Uhr') . '<br/>' .
        $ticket['Task']['description'];

    /*$bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact' => true,
        'html' => true,
    ));*/

    echo  $this->Rss->item(array(), array(
        'title' => $ticket['Task']['name'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $ticket['Ticket']['modified']
    ));
}
?>


