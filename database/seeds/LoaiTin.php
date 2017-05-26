<?php

use Illuminate\Database\Seeder;

class LoaiTin extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('LoaiTin')->insert([
    	['idTheLoai'=>'1','Ten' => 'Lịch Thi Đấu bóng đá','TenKhongDau' => 'lich-thi-dau-bong-da'],
    	['idTheLoai'=>'1','Ten' => 'Video Bàn Thắng','TenKhongDau' => 'video-ban-thang'],
    	['idTheLoai'=>'1','Ten' => 'Livescore','TenKhongDau' => 'livescore'],
    	['idTheLoai'=>'1','Ten' => 'Top Ghi Bàn','TenKhongDau' => 'top-ghi-ban'],
    	['idTheLoai'=>'2','Ten' => 'Điểm Nóng','TenKhongDau' => 'diem-nong'],
    	['idTheLoai'=>'2','Ten' => 'Quân Sự','TenKhongDau' => 'quan-su'],
    	['idTheLoai'=>'2','Ten' => 'Hồ Sơ','TenKhongDau' => 'ho-so'],
    	['idTheLoai'=>'2','Ten' => 'Thế Giới Động Vật','TenKhongDau' => 'the-gioi-dong-vat'],
    	['idTheLoai'=>'3','Ten' => 'Dế Sắp Ra Lò','TenKhongDau' => 'de-sap-ra-lo'],
    	['idTheLoai'=>'3','Ten' => 'Tin Tức Công Nghệ','TenKhongDau' => 'tin-tuc-cong-nghe'],
    	['idTheLoai'=>'3','Ten' => 'Mỹ Nữ Và Công Nghệ','TenKhongDau' => 'my-nu-va-cong-nghe'],
    	['idTheLoai'=>'3','Ten' => 'Laptop Giá Rẻ','TenKhongDau' => 'lap-top-gia-re'],
    	['idTheLoai'=>'3','Ten' => 'Điện Thoại Giá Rẻ','TenKhongDau' => 'dien-thoai-gia-re'],
    	['idTheLoai'=>'3','Ten' => 'Máy Nghe Nhạc','TenKhongDau' => 'may-nghe-nhac'],
    	['idTheLoai'=>'4','Ten' => 'Vụ Án Nổi Tiếng','TenKhongDau' => 'vu-an-noi-tieng'],
    	['idTheLoai'=>'4','Ten' => 'Kỳ Án Nổi Tiếng','TenKhongDau' => 'ki-an-noi-tieng'],
    	['idTheLoai'=>'4','Ten' => 'Trọng Án','TenKhongDau' => 'Am-Nhac'],
    	['idTheLoai'=>'4','Ten' => 'Tệ Nạn Xã Hội','TenKhongDau' => 'te-nan-xa-hoi'],
    	['idTheLoai'=>'4','Ten' => 'Cảnh Giác','TenKhongDau' => 'canh-giac'],
    	['idTheLoai'=>'4','Ten' => 'Phóng Sự','TenKhongDau' => 'phong-su'],
    	['idTheLoai'=>'6','Ten' => 'Món Ngon Mỗi Ngày','TenKhongDau' => 'mon-ngon-moi-ngay'],
    	['idTheLoai'=>'6','Ten' => 'Nấu Ăn Ngon','TenKhongDau' => 'nau-an-ngon'],
    	['idTheLoai'=>'6','Ten' => 'Đặc Sản 3 miền','TenKhongDau' => 'dac-san-3-mien'],
    	['idTheLoai'=>'6','Ten' => 'Tin Tức Ẩm Thực','TenKhongDau' => 'tin-tuc-am-thuc'],
    	['idTheLoai'=>'6','Ten' => 'Đặt Ăn Tại Nhà','TenKhongDau' => 'dat-an-tai-nha']
  	]);
  }
}
