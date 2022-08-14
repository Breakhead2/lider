<?php

function getCatalog(){
    return getAssocResult("SELECT * FROM list");
}