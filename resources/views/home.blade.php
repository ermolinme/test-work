@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Оставьте заявку</h2>
            <form action="{{ route('feedback.store') }}" method="post">
                @csrf
                <label>Email:</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror mb-1" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label>Телефон:</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror mb-1" value="{{ old('phone') }}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label>Имя:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror mb-1" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="d-flex justify-content-end py-2">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
            <h3>Заявки</h3>
            @forelse($feedbacks as $feedback)
                <div class="row">
                    <div class="col-lg-3">
                        {{ $feedback->name }}
                    </div>
                    <div class="col-lg-6">
                        <div>
                            {{ $feedback->email }}
                        </div>
                        {{ $feedback->phone }}
                    </div>
                    <div class="col-lg-3">
                        {{ $feedback->created_at->format('d.m.Y, H:i') }}
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col-lg-12 p-4 text-center muted">
                        Заявок нет
                    </div>
                </div>
            @endforelse
            <div class="d-flex justify-content-center p-4">
                {{ $feedbacks->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
