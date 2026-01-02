<?php
require_once 'config.php';
$ipk = ASSUMED_IPK;
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Pendaftaran Beasiswa - Kampus</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      padding: 24px 16px;
      line-height: 1.5;
    }

    .main-container {
      max-width: 680px;
      margin: 0 auto;
    }

    .card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      border: none;
    }

    .header-section {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 40px 32px;
      text-align: center;
      color: white;
    }

    .header-section h1 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 8px;
      letter-spacing: -0.5px;
    }

    .header-section p {
      font-size: 15px;
      opacity: 0.95;
      margin: 0;
    }

    .ipk-badge {
      display: inline-block;
      background: rgba(255, 255, 255, 0.2);
      padding: 4px 12px;
      border-radius: 20px;
      font-weight: 600;
      margin-top: 8px;
      backdrop-filter: blur(10px);
    }

    .nav-section {
      display: flex;
      gap: 8px;
      padding: 24px 32px 0;
      border-bottom: 1px solid #e5e7eb;
    }

    .nav-link {
      flex: 1;
      padding: 12px 16px;
      text-align: center;
      text-decoration: none;
      color: #6b7280;
      font-weight: 500;
      font-size: 14px;
      border-radius: 8px 8px 0 0;
      transition: all 0.2s ease;
      border-bottom: 3px solid transparent;
    }

    .nav-link:hover {
      background: #f9fafb;
      color: #667eea;
    }

    .nav-link.active {
      color: #667eea;
      border-bottom-color: #667eea;
      background: #f9fafb;
    }

    .content-section {
      padding: 32px;
    }

    .info-box {
      background: linear-gradient(135deg, #e0e7ff 0%, #ede9fe 100%);
      border-left: 4px solid #667eea;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 32px;
    }

    .info-box h2 {
      font-size: 16px;
      font-weight: 600;
      color: #4338ca;
      margin-bottom: 12px;
    }

    .info-box ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .info-box li {
      padding: 8px 0;
      color: #4c1d95;
      font-size: 14px;
      display: flex;
      align-items: center;
    }

    .info-box li:before {
      content: "✓";
      display: inline-block;
      width: 20px;
      height: 20px;
      background: #667eea;
      color: white;
      border-radius: 50%;
      text-align: center;
      line-height: 20px;
      margin-right: 12px;
      font-size: 12px;
      font-weight: bold;
      flex-shrink: 0;
    }

    .form-label {
      font-weight: 600;
      color: #374151;
      margin-bottom: 8px;
      font-size: 14px;
    }

    .form-control, .form-select {
      border: 2px solid #e5e7eb;
      border-radius: 8px;
      padding: 12px 16px;
      font-size: 15px;
      transition: all 0.2s ease;
      background: white;
    }

    .form-control:focus, .form-select:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      outline: none;
    }

    .form-control:read-only {
      background: #f9fafb;
      color: #6b7280;
      cursor: not-allowed;
    }

    .mb-3 {
      margin-bottom: 24px;
    }

    .btn-primary {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      padding: 14px 24px;
      font-size: 16px;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
      background: linear-gradient(135deg, #5568d3 0%, #6a3f91 100%);
    }

    .btn-primary:active {
      transform: translateY(0);
    }

    .btn-primary:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    @media (max-width: 640px) {
      body {
        padding: 16px 8px;
      }

      .header-section {
        padding: 32px 24px;
      }

      .header-section h1 {
        font-size: 24px;
      }

      .content-section {
        padding: 24px;
      }

      .nav-section {
        padding: 16px 16px 0;
        flex-direction: column;
      }

      .nav-link {
        border-radius: 8px;
        border-bottom: none;
        border-left: 3px solid transparent;
      }

      .nav-link.active {
        border-left-color: #667eea;
        border-bottom: none;
      }
    }
  </style>
</head>
<body>
  <div class="main-container">
    <div class="card">
      <div class="header-section">
        <h1>Sistem Pendaftaran Beasiswa</h1>
        <p>Platform pendaftaran beasiswa online</p>
        
      </div>

      <nav class="nav-section">
        <a class="nav-link active" href="index.php">Form Pendaftaran</a>
        <a class="nav-link" href="results.php">Lihat Hasil</a>
      </nav>

      <div class="content-section">
        <div class="info-box">
          <h2>Jenis Beasiswa Tersedia</h2>
          <ul>
            <li>Beasiswa Akademik (IPK minimal 3.0)</li>
            <li>Beasiswa Non-Akademik (IPK minimal 2.5)</li>
          </ul>
        </div>

        <form id="beasiswaForm" action="process.php" method="post" enctype="multipart/form-data" novalidate>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="nama@email.com" required>
          </div>

          <div class="mb-3">
            <label for="hp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="hp" name="hp" pattern="\d+" placeholder="08123456789" required>
          </div>

          <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select id="semester" name="semester" class="form-select" required>
              <option value="">Pilih semester saat ini</option>
              <?php for ($i=1;$i<=8;$i++): ?>
                <option value="<?php echo $i ?>">Semester <?php echo $i ?></option>
              <?php endfor; ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="jenis_beasiswa" class="form-label">Jenis Beasiswa</label>
            <select id="jenis_beasiswa" name="jenis_beasiswa" class="form-select" required>
              <option value="">Pilih jenis beasiswa</option>
              <option value="akademik">Beasiswa Akademik</option>
              <option value="non-akademik">Beasiswa Non-Akademik</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="berkas" class="form-label">Upload Berkas</label>
            <input type="file" class="form-control" id="berkas" name="berkas" accept=".pdf,.jpg,.jpeg,.png,.zip">
            <small class="text-muted" style="font-size: 13px; display: block; margin-top: 6px;">Format: PDF, JPG, PNG, atau ZIP (Maks. 5MB)</small>
          </div>

          <div class="mb-3">
            <label for="ipk_display" class="form-label">IPK</label>
            <input type="text" class="form-control" id="ipk_display" value="<?php echo $ipk; ?>" readonly>
            <small class="text-muted" style="font-size: 13px; display: block; margin-top: 6px;">IPK otomatis dari sistem akademik</small>
          </div>

          <input type="hidden" id="ipk" name="ipk" value="<?php echo $ipk; ?>">

          <button type="submit" id="submitBtn" class="btn btn-primary w-100">Daftar Beasiswa Sekarang</button>
        </form>
      </div>
    </div>
  </div>

  <script>const ASSUMED_IPK = Number('<?php echo $ipk; ?>');</script>
  <script src="assets/js/app.js"></script>
</body>
</html>