<?php chdir(dirname(__DIR__));
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/../../config/meta.php'; ?>
    <meta charset="UTF-8">
    <title>browse</title>
    <link rel="stylesheet" href="../../public/css/grid.css">
</head>
<body>
<?php include_once __DIR__ . '/../../public/header.php' ?>
<main>
    <section class="basic-grid">
        <div class="card writing">
            <div class="portfolio" id="hugh">
                <h6 class="user-name">Luna#0211</h6>
                <h6 class="comm-type portfolio">Academic Writing</h6>
                <h6 class="comm-rate portfolio">starts at 50 php</h6>
                <h6 class="credentials portfolio">Credentials:
                    <ul>
                        <li>Editor-in-chief of Embers Publication</li>
                        <li>Feature Writer in The Beacon Publications</li>
                        <li>Former content creator of zero waste lifestyle system blog</li>
                        <li>Author at Wattpad</li>
                        <li>Honor student since 2004</li>
                    </ul>
                </h6>
            </div>
            <div class="svg-group">
                <div class="div-svg">
                    <i class="fa-solid fa-images card-svg"></i>
                </div>
                <div class="div-svg">
                    <a href="../user/index.php?chatID=2">
                        <i class="fa-solid fa-comment-dots card-svg"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card coding">
            <div class="portfolio" id="hak16">
                <h6 class="user-name">Hak_16#6916</h6>
                <h6 class="comm-type portfolio">Programming and coding</h6>
                <h6 class="comm-rate portfolio">starts at 200 php</h6>
                <h6 class="credentials portfolio">Languages:
                    <ul>
                        <li>C++</li>
                        <li>Java</li>
                        <li>Javascript: node.js, Jquery, discord.js</li>
                        <li>Web App development: <br>HTML, CSS, JS, PHP, MYSQL</li>
                        <li>Flowcharts && Pseudocode</li>
                        <li>C-Based QMK Firmware</li>
                    </ul>
                </h6>
            </div>
            <div class="svg-group">
                <div class="div-svg">
                    <i class="fa-solid fa-images card-svg"></i>
                </div>
                <div class="div-svg">
                    <a href="../user/index.php?chatID=1">
                        <i class="fa-solid fa-comment-dots card-svg"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card photo">
            <div class="portfolio" id="wokes">
                <h6 class="user-name">Wokes#46549</h6>
                <h6 class="comm-type portfolio">Photography and editing</h6>
                <h6 class="comm-rate portfolio">Photo shoot package at 3000 php</h6>
                <Ul>
                    <li>20 edited photos (selected by the photographer and client)</li>
                    <li>unlimited number of shots</li>
                </Ul>
            </div>
            <div class="svg-group">
                <div class="div-svg">
                    <i class="fa-solid fa-images card-svg"></i>
                </div>
                <div class="div-svg">
                    <a href="../user/index.php?chatID=3">
                        <i class="fa-solid fa-comment-dots card-svg"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card">4</div>
        <div class="card">5</div>
        <div class="card">6</div>
        <div class="card">7</div>
        <div class="card">8</div>
        <div class="card">9</div>
    </section>
</main>

</body>
</html>