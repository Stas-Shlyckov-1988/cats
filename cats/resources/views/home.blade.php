@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Котики</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped-columns">
                    <thead class="table-dark">
                     <tr>
                        <th>Имя</th>
                        <th>Почта</th>
                    </tr>
                    </thead>
                    @foreach ($cats as $cat)
                        <tr>
                            <td><a href="#">{{ $cat->name }}</a></td>
                            <td><a href="#">{{ $cat->email }}</a></td>
                        </tr>
                    @endforeach
                    </table>
                    <a href="/cat/create" class="btn btn-dark">Создать</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
