<?php

require_once("inc/config.php");
require_once("inc/registration.php");

$data = array(
      "registration[i18n]" => "en",
      "registration[email]" =>  "test@test.com",
      "registration[address_apt_or_lot_number]" =>  "1",
      "registration[address_city_town]" =>  "Boston",
      "registration[address_street]" =>  "4 Yawkey Way",
      "registration[address_state]" =>  "MA",
      "registration[address_zipcode]" =>  "02215",
      "registration[ethnicity]" =>  "Other",
      "registration[temp_id_number]" =>  "12345",
      "registration[mailing_address_city_town]" =>  "Charlestown",
      "registration[mailing_address_state]" =>  "MA",
      "registration[mailing_address_street]" =>  "1 1st St",
      "registration[mailing_address_zipcode]" =>  "02129",
      "registration[name_first]" =>  "John",
      "registration[name_last]" =>  "Adams",
      "registration[name_middle]" =>  "Quincy",
      "registration[name_suffix]" =>  "Jr.",
      "registration[name_title]" =>  "Mr.",
      "registration[phone_number]" =>  "555-555-5555",
      "registration[political_party]" =>  "Democratic",
      "registration[previous_address_apt_or_lot_number]" => "",
      "registration[previous_address_city_town]" =>  "Quincy",
      "registration[previous_address_state]" =>  "MA",
      "registration[previous_address_street]" =>  "123 Peacefield Road",
      "registration[previous_address_zipcode]" =>  "02171",
      "registration[previous_name_first]" =>  "George",
      "registration[previous_name_last]" =>  "Washington",
      "registration[previous_name_middle]" => "",
      "registration[previous_name_suffix]" =>  "III",
      "registration[previous_name_title]" =>  "Mrs.",
      "registration[birthdate]" =>  "1976-07-04",
      "registration[referer]" =>  "",
      "registration[ip]" =>  "10.10.10.10",
      "registration[source]" =>  "any-source-code-i-want"
);

$reg = new VoterRegRegistration("MA", "en");
$reg->fill_in_fields($data);
print "Reg is valid: " . ($reg->is_valid() ? "true" : "false") . "\n";

$save_ok = $reg->save();
if ($save_ok) {
  print "ID: " . $reg->id_sha1() . "\n";
  print "PDF Link: " . $reg->pdf_link() . "\n";
} else {
  print "Save failed: " . $reg->error() . "\n";
}

?>
