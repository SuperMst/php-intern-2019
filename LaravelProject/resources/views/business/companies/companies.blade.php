<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row py-4">
            <div class="col-10">
                <h4>Companies</h4>
            </div>
            <div class="col-2">
                <form action="{{url('companies/create')}}">
                    <button type="submit" class="btn btn-success">Add Company</button>
                </form>
            </div>
        </div>
        <div class="row">
            <table class="table table-stripped table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Company Description</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <th>{{$company->id}}</th>
                                <td>{{$company->name}}</td>
                                <td>{{$company->description}}</td>
                                <td>{{$company->created_at}}</td>
                                <td>{{$company->updated_at}}</td>
                                <td>  
                                    <form action="{{url('companies/' . $company->id . '/edit')}}" method="GET">
                                        <input class="btn btn-warning" type="submit" value="Update" />
                                    </form>
                                </td>
                                <td>
                                    <form action="{{url('companies', [$company->id])}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="Delete"/>
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>