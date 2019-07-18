<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Employees</h1>
    <ul>
    @foreach($employees as $employee)
        <li>{{$employee['name']}} - {{$employee['company_name']}}</li>
    @endforeach
    </ul>

    <form method="POST" action="/employees">
        {{csrf_field()}}
        <label for="">Name: </label><input type="text" name="name">
        <select name="company_id" id="">
            @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
        <button type="submit">Add employee</button>
    </form>
</body>
</html>