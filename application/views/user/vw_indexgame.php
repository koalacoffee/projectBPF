<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Game Perubahan Wujud</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 95vh;
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
        height: 90vh;
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
        padding: 10px 15px;
        border-radius: 6px;
        margin-bottom: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #skor-box {
        font-size: 24px;
    }

    #waktu-box {
        font-size: 24px;
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
        transition: opacity 0.3s ease-in-out;
    }

    .kartu.removed {
        opacity: 0;
    }

    #kartuInduk {
        width: 215px;
        height: 290px;
        margin: 10px;
        border: 2px solid #ccc;
        border-radius: 8px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        cursor: pointer;
    }


    #deckFisika,
    #deckKimia {
        display: flex;
        justify-content: center;
        width: 100%;
        flex-wrap: wrap;
    }

    .row-container {
        display: flex;
        justify-content: center;
        width: 100%;
        max-width: 900px;
        margin-bottom: 20px;
    }

    .card-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 5px;
    }

    #deckFisika .card-container {
        margin-right: 10px;
    }

    #deckKimia .card-container {
        margin-left: 10px;
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

    .kartu-induk-bg {
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
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
        <div id="kartuInduk">
        </div>
        <table>
            <tr style="text-align: center; width: 900px;">
                <td>
                    <h2>Deck Fisika</h2>
                </td>
                <td>
                    <h2>Deck Kimia</h2>
                </td>
            </tr>
            <tr>
                <td style="text-align: center; height: 300px;">
                    <div id="deckFisika">
                        <?php foreach ($soal as $row1): ?>
                        <div id="fisika" class="kartu fisika" data-id="<?= $row1['id'] ?>"
                            style="background-image: url('<?= base_url('assets/img/kartu/induk/').$row1['fisika'];?>');"
                            draggable="true" ondragstart="onDragStart(event)">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </td>
                <td style="text-align: center; height: 300px; ">
                    <div id="deckKimia">
                        <?php foreach ($soal as $row2): ?>
                        <div id="kimia" class="kartu kimia" data-id="<?= $row2['id'] ?>"
                            style="background-image: url('<?= base_url('assets/img/kartu/induk/').$row2['kimia'];?>');"
                            draggable="true" ondragstart="onDragStart(event)">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <script>
    const matchedCount = {};
    let timeLeft = 120; 
    const timer = setInterval(() => {
        timeLeft--;
        document.getElementById('waktu').textContent = timeLeft;

        if (timeLeft <= 0) {
            clearInterval(timer);
            alert('Time is up!');
            clearInterval(timer);

            const finalScore = document.getElementById('skor').innerText;
            alert(`Game Over! Your final score is: ${finalScore}. Click OK to return to the homepage.`);

            window.location.href = '<?= base_url('GameQuiz/'); ?>';

        }
    }, 1000);

    //Making object draggable
    document.querySelectorAll('.kartu').forEach(card => {
        card.setAttribute('draggable', 'true');
        card.addEventListener('dragstart', onDragStart);
    });

    document.getElementById('kartuInduk').addEventListener('drop', onDrop);
    document.getElementById('kartuInduk').addEventListener('dragover', onDragOver);

    function onDragOver(event) {
        event.preventDefault();
    }

    function onDrop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("cardData");
        console.log("Retrieved data:", data);

        var parsedData = JSON.parse(data);
        var draggedCard = document.getElementById(parsedData.draggedCardId);

        var draggedCardDataId = draggedCard.getAttribute('data-id');
        var dropTargetDataId = ev.target.getAttribute('data-id');

        if (draggedCardDataId === dropTargetDataId) {
            alert('Pilihan benar! Kamu mendapatkan 20 point.');
            const currentScore = parseInt(document.getElementById('skor').innerText);
            document.getElementById('skor').innerText = currentScore + 20;
            draggedCard.classList.add('removed');
            setTimeout(() => {
                draggedCard.parentNode.removeChild(draggedCard);
            }, 300); 
            matchedCount[dropTargetDataId] = (matchedCount[dropTargetDataId] || 0) + 1;
            if (matchedCount[dropTargetDataId] === 2) {
                fetchKartuInduk();
                matchedCount[dropTargetDataId] = 0;
            }
        } else {
            console.log("Incorrect Match!");
        }
    }


    function onDragStart(ev) {
        var data = JSON.stringify({
            draggedCardId: ev.target.id,
            dataId: ev.target.getAttribute('data-id')
        });
        ev.dataTransfer.setData("cardData", data);
        console.log("Dragged data set:", data); 
    }

    //fetching kartuInduk
    document.addEventListener("DOMContentLoaded", function() {
        fetchSoalCount();
    });

    let lastDisplayedKartuIndukId = null; 

    let fetchedKartuIndukIds = [];
    let totalKartuIndukCount = 0;

    function fetchSoalCount() {
        fetch('<?= base_url('GameQuiz/getSoalCount'); ?>')
            .then(response => response.json())
            .then(data => {
                totalKartuIndukCount = data.count;
                console.log("Total Kartu Induk Count set to:", totalKartuIndukCount); 
                fetchKartuInduk();
            })
            .catch(error => {
                console.error('Error fetching soal count:', error);
            });
    }

    function fetchKartuInduk() {
        if (fetchedKartuIndukIds.length === totalKartuIndukCount) {
            const finalScore = document.getElementById('skor').innerText;
            alert(`Permainan Selesai! Skor final anda adalah: ${finalScore}. Click OK untuk kembali`);
            window.location.href = '<?= base_url('GameQuiz/'); ?>';
            return;
        }
        fetch('<?= base_url('GameQuiz/getKartuIndukData'); ?>')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                let randomIndex;
                do {
                    randomIndex = Math.floor(Math.random() * data.length);
                } while (fetchedKartuIndukIds.includes(data[randomIndex].id));

                fetchedKartuIndukIds.push(data[randomIndex].id);

                displayKartuInduk(data[randomIndex]);
            })
            .catch(error => {
                console.error('Error fetching Kartu Induk:', error);
            });
    }

    function displayKartuInduk(kartuIndukData) {
        console.log("Displaying Kartu Induk with data:", kartuIndukData);
        const kartuIndukElement = document.getElementById('kartuInduk');
        const fullImageUrl = '<?= base_url('assets/img/kartu/induk/') ?>' + kartuIndukData.gambar;
        kartuIndukElement.style.backgroundImage = `url('${fullImageUrl}')`;
        kartuIndukElement.setAttribute('data-id', kartuIndukData.id);
    }
    </script>
</body>

</html>