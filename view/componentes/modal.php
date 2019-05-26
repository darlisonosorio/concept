<?php if ($modalTitle != NULL) { ?>
<div id="myModal" class="modal fade bounce-top" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h3 class="modal-titulo w-100 text-center"><?php echo $modalTitle ?></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <?php echo $modalMessage ?>
        <br/><br/>
      </div>
    </div>
  </div>
</div>
<?php } ?>