<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pencarian Tabel dengan JavaScript</title>
</head>
<body>
    <input type="text" id="searchInput" placeholder="Ketik untuk mencari...">
    <table id="myTable">
        <tr>
            <th>Nama</th>
            <th>Usia</th>
        </tr>
        <tr>
            <td>John</td>
            <td>25</td>
        </tr>
        <tr>
            <td>Jane</td>
            <td>30</td>
        </tr>
        <tr>
            <td>Bob</td>
            <td>22</td>
        </tr>
        <tr>
            <td>Alice</td>
            <td>28</td>
        </tr>
    </table>

    <?php
        echo "sudah ke pristel";
    ?>

    <script>
        // Ambil elemen input pencarian
        const searchInput = document.getElementById('searchInput');

        // Ambil tabel
        const myTable = document.getElementById('myTable');
        const rows = myTable.getElementsByTagName('tr');

        // Tambahkan event listener ke input pencarian
        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                let found = false;

                for (let j = 0; j < cells.length; j++) {
                    const cell = cells[j];
                    if (cell) {
                        const cellText = cell.textContent.toLowerCase();
                        if (cellText.includes(searchTerm)) {
                            found = true;
                            break;
                        }
                    }
                }

                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>