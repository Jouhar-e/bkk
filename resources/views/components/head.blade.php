<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKK SMK</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -6px;
            left: 0;
            background-color: #60a5fa;
            transition: width 0.3s ease;
            border-radius: 2px;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .nav-link.active::after {
            width: 100%;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        /* Additional styling untuk konten artikel */
        .article-content img {
            border-radius: 0.5rem;
            margin: 1.5rem 0;
        }

        .article-content ul, .article-content ol {
            margin: 1rem 0;
            padding-left: 1.5rem;
        }

        .article-content li {
            margin: 0.5rem 0;
        }

        .article-content blockquote {
            border-left: 4px solid #3b82f6;
            padding-left: 1rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: #6b7280;
        }

        .article-content h2 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1f2937;
            margin: 2rem 0 1rem 0;
        }

        .article-content h3 {
            font-size: 1.25rem;
            font-weight: bold;
            color: #1f2937;
            margin: 1.5rem 0 1rem 0;
        }
    </style>
</head>