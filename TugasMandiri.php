<?php

class Buku {
    //atribut
    private $judul, $penulis, $stok;

    public function __construct($pJudul, $pPenulis, $pStok)
    {
        $this->judul   = $pJudul;
        $this->penulis = $pPenulis;
        $this->stok    = $pStok;
    }

    //getter
    public function getJudul()
    {
        return $this->judul;
    }

    public function getPenulis()
    {
        return $this->penulis;
    }

    public function getStok()
    {
        return $this->stok;
    }

    //setter
    public function setStok($pStok)
    {
        $this->stok = $pStok;
    }

    public function tampilkanInfo()
    {
        echo "Judul: " . $this->judul . "<br>";
        echo "Penulis: " . $this->penulis . "<br>";
        echo "Stok: " . $this->stok . "<br>";
    }
}

class Anggota {
    //atribut
    private $idAnggota, $nama;

    public function __construct($pId, $pNama)
    {
        $this->idAnggota = $pId;
        $this->nama      = $pNama;
    }

    //getter
    public function getIdAnggota()
    {
        return $this->idAnggota;
    }

    public function getNama()
    {
        return $this->nama;
    }

    //setter
    public function setNama($pNama)
    {
        $this->nama = $pNama;
    }

    public function tampilkanInfo()
    {
        echo "ID Anggota: " . $this->idAnggota . "<br>";
        echo "Nama: " . $this->nama . "<br>";
    }
}

class Peminjaman {
    //atribut
    private $anggota, $buku, $tanggalPinjam;

    public function __construct($pAnggota, $pBuku, $pTanggal)
    {
        $this->anggota       = $pAnggota;
        $this->buku          = $pBuku;
        $this->tanggalPinjam = $pTanggal;
    }

    //method dengan return value: true jika berhasil, false jika stok habis
    public function prosesPinjam()
    {
        if ($this->buku->getStok() > 0) {
            $this->buku->setStok($this->buku->getStok() - 1);
            return true;
        }
        return false;
    }

    public function tampilkanInfo()
    {
        echo "Anggota: " . $this->anggota->getNama() . "<br>";
        echo "Buku: " . $this->buku->getJudul() . "<br>";
        echo "Tanggal Pinjam: " . $this->tanggalPinjam . "<br>";
        echo "Sisa Stok: " . $this->buku->getStok() . "<br>";
    }
}

//Membuat objek dari masing-masing class
$buku       = new Buku("Dasar Pemrograman PHP", "Siti Nurlela", 2);
$anggota    = new Anggota("A2500170", "Niken Sari");
$peminjaman = new Peminjaman($anggota, $buku, "2026-10-28");

//Menampilkan informasi
echo "<b>Buku</b><br>";
$buku->tampilkanInfo();

echo "<br><b>Anggota</b><br>";
$anggota->tampilkanInfo();

echo "<br><b>Peminjaman</b><br>";
if ($peminjaman->prosesPinjam()) {
    $peminjaman->tampilkanInfo();
} else {
    echo "Stok buku habis.<br>";
}
?>