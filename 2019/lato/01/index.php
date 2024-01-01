<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep papierniczy</title>

    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>W naszym sklepie internetowym kupisz najtaniej</h1>
    </header>

    <div class="section-wrapper">
        <section class="left">
            <h3>Promocja 15% obejmuje artykuły:</h3>
            <ul>
                <?php
                $connection1 = mysqli_connect("localhost", "root", "root", "sklep");
                $query1 = mysqli_query($connection1, "SELECT nazwa FROM towary WHERE promocja = 1;");

                while($element = mysqli_fetch_array($query1)) {
                    $nazwa = $element["nazwa"];
                    echo "<li>$nazwa</li>";
                }
                mysqli_close($connection1);
                ?>
            </ul>
        </section>

        <section class="middle">
            <h3>Cena wybranego artykułu w promocji</h3>
            <form action="./index.php" method="post">
                <select name="productSelect">
                    <option value="7">Gumka do mazania</option>
                    <option value="8">Cienkopis</option>
                    <option value="9">Pisaki 60 szt.</option>
                    <option value="10">Markery 4 szt.</option>
                </select>
                <button type="submit" name="productSubmit">WYBIERZ</button>
            </form>

            <?php
            if(isset($_POST["productSubmit"])) {
                $selectedProduct = $_POST["productSelect"];
                $conncection2 = mysqli_connect("localhost", "root", "root", "sklep");
                $query2 = mysqli_query($conncection2, "SELECT cena FROM towary WHERE id = $selectedProduct;");
                $priceAfterDiscount = round(mysqli_fetch_array($query2)[0] * 0.85, 2);

                echo $priceAfterDiscount;
            }
            ?>
        </section>

        <section class="right">
            <h3>Kontakt</h3>
            <p>
                telefon: 123123123<br>
                e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a>
            </p>
            <img src="./promocja2.png" alt="promocja">
        </section>
    </div>

    <footer>
        <h4>Autor strony 694202137</h4>
    </footer>
</body>
</html>