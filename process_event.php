<?php
// Include necessary files and classes
require_once 'C:\xampp\htdocs\edugrow\config.php'; // Assuming you have a config.php file for database connection
require_once 'C:\xampp\htdocs\edugrow\Model\Event.php';
require_once 'C:\xampp\htdocs\edugrow\Controller\EventC.php';

// Initialize EventC object
$EventC = new EventC();

// Add Event
if (isset($_POST['add'])) {
    // Check if all required fields are present
    if (isset($_POST['Nom'], $_POST['Date'], $_POST['Location'], $_FILES['img'])) {
        $Nom = $_POST['Nom'];
        $Date = $_POST['Date'];
        $Location = $_POST['Location'];

        
        $imgTmpName = $_FILES['img']['tmp_name'];
        $imgName = $_FILES['img']['name'];
        $imgPath = '../../Uploads/' . $imgName; // Adjust the path to your upload directory

        // Check if any required field is empty
        if (!empty($Nom) && !empty($Date) && !empty($Location) && !empty($imgName)) {
            // Image handling
            if (move_uploaded_file($imgTmpName, $imgPath)) {
                $Event = new Event();
                $Event->setNom($Nom);
                $Event->setDate($Date);
                $Event->setLocation($Location);
                $Event->setImg($imgPath); // Set image path in the event object

                $EventC->addEvent($Event);

                // Redirect to the page after adding
                header('Location: Event.php'); // Replace 'Event.php' with the appropriate page
                exit();
            } else {
                echo "Error uploading the image."; // Provide appropriate error handling
                exit();
            }
        } else {
            echo "All fields are required for adding an event."; // Provide appropriate error handling
            exit();
        }
    } else {
        echo "All fields are required for adding an event."; // Provide appropriate error handling
        exit();
    }
}



// Update 
if (isset($_POST['edit'])) {
    $idE = $_POST['idE'];
    $Nom = $_POST['Nom'];
    $Date = $_POST['Date']; // Retrieve the date from the form
    $Location = $_POST['Location'];

    // Image handling for modification
    $newImgTmpName = $_FILES['img']['tmp_name'];
    $newImgName = $_FILES['img']['name'];
    $newImgPath = '../../Uploads/' . $newImgName; // Adjust the path to your upload directory
    move_uploaded_file($newImgTmpName, $newImgPath);

    $Event = new Event();
    $Event->setIdE($idE);
    $Event->setNom($Nom);
    $Event->setDate($Date);
    $Event->setLocation($Location);
    $Event->setImg($newImgPath); // Set the new image path

    $EventC->modifyEvent($Event);

    // Redirect to the destination page after updating
    header('Location: Event.php');
    exit();
}





// Delete 
if(isset($_GET['delete'])) {
    $idE = $_GET['delete'];
    $EventC->deleteEvent($idE);

    // Redirect back to the destination page after deleting
    header('Location: Event.php');
    exit();
}
?>
