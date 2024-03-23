<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator</title>
</head>
<body>
    <h2>Kalkulator Sederhana</h2>
    <form action="/calculate" method="post">
        @csrf
        <input type="number" name="number1" placeholder="Masukkan angka ke-1" required>
        <select name="operator" required>
            <option value="+" selected>+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select>
        <input type="number" name="number2" placeholder="Masukkan angka ke-2" required>
        <button type="submit">Hitung</button>
    </form>

    <br/>

    <a href="/history">Lihat Riwayat Perhitungan</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif

</body>
</html>
