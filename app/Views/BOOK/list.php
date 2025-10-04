<?php
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Book Catalog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <div class="button-bar">
        <form class="add" method="post" action="/book/add">
            <button type="submit" class="add-btn">
                <i class="fa-solid fa-plus"></i> ADD
            </button>
        </form>
        <button id="backToTop">↑</button>
    </div>
    <div class="container">
        <header>
            <h1><i class="fas fa-book"></i> Book Catalog</h1>
            <p class="subtitle">Browse our collection of literary treasures</p>
        </header>
        <div class="book-grid">
HTML;

foreach ($books as $book) {
    // Encode the image data outside the HEREDOC
    $base64Image = base64_encode($book["img"]);
    $altText = htmlspecialchars($book["name"]);
    
    echo <<<HTML
            <div class="book-card">
                <div class="book-image">
                    <img src="data:image/png;base64,{$base64Image}" alt="{$altText}" />
                </div>
                <div class="book-details">
                    <h2 class="book-title">{$book['name']}</h2>
                    <p class="book-author">by {$book['writer']}</p>

                    <div class="book-meta">
                        <div class="meta-item">
                            <span class="meta-label">ISBN</span>
                            <span class="meta-value">{$book['ISBN']}</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Language</span>
                            <span class="meta-value">{$book['lang']}</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Publisher</span>
                            <span class="meta-value">{$book['publisher']}</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Genre</span>
                            <span class="meta-value">{$book['genre']}</span>
                        </div>
                    </div>

                    <div class="book-price">{$book['price']}¥</div>
                </div>

                <div class="book-buttons">
                    <form method="post" action="/book/edit" style="display:inline;">
                        <input type="hidden" name="id" value="{$book['ISBN']}">
                        <button type="submit" class="btn btn-read">
                            <i class="fa-solid fa-file-pen"></i> EDIT
                        </button>
                    </form>

                    <form method="post" action="/book/delete" style="display:inline;">
                        <input type="hidden" name="id" value="{$book['ISBN']}">
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-trash"></i> DELETE
                        </button>
                    </form>
                </div>
            </div>
HTML;
}

echo <<<HTML
        </div>
        <div class="footer">
            <p>&copy; {date("Y")} Book Catalog. All rights reserved.</p>
        </div>
    </div>
    <script src="/js/script.js"></script>
    <script src="/js/ScrollToTop.js"></script>
</body>
</html>
HTML;
?>