<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/user/store')}}" method="post">
    @csrf
        <table>
            <tr>
                <td>姓名</td>
                <td>
                    <input type="text" name="user_name" id="">
                </td>
            </tr>
            <tr>
                <td>年龄</td>
                <td>
                    <input type="text" name="user_age" id="">
                </td>
            </tr>
            <tr>
                <td>手机号</td>
                <td>
                    <input type="text" name="user_tel" id="">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="添加"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>