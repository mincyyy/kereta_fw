<?php 

session_start();

function isLoggedIn()
{
    if (isset($_SESSION['status'])){
        if (($_SESSION['status']) == 'admin') {
            return 'admin';
        } else if (isset($_SESSION['status'])){
            if (($_SESSION['status']) == 'user'){
            return 'user';
            }
        } else {
            return false;
        }
    }else {
        return false;
    }
}

