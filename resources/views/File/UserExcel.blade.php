<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<table>
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>登録日</th>
                <th>名前</th>
                <th>フリガナ</th>
                <th>生年月日</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>パスワード</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    詳細
                </td>
                <td>
                    編集
                </td>
                <td>{{ substr($user->created_at,0,10)}}日</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->Furigana }}</td>
                <td>{{ $user->year }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->email }}</td>
                <td>××××××××</td>
            </tr>
            @endforeach
    </tbody>
</table>
</body>
</html>