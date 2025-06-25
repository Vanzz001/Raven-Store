<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="id" class="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Raven Store - Beranda</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      background: #1a1727;
      color: #e0d7f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    header {
      background: #2e294e;
      box-shadow: 0 0 15px rgba(150, 130, 230, 0.6);
    }

    header .logo span {
      color: #bdb2ff;
      font-weight: 700;
    }

    nav a {
      color: #c6b8ff;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    nav a:hover {
      color: #ffe066;
    }

    a.bg-yellow-400 {
      background-color: #ffe066;
      color: #3e2f5b;
      box-shadow: 0 4px 10px rgba(255, 224, 102, 0.6);
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    a.bg-yellow-400:hover {
      background-color: #ffd43b;
      color: #2d2144;
    }

    a.bg-blue-500 {
      background-color: #7c3aed;
      color: #e6dbf8;
      box-shadow: 0 4px 10px rgba(124, 58, 237, 0.7);
      transition: background-color 0.3s ease;
    }
    a.bg-blue-500:hover {
      background-color: #5a23be;
    }

    a.bg-red-500 {
      background-color: #f87171;
      color: #3b1d1d;
      box-shadow: 0 4px 10px rgba(248, 113, 113, 0.6);
      transition: background-color 0.3s ease;
    }
    a.bg-red-500:hover {
      background-color: #db4a4a;
    }

    .hero {
      background-image: linear-gradient(rgba(26, 23, 39, 0.7), rgba(26, 23, 39, 0.7)),
        url('assets/images/BG.jpg');
      background-size: cover;
      background-position: center;
      box-shadow: 0 0 30px rgba(124, 58, 237, 0.7);
      border-radius: 20px;
    }

    .hero h1 {
      color: #d3c0f9;
      text-shadow: 1px 1px 3px #4b367c;
    }

    .hero p {
      color: #bfb3ffcc;
      text-shadow: 1px 1px 2px #3f2f6e;
    }

    .social-container {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 50;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 10px;
    }

    .social-toggle {
      width: 56px;
      height: 56px;
      background-color: #7c3aed;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #e6dbf8;
      font-size: 24px;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(124, 58, 237, 0.7);
      animation: float 4s ease-in-out infinite;
      transition: background-color 0.3s ease;
    }
    .social-toggle:hover {
      background-color: #5a23be;
    }

    .social-icons {
      display: none;
      flex-direction: column;
      align-items: flex-end;
      gap: 10px;
    }
    .social-icons.show {
      display: flex;
    }

    .social-icons a {
      width: 48px;
      height: 48px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      color: #e6dbf8;
      font-size: 20px;
      box-shadow: 0 2px 8px rgba(124, 58, 237, 0.5);
      transition: transform 0.3s ease, opacity 0.3s ease;
      opacity: 0;
      transform: translateY(20px);
    }
    .social-icons.show a {
      opacity: 1;
      transform: translateY(0);
    }

    .social-icons a.bg-green-500 {
      background-color: #22c55e;
      box-shadow: 0 2px 8px #22c55eaa;
    }
    .social-icons a.bg-blue-500 {
      background-color: #3b82f6;
      box-shadow: 0 2px 8px #3b82f6aa;
    }
    .social-icons a.bg-pink-500 {
      background-color: #ec4899;
      box-shadow: 0 2px 8px #ec4899aa;
    }
    .social-icons a.bg-indigo-600 {
      background-color: #6366f1;
      box-shadow: 0 2px 8px #6366f1aa;
    }
    .social-icons a.bg-yellow-400 {
      background-color: #ffe066;
      color: #3e2f5b;
      box-shadow: 0 2px 8px #ffe066aa;
    }

    footer {
      background-color: #2e294e;
      color: #bdb2ffaa;
      box-shadow: inset 0 1px 4px #4b367c66;
      padding: 1rem 0;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-6px); }
    }
  </style>

  <script>
    function toggleSocialMenu() {
      const icons = document.querySelector('.social-icons');
      icons.classList.toggle('show');
    }
  </script>
