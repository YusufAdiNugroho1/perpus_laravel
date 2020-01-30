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