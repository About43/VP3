@extends('layouts.app')

@section('content')
    <div class="content-middle">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Пользователь</th>
                <th>Дата создания</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->total }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
