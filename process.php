<?php
require_once 'config.php';
function load_data(){if(!file_exists(DATA_FILE))file_put_contents(DATA_FILE,json_encode([]));return json_decode(file_get_contents(DATA_FILE),true)?:[];}
function save_data($arr){file_put_contents(DATA_FILE,json_encode($arr,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));}
if($_SERVER['REQUEST_METHOD']!=='POST'){http_response_code(405);exit("Method not allowed");}
$nama=trim($_POST['nama']??'');$email=trim($_POST['email']??'');$hp=trim($_POST['hp']??'');$semester=(int)($_POST['semester']??0);$jenis=trim($_POST['jenis_beasiswa']??'');$ipk=floatval($_POST['ipk']??0);
$errors=[];
if($nama==='')$errors[]="Nama wajib";
if(!filter_var($email,FILTER_VALIDATE_EMAIL))$errors[]="Email tidak valid";
if(!preg_match('/^\d+$/',$hp))$errors[]="HP harus angka";
if($semester<1||$semester>8)$errors[]="Semester 1-8";
if($ipk<3.0)$errors[]="IPK < 3 tidak boleh daftar";
if($jenis==='')$errors[]="Jenis beasiswa wajib";
$uploadedFileName=null;
if(isset($_FILES['berkas'])&&$_FILES['berkas']['error']!==UPLOAD_ERR_NO_FILE){
 $f=$_FILES['berkas'];
 if($f['error']!==UPLOAD_ERR_OK){$errors[]="Upload error";}
 else if($f['size']>MAX_UPLOAD_SIZE){$errors[]="File besar";}
 else{
  $ext=strtolower(pathinfo($f['name'],PATHINFO_EXTENSION));
  $allowed=['pdf','jpg','jpeg','png','zip'];
  if(!in_array($ext,$allowed))$errors[]="Ekstensi tidak diijinkan";
  else{
    if(!is_dir(UPLOAD_DIR))mkdir(UPLOAD_DIR,0755,true);
    $uniqueName=time().'_'.preg_replace('/[^A-Za-z0-9_\-\.]/','_',$f['name']);
    if(move_uploaded_file($f['tmp_name'],UPLOAD_DIR.$uniqueName))$uploadedFileName=$uniqueName;
    else $errors[]="Gagal simpan file";
  }
 }
}
if($errors){echo"<h3>Kesalahan:</h3><ul>";foreach($errors as $e)echo"<li>".htmlspecialchars($e)."</li>";echo"</ul><a href='index.php'>Kembali</a>";exit;}
$entry=['id'=>uniqid('reg_'),'nama'=>$nama,'email'=>$email,'hp'=>$hp,'semester'=>$semester,'jenis_beasiswa'=>$jenis,'ipk'=>$ipk,'berkas'=>$uploadedFileName,'status_ajuan'=>'belum di verifikasi','created_at'=>date('c')];
$data=load_data();$data[]=$entry;save_data($data);
header('Location: results.php?show_id='.urlencode($entry['id']));exit;