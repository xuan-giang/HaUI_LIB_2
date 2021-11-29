<!DOCTYPE html>
<html>
<head>
    <title>
        Xuất phiếu
    </title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 13px;
        }

        #customers1 {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        #customers2 {
            font-family: Arial, Helvetica, sans-serif;
            border: none;
            width: 100%;
            text-align: left;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>


<table id="customers">
    <tr>
        <td>
            <h3 style="text-transform: uppercase">Trung tâm thông tin thư viện</h3>
            <h4>Trường Đại Học Công Nghiệp Hà Nội</h4>
            <p style="font-size: 10px">Điện thoại   : +84 243 765 5121</p>
            <p style="font-size: 10px">Email        : dhcnhn@haui.edu.vn</p>
        </td>
        <td>
            <h2>PHIẾU MƯỢN SÁCH</h2>
            <p>Mã phiếu: {{ $borrow['id'] }}</p>
        </td>
    </tr>


</table>
@php
    $user = DB::table('users')->where('id',Auth::user()->id)->first();

@endphp

<table id="customers2" style="margin-top: 3%">
    <tr>
        <td width="10%"><b>Sinh viên:</b></td>
        <td width="65%">{{ $reader['name'] }}</td>
    </tr>
    <tr>
        <td width="10%"><b>Mã sinh viên:</b></td>
        <td width="65%">{{ $reader['student_code'] }}</td>
    </tr>
    <tr>
        <td width="10%"><b>Lớp:</b></td>
        <td width="65%">{{ $class['name'] }} - {{ $class['name_school_year'] }}</td>
    </tr>
</table>

<table id="customers" style="margin-top: 3%">
    <tr>
        <th width="12%">#ID</th>
        <th width="40%">Tên sách</th>
        <th width="30%">Ngày đến hạn</th>
        <th width="20%">Giá niêm yết</th>
    </tr>
    <tr>
        <td>{{ $borrow['id'] }}</td>
        <td>Student Name</td>
        <td>Student Name</td>
        <td></td>
    </tr>
    <tr>
        <td width="80%" colspan="3"><b>Tổng tiền cọc:</b></td>
        <td width="20%" colspan="1"></td>
    </tr>
</table>
<table>
    <tr>
        <td width="10%"><i><b>Ghi chú:</b></i></td>
        <td width="65%"><i>{{ $borrow['note'] }}</i></td>
    </tr>
</table>
<table id="customers1" style="margin-top: 5%;" cellspacing="0" cellpadding="0">
    <tr style="height: 35%">
        <td>

            <h4>Thủ thư</h4>
            <i style="font-size: 9px">(Ký và ghi rõ họ tên)</i>
        </td>
        <td>
            <h4>Người mượn</h4>
            <i style="font-size: 9px">(Ký và ghi rõ họ tên)</i>
        </td>
    </tr>

</table>

<table id="customers1" style="margin-top: 10%;">
    <tr>
        <td>
            <p style="font-size: 12px; font-weight: bold; margin-top: 20px; text-align: center">{{ $user->name }}</p>
        </td>
        <td>
            <p style="font-size: 12px; font-weight: bold; margin-top: 20px; text-align: center">{{ $reader['name'] }}</p>
        </td>
    </tr>
</table>
<br> <br>
<i style="font-size: 10px; float: right;">Xuất phiếu ngày : {{ date("d/m/Y") }} - Thư viện Trường Đại Học Công Nghiệp Hà Nội</i>

</body>
</html>
