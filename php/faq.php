<?php
$faqs = simplexml_load_file("../xml/faq.xml");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Domande Frequenti (FAQ)</h1>
    </header>

    <main>
        <div class="faq-section">
            <?php foreach ($faqs->faq as $faq): ?>
                <div class="faq-item">
                    <h3><?php echo $faq->domanda; ?></h3>
                    <p><?php echo $faq->risposta; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
