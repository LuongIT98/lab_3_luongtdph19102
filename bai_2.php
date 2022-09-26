<?php

// em hiểu đề là vận động viên có n huy chương, chương này check xem vận động viên gian lận điều kiện môn thi đấu nào thì trừ đi số huy chương đã gian lận
// sau khi nhập vào tên môn thi đấu và số huy chương tương ứng thì check, nếu ko thỏa mãn sẽ trừ đi huy chương, vẫn giữ lại môn đã thi đấu
class ConNguoi
{
    protected $ten;
    protected $tuoi;
    protected $gioi_tinh;
    protected $ngay_sinh;
    protected $can_nang;
    protected $chieu_cao;

    // public function __construct($ten, $tuoi, $gioi_tinh, $ngay_sinh, $can_nang, $chieu_cao)
    // {
    //     $this->ten = $ten;
    //     $this->tuoi = $tuoi;
    //     $this->gioi_tinh = $gioi_tinh;
    //     $this->ngay_sinh = $ngay_sinh;
    //     $this->can_nang = $can_nang;
    //     $this->chieu_cao = $chieu_cao;
    // }
}

class MonThiDau
{
    public $ten;
    public $dieu_kien_chieu_cao;
    public $dieu_kien_can_nang;

    public function __construct($ten, $dieu_kien_chieu_cao, $dieu_kien_can_nang)
    {
        $this->ten = $ten;
        $this->dieu_kien_chieu_cao = $dieu_kien_chieu_cao;
        $this->dieu_kien_can_nang = $dieu_kien_can_nang;
    }
}

class VanDongVien extends ConNguoi
{
    private $so_huy_chuong;
    private $cac_mon_da_thi_dau;
    private $cac_mon_gian_lan = [];

    public function __construct($ten, $tuoi, $gioi_tinh, $ngay_sinh, $can_nang, $chieu_cao, $so_huy_chuong, $cac_mon_da_thi_dau)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->gioi_tinh = $gioi_tinh;
        $this->ngay_sinh = $ngay_sinh;
        $this->can_nang = $can_nang;
        $this->chieu_cao = $chieu_cao;
        $this->so_huy_chuong = $so_huy_chuong;
        $this->cac_mon_da_thi_dau = $cac_mon_da_thi_dau;
    }

    private  function hienThiThongTin()
    {
        echo "<br><br><br>Vận động viên: " . $this->ten . "<br>";
        echo $this->tuoi . " tuổi<br>";
        echo "Giới tính: " . $this->gioi_tinh;
        echo "<br>Ngày sinh: " . $this->ngay_sinh;
        echo "<br>Cân nặng: " . $this->can_nang;
        echo "<br>Chiều cao: " . $this->chieu_cao;
        echo "<br>Số huy chương: " . $this->so_huy_chuong;
        echo "<br>Các môn thi đấu: ";
        foreach ($this->cac_mon_da_thi_dau as $val) {
            echo "_" . $val . "_";
        }
        echo "<br>Các môn gian lận: ";
        if(count($this->cac_mon_gian_lan)>0){
            foreach ($this->cac_mon_gian_lan as $value) {
                echo "_" . $value . "_";
            }
        }
    }

    public function thiDau($mon_thi_dau, $so_huy_chuong_mon_thi_dau)
    {
        if ($this->so_huy_chuong <= 0) {
            $this->hienThiThongTin();
            echo "<br>Vận động viên này có huy chương nào đâu mà check";
        } else {
            if ($this->chieu_cao < $mon_thi_dau->dieu_kien_chieu_cao || $this->can_nang < $mon_thi_dau->dieu_kien_can_nang) {
                $this->so_huy_chuong -= $so_huy_chuong_mon_thi_dau;
                if ($this->so_huy_chuong < 0) {
                    $this->so_huy_chuong = 0;
                }
                $this->cac_mon_gian_lan[]= $mon_thi_dau->ten;
                $this->hienThiThongTin();
                echo "<br>Vận động viên này đã gian lận môn thi đấu đang check là: " . $mon_thi_dau->ten;
                echo "<br>Vận động viên này đã bị trừ: $so_huy_chuong_mon_thi_dau huân chương";
            } else {
                $this->hienThiThongTin();
                echo "<br>Vận động viên không gian lận môn thi đấu đang check là: " . $mon_thi_dau->ten;
            }
        }
    }
}


$mon_thi_dau_1 = new MonThiDau("Bóng chuyền", 170, 60);
$mon_thi_dau_2 = new MonThiDau("Bóng chày", 155, 70);
$mon_thi_dau_3 = new MonThiDau("Bơi", 160, 50);
$mon_thi_dau_4 = new MonThiDau("Nhảy", 180, 50);

$van_dong_vien_1 = new VanDongVien("Vận động viên 1", 16, 1, "12/20/1020", 70, 160, 5, ["Bóng chuyền", "Bóng chày"]);

$van_dong_vien_1->thiDau($mon_thi_dau_1, 1);
// $van_dong_vien_1->thiDau($mon_thi_dau_2, 2);
// $van_dong_vien_1->thiDau($mon_thi_dau_3, 1);
// $van_dong_vien_1->thiDau($mon_thi_dau_4, 5);
