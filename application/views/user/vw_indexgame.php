<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Game Perubahan Wujud</title>
    <style>
    /* CSS untuk desain kartu */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    #gameArea {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        position: relative;
        width: 200vh;
    }

    #skor-waktu {
        position: absolute;
        top: 40px;
        left: 40px;
    }

    #skor-box,
    #waktu-box {
        background-color: #c0c0c0;
        /* Warna abu-abu silver */
        padding: 10px 15px;
        /* Padding untuk memberikan ruang di dalam kotak */
        border-radius: 6px;
        /* Membuat sudut kotak sedikit melengkung */
        margin-bottom: 10px;
        /* Memberikan sedikit jarak antara kedua kotak */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Shadow untuk efek mendalam */
    }

    #skor-box {
        font-size: 24px;
        /* Ukuran font skor */
    }

    #waktu-box {
        font-size: 24px;
        /* Ukuran font waktu */
    }

    .kartu {
        width: 215px;
        height: 290px;
        margin: 10px;
        border: 2px solid #ccc;
        border-radius: 8px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .kartu:hover {
        transform: scale(1.05);
    }

    #kartuInduk {
        background-color: #e0e0e0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        border: 2px dashed #aaa;
        margin-top: 20px;
    }

    #deckFisika,
    #deckKimia {
        display: flex;
        justify-content: center;
        width: 100%;
        flex-wrap: wrap;
        /* This allows the cards to wrap to the next line */
    }

    .row-container {
        display: flex;
        justify-content: center;
        width: 100%;
        max-width: 900px;
        margin-bottom: 20px;
    }

    /* Adjust the width as needed based on the number of cards you want per row */
    .card-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 5px;
    }

    #deckFisika .card-container {
        margin-right: 10px;
        /* Add a small margin to separate the fisika cards */
    }

    #deckKimia .card-container {
        margin-left: 10px;
        /* Add a small margin to separate the kimia cards */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    td {
        padding: 10px;
        text-align: center;
        vertical-align: middle;
    }
    </style>
</head>

<body>

    <div id="gameArea">
        <div id="skor-waktu">
            <div id="skor-box">
                <strong>Skor:</strong> <span id="skor">0</span>
            </div>
            <div id="waktu-box">
                <strong>Waktu:</strong> <span id="waktu">120</span> detik
            </div>
        </div>
        <table>
            <tr>
                <div id="kartuIndukContainer">
                </div>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <h2>Deck Fisika</h2>
                    <div id="deckFisika">
                        <?php foreach ($soal as $row): ?>
                        <div class="kartu fisika" data-id="<?= $row['id'] ?>"
                            style="background-image: url('<?= base_url('assets/img/kartu/induk/').$row['fisika'];?>');">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </td>
                <td style="text-align: center;">
                    <h2>Deck Kimia</h2>
                    <div id="deckKimia">
                        <?php foreach ($soal as $row): ?>
                        <div class="kartu kimia" data-id="<?= $row['id'] ?>"
                            style="background-image: url('<?= base_url('assets/img/kartu/induk/').$row['kimia'];?>');">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <script>
    // Logika permainan
    // ...

    // Fungsi drag and drop
    // ...

    // Timer
    // ...

    //fetching kartuInduk
    document.addEventListener("DOMContentLoaded", function() {
        // Fetch Kartu Induk data when the page loads
        fetchKartuInduk();
    });

    function fetchKartuInduk() {
        fetch('your_backend_url_here/getKartuIndukData')
            .then(response => response.json())
            .then(data => {
                // Once data is fetched, update the UI to display the Kartu Induk
                displayKartuInduk(data);
            })
            .catch(error => {
                console.error('Error fetching Kartu Induk:', error);
            });
    }

    function displayKartuInduk(kartuIndukData) {
        // For simplicity, let's assume the data contains an image path and some description
        const kartuIndukHtml = `
        <div class="kartuIndukCard">
            <img src="${kartuIndukData.imagePath}" alt="Kartu Induk">
            <p>${kartuIndukData.description}</p>
        </div>
    `;
        // Update the container with the Kartu Induk HTML
        document.getElementById('kartuIndukContainer').innerHTML = kartuIndukHtml;
    }
    </script>

</body>

</html>