<?php
// Include necessary files and classes
require_once 'C:\xampp\htdocs\edugrow\config.php'; // Assuming you have a config.php file for database connection
require_once 'C:\xampp\htdocs\edugrow\Model\Event.php';
require_once 'C:\xampp\htdocs\edugrow\Controller\EventC.php';

// Initialize EventC object
$EventC = new EventC();

if (isset($_POST['add'])) {
    // Check if all required fields are present
    if (isset($_POST['Nom'], $_POST['Date'], $_POST['Location'], $_FILES['img'], $_POST['category'])) {
        // Retrieve form data
        $Nom = $_POST['Nom'];
        $Date = $_POST['Date'];
        $Location = $_POST['Location'];
        $imgTmpName = $_FILES['img']['tmp_name'];
        $imgName = $_FILES['img']['name'];
        $imgPath = '../../Uploads/' . $imgName;
        $category = $_POST['category'];

        // Check if any required field is empty
        if (!empty($Nom) && !empty($Date) && !empty($Location) && !empty($imgName) && !empty($category)) {
            // Image handling
            if (move_uploaded_file($imgTmpName, $imgPath)) {
                // Create Event object
                $Event = new Event();
                $Event->setNom($Nom);
                $Event->setDate($Date);
                $Event->setLocation($Location);
                $Event->setImg($imgPath);
                $Event->setCategory($category); // Fix the method name

                // Add Event
                $EventC->addEvent($Event);

                // Redirect to the page after adding
                header('Location: Event.php');
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
if (isset($_POST['edit_event'])) { // Change to match the form submit button name
    if (isset($_POST['idE'], $_POST['Nom'], $_POST['Date'], $_POST['Location'])) { // Remove the check for new_img
        $idE = $_POST['idE'];
        $Nom = $_POST['Nom'];
        $Date = $_POST['Date']; 
        $Location = $_POST['Location'];

        // Check if any required field is empty
        if (!empty($idE) && !empty($Nom) && !empty($Date) && !empty($Location)) {
            // Create Event object and set its properties
            $Event = new Event();
            $Event->setIdE($idE);
            $Event->setNom($Nom);
            $Event->setDate($Date);
            $Event->setLocation($Location);

            // Call the method to modify the event
            $EventC->modifyEvent($Event);

            // Redirect to the appropriate page after modifying the event
            header('Location: Event.php');
            exit();
        } else {
            // If any required field is empty, provide appropriate error handling
            echo "All fields are required for updating an event.";
            exit();
        }
    } else {
        // If any required field is missing, provide appropriate error handling
        echo "All fields are required for updating an event.";
        exit();
    }
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
