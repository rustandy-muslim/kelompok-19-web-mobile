<?php
// Data anggota kelompok with Instagram URLs and profile picture placeholders
$anggota = [
    [
        'nama' => 'Rustandy Muslim',
        'posisi' => 'Leader/Developer',
        'bio' => 'Rustandy adalah pemimpin kelompok dan Developer yang berpengalaman di bidang pengembangan perangkat lunak dan manajemen proyek.',
        'instagram' => 'https://www.instagram.com/rustandimuslim/?next=%2Frustandy_muslim%2F',
        
    ],
    [
        'nama' => 'Muhammad Shaleh Zakilsyam',
        'posisi' => 'Anggota',
        'bio' => 'Shaleh adalah seorang developer handal yang memiliki keahlian dalam pengembangan website dan aplikasi mobile.',
        'instagram' => 'https://www.instagram.com/shaleh_syam/',
        
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333;
        }
        header {
            background-color: #08107C;
            color: white;
            text-align: center;
            padding: 30px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            text-align: center;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 5px;
        }
        p {
            font-size: 16px;
            color: #6c757d;
        }
        .anggota-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1000px;
        }
        .anggota-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            width: 280px;
            padding: 20px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
            cursor: pointer;
            border: 1px solid #e0e0e0;
        }
        .anggota-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .anggota-card h3 {
            font-size: 20px;
            color: #08107C;
            margin-bottom: 8px;
            text-decoration: none;
        }
        .anggota-card p {
            color: #6c757d;
            font-size: 15px;
            margin: 8px 0;
        }
        .anggota-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        footer {
            background-color: #08107C;
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Tentang Kelompok Kami</h1>
        <p>Kenali lebih dekat dengan anggota tim kami yang berdedikasi.</p>
    </header>

    <div class="container">
        <div class="anggota-container">
            <?php foreach ($anggota as $member): ?>
                <div class="anggota-card">
        
                    <!-- Link nama anggota ke Instagram -->
                    <h3>
                        <a href="<?php echo $member['instagram']; ?>" target="_blank" style="color: #08107C; text-decoration: none;">
                            <?php echo $member['nama']; ?>
                        </a>
                    </h3>
                    <p><strong><?php echo $member['posisi']; ?></strong></p>
                    <p><?php echo $member['bio']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Tim Pengembangan Website | Semua Hak Dilindungi</p>
    </footer>

</body>
</html>
