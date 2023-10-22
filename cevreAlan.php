<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çevre ve Alan Hesabı</title>
</head>
<body>
    <h1>Çevre ve Alan Hesabı</h1>
    
    <form method="post" action="hesapla.php">
        <label for="shape">Şekil Seçin:</label>
        <select name="shape" id="shape">
            <option value="space"></option>
            <option value="kare">Kare</option>
            <option value="dikdortgen">Dikdörtgen</option>
            <option value="ucgen">Üçgen</option>
        </select>
        
        <br>
        
        <label for="a">Kenar Uzunluğu (a):</label>
        <input type="number" name="a" id="a" step="0.01" disabled>
        
        <br>
        
        <label for="b">Kenar Uzunluğu (b):</label>
        <input type="number" name="b" id="b" step="0.01" disabled>
        
        <br>
        
        <label for="c">Kenar Uzunluğu (c):</label>
        <input type="number" name="c" id="c" step="0.01" disabled>
        
        <script>
            // Kenar uzunluklarını dinamik olarak devre dışı bırakma
            document.getElementById("shape").addEventListener("change", function() {
                var shape = this.value;
                document.getElementById("a").disabled = false;
                document.getElementById("b").disabled = false;
                document.getElementById("c").disabled = false;
                
                if (shape === "kare") {
                    document.getElementById("b").disabled = true;
                    document.getElementById("c").disabled = true;
                } else if (shape === "dikdortgen") {
                    document.getElementById("c").disabled = true;
                } else if (shape === "space"){
                    document.getElementById("a").disabled = true;
                    document.getElementById("b").disabled = true;
                    document.getElementById("c").disabled = true;
                }
            });
        </script>
        
        <br>
        
        <input type="submit" value="Hesapla">
    </form>
</body>
</html>
