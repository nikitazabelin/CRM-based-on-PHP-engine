<!DOCTYPE html>
<html dir="rtl" lang="he">
<head>
<title><?=$this->title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?=$this->meta_desc?>" />
<meta name="keywords" content="<?=$this->meta_key?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--[if IE 8]>
		<link rel="stylesheet" href="styles/ie8.css" type="text/css" />
<![endif]-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/myCSS.css">
</head>
<body>
<!-- basket window -->

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-dialog" role="document">
  <div class="modal-content">

	<h2>רישום הזמנה</h2>
	<?php include "message.tpl"; ?>
	<form name="order" action="<?=$this->action?>" method="post">
		<table>
			<tr>
				<td class="w120">שם מלא:</td>
				<td>
					<input type="text" name="name" value="<?=$this->name?>" />
				</td>
			</tr>
			<tr>
				<td>:טלפון</td>
				<td>
					<input type="text" name="phone" value="<?=$this->phone?>" />
				</td>
			</tr>
			<tr>
				<td>שם מלא:</td>
				<td>
					<input type="text" name="email" value="<?=$this->email?>" />
				</td>
			</tr>
			<tr>
				<td>משלוח:</td>
				<td>
					<select name="delivery" onchange="changeDelivery(this)">
						<option value="">בחר אפשרות</option>
						<option value="0" <?php if ($this->delivery == "0") { ?>selected="selected"<?php }?>>משלוח</option>
						<option value="1" <?php if ($this->delivery == "1") { ?>selected="selected"<?php }?>>איסוף עצמי</option>
					</select>
				</td>
			</tr>
		</table>
		<table>
			<tr id="address">
				<td>
					<p>כתובת מלא:</p>
					<textarea name="address" cols="80" rows="6"><?=$this->address?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<p>הערות להזמנה:</p>
					<textarea name="notice" cols="80" rows="6"><?=$this->notice?></textarea>
				</td>
			</tr>
			<tr>
				<td class="button">
					<input type="hidden" name="func" value="order" />
					<input type="image" src="images/order_end.png" alt="לסיים הזמנה" onmouseover="this.src='images/order_end_active.png'" onmouseout="this.src='images/order_end.png'" />
				</td>
			</tr>
		</table>
	</form>




  




   </div>
</div>

 </div>
</div>

<!-- adding to basket window -->

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">

    <p class="h3">סל קניות</p>
    <button class="btn btn-dark link-hovered" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

   </div>

    <div class="modal-body">

	 <div class="container-fluid">
     <div class="row">

	  <div class="col-12">
	   <p class="text-right">מוצר מומלץ</p>
	  </div>
	  <div class="col-12">
	   <p class="text-right h5">מחיר: ₪100</p>
	  </div>
	  <div class="col-12">
	   <div class="form-group mt-3">
	    <p class="text-right txt">בחר כמות</p>
        <select class="form-control">
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
        </select>
       </div>
	  </div>

     </div>
	 </div>

    </div>

	 <div class="modal-footer justify-content-center">
		<a href="#" class="fa btn btn-dark link-hovered">המשך</a>
	 </div>

  </div>
 </div>
</div>

<!-- header and navbar -->

