<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Petugas</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>My Perpustakaan</h1>
        <div class="sidebar">
            <ul>
                <li><a href="kategori">Data Kategori</a></li>
                <li><a href="buku">Data Buku</a></li>
                <li><a href="anggota">Data Anggota</a></li>
                <li><a href="rak">Data Rak</a></li>
                <li><a href="pinjam">Peminjaman</a></li>
                <li><a href="list-pengembalian">Pengembalian</a></li>
                <li><a href="rak_buku">Letak Buku</a></li>
                <li class="nav-item">
                    <div class="menu" aria-labelledby="navbar">
                        <a class="item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <div class="content">
            <h1>Selamat datang, {{ Auth::user()->name }}</h1>
        </div>
    </div>
</body>
</html>