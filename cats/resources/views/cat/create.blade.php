@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Создать</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" enctype="multipart/form-data">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupName">Имя</label>
                            <input type="text" name="name" class="form-control" id="inputGroupName" required>
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupEmail">Email</label>
                            <input type="email" name="email" class="form-control" id="inputGroupEmail" required>
                        </div>

                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image[]" id="inputGroupFile" multiple="multiple" required>
                        </div>

                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection