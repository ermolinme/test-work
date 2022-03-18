@extends('layouts.app')
@section('css')
<style>
    
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 main-container">
            <h3>Новая заявка</h3>
            <form action="{{ route('feedback.store') }}" method="post">
                @csrf
                <label>Email:</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror mb-2" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label>Телефон:</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror mb-2" value="{{ old('phone') }}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label>Имя:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror mb-2" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="d-flex justify-content-end py-2">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
            <hr>
            <h3>Заявки</h3>
            <div class="p-2">
                @if($feedbacks->isNotEmpty())
                    <div class="row fw-bold border-bottom pb-2 mb-2">
                        <div class="col-lg-3">
                            Имя
                        </div>
                        <div class="col-lg-6">
                            Данные
                        </div>
                        <div class="col-lg-3">
                            Дата
                        </div>
                    </div>
                @endif
                @forelse($feedbacks as $feedback)
                    <div class="row border-bottom py-1">
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
                <div class="d-flex justify-content-center mt-4 overflow-auto">
                    {{ $feedbacks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
