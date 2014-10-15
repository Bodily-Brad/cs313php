<?php
class Item
{
    // Local Variables
    private $itemId;
    private $description;
    
    // Constructor
    function Item($itemId, $description)
    {
        $this->itemId = $itemId;
        $this->description = $description;
    }
    
    // Public Methods
    function GetItemID() { return $this->itemId; }
    function GetDescription() { return $this->description; }
    function SetDescription($description) { $this->description = $description; }
}