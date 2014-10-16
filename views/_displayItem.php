<?php
// Requires $item to be set to Item object
require_once('../models/item.php');
if (!isset($item))
    $item = new Item();
?>    
<?=$item->GetDescription()?><br>