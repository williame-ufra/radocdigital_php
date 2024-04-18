<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

class SendMailHelper
 {

    public function sendEmailConfirmacaoCadastro( $destinatario, $userName )
 {
        $destinatario = str_replace('@', '%40', $destinatario);
        $userName = explode(" ", $userName);
        $curl = curl_init();

        curl_setopt_array( $curl, array(
            CURLOPT_URL => 'https://www.sisplo.sitebeta.com.br/api/send/send-email?destinatario='.$destinatario.'&userName='.$userName[0],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ) );

        $response = curl_exec( $curl );

        curl_close( $curl );

        return true;

    }
}
