<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <form>
        <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
           <label for="exampleInputEmail1">Email или ник</label>
           <input type="email" placeholder="Ваш Email или ник" class="form-control" id="exampleInputEmail1" placehoaria-describedby="emailHelp">
          </div>
          <div class="form-group">
           <label for="exampleInputPassword1">Пароль</label>
           <input type="password" placeholder="Пароль" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group form-check">
           <input type="checkbox" class="form-check-input" id="exampleCheck1">
           <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
          </div>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" id="bibibu" data-dismiss="modal">Закрыть</button>
           <script>
            $("#bibibu").on('click',function(){
             $("#exampleInputEmail1").val("")
             $("#exampleInputPassword1").val("")
            });
           </script>
         <button type="submit" class="btn btn-primary">Войти</button>
        </div>
     </form>
    </div>
  </div>
</div>

