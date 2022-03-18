<!-- Modal -->
<div class="modal fade" id="edit-feedback-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Изменить заявку</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post" id="edit-form">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit-id"> 
                <label>Email:</label>
                <input type="email" name="email" id="edit-email" class="form-control mb-1" required>
                <div class="invalid-feedback edit-feedback-error edit-email-error"></div>
                <label>Телефон:</label>
                <input type="text" name="phone" id="edit-phone" class="form-control mb-1" required>
                <div class="invalid-feedback edit-feedback-error edit-phone-error"></div>
                <label>Имя:</label>
                <input type="text" name="name" id="edit-name"  class="form-control mb-1" required>
                <div class="invalid-feedback edit-feedback-error edit-name-error"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
      </div>
    </div>
  </div>