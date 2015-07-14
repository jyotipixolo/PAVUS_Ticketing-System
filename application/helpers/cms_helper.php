<?php

function btn_edit($uri){
    return anchor($uri, '<i class="icon-edit">Edit</i>');
}
function btn_delete($uri){
    return anchor($uri, '<i class="icon-remove">Delete</i>', array('onclick' => 'return confirm("Are you sure you want to delete");'));
}