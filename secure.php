<?php foreach ($_GET  as $key => $val)
{
    $GetSecure[$key] = htmlspecialchars($val);
}


foreach ($_POST as $key => $val)
{
    $PostSecure[$key] = htmlspecialchars($val);
}


?>