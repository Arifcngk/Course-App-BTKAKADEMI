<?php

function getCategories(){
    include "ayar.php";
    $quary="SELECT * from kategoriler";
    $sonuc=mysqli_query($baglanti,$quary);
    mysqli_close($baglanti);
    return $sonuc;
}

function getCategoryById(int $id){
    include "ayar.php";
    $quary="SELECT * from kategoriler WHERE id='$id' ";
    $sonuc= mysqli_query($baglanti,$quary);
    mysqli_close($baglanti);
    return $sonuc;
}

function editCategory($id,string $category){
    include "ayar.php";
    $quary ="UPDATE kategoriler SET kategori_adi='$category' WHERE id=$id";
    $sonuc=mysqli_query($baglanti,$quary);
    mysqli_close($baglanti);
    return $sonuc;
}
function deleteCategory(int $id){
    include "ayar.php";
    $quary="DELETE FROM kategoriler WHERE id='$id'";
    $sonuc=mysqli_query($baglanti,$quary);
    mysqli_close($baglanti);
    return $sonuc;
}

function createCategory(string $kategori){
include "ayar.php";

$quary = "INSERT  INTO kategoriler(kategori_adi) VALUES (?)";
$stmt =mysqli_prepare($baglanti,$quary);

mysqli_stmt_bind_param($stmt,'s',$kategori);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

return $stmt;

}




function getDb() {
    $myfile = fopen("db.json","r");
    $size = filesize("db.json");
    $data = json_decode(fread($myfile, $size), true);    
    fclose($myfile);
    return $data;
}

function kursEkle(string $baslik,string $altBaslik,string $resim,string $yayinTarihi,int $yorumSayisi=0,int $begeniSayisi=0, bool $onay=true) {
    $db = getDb();
    
    array_push($db["kurslar"], array(
        "baslik" => $baslik,
        "altBaslik" => $altBaslik,
        "resim" => $resim,
        "yayinTarihi" => $yayinTarihi,
        "yorumSayisi" => $yorumSayisi,
        "begeniSayisi" => $begeniSayisi,
        "onay" => $onay
    ));

    $myfile  = fopen("db.json","w");
    fwrite($myfile, json_encode($db, JSON_PRETTY_PRINT));
    fclose($myfile);
}

function urlDuzenle($baslik) {
    return str_replace([" ","ç","@","."],["-","c","","-"],strtolower($baslik));
}

function kisaAciklama($altBaslik) {
    if (strlen($altBaslik) > 50) {
        return substr($altBaslik,0,50)."..."; 
    } else {
        return $altBaslik;
    }
}

function safe_html($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data ;
}
?>