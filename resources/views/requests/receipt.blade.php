<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda Terima Permohonan Informasi - PPID Kemenag Sumenep</title>
    <style>
        body { font-family: 'Arial', sans-serif; line-height: 1.6; color: #333; margin: 40px; }
        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 20px; margin-bottom: 30px; }
        .header img { height: 80px; }
        .header h1 { margin: 10px 0 0; font-size: 22px; text-transform: uppercase; }
        .header p { margin: 5px 0; font-size: 14px; }
        .content { margin-bottom: 40px; }
        .content h2 { text-align: center; font-size: 18px; text-decoration: underline; margin-bottom: 30px; }
        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .details-table td { padding: 10px; vertical-align: top; }
        .details-table td:first-child { width: 30%; font-weight: bold; }
        .footer { margin-top: 50px; }
        .footer .signature { float: right; width: 250px; text-align: center; }
        .footer .signature .space { height: 80px; }
        .no-print { text-align: center; margin-bottom: 20px; }
        @media print { .no-print { display: none; } }
        .btn-print { background: #1a5928; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; cursor: pointer; border: none; }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()" class="btn-print">Cetak Sekarang (PDF)</button>
    </div>

    <div class="header">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Logo_Kementerian_Agama.svg/1200px-Logo_Kementerian_Agama.svg.png" alt="Logo Kemenag">
        <h1>Kementerian Agama Kabupaten Sumenep</h1>
        <p>Pejabat Pengelola Informasi dan Dokumentasi (PPID)</p>
        <p>Jl. KH. Agus Salim No. 6, Sumenep, Jawa Timur</p>
    </div>

    <div class="content">
        <h2>BUKTI TANDA TERIMA PERMOHONAN INFORMASI</h2>
        
        <p>Telah diterima permohonan informasi publik dengan rincian sebagai berikut:</p>
        
        <table class="details-table">
            <tr>
                <td>Nomor Registrasi</td>
                <td>: #REQ-{{ str_pad($request->id, 5, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <tr>
                <td>Tanggal Permohonan</td>
                <td>: {{ $request->created_at->format('d F Y H:i') }} WIB</td>
            </tr>
            <tr>
                <td>Nama Pemohon</td>
                <td>: {{ $request->name }}</td>
            </tr>
            <tr>
                <td>Alamat Email</td>
                <td>: {{ $request->email }}</td>
            </tr>
            <tr>
                <td>Subjek Informasi</td>
                <td>: {{ $request->subject }}</td>
            </tr>
            <tr>
                <td>Rincian Permohonan</td>
                <td>: {{ $request->message }}</td>
            </tr>
            <tr>
                <td>Status Saat Ini</td>
                <td>: MENUNGGU PROSES</td>
            </tr>
        </table>

        <p><strong>Catatan Penting:</strong></p>
        <ol>
            <li>Permohonan akan diproses dalam waktu maksimal 10 (sepuluh) hari kerja.</li>
            <li>PPID berhak memberikan perpanjangan waktu maksimal 7 (tujuh) hari kerja dengan pemberitahuan tertulis.</li>
            <li>Anda dapat memantau status permohonan melalui website resmi kami menggunakan email Anda.</li>
        </ol>
    </div>

    <div class="footer">
        <div class="signature">
            Sumenep, {{ date('d F Y') }}<br>
            Petugas PPID,
            <div class="space"></div>
            (...........................................)
        </div>
        <div style="clear: both;"></div>
    </div>

    <script>
        // Auto show print dialog
        window.onload = function() {
            // window.print();
        }
    </script>
</body>
</html>
