<?php
function flashMessagge()
{ 
    if (isset($_SESSION['success'])) {
        echo '<div style = "color:green">'.$_SESSION['success'] .'</div>';
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo '<div style = "color:green">'.$_SESSION['error'] .'</div>';
        unset($_SESSION['error']);
    }
    
}
