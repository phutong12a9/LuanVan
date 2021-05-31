{{-- This is used to send email to student also  --}}

<div style="width:623px; margin:0 auto; border: cadetblue solid thin">
    <div style="width:623px; margin:0 auto;">
        <a href="{{route('trang-chu')}}"><img height="100" width="623" src="https://trungtamnnth.ctuet.edu.vn/wp-content/uploads/2020/09/cropped-b3be343290f56fab36e4.jpg" alt="Trung tâm ngoại ngữ tin học CTUT"/></a>
    </div>


    <div style="margin: 30px">
        <h2 style="text-align: center; font-family: Arial">TRUNG TÂM NGOẠI NGỮ TIN HỌC CTUT</h2>
        <p style="font-family: Arial; font-size:12px; text-align: justify">Gửi {{ $data['HoTenHV'] }},</p>
        <p style="font-family: Arial; font-size:12px; text-align: justify">Cảm ơn bạn đã đăng ký khóa học.</p>


        <h3 style="font-family: Arial; color: grey">Chi tiết khóa học của bạn</h3>
        <hr/>
        <table style="font-family: Arial; font-size: 12px">

        	<tr>
                <td style="font-family: Arial; font-size:12px; font-weight: bold">Khóa:</td>
                <td><strong>{{ $data['Khoa'] }}</strong></td>
            </tr>
            <tr>
                <td style="font-family: Arial; font-size:12px; font-weight: bold">Lớp:</td>
                <td><strong>{{ $data['Lop'] }}</strong></td>
            </tr>
            <tr>
                <td style="font-family: Arial; font-size:12px; font-weight: bold">Khai Giảng:</td>
                <td>{{date('d/m/Y', strtotime($data['KhaiGiang']))}}</td>
            </tr>
            <tr>
                <td style="font-family: Arial; font-size:12px; font-weight: bold;">Học phí:</td>
                <td style="color: red">{{number_format( $data['HocPhi'])}} VND</td>
            </tr>
            <tr>
                <td style="font-family: Arial; font-size:12px; font-weight: bold">Họ tên:</td>
                <td>{{ $data['HoTenHV'] }}</td>
            </tr>


            <tr>
                <td style="font-family: Arial; font-size:12px; font-weight: bold">SĐT:</td>
                <td>{{ $data['SDT'] }}</td>
            </tr>

            <tr>
                <td style="font-family: Arial; font-size:12px; font-weight: bold">Địa chỉ:</td>
                <td>{{ $data['NoiSinh'] }}</td>
            </tr>

            <tr>
                <td style="font-family: Arial; font-size:12px; font-weight: bold">Email:</td>
                <td>{{ $data['Email'] }}</td>
            </tr>
            
        </table>
        <hr>
        <p style="font-family: Arial; font-size:12px; text-align: justify">
           Sau khi nhận được thanh toán, chúng tôi sẽ xác nhận đăng ký và gửi hóa đơn đến địa chỉ email được chỉ định của bạn.
            <br>Cảm ơn.

        </p>

        <div style="width:570px">
          <img style="width: 570px;"src="https://trungtamnnth.ctuet.edu.vn/wp-content/uploads/2020/05/d71f9c4d5aaba0f5f9ba-300x199.jpg" alt="Trung tâm ngoại ngữ tin học CTUT"/>
        </div>

        <p style="font-family: Arial; font-size:11px; color: grey">
            Trung tâm ngoại ngữ tin học CTUT<br>
           	Số 256, Nguyễn Văn Cừ, Phường An Hòa, Quận Ninh Kiều, Thành phố Cần Thơ.<br>
            Điện thoại: 02923.890.698.<br>
            Email: trungtamnnth@ctuet.edu.vn.<br>
        </p>
    </div>
</div>
