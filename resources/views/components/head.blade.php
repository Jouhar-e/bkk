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

        /* ======= Dasar Umum ======= */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }

        /* ======== Perbaikan Hover Gap Dropdown ======== */
        .group {
            position: relative;
        }

        /* Tambah zona hover tak terlihat di bawah tombol */
        .group::after {
            content: "";
            position: absolute;
            bottom: -12px;
            /* buffer area di bawah tombol */
            left: 0;
            width: 100%;
            height: 12px;
            background: transparent;
        }

        /* Dropdown agar tetap muncul saat kursor di area buffer */
        .group:hover .dropdown-menu,
        .dropdown-menu:hover {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
            pointer-events: auto !important;
        }

        /* Hilang dengan transisi lembut */
        .dropdown-menu {
            transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s ease;
        }

        /* ======= Konten Artikel (Opsional) ======= */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-content img {
            border-radius: 0.5rem;
            margin: 1.5rem 0;
        }

        .article-content ul,
        .article-content ol {
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

        /* ======= Responsif Tambahan ======= */
        @media (max-width: 1024px) {
            nav {
                position: sticky;
                top: 0;
            }

            #mobile-menu {
                position: relative;
                z-index: 40;
                transition: all 0.3s ease-in-out;
            }

            .mobile-dropdown-content {
                overflow: hidden;
                transition: max-height 0.3s ease;
            }

            .mobile-dropdown-content:not(.hidden) {
                max-height: 500px;
            }
        }
    </style>

</head>