<div class="sticky-top bg-white header-sm">

 <div class="container-fluid">
  <div class="row">

   <div class="col-3 d-flex justify-content-start align-items-start mt-3">

    <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <i class="fas fa-bars h3"></i>
    </button>

    <div class="input-group input-group-lg searchbox-md mt-3">
     <input type="text" class="form-control" placeholder="חפש כאן.." aria-label="Username" aria-describedby="basic-addon1">
    </div>

   </div>

   <div class="col-6 d-flex justify-content-center mt-3">

    <a href="<?=$this->index?>"><img class="img-fluid" src="../images/logo.png" alt="logo"></a>

   </div>

   <div class="col-3 d-flex justify-content-center mb-2 mt-md-3">

	<button class="btn btn-white" data-toggle="modal" data-target="#modal1"><span class="badge badge-pill badge-dark align-top mumlazim"><?=$this->cart_count?></span><i class="fas fa-shopping-basket hvr h3"></i></button>

   </div>

   <div class="col-12 d-flex justify-content-center">

    <div class="input-group input-group-lg w-50 mt-3 searchbox-sm">
     <input type="text" class="form-control" placeholder="חפש כאן.." aria-label="Username" aria-describedby="basic-addon1">
    </div>

   </div>

   <div class="col-12">

    <nav class="navbar mt-3">

     <div class="collapse navbar-collapse navbar1" id="navbarSupportedContent">

      <ul class="navbar-nav d-flex justify-content-center flex-row flex-wrap h5">

       <li class="nav-item active dropdown mx-3 mx-md-5">
        <a class="nav-link" href="#" id="mivzaim" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">מבצעים</a>
         <div class="dropdown-menu dropdown-menu-right" id="menu" aria-labelledby="navbarDropdown1">
	      <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">מבצעי החודש</a>
         </div>
       </li>

       <li class="nav-item active dropdown mx-3 mx-md-5">
        <a class="nav-link" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">אלכוהול</a>
         <div class="dropdown-menu dropdown-menu-right" id="menu" aria-labelledby="navbarDropdown2">
          <?php for ($i = 2; $i < count($this->items); $i++) { ?>
		  <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="<?=$this->items[$i]["link"]?>"><?=$this->items[$i]["title"]?></a>
		  <?php } ?>
         </div>
       </li>

       <li class="nav-item active dropdown mx-3 mx-md-5">
        <a class="nav-link" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">יין</a>
         <div class="dropdown-menu dropdown-menu-right" id="menu2" aria-labelledby="navbarDropdown3">
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">אדום</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">לבן</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">רוזה</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">מבעבע</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">קינוח/מחוזק</a>
         </div>
       </li>

       <li class="nav-item active dropdown mx-3 mx-md-5">
        <a class="nav-link" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">בירה ותוספות</a>
         <div class="dropdown-menu dropdown-menu-right" id="menu3" aria-labelledby="navbarDropdown4">
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">חטיפים ונשנושים</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">בירה</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">משקאות משלימים</a>
         </div>
       </li>

       <li class="nav-item active dropdown mx-3 mx-md-5">
        <a class="nav-link" href="#" id="navbarDropdown5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">אקססוריז ומתנות</a>
         <div class="dropdown-menu dropdown-menu-right" id="menu4" aria-labelledby="navbarDropdown5">
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">אקססוריז</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">מתנות</a>
         </div>
       </li>

       <li class="nav-item active dropdown mx-3 mx-md-5">
        <a class="nav-link text-info" href="#" id="navbarDropdown6" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">חנות</a>
         <div class="dropdown-menu dropdown-menu-right" id="menu5" aria-labelledby="navbarDropdown6">
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">RED HEAD</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">חדשות</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">צוות</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">דרושים</a>
          <a class="dropdown-item d-flex justify-content-start" id="menu-item" href="#">FAQ</a>
         </div>
       </li>

      </ul>

     </div>

    </nav>

   </div>

  </div>
 </div>

<hr class="border border-dark">

</div>

<!-- content -->

<?php include "content_".$this->content.".tpl"; ?>

<!-- footer -->

<div class="container-fluid mt-3 footer-lg">
 <div class="row">

  <div class="col-4">

    <div class="text-center"><p><i class="fas fa-phone">00-0000000</i></p></div>

    <div class="text-center"><p><i class="fas fa-envelope">redhead@gmail.com</i></p></div>

    <div class="text-center"><a class="text-dark" href="#"><p class="fas">אנחנו בפייסבוק</p></a><i class="fab fa-facebook"></i></div>

  </div>

  <div class="col-4">

   <div class="text-center"><p class="fas">חיפה, מלך עוזיהו 4</p></div>

   <div class="text-center"><p class="fas">א-ה: 9:00-18:00</p></div>

   <div class="text-center"><p class="fas">ו: 9:00-15:00</p></div>

  </div>

  <div class="col-2">

   <ul>

    <li class="text-center"><a class="text-dark" href="<?=$this->index?>">דף הבית</a></li>
    <li class="text-center"><a class="text-dark" href="#">מבצעים</a></li>
    <li class="text-center"><a class="text-dark" href="#">אלכוהול</a></li>
    <li class="text-center"><a class="text-dark" href="#">יין</a></li>

   </ul>

  </div>

  <div class="col-2">

   <ul>

    <li class="text-center"><a class="text-dark" href="#">בירה ותוספות</a></li>
    <li class="text-center"><a class="text-dark" href="#">אקססוריז ומתנות</a></li>
    <li class="text-center"><a class="text-dark" href="#">חנות</a></li>

   </ul>

  </div>

 </div>
</div>

<div class="container-fluid mt-3 footer-sm">
 <div class="row">

  <div class="col-12 text-center">

   <p><i class="fas fa-phone">00-0000000</i></p>

  </div>

  <div class="col-12 text-center">

   <p><i class="fas fa-envelope">redhead@gmail.com</i></p>

  </div>

  <div class="col-12 text-center">

   <a class="text-dark" href="#"><p class="fas">אנחנו בפייסבוק</p></a><i class="fab fa-facebook"></i>

  </div>

  <div class="col-12 text-center">

   <p class="fas">חיפה, מלך עוזיהו 4</p>

  </div>

  <div class="col-12 text-center">

   <p class="fas">א-ה: 9:00-18:00</p>

  </div>

  <div class="col-12 text-center">

   <p class="fas">ו: 9:00-15:00</p>

  </div>

 </div>
</div>












































<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>$('.dropdown-menu').on('click', function(event){
    event.stopPropagation();
});</script>
</body>
</html>


