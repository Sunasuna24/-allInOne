<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | Training</title>
</head>
<body>
    <header>
        <div>All In One app</div>
        <div><p>Hello, <?php echo $username; ?>.</p></div>
        <div>
            <ul>
                <li><a href="./top">Top</a></li>
                <li><a href="./record">Record</a></li>
            </ul>
            <a href="../welcome/index">Go to super top.</a>
        </div>
    </header>
    <main>
        <div><p><?php echo $title; ?></p></div>
        <div>
            <?php echo $content; ?>
        </div>
    </main>
    <footer>
        <div>
            <p>HOPE YOU GET MUSCULAR!!</p>
            <p>&copy Tomoyasu Sunagawa</p>
        </div>
    </footer>
</body>
</html>