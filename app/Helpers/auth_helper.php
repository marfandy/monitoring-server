<?php

function login()
{
    session();
    if (session('log') != TRUE) {
        // redirect()->to('/');
        header("Location: /");
        // echo base_url();
    }
}
