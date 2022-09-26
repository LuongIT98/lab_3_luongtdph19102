<?php
interface PhepTinh
{
    function phepCong();
    function phepTru();
    function phepNhan();
    function phepChia();
}

class TinhToan implements PhepTinh
{
    private $a;
    private $b;
    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        switch ($c) {
            case '+':
                echo 'Phép cộng: ' . $this->phepCong();
                break;
            case '-':
                echo 'Phép trừ: ' . $this->phepTru();
                break;
            case 'x':
                echo 'Phép nhân: ' . $this->phepNhan();
                break;
            case ':':
                echo 'Phép chia: ' . $this->phepChia();
                break;
            default:
                echo 'Không tồn tại phép tính: " ' . $c . ' "';
                break;
        }
    }
    public function phepCong()
    {
        return $this->a + $this->b;
    }
    public function phepTru()
    {
        return $this->a - $this->b;
    }
    public function phepNhan()
    {
        return $this->a * $this->b;
    }
    public function phepChia()
    {
        return $this->a / $this->b;
    }
}

$tinhtoan1 = new TinhToan(2, 3, '+');
echo "<br>";
$tinhtoan2 = new TinhToan(2, 3, '-');
echo "<br>";
$tinhtoan3 = new TinhToan(2, 3, 'x');
echo "<br>";
$tinhtoan4 = new TinhToan(2, 3, ':');
echo "<br>";
$tinhtoan5 = new TinhToan(2, 3, 's');
