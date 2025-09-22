<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Book Catalog</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, rgb(245, 43, 27) 0%, rgb(255, 43, 105) 100%);
            color: #333;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            padding: 20px 0;
            margin-bottom: 30px;
        }

        h1 {
            color: white;
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .book-card {
            background: rgb(0, 0, 0);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative; /* for buttons positioning */
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .book-image {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgb(0, 0, 0);
            padding: 15px;
        }

        .book-image img {
            max-height: 170px;
            max-width: 100%;
            object-fit: contain;
        }

        .book-details {
            padding: 20px;
        }

        .book-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: rgb(255, 255, 255);
        }

        .book-author {
            color: rgb(255, 255, 255);
            margin-bottom: 15px;
            font-style: italic;
        }

        .book-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 15px;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
        }

        .meta-label {
            font-size: 0.8rem;
            color: #7f8c8d;
        }

        .meta-value {
            font-weight: 600;
            color: rgb(255, 255, 255);
        }

        .book-price {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 800;
            color: rgb(255, 215, 0);
            margin: 15px 0;
        }

        /* Buttons container */
        .book-buttons {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 10;
        }

        /* Buttons style */
        .book-buttons a {
        background: rgba(255, 255, 255, 0.9);
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        color: #333;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.9rem;
        text-decoration: none;
        transition: background-color 0.2s ease;
        }

        .book-buttons a:hover {
        background: rgb(255, 185, 0);
        }

        /* Show buttons when parent has class */
        .book-card.show-buttons .book-buttons {
            opacity: 1;
            pointer-events: auto;
        }

        .footer {
            text-align: center;
            color: white;
            padding: 20px;
            margin-top: 30px;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .book-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }

            h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .book-grid {
                grid-template-columns: 1fr;
            }

            body {
                padding: 10px;
            }
        }
        .add {
            max-width: fit-content;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            color: #333;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }
        .add:hover {
            background: rgb(255, 185, 0);
        }
    </style>
</head>
<body>
    <div class="add">
        <a href="/add" style="color: inherit;text-decoration: none;"><i class="fa-solid fa-plus"></i></i> ADD</a>
    </div>
    
    <div class="container">
        <header>
            <h1><i class="fas fa-book"></i> Book Catalog</h1>
            <p class="subtitle">Browse our collection of literary treasures</p>
        </header>
        <div class="book-grid">
            <?php foreach ($books as $book): ?>
                <div class="book-card">
                    <div class="book-image">
                        <img
                            src="data:image/png;base64,<?php echo base64_encode($book['img']); ?>"
                            alt="<?php echo htmlspecialchars($book['name']); ?>"
                        />
                    </div>
                    <div class="book-details">
                        <h2 class="book-title"><?php echo htmlspecialchars($book['name']); ?></h2>
                        <p class="book-author">by <?php echo htmlspecialchars($book['writer']); ?></p>

                        <div class="book-meta">
                            <div class="meta-item">
                                <span class="meta-label">ISBN</span>
                                <span class="meta-value"><?php echo htmlspecialchars($book['ISBN']); ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Language</span>
                                <span class="meta-value"><?php echo htmlspecialchars($book['lang']); ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Publisher</span>
                                <span class="meta-value"><?php echo htmlspecialchars($book['publisher']); ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Genre</span>
                                <span class="meta-value"><?php echo htmlspecialchars($book['genre']); ?></span>
                            </div>
                        </div>

                        <div class="book-price"><?php echo number_format($book['price'], 2); ?>¥</div>
                    </div>

                    <!-- Buttons for each book -->
                    <div class="book-buttons">
                        <a href="/test" class="btn btn-read"><i class="fa-solid fa-file-pen"></i> EDIT</a>
                        <a href="#" class="btn btn-buy"><i class="fa-solid fa-trash"></i> DELETE</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> Book Catalog. All rights reserved.</p>
        </div>
    </div>
    <script>
        const cards = document.querySelectorAll('.book-card');

        cards.forEach(card => {
            const buttons = card.querySelector('.book-buttons');

            // Show buttons on hover over card or buttons
            card.addEventListener('mouseenter', () => {
                // Hide buttons on all cards first
                cards.forEach(c => c.classList.remove('show-buttons'));
                card.classList.add('show-buttons');
            });

            // Keep buttons visible while hovering buttons
            buttons.addEventListener('mouseenter', () => {
                card.classList.add('show-buttons');
            });

            // Hide buttons when mouse leaves card or buttons area
            card.addEventListener('mouseleave', (e) => {
                const related = e.relatedTarget;
                if (!buttons.contains(related)) {
                    card.classList.remove('show-buttons');
                }
            });

            buttons.addEventListener('mouseleave', (e) => {
                const related = e.relatedTarget;
                if (!card.contains(related)) {
                    card.classList.remove('show-buttons');
                }
            });
        });
    </script>
</body>
</html>
