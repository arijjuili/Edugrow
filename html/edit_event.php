<?php
// Include necessary files and classes
require_once 'C:\xampp\htdocs\edugrow\config.php'; // Assuming you have a config.php file for database connection
require_once 'C:\xampp\htdocs\edugrow\Model\Event.php';
require_once 'C:\xampp\htdocs\edugrow\Controller\EventC.php';

// Initialize EventC object
$EventC = new EventC();

// Check if the event ID is provided in the URL
if(isset($_GET['idE'])) {
    $eventId = $_GET['idE'];
    
    // Retrieve the event details from the database
    $event = $EventC->getEventById($eventId);
    
    // Check if the event exists
    if($event) {
        // Now you have the response details, you can display the edit form
        ?>

        <!-- HTML form for editing the response -->
        <form method="POST" action="process_event.php">
            <!-- Hidden input field to store the response ID -->
            <input type="hidden" name="idE" value="<?php echo $event['idE']; ?>">

            <div class="mb-3">
                <label for="Nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $event['Nom']; ?>">
            </div>

            <div class="mb-3">
                <label for="Date" class="form-label">Date</label>
                <input type="Date" class="form-control" id="Date" name="Date" value="<?php echo $event['Date']; ?>">
            </div>

            <div class="mb-3">
                <label for="Location" class="form-label">Location</label>
                <input type="text" class="form-control" id="Location" name="Location" value="<?php echo $event['Location']; ?>">
            </div>

            <!-- Display the current image -->
            <div class="mb-3">
                <label>Current Image</label><br>
                <img src="<?php echo $event['img']; ?>" alt="Current Image" style="max-width: 100px;">
            </div>

            <!-- Allow user to upload a new image -->
            <div class="mb-3">
                <label for="new_img" class="form-label">New Image</label>
                <input type="file" class="form-control" id="new_img" name="new_img">
            </div>

            <button type="submit" class="btn btn-primary" name="edit_event">Save Changes</button>
        </form>

        <?php
    } else {
        // Response not found, display error message or redirect to error page
        echo "Event not found.";
    }
} else {
    // No response ID provided in the URL, display error message or redirect to error page
    echo "Event ID not provided.";
}
?>
