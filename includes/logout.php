<?php
session_start();
header("Location:../index.php");
session_destroy();
session_unset();
