<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('admin/insert')}}" method="post">
    @csrf
        <table>
            <tr>
                <td>用户名</td>
                <td>
                    <input type="text" name="user_name" id="">
                </td>
            </tr>
            <tr>
                <td>邮箱名</td>
                <td>
                    <input type="text" name="email" id="">
                </td>
            </tr>
            <tr>
                <td>密码</td>
                <td>
                    <input type="password" name="password" id="">
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