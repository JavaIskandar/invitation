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
        .alert {
            background-color: #f7f0c2;
            color: #a99200;
            padding: 10px;
            border-left: 3px solid #a99200;
        }
    </style>
</head>

<body>
<header>
    <h1>Sistem Informasi Surat Bebas Laboratorium</h1>
    <h2>Fakultas Teknik</h2>
</header>

<article>
    <p>
        <strong>{{ $name }}</strong> baru saja melakukan pengajuan surat</p>
    <p class="alert">
        Mohon untuk segera melakukan konfirmasi atau memberi catatan kepada mahasiswa bersangkutan.
    </p>
</article>
</body>

</html>