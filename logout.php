<?php
session_start();
session_destroy();
exit(header("Location: index.php?msg=You are now logged out!"));