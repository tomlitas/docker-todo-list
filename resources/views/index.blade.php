<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">TO DO Mano</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('store') }}" class="mt-3">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input name="name" value="" type="text" class="form-control" placeholder="Task">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input name="check" type="hidden" value="0">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">ADD</button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Task</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $todo)
                                    <tr>
                                        <td>
                                            <form action="{{ route('update') }}" method="POST">
                                                @csrf
                                                <input type="checkbox" {{ $todo->check == 1 ? ' checked' : '' }}
                                                    onChange="this.form.submit()">
                                                <input name="id" type="hidden" value="{{ $todo->id }}">

                                            </form>
                                        </td>
                                        <td>{{ $todo->name }}</td>
                                        <td>
                                            <form action="{{ route('delete', $todo->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
