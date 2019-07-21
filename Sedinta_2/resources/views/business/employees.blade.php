<h1>Employees</h1>

<ul>
    @foreach($employees as $employee)
        <li>{{$employee['name']}} - {{$employee['company_name']}}</li>
    @endforeach
</ul>

<form method="POST" action="/employees">
        {{csrf_field()}}
        <label>Name</label>
        <input name="name" type="text">

        <label>Company ID</label>
        <select name="company_id">
                @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
        </select>

        <button type="submit">Add employee</button>
</form>