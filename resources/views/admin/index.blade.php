@extends('layouts.admin')

@section('content')
@include('admin.modals.create-feedback')
@include('admin.modals.edit-feedback')
<div class="container">
    <div class="d-flex justify-content-between mb-4 pr-4 pb-2 border-bottom">
        <h3>Заявки ({{ $feedbacks->total() }})</h3>
        <button class="btn btn-primary" 
            data-bs-toggle="modal" 
            data-bs-target="#create-feedback-modal"
        >
            Создать заявку
        </button>
    </div>
    @forelse($feedbacks as $feedback)
        <div class="row mb-2">
            <div class="col-lg-3">
                {{ $feedback->name }}
            </div>
            <div class="col-lg-4">
                <div>
                    {{ $feedback->email }}
                </div>
                {{ $feedback->phone }}
            </div>
            <div class="col-lg-3">
                {{ $feedback->created_at->format('d.m.Y, H:i') }}
            </div>
            <div class="col-lg-2 d-flex gap-1 align-items-start justify-content-end">
                <button 
                    class="btn btn-success edit-btn"
                    data-email="{{ $feedback->email }}"
                    data-phone="{{ $feedback->phone }}"
                    data-name="{{ $feedback->name }}"
                    data-id="{{ $feedback->id }}"
                    data-action="{{ route('admin.feedback.update', $feedback) }}"
                    data-bs-toggle="modal" 
                    data-bs-target="#edit-feedback-modal"
                >
                    Изменить
                </button>
                <form action="{{ route('admin.feedback.delete', $feedback) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
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
@endsection
@section('js')
<script>
    $('.edit-btn').on('click', function() {
        $('#edit-form').prop('action', $(this).data('action'));
        $('#edit-id').val($(this).data('id'));
        $('#edit-email').val($(this).data('email'));
        $('#edit-phone').val($(this).data('phone'));
        $('#edit-name').val($(this).data('name'));
        $('.edit-feedback-error').text('')
    });

    $('#store-form').on('submit', function(e) {
        e.preventDefault();
        $('.create-feedback-error').text('')
        let form = $(this);
        $.ajax({
            url: '/admin/feedback',
            type: 'POST',
            data: form.serialize()
        }).done(function(data) {
            window.location.reload();
        }).fail(function(resp) {
            if (resp.status == 422) {
                let errors = resp.responseJSON.errors
                $('#error-email').text(errors.email);
                $('#error-phone').text(errors.phone);
                $('#error-name').text(errors.name);
                $('.create-feedback-error').show();
            }
        });

    });

    $('#edit-form').on('submit', function(e) {
        e.preventDefault();
        $('.edit-feedback-error').text('')
        let form = $(this);
        $.ajax({
            url: '/admin/feedback/' + $('#edit-id').val(),
            type: 'PUT',
            data: form.serialize()
        }).done(function(data) {
            window.location.reload();
        }).fail(function(resp) {
            if (resp.status == 422) {
                let errors = resp.responseJSON.errors
                $('.edit-email-error').text(errors.email);
                $('.edit-phone-error').text(errors.phone);
                $('.edit-name-error').text(errors.name);
                $('.edit-feedback-error').show();
            }
        });

    });
</script>
@endsection