<div class="container-fluid bgimage">
 <div class="row">
  <?php
  		for ($i = 0; $i < count($this->products); $i++) { ?>
  <div class="col-6 col-md-4 col-lg-3 my-5">

   <a class="text-dark" href="<?=$this->products[$i]["link"]?>">
    <div class="text-center"><img class="brdr img-fluid" src="<?=$this->products[$i]["img"]?>" alt="<?=$this->products[$i]["title"]?>"></div>
	 <p class="h5 text-center text-black card-height mt-3"><?=$this->products[$i]["title"]?></p>
   </a>
    <hr>
	 <p class="h5 text-center mt-3">₪<?=$this->products[$i]["price"]?></p>
	  <a href="<?=$this->products[$i]["link_cart"]?>"><div class="text-center"><button class="btn btn-dark" data-toggle="modal" data-target="#modal2"><i class="fas fa-shopping-basket link-hovered"> הוספה לסל</i></button></div></a>

  </div>
  <?php } ?>

 </div>
</div>

<hr class="border border-dark">
