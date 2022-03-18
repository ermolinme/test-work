<!-- Modal -->
<div class="modal fade" id="create-feedback-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Новая заявка</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.feedback.store') }}" method="post" id="store-form">
            <div class="modal-body">
                @csrf
                <label>Email:</label>
                <input type="email" name="email" class="form-control mb-1" equired>
                <div class="invalid-feedback create-feedback-error" id="error-email"></div>
            
                <label>Телефон:</label>
                <input type="text" name="phone" class="form-control mb-1" required>
                <div class="invalid-feedback create-feedback-error" id="error-phone"></div>
                <label>Имя:</label>
                <input type="text" name="name" class="form-control mb-1" required>
                <div class="invalid-feedback create-feedback-error" id="error-name"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-primary" id="store-btn">Создать</button>
            </div>
        </form>
      </div>
    </div>
  </div>