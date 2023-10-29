<!DOCTYPE html>
<html>
<head>
    <title>3'e Bölünebilirlik Kontrolü</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h1 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="number"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            text-align: right;
        }
        input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #FF0000; /* Koyu kırmızı rengi burada ayarlayın */
            color: #fff;
            border: none;
            border-radius: 10px; /* Köşeleri daha yuvarlak yapmak için değeri artırabilirsiniz */
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #CC0000; /* Hover durumunda rengi değiştirin */
        }
        button[type="reset"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #808080; /* Koyu gri rengi burada ayarlayın */
            color: #fff;
            border: none;
            border-radius: 10px; /* Köşeleri daha yuvarlak yapmak için değeri artırabilirsiniz */
            cursor: pointer;
        }
        button[type="reset"]:hover {
            background-color: #595959; /* Hover durumunda rengi değiştirin */
        }
        p {
            color: red;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>3'e Bölünebilirlik Kontrolü</h1>
    
    <form method="post" action="">
        <label>Sayı: <input type="number" name="sayi" title="Lütfen bir sayı giriniz"></label>
        <input type="submit" value="Kontrol Et" onclick="showAlert(event)">
        <button type="reset">Sıfırla</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Formdan sayıyı al
        $sayi = $_POST["sayi"];
        
        // Eğer kullanıcı boş girmişse.
        if (empty($sayi)) {
            echo '<p>Lütfen bir sayı giriniz.</p>';
        } else {
            if ($sayi == 0) {
                echo '<p>Sıfır herhangi bir sayıya bölünemez.</p>';
            } elseif ($sayi % 3 == 0) {
                echo '<p>Girdiğiniz sayı 3\'e bölünebilir.</p>';
            } else {
                $bölünebilen_ilk_sayı = ceil($sayi / 3) * 3;
                echo '<p>Girdiğiniz sayı 3\'e bölünemez. 3\'e bölünebilecek yakın değer: ' . $bölünebilen_ilk_sayı . ' \'dir.</p>';
            }
        }
    }
    ?>
    
<script>
    var alertContainer = document.createElement("div");
    alertContainer.style.position = "fixed";
    alertContainer.style.top = "10px";
    alertContainer.style.right = "10px";
    alertContainer.style.zIndex = "9999";
    alertContainer.style.display = "flex";
    alertContainer.style.flexDirection = "column-reverse"; // Yeni bildirimleri en altta gösterir

    document.body.appendChild(alertContainer);

    function showAlert(event) {
        event.preventDefault();
        var form = event.target.form;
        var sayi = form.elements["sayi"].value;
        
        if (sayi == 0) {
            showTimedAlert("Sıfır herhangi bir sayıya bölünemez.", "red", 10000);
        } else if (sayi % 3 == 0) {
            showTimedAlert("Girdiğiniz sayı 3'e bölünebilir.", "green", 10000);
        } else {
            var bölünebilen_ilk_sayı = Math.ceil(sayi / 3) * 3;
            showTimedAlert("Girdiğiniz sayı 3'e bölünemez. 3'e bölünebilecek yakın değer: " + bölünebilen_ilk_sayı + " 'dir.", "#808080", 10000);
        }
    }

    function showTimedAlert(message, color, duration) {
        var alertDiv = document.createElement("div");
        alertDiv.textContent = message;
        alertDiv.style.backgroundColor = color;
        alertDiv.style.color = "white";
        alertDiv.style.padding = "10px";
        alertDiv.style.borderRadius = "8px";
        alertDiv.style.position = "relative";
        alertDiv.style.marginTop = "2px"; // Yukarıdan 2px boşluk bırakır

        var progressBar = document.createElement("div");
        progressBar.style.height = "5px";
        progressBar.style.backgroundColor = "lightgray";
        progressBar.style.width = "0%";
        progressBar.style.position = "absolute";
        progressBar.style.bottom = "0";
        progressBar.style.borderRadius = "2px"; // 2px yuvarlak köşe ekleniyor

        alertDiv.appendChild(progressBar);
        alertContainer.appendChild(alertDiv);

        var width = 0;
        var interval = 10;
        var id = setInterval(frame, interval);
        function frame() {
            if (width >= 100) {
                clearInterval(id);
                alertContainer.removeChild(alertDiv);
            } else {
                width += (interval / duration) * 100;
                progressBar.style.width = width + "%";
            }
        }
    }
</script>

</body>
</html>
