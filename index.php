<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 03 CSV</title>
        <meta name="viewport" content="width-divice-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </head>
    <body>


        <div class="container">
            <h3>CSV-Daten importieren und exportieren</h3>
            <?php
            // 
            $handle = false; // Zeiger
            // articles_mit_quotes.csv
            // articles.csv
            $filename = 'articles_mit_quotes.csv'; 
            $folder = './import/';
            if (file_exists($folder . $filename)) {
                // Dateizeilen-Zeiger
                $handle = fopen($folder . $filename, "r");
                // Eine Zeile auslesen
                //$row1 = fgetcsv($handle, 0, ';');
                //$row2 = fgetcsv($handle, 0, ';');
                // alle Zeilen auslesen
                // erste Zeile --> Überschriften
                $columnNames = fgetcsv($handle, 0, ';');
                // restliche Zeilen in ein Array packen --> 2dim array
                $rows = [];
                while ($row = fgetcsv($handle, 0, ';')) {
                    //echo $row[0] . '<br>';
                    $rows[] = $row;
                }
            }
            ?>
            <table class="table table-striped table-hover" ><?php ?>
                <thead>
                    <tr>
                        <!-- echo %columnNames[x] -->
                        <th><?php echo $columnNames[3]; ?></th>
                        <th><?php echo $columnNames[5]; ?></th>
                        <th><?php echo $columnNames[6]; ?></th>
                        <th><?php echo $columnNames[11]; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Schleife Anfang $rows -->
                    <!-- vgl. mit for-Schleife -->
                    <?php foreach ($rows AS $article) : ?>
                        <tr> <!-- echo $rows[x][y] -> echo $row[y]-->
                            <td><?php echo $article[3]; ?></td>
                            <td><?php echo $article[5]; ?></td>
                             <td><?php echo $article[6]; ?></td>
                            <td><?php echo $article[11]; ?></td>
                        </tr>
                        <!-- Schleife Ende -->
                    <?php endforeach; ?>
                </tbody> 
            </table>
            
            <!-- Gesamte Tabelle ausgeben  -->
            <h4>Table full with foreach and for </h4>
            <table class="table table-striped table-hover" ><?php ?>
                <thead>
                    <tr>
                        <?php for ($i = 0; $i < count($columnNames); $i++ ) : ?>
                            <th><?php echo $columnNames[$i]; ?></th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows AS $article) : ?>
                    <tr> 
                        <?php for ($i = 0; $i < count($article); $i++ ) : ?>
                            <td><?php echo $article[$i]; ?></td>
                        <?php endfor; ?>                   
                    </tr>
                     <?php endforeach; ?> 
                   
                </tbody> 
            </table> 
            
        </div>
        <hr>
        <pre>
            <?php
            //print_r($rows);
            //var_dump($row2);
            ?>
        </pre>

    </body>
</html>
