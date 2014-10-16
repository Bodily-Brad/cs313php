<?php
// Requires $item to be set to Item object
require_once('../models/item.php');
if (!isset($item))
    $item = new Item();
?>    
<h3><?=$item->GetDescription()?> Details</h3>
<strong>Item ID :</strong> <?= $item->GetItemID()?><br>
<strong>Item Desc:</strong> <?= $item->GetDescription()?><br>