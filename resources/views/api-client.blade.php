<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Consumer</title>
</head>
<body>
    <h1>API Consumer</h1>
    NIM: <input type="text" id="nim"><br>
    Nama: <input type="text" id="nama"><br>
    <button id="apiGet">GET</button>
    <button id="apiPost">POST</button>
    <button id="apiPut">PUT</button>
    <button id="apiPatch">PATCH</button>
    <button id="apiDelete">DELETE</button>
    <script>
        const api = axios.create({
            baseURL: 'http://rest-api.test/api',
            headers: {
                'Content-Type': 'application/json'
            }
        });

        const nimField = document.getElementById('nim');
        const namaField = document.getElementById('nama');
        const putField = document.getElementById('put');
        const patchField = document.getElementById('patch');
        const deleteField = document.getElementById('delete');

        document.getElementById('apiGet').addEventListener('click', () => {
            api.get('/students')
                .then(res => console.log('GET:', res.data))
                .catch(err => console.error('GET error:', err));
        });

        document.getElementById('apiPost').addEventListener('click', () => {
            const data = {
                "nim": nimField.value.trim(),
                "nama": namaField.value.trim(),
                "mataKuliah": [
                    {"kode": "COM12345", "nama": "Pemrograman Web", "sks": 3},
                    {"kode": "COM45678", "nama": "Matematika Diskrit", "sks": 3}
                ]
            };

            api.post('/students', data)
                .then(res => console.log('POST:', res.data))
                .catch(err => console.error('POST error:', err));
        });

        document.getElementById('apiPut').addEventListener('click', () => {
            api.put('/students/1234567890', {
                    "nama": namaField.value.trim(),
                    "mataKuliah": [
                        {"kode": "COM12345", "nama": "Matematika Diskrit", "sks": 2}
                    ]
                })
                .then(res => console.log('PUT:', res.data))
                .catch(err => console.error('PUT error:', err));
        });

        document.getElementById('apiPatch').addEventListener('click', () => {
            api.patch('/students/1234567890', {
                    "nama": namaField.value.trim(),
                    "mataKuliah": [
                        {"kode": "COM12345", "nama": "Matematika Diskrit", "sks": 2}
                    ]
                })
                .then(res => console.log('PATCH:', res.data))
                .catch(err => console.error('PATCH error:', err));
        });

        document.getElementById('apiDelete').addEventListener('click', () => {
            api.delete('/students/' + nimField.value.trim())
                .then(res => console.log('DELETE:', res.data))
                .catch(err => console.error('DELETE error:', err));
        });
    </script>
</body>
</html>