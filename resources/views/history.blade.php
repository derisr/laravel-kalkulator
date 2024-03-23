<!DOCTYPE html>
<html>
<head>
    <title>History</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Angka ke-1</th>
                <th>Operasi</th>
                <th>Angka ke-2</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calculations as $calculation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $calculation->number1 }}</td>
                    <td>{{ $calculation->operator }}</td>
                    <td>{{ $calculation->number2 }}</td>
                    <td>{{ $calculation->result }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
