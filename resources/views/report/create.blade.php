<?php

$dsn = 'sqlsrv:server=localhost;database=kikuchie';
$user = 'sa';
$password = 'Sapassword1';

$dbh = new PDO($dsn, $user, $password);
$sql = 'SELECT * FROM employees WHERE state = 0';
$str = "";

foreach ($dbh->query($sql) as $row) {
    $str .= "<option value='" . $row['id'];
    $str .= "'>" . $row['employee_name'] . "</option>";
}
$dbh = null;

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE+edge">
    <meta name="viewport" content="width=device-width, Initial-scale=1.0">
    <title>新規作成</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="mx-auto" style="width:400px;">

            <h1>新規作成</h1>
            <p><a href="{{ route('report.index')}}" class="text-decoration-none">一覧画面</a></p>

            <form action="{{ route('report.store')}}" method="POST">
                @csrf
                <input type="hidden" name="state" value="0"  >

                <p>
                    <label for="work_date">日付</label>
                    <input type="date" name="work_date" value="{{old('work_date')}}" class="form-control" id="work_date">
                </p>
                <p>
                    <label for="author_id">作成者</label>
                    <select class="form-select" name="author_id" value="{{old('author_id')}}" id="author_id">
                        <?php echo $str; ?>
                    </select>
                </p>
                <p>
                    <label for="content">内容</label>
                    <input type="text" name="content" value="{{old('content')}}" class="form-control" id="content">
                </p>
                <p>
                    <label for="work_time">作業時間</label>
                    <input type="number" min="0" max="24" name="work_time" value="{{old('work_time')}}" class="form-control" id="work_time">
                </p>
                <div class="button">
                    <input type="submit" value="登録する" class="btn btn-primary btn-lg">
                </div>
            </form>
        </div>
    </div>
</body>

</html>