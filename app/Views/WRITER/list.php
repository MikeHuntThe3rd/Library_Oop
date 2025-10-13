<?php
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Book Catalog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/search_bar.css"/>
    <link rel="stylesheet" href="css/writer.css"/>
</head>
<body>
    <div class="button-bar">
        <div>
            <a href="/writer/add" class="add"><i class="fa-solid fa-plus"></i> ADD</a><br><br>
            <a href="/book" class="add"> BOOKS</a>
        </div>
        <button id="backToTop">↑</button>
    </div>
    <div class="container">
        <header>
            <h1><i class="fas fa-book"></i> WRITERS</h1>
        </header>
        <form method="post" action="/search">
            <input type="text" name="input" class="search" placeholder="Search">
        </form>
HTML;

foreach ($writers as $writer) {
    echo <<<HTML
        <div class="writer-table-wrapper">
            <table>
                <tr>
                    <th>{$writer['writer']}</th>
                    <th>{$writer['bio']}</th>
                    <th>
                        <div class="writer-actions right">
    
                            <form method="post" action="/writer/edit"> 
                                <input type="hidden" name="id" value="{$writer['id']}">
                                <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form method="post" action="/writer/delete"> 
                                    <input type="hidden" name="id" value="{$writer['id']}">
                                    <button type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </th>
                </tr>
            </table>
        </div>  
           
           
HTML;
}
echo <<<HTML
        <div class="footer">
            <p>&copy; smegma zsaláb és alkoholista tánánjon tulajdona</p>
        </div>
    </div>
</body>
</html>
HTML;
?>