<?php

echo session_start();
echo session_destroy();

header("Location: portale.php");
