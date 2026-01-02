document.addEventListener('DOMContentLoaded',function(){
  const ipk=ASSUMED_IPK;
  const jenis=document.getElementById('jenis_beasiswa');
  const berkas=document.getElementById('berkas');
  const submitBtn=document.getElementById('submitBtn');
  function applyIpkLogic(){
    if(ipk<3.0){jenis.disabled=true;berkas.disabled=true;submitBtn.disabled=true;jenis.value='';}
    else{jenis.disabled=false;berkas.disabled=false;submitBtn.disabled=false;jenis.focus();}
  }
  document.getElementById('beasiswaForm').addEventListener('submit',function(e){
    const hp=document.getElementById('hp').value.trim();
    if(!/^\d+$/.test(hp)){e.preventDefault();alert('Nomor HP harus angka saja');}
    const sem=Number(document.getElementById('semester').value);
    if(!(sem>=1&&sem<=8)){e.preventDefault();alert('Semester harus antara 1-8');}
  });
  applyIpkLogic();
});