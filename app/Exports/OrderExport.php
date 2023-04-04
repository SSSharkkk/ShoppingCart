<?php

namespace App\Exports;

use App\Models\order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{  
    public $order_coder;

    public function __construct(int $id) {
    	$this->order_coder = $id;
    }
    public function collection()
    {
        return order::where('order_coder',$this->order_coder)->get();
    }
    //Thêm hàng tiêu đề cho bảng
    public function headings() :array {
    	return ['STT', 'id_sanpham', 'id_nguoidung', 'id_khohang','order_coder','Số lượng','tên người đặt','email','phone','address','note'];
    }
}