</head>
<body>

  <!-- Header -->
  <header class="flex flex-wrap justify-between items-center p-4 shadow-lg gap-4">
    <div class="logo flex items-center gap-3">
      <img src="assets/images/logo.png" alt="Raven Store Logo" class="h-10" />
      <span class="text-xl hidden sm:block">Raven Store</span>
    </div>

    <nav class="hidden md:flex gap-6">
      <a href="topup.php" title="Game Populer"><i class="fas fa-fire"></i> Game Populer</a>
      <a href="diskon.php" title="Diskon"><i class="fas fa-tags"></i> Diskon</a>
      <a href="#baru" title="Game Baru"><i class="fas fa-gamepad"></i> Game Baru</a>
      <a href="#promo" title="Promo Spesial"><i class="fas fa-gift"></i> Promo Spesial</a>
    </nav>

    <div class="flex items-center gap-4 flex-wrap">
      <!-- Form Pencarian -->
      <form action="search.php" method="GET" class="hidden sm:flex items-center">
        <input
          type="text"
          name="q"
          placeholder="Cari game..."
          class="px-3 py-1 rounded-lg bg-[#2e294e] text-white placeholder-purple-200 border border-purple-500 focus:outline-none focus:ring-2 focus:ring-yellow-400"
        />
        <button type="submit" class="ml-2 text-yellow-300 hover:text-yellow-500" title="Cari">
          <i class="fas fa-search"></i>
        </button>
      </form>

      <!-- Tombol Login/Daftar atau Logout -->
      <?php if (!$is_logged_in): ?>
        <a href="register.php" class="bg-yellow-400 px-3 py-2 rounded-lg hover:bg-yellow-500" title="Daftar">
          <i class="fas fa-user-plus"></i> Daftar
        </a>
        <a href="login.php" class="bg-blue-500 px-3 py-2 rounded-lg hover:bg-blue-600" title="Masuk">
          <i class="fas fa-sign-in-alt"></i> Masuk
        </a>
      <?php else: ?>
        <a href="logout.php" onclick="return confirm('Yakin ingin logout?')" class="bg-red-500 px-3 py-2 rounded-lg hover:bg-red-600" title="Logout">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      <?php endif; ?>
    </div>
  </header>

  <!-- Hero -->
  <section class="hero flex flex-col justify-center items-center h-72 rounded-xl text-center px-4 my-8">
    <h1 class="text-4xl font-bold mb-2"><i class="fas fa-store text-yellow-400"></i> Welcome to Raven Store</h1>
    <p class="text-white/90 mb-6">Tempat terbaik beli <span class="text-yellow-300 font-semibold">Top Up Game</span>!</p>
    <a href="topup.php" class="bg-yellow-400 px-5 py-3 rounded-xl hover:bg-yellow-500 shadow-md inline-flex items-center gap-2">
      <i class="fas fa-cart-plus"></i> Top Up Sekarang
    </a>
  </section>

  <!-- Bubble Sosial -->
  <div class="social-container">
    <div class="social-icons">
      <a href="https://wa.me/6281234567890" target="_blank" class="bg-green-500" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
      <a href="https://t.me/username" target="_blank" class="bg-blue-500" title="Telegram"><i class="fab fa-telegram"></i></a>
      <a href="https://instagram.com/akunmu" target="_blank" class="bg-pink-500" title="Instagram"><i class="fab fa-instagram"></i></a>
      <a href="https://discord.gg/linkserver" target="_blank" class="bg-indigo-600" title="Discord"><i class="fab fa-discord"></i></a>
      <a href="mailto:cs@ravenstore.com" class="bg-yellow-400 text-black" title="Customer Service"><i class="fas fa-headset"></i></a>
    </div>
    <div class="social-toggle" onclick="toggleSocialMenu()" title="Kontak Kami">
      <i class="fas fa-comment-dots"></i>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center mt-10">
    <p class="text-sm">&copy; 2025 Raven Store. Semua Hak Dilindungi.</p>
  </footer>

</body>
</html>
