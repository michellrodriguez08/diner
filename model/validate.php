<?php

    //Return true it the food has at least
    //two chacarters

    function validFood($food)
    {
        if (strlen($food) <= 2) {
            return false;
        }
        else {
            return true;
        }

        return strlen($food) > 2;
    }