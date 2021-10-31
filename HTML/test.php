<?php
session_start();

echo $_SESSION["id"] . ", " . $_SESSION["type"];
?>