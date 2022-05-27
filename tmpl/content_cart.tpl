
  <div class="modal-content">

   <div class="modal-header">

    <p class="h3">סל קניות</p>
    <button class="btn btn-dark link-hovered" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

   </div>
  <form name="cart" action="<?=$this->action?>" method="post">
    <div class="modal-body">

	 <div class="container-fluid">
     <div class="row">

	  <div class="col-3 pb-2">
	   <p class="text-right h5">מוצר</p>
	  </div>
	  <div class="col-3 pb-2">
	   <p class="text-right h5">כמות</p>
	  </div>
      <div class="col-3 pb-2">
	  </div>
	  <div class="col-3 pb-2">
	   <p class="text-right h5">מחיר</p>
	  </div>
  <?php for ($i = 0; $i < count($this->cart); $i++) { ?>
	  <div class="col-3 mt-1">
	    <p class="text-right"><?=$this->cart[$i]["title"]?></p>
	  </div>
	  <div class="col-3 mt-1">
	   <div class="form-group">
      <form method="post" action="<?=$this->cart[$i]["count"]?>">
        <select class="form-control">
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <input type="submit"/>
        </select>
      </form>
     </div>
	  </div>
      <div class="col-3 mt-1">
	  </div>
	  <div class="col-3 mt-1">
	    <p class="text-right">₪<?=$this->cart[$i]["summa"]?></p>
	  </div>
  <?php } ?>
	  

      <div class="col-3">
      </div>
      <div class="col-9">
        <p class="text-center h4 mt-2">ס״ה: ₪<?=$this->cart_summa?></p>
      </div>

     </div>
	 </div>

    </div>
   </form>
	 <div class="modal-footer justify-content-center">

	  <a href="<?=$this->link_order?>" class="fa btn btn-dark link-hovered">המשך</a>

	 </div>

  </div>

