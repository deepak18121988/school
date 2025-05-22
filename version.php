<?php
$project_name = 'LDG Ventures';
function getStorageFile($file_name)
{
    $file = 'storage/app/.' . $file_name;
    if (file_exists($file)) {
        return file_get_contents($file);
    }
    return false;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="author" content="GRpro Inc.">
    <meta name="descripton" content="GR Security AI-Powered School Management System">
    <title>Version | LDG Ventures</title>
</head>

<body>
    <h1 style="text-align: center;">Your current version of <?php echo $project_name . ' is ' . getStorageFile('version') ?></h1>
</body>

</html>



<?php

if (isset($_GET['phpinfo'])) {
    phpinfo();
}
