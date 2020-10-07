<table>
    <tr>
        <td>id</td>
        <td>名字</td>
        <td>年龄</td>
        <td>手机号</td>
        <td>操作</td>
    </tr>
    @foreach($res as $v)
    <tr>
        <td>{{$v->user_id}}</td>
        <td>{{$v->user_name}}</td>
        <td>{{$v->user_age}}</td>
        <td>{{$v->user_tel}}</td>
        <td>
            <a href="{{url('delete/'.$v->user_id)}}">删除</a>
            <a href="{{url('edit/'.$v->user_id)}}">编辑</a>
        </td>
    </tr>
    @endforeach
</table>