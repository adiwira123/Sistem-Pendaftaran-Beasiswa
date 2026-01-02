<?php
require_once 'config.php';
function load_data(){if(!file_exists(DATA_FILE))return[];return json_decode(file_get_contents(DATA_FILE),true)?:[];}
$data=load_data();
$show_id=$_GET['show_id']??null;$focused=null;
foreach($data as $d)if($d['id']===$show_id)$focused=$d;
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Hasil Pendaftaran Beasiswa</title>
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
      max-width: 1200px;
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

    .detail-card {
      background: linear-gradient(135deg, #e0e7ff 0%, #ede9fe 100%);
      border-left: 4px solid #667eea;
      padding: 24px;
      border-radius: 12px;
      margin-bottom: 32px;
    }

    .detail-card h2 {
      font-size: 18px;
      font-weight: 700;
      color: #4338ca;
      margin-bottom: 20px;
    }

    .detail-table {
      background: white;
      border-radius: 8px;
      overflow: hidden;
    }

    .detail-table tr {
      border-bottom: 1px solid #e5e7eb;
    }

    .detail-table tr:last-child {
      border-bottom: none;
    }

    .detail-table th {
      padding: 12px 16px;
      font-weight: 600;
      color: #374151;
      background: #f9fafb;
      width: 180px;
      font-size: 14px;
    }

    .detail-table td {
      padding: 12px 16px;
      color: #6b7280;
      font-size: 14px;
    }

    .detail-table a {
      color: #667eea;
      text-decoration: none;
      font-weight: 500;
    }

    .detail-table a:hover {
      text-decoration: underline;
    }

    .section-title {
      font-size: 20px;
      font-weight: 700;
      color: #1f2937;
      margin-bottom: 20px;
      padding-bottom: 12px;
      border-bottom: 2px solid #e5e7eb;
    }

    .table-container {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .data-table {
      width: 100%;
      margin: 0;
    }

    .data-table thead {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .data-table thead th {
      padding: 16px 12px;
      font-weight: 600;
      font-size: 13px;
      color: white;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border: none;
    }

    .data-table tbody tr {
      border-bottom: 1px solid #e5e7eb;
      transition: background 0.2s ease;
    }

    .data-table tbody tr:hover {
      background: #f9fafb;
    }

    .data-table tbody tr:last-child {
      border-bottom: none;
    }

    .data-table tbody td {
      padding: 14px 12px;
      font-size: 14px;
      color: #374151;
      vertical-align: middle;
    }

    .data-table tbody td a {
      color: #667eea;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.2s ease;
    }

    .data-table tbody td a:hover {
      color: #764ba2;
      text-decoration: underline;
    }

    .badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }

    .badge-success {
      background: #10b981;
      color: white;
    }

    .badge-warning {
      background: #f59e0b;
      color: white;
    }

    .badge-info {
      background: #3b82f6;
      color: white;
    }

    .badge-secondary {
      background: #6b7280;
      color: white;
    }

    .empty-state {
      text-align: center;
      padding: 60px 20px;
      color: #6b7280;
    }

    .empty-state svg {
      width: 80px;
      height: 80px;
      margin-bottom: 16px;
      opacity: 0.3;
    }

    .empty-state h3 {
      font-size: 18px;
      font-weight: 600;
      color: #374151;
      margin-bottom: 8px;
    }

    .empty-state p {
      font-size: 14px;
      color: #6b7280;
    }

    .stats-row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      margin-bottom: 32px;
    }

    .stat-card {
      background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
      padding: 20px;
      border-radius: 12px;
      border-left: 4px solid #667eea;
    }

    .stat-card .stat-label {
      font-size: 13px;
      font-weight: 600;
      color: #6b7280;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 8px;
    }

    .stat-card .stat-value {
      font-size: 28px;
      font-weight: 700;
      color: #1f2937;
    }

    @media (max-width: 768px) {
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

      .data-table {
        font-size: 12px;
      }

      .data-table thead th,
      .data-table tbody td {
        padding: 10px 8px;
      }

      .detail-table th {
        width: 120px;
        font-size: 13px;
      }
    }
  </style>
</head>
<body>
  <div class="main-container">
    <div class="card">
      <div class="header-section">
        <h1>Hasil Pendaftaran Beasiswa</h1>
        <p>Lihat data dan status pendaftaran beasiswa</p>
      </div>

      <nav class="nav-section">
        <a class="nav-link" href="index.php">Form Pendaftaran</a>
        <a class="nav-link active" href="results.php">Lihat Hasil</a>
      </nav>

      <div class="content-section">
        <?php if($focused): ?>
          <div class="detail-card">
            <h2>Detail Pendaftaran</h2>
            <table class="detail-table">
              <?php foreach($focused as $k=>$v): ?>
                <tr>
                  <th><?=htmlspecialchars(ucwords(str_replace('_', ' ', $k)))?></th>
                  <td>
                    <?php if($k==='berkas'&&$v): ?>
                      <a href="uploads/<?=rawurlencode($v)?>" target="_blank"><?=htmlspecialchars($v)?></a>
                    <?php elseif($k==='status_ajuan'): ?>
                      <span class="badge badge-info"><?=htmlspecialchars($v)?></span>
                    <?php else: ?>
                      <?=htmlspecialchars($v)?>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php endif; ?>

        <?php if($data && count($data) > 0): ?>
          <div class="stats-row">
            <div class="stat-card">
              <div class="stat-label">Total Pendaftar</div>
              <div class="stat-value"><?=count($data)?></div>
            </div>
            <div class="stat-card" style="border-left-color: #10b981;">
              <div class="stat-label">Beasiswa Akademik</div>
              <div class="stat-value"><?=count(array_filter($data, fn($d) => $d['jenis_beasiswa'] === 'akademik'))?></div>
            </div>
            <div class="stat-card" style="border-left-color: #f59e0b;">
              <div class="stat-label">Beasiswa Non-Akademik</div>
              <div class="stat-value"><?=count(array_filter($data, fn($d) => $d['jenis_beasiswa'] === 'non-akademik'))?></div>
            </div>
          </div>
        <?php endif; ?>

        <h2 class="section-title">Daftar Semua Pendaftar</h2>

        <?php if(!$data || count($data) === 0): ?>
          <div class="empty-state">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h3>Belum Ada Pendaftar</h3>
            <p>Tidak ada data pendaftaran beasiswa yang tersedia saat ini</p>
          </div>
        <?php else: ?>
          <div class="table-container">
            <div class="table-responsive">
              <table class="data-table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>HP</th>
                    <th>Semester</th>
                    <th>Jenis Beasiswa</th>
                    <th>IPK</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($data as $d): ?>
                    <tr>
                      <td><a href="results.php?show_id=<?=$d['id']?>"><?=htmlspecialchars($d['id'])?></a></td>
                      <td><?=htmlspecialchars($d['nama'])?></td>
                      <td><?=htmlspecialchars($d['email'])?></td>
                      <td><?=htmlspecialchars($d['hp'])?></td>
                      <td><?=$d['semester']?></td>
                      <td><?=ucfirst($d['jenis_beasiswa'])?></td>
                      <td><strong><?=$d['ipk']?></strong></td>
                      <td>
                        <span class="badge badge-<?=$d['status_ajuan'] === 'belum diverifikasi' ? 'warning' : 'success'?>">
                          <?=ucfirst($d['status_ajuan'])?>
                        </span>
                      </td>
                      <td><?=date('d/m/Y H:i', strtotime($d['created_at']))?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>