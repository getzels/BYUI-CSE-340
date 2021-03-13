<?php

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
//Get the PHP vehicles model.
require_once '../model/vehicles-model.php';

require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

$navList = createNav($classifications);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}
switch ($action) {
  case 'addVehicle':
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_STRING, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_STRING);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
    $classification = filter_input(INPUT_POST, 'classification', FILTER_SANITIZE_STRING);


    $checkedPrice = checkNumberOnly($invPrice);

    // Check for missing data
    if (
      empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invImage)
      || empty($invThumbnail) || empty($checkedPrice) || empty($invStock) || empty($invColor) || empty($classification)
    ) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view//add-vehicle.php';
      exit;
    }

    $regOutcome = regVehicles($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classification);

    // Check and report the result
    if ($regOutcome === 1) {
      $message = "<p>Thanks for registering the vehicle $invMake .' '. $invModel .</p>";
      include '../vehicle-management.php';
      exit;
    } else {
      $message = "<p>Sorry, but the registration failed. Please try again.</p>";
      include '../view/add-vehicle.php';
      exit;
    }
    break;
  case 'addclassification':
    $classificationName = filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING);

    echo $classificationName;

    // Check for missing data
    if (empty($classificationName)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/add-classification.php';
      exit;
    }

    $regOutcome = regClassification($classificationName);

    // Check and report the result
    if ($regOutcome === 1) {
      $message = "<p>Thanks for registering the classification $classificationName .</p>";
      include '../vehicle-management.php';
      exit;
    } else {
      $message = "<p>Sorry, but the registration failed. Please try again.</p>";
      include '../view/add-classification.php';
      exit;
    }
    break;
    /* * ********************************** 
            * Get vehicles by classificationId 
            * Used for starting Update & Delete process 
            * ********************************** */
  case 'getInventoryItems':
    // Get the classificationId 
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    // Fetch the vehicles by classificationId from the DB 
    $inventoryArray = getInventoryByClassification($classificationId);
    // Convert the array to a JSON object and send it back 
    echo json_encode($inventoryArray);
    break;
  case 'mod':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);

    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }

    include '../view/vehicle-update.php';
    exit;
    break;
  case 'updateVehicle':
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);

    // echo "classificationId: " . $classificationId . "invMake: " . $invMake . "invModel: " . $invModel . "invDescription: " . $invDescription . "invImage: " . $invImage . "invThumbnail: " . $invThumbnail . "invPrice: " . $invPrice . "invStock: " . $invStock . "invColor: " . $invColor;

    if (empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)) {
      $message = '<p>Please complete all information for the updated item! Double check the classification of the item.</p>';
      include '../view/vehicle-update.php';
      exit;
    }
    $updateResult = updateVehicle($invId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
    if ($updateResult) {
      $message = "<p class='notify'>Congratulations, the $invMake $invModel was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p>Error. The vehicle was not updated.</p>";
      include '../view/vehicle-update.php';
      exit;
    }
    break;
  case 'del':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);

    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }

    include '../view/vehicle-delete.php';
    exit;
    break;
  case 'deleteVehicle':
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    $deleteResult = deleteVehicle($invId);
    if ($deleteResult) {
      $message = "<p class='notice'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p class='notice'>Error: $invMake $invModel was not
                deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    }
    break;
  default:
    $classificationList = buildClassificationList($classifications);
    include '../vehicle-management.php';
    exit;
    break;
}
