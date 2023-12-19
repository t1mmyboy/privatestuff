<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #339966;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #339910;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            color: #fff;
        }

        .project-list {
            list-style-type: none;
            padding: 0;
        }

        .project-item {
            margin-bottom: 10px;
        }

        .project-link {
            display: block;
            padding: 10px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Added transition for scaling */
        }

        .project-link:hover {
            background-color: #45a049;
            box-shadow: 0px 0px 5px 1px #4CAF50 inset;
            transform: scale(1.05); /* Scale up on hover */
        }

        #cgi, #err, #php, #ind {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Projects</h1>
        <ul class="project-list">
            <?php
                // Get the list of folders and files in the www directory
                $wwwDirectory = '/Applications/AMPPS/www';
                $items = array_diff(scandir($wwwDirectory), array('..', '.'));

                // Display only directories and HTML/PHP files, showing only the first 3 letters of the names
                foreach ($items as $item) {
                    $shortName = substr($item, 0, 3); // Get the first 3 letters of the name

                    // Check if it's a directory or a .html or .php file
                    if (is_dir($wwwDirectory . '/' . $item) || pathinfo($item, PATHINFO_EXTENSION) === 'html' || pathinfo($item, PATHINFO_EXTENSION) === 'php') {
                        echo '
                        <li class="project-item" id="' . $shortName . '">
                            <a class="project-link" href="' . $item . '">' . ucfirst($item) . '</a>
                        </li>';
                    }
                }
            ?>
            <li class="project-item"><a class="project-link" href="/phpmyadmin">PhpMyAdmin</a></li>
        </ul>
    </div>
</body>
</html>
