<?php

// Respond to GET requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Handle requests to the base endpoint
  if ($_SERVER['REQUEST_URI'] === '/') {
    echo json_encode([
      'IPA' => 'A type of beer that is characterized by its hoppy flavor and high bitterness.',
      'Stout' => 'A type of beer that is dark and thick, with a rich, roasty flavor.',
      'Porter' => 'A type of beer that is dark and smooth, with a malty flavor and moderate bitterness.',
      'Sour' => 'A type of beer that is intentionally acidic, with a tart and tangy flavor.',
    ]);
  }

if (preg_match('/\/ipa\/*/', $_SERVER['REQUEST_URI'])) {
  $request_parts = explode('/', $_SERVER['REQUEST_URI']);
  $ipa_name = $request_parts[2];

  // Handle requests to the specific IPA endpoint
  if ($ipa_name === 'Voodoo Ranger') {
    echo json_encode([
      'Voodoo Ranger' => 'A hoppy IPA with a balance of juicy citrus and earthy pine flavors.'
    ]);
  } else if ($ipa_name === '120 Minute IPA') {
    echo json_encode([
      '120 Minute IPA' => 'A highly hopped IPA with a strong alcohol content and intense bitterness.'
    ]);
  } else if ($ipa_name === 'Two Hearted Ale') {
    echo json_encode([
      'Two Hearted Ale' => 'A classic American IPA with a strong hop presence and clean finish.'
    ]);
  }
}

// Respond to POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_SERVER['REQUEST_URI'] === '/brewery') {
    $request_body = file_get_contents('php://input');
    $request_data = json_decode($request_body, true);
    echo json_encode($request_data);
  }
}

?>
