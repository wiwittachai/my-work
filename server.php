<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ตรวจสอบและดึงข้อมูลสถานะของเตียงแต่ละตัว
    $status_bed1 = isset($_POST["bed1"]) ? filter_var($_POST["bed1"], FILTER_VALIDATE_BOOLEAN) : null;
    $status_bed2 = isset($_POST["bed2"]) ? filter_var($_POST["bed2"], FILTER_VALIDATE_BOOLEAN) : null;
    $status_bed3 = isset($_POST["bed3"]) ? filter_var($_POST["bed3"], FILTER_VALIDATE_BOOLEAN) : null;
    
    // โหลดข้อมูลสถานะจากไฟล์ JSON
    $data = json_decode(file_get_contents("status.json"), true);
    
    // อัปเดตสถานะตามที่ได้รับ
    if (!is_null($status_bed1)) {
        $data["bed1"] = $status_bed1;
    }
    if (!is_null($status_bed2)) {
        $data["bed2"] = $status_bed2;
    }
    if (!is_null($status_bed3)) {
        $data["bed3"] = $status_bed3;
    }
    
    // เขียนข้อมูลใหม่ไปยังไฟล์ JSON
    file_put_contents("status.json", json_encode($data));
    
    echo "อัปเดตสำเร็จ";
}
?>
