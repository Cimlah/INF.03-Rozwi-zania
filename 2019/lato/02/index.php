<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia papiernicza</title>

    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>W naszej hurtowni kupisz najtaniej</h1>
    </header>
    
    <section class="left">
        <h3>Ceny wybranych artykułów w hurtowni:</h3>
        <table>
            <?php
            $connection1 = mysqli_connect("localhost", "root", "root", "sklep");
            $query1 = mysqli_query($connection1, "SELECT nazwa, cena FROM towary LIMIT 4;");

            while($row = mysqli_fetch_array($query1)) {
                $productName = $row['nazwa'];
                $productPrice = $row['cena'];

                echo "<tr>".
                "<td>$productName</td>".
                "<td>$productPrice zł</td>".
                "</tr>";
            }

            mysqli_close($connection1);
            ?>
        </table>
    </section>

    <section class="middle">
        <h3>Ile będą kosztować Twoje zakupy?</h3>
        <form action="index.php" method="post">
            wybierz artykuł
            <select name="productSelect">
                <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                <option value="Cyrkiel">Cyrkiel</option>
                <option value="Linijka 30 cm">Linijka 30 cm</option>
                <option value="Ekierka">Ekierka</option>
                <option value="Linijka 50 cm">Linijka 50 cm</option>
            </select></br>

            liczba sztuk
            <input type="number" name="productQuantity" value="1"></br>
                
            <button type="submit" name="calculateButton">OBLICZ</button>
        </form>

        <?php
        if(isset($_POST['calculateButton'])) {
            $selectedProduct = $_POST['productSelect'];
            $productQuantity = $_POST['productQuantity'];
            
            $connection2 = mysqli_connect("localhost", "root", "root", "sklep");
            $query2 = mysqli_query($connection2, "SELECT cena FROM towary WHERE nazwa = '$selectedProduct';");

            $total = round(mysqli_fetch_array($query2)[0] * $productQuantity, 1);
            echo "$total zł";
            mysqli_close($connection2);
        }
        ?>
    </section>

    <section class="right">
        <img src="./zakupy2.png" alt="hurtownia">
        <h3>Kontakt</h3>
        <p>
            telefon:</br>
            111222333</br>
            e-mail:</br>
            <a href="mailto:hurt@wp.pl">hurt@wp.pl</a>
        </p>
    </section>
    
    <footer>
        <h4>Witrynę wykonał 694202137</h4>
    </footer>
</body>
</html>