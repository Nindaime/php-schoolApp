<?php
    if (isset($_POST['Add new topic'])) {
        # Publish-button was clicked
        header("Location: topicsform.php");
        exit();
    }
    elseif (isset($_POST['View course'])) {
        # Save-button was clicked
    }
?>