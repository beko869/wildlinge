<?php

require_once 'code/code_wildlings.php';

$indexFile = file_get_contents( 'html/home.html' );

$birthDaySecondChild = '13.07.2020';

$d1 = new DateTime( $birthDaySecondChild );
$d2 = new DateTime('now');

$interval = $d2->diff($d1);
$months = $interval->format('%m');

$html = getPageHTML( 'html/home.html' );
$html = str_replace( '@@second_child_months@@', $months, $html );

if( $action == 'send_contact_message' )
{
    $message = $_POST[ 'message' ];
    sendEmail( 'Wildlinge Kontaktanfrage', 'Wildlinge Kontaktanfrage', $message );
    $html = str_replace( '@@contact_message_thx@@', 'Vielen Dank für Deine Nachricht! Ich melde mich sobald wie möglich.', $html );
}
else
{
    $html = str_replace( '@@contact_message_thx@@', '', $html );
}

echo $html;