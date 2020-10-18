<?php

if( $action == 'send_application' )
{

    if( $_POST[ 'child_name' ] != '' && $_POST[ 'child_age' ] != '' && $_POST[ 'hours_per_month' ] != '' && $_POST[ 'email' ] != '' &&
        $_POST[ 'siblings' ] != '' && $_POST[ 'interests' ] != '' && $_POST[ 'favorite_toy' ] != '' && $_POST[ 'character' ] != '' &&
        $_POST[ 'is_vaccinated' ] != '' && $_POST[ 'is_used_to_nursing' ] != '' )
    {
        $message = 'Hallo Bianca!<br/><br/>';
        $message .= 'Du hast eine neue Bewerbung bei den Wildlingen.<br/><br/>';
        $message .= '------------------------------------------------<br/><br/>';

        $message .= 'Name des Kindes: ' . $_POST[ 'child_name' ] . '<br/>';
        $message .= 'Alter des Kindes: ' . $_POST[ 'child_age' ] . '<br/>';
        $message .= 'Betreuungsstunden pro Monat: ' . $_POST[ 'hours_per_month' ] . '<br/>';
        $message .= 'E-Mail Adresse: ' . $_POST[ 'email' ] . '<br/>';
        $message .= 'Geschwister: ' . $_POST[ 'siblings' ] . '<br/>';
        $message .= 'Interesse: ' . $_POST[ 'interests' ] . '<br/>';
        $message .= 'Lieblingsspielzeug: ' . $_POST[ 'favorite_toy' ] . '<br/>';
        $message .= 'Charakter: ' . $_POST[ 'character' ] . '<br/>';
        $message .= 'Wird das Kind geimpft: ' . $_POST[ 'is_vaccinated' ] . '<br/>';
        $message .= 'Ist das Kind Betreuung gewöhnt: ' . $_POST[ 'is_used_to_nursing' ] . '<br/>';
        $message .= 'Sonstige Information: ' . $_POST[ 'other_information' ] . '<br/>';
        $message .= 'Nachricht: ' . $_POST[ 'message' ] . '<br/>';

        sendEmail( 'Wildlinge Bewerbung', 'Wildlinge Bewerbung', $message );
        $html = getPageHTML( 'html/application_thx.html' );
    }
    else
    {
        $html = getPageHTML( 'html/application.html' );
        $html = str_replace( '@@error_message_text@@', 'Bitte fülle alle Felder aus die mit * markiert sind!', $html );
    }
}
else
{
    $html = getPageHTML( 'html/application.html' );
    $html = str_replace( '@@error_message_text@@', '', $html );
}

echo $html;