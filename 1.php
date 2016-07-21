<?php
$bytes = openssl_random_pseudo_bytes(3, $cstrong);
echo $hex   = bin2hex($bytes);
