<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
    html, body {
        padding: 0;
        margin: 0;
    }
    header {
        padding: 20px;
        background-color: cornflowerblue;
        color: #fff;
    }
    h1 {
        margin: 0 0 10px;
        font-size: 20px;
    }
    h2 {
        font-size: 15px;
        margin: 0;
    }
    article {
        padding: 20px;
    }
    p {
        padding: 5px;
        margin: 0;
    }
    .info {
        background-color: #c2d5f7;
        color: #19499e;
        padding: 10px;
        border-left: 3px solid #19499e;
    }
    .success {
        background-color: #beffcd;
        color: #0b7523;
        padding: 10px;
        border-left: 3px solid #28a745;
    }
    </style>
</head>

<body>
    <header>
        <h1>Sistem Informasi Surat Bebas Laboratorium</h1>
        <h2>Fakultas Teknik</h2>
    </header>

    <article>
        <p>Selamat,
            <strong>{{ $pengirim->nama }}</strong> baru saja menyetujui pengajuan surat anda</p>

        @if($pengirim->isKalab())
        <p class="success">
            Silahkan masuk ke web surat bebas lab untuk bisa mengunduh surat bebas laboratorium yang sudah disetujui.
        </p>
        @else
        <p class="info">
            Untuk saat ini, anda belum bisa melakukan pengunduhan karena <b>kalab</b> belum melakukan penyetujuan terhadap pengajuan anda.
        </p>
        @endif
    </article>
</body>

</html>