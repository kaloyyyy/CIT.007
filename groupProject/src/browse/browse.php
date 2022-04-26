<?php chdir(dirname(__DIR__)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/../../config/meta.php'; ?>
    <meta charset="UTF-8">
    <title>browse</title>
    <link rel="stylesheet" href="../../public/css/grid.css">
    <link rel="stylesheet" href="../../public/css/chat.css">
</head>
<body>
<?php include_once __DIR__ . '/../../public/header.php' ?>
<main>
    <section class="basic-grid">
        <div class="card writing">
            <div class="portfolio" id="hugh">
                <h6 class="user-name">Hugh#0211</h6>
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
                    <?php include __DIR__ . "/../../public/svg/pictures.svg" ?>
                </div>
                <div class="div-svg">
                        <?php include __DIR__ . "/../../public/svg/chat.svg" ?>
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
                    <?php include __DIR__ . "/../../public/svg/pictures.svg" ?>
                </div>
                <div class="div-svg">
                    <?php include __DIR__ . "/../../public/svg/chat.svg" ?>
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
                    <?php include __DIR__ . "/../../public/svg/pictures.svg" ?>
                </div>
                <div class="div-svg">
                    <?php include __DIR__ . "/../../public/svg/chat.svg" ?>
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
<button class="open-button" onclick="openForm()">Chat</button>
<div class="chat-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
        <h1>Chat</h1>

        <label for="msg"><b>Message</b></label>
        <textarea placeholder="Type message.." name="msg" required></textarea>

        <button type="submit" class="btn">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>
<script src="../../public/script/chatPopUp.js"></script>
</body>
</html>