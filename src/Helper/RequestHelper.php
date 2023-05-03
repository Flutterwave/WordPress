<?php 

namespace Flutterwave\WordPress\Helper;

class RequestHelper {
    
    public static function generate_hash( array $payload, ?string $secret_key = null) {
        // format: sha256(amount+currency+customeremail+txref+sha256(secretkey)).
        // assumes payload has amount, currency, email, and tx_ref.
        $string_to_hash = '';
		foreach ( $payload as $value ) {
				$string_to_hash .= $value;
		}
        $string_to_hash = $string_to_hash . hash( 'sha256' , $secret_key );
		return hash( 'sha256', $string_to_hash );
    }

    public static function get_default_payment_options() {
        return 'card, ussd, mobilemoneyghana, account, banktransfer, mpesa, mobilemoneyfranco, mobilemoneyuganda, mobilemoneyrwanda, mobilemoneyzambia';
    }
}