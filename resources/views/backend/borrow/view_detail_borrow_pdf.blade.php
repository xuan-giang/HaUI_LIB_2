<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
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
</head>
<body>


<table id="customers">
    <tr>
        <td>
            <h3 style="text-transform: uppercase">Trung tâm thông tin thư viện</h3>
            <h5>Trường Đại Học Công Nghiệp Hà Nội</h5>
            <p style="font-size: 8px">Phone : 02113111222</p>
            <p style="font-size: 8px">Email : contact@haui.com</p>
        </td>
        <td>
            <h2>PHIẾU MƯỢN SÁCH</h2>
            <p>Sinh viên: </p>
            <p>Lớp: </p>
        </td>
    </tr>


</table>


<table id="customers" style="margin-top: 3%">
    <tr>
        <th width="10%">Sl</th>
        <th width="45%">Student Details</th>
        <th width="45%">Student Data</th>
    </tr>
    <tr>
        <td>1</td>
        <td><b>Student Name</b></td>
        <td>{{ $borrow['id'] }}</td>
    </tr>

</table>

<table id="customers" style="margin-top: 5%;" >
    <tr style="height: 35%">
        <td>

            <h5>Thủ thư</h5>
            <p style="font-size: 8px">(Ký và ghi rõ họ tên)</p>
        </td>
        <td>
            <h5>Người mượn</h5>
            <p style="font-size: 8px">(Ký và ghi rõ họ tên)</p>
        </td>
    </tr>


</table>
<br> <br>
<i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>
