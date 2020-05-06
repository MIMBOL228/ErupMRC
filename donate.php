<script src="https://api.trademc.org/trademcapi.js"></script>
<div class="modal fade" id="yalta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Купить Привилегии</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <style>
      .trademc-buyform-button {
        background: #54a5f9;
      }
      </style>
      <div style="z-index: 5;" class="modal-body" id="Haker">
      </div>
    </div>
  </div>
</div>
<script>
TrademcAPI.GetBuyForm({
    "Shop":"<?php echo $tmc['id'];?>",
    "Title":"",
    "Nickname":"Введите ваш никнейм",
    "Item":"Выберите товар",
    "Coupon":"Введите купон, если есть",
    "Button":"Продолжить",
    "Success_URL":"https://trademc.org",
    "Pending_URL":"https://trademc.org",
    "Fail_URL":"https://trademc.org",
    "PastPlaceID":"Haker"});</script>