<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<div id="header-wrapper-global">
	<?php include('static/header.php'); ?>
</div>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/icofont.css">
<style>

	.card {
	display: block;
	margin-bottom: 20px;
	line-height: 1.42857143;
	background-color: #fff;
	border-radius: 2px;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
	transition: box-shadow .25s;
	}
	.card:hover {
	box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
	}
	.img-card {
	width: 100%;
	border-top-left-radius:2px;
	border-top-right-radius:2px;
	display:block;
		overflow: hidden;
	}
	.img-card img{
	width: 100%;
	height: 400px;
	object-fit:cover;
	transition: all .25s ease;
	}
	.card-content {
	padding:15px;
	text-align:left;
	}
	.card-title {
	margin-top:0px;
	font-weight: 700;
	font-size: 1.65em;
	}
	.card-title a {
	color: #000;
	text-decoration: none !important;
	}
	.card-read-more {
	border-top: 1px solid #D4D4D4;
	}
	.card-read-more a {
	text-decoration: none !important;
	padding:10px;
	font-weight:600;
	text-transform: uppercase
	}

	.slider-wrapper-2 .slide {
    margin: 0 15px;
}
.slider-wrapper-2 .slider-image {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    margin: 5px 0 10px;
    position: relative;
}
.slider-wrapper-2 .slider-image:hover .preview-icon {
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
}
.preview-icon {
    background-color: rgba(0, 0, 0, 0.85);
    height: 100%;
    left: 0;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    position: absolute;
    right: 0;
    text-align: center;
    top: 0;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
    width: 100%;
    margin: 0 auto;
}
.preview-icon i {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 70px;
    color: #fff;
    font-size: 30px;
    height: 70px;
    left: 0;
    line-height: 70px;
    margin: 0 auto;
    position: absolute;
    right: 0;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    width: 70px;
}
.slider-wrapper-2.slick-dotted.slick-slider {
    margin-bottom: 60px;
}
.slick-dots li {
    border: 1px solid #252525;
    border-radius: 50px;
    cursor: pointer;
    display: inline-block;
    height: 12px;
    margin: 0 5px;
    padding: 0;
    position: relative;
    width: 12px;
}
.slick-dots li.slick-active {
    background: #252525;
    border: medium none;
}
.slick-dots li button {
    display: none;
}
.slick-dots {
    bottom: 70px;
    text-align: center;
}
#app-screenshot-area .slick-dots {
    bottom: -70px;
}
.swiper-container {
    width: 100%;
    padding-bottom: 60px;
}
.swiper-slide {
    width: 390px;
    height: auto;
    padding: 0 15px;
}
.swiper-slide img {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}
.swiper-slide .slider-image .preview-icon {
    z-index: -1;
    width: calc(100% - 30px);
}
.swiper-slide.swiper-slide-active .slider-image:hover .preview-icon {
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    z-index: 1;
}
.swiper-container-horizontal > .swiper-pagination-bullets, .swiper-pagination-custom, .swiper-pagination-fraction {
    bottom: 0;
}
.swiper-pagination-bullet {
    background: transparent none repeat scroll 0 0;
    border: 1px solid #ee0f6f;
    border-radius: 100%;
    display: inline-block;
    height: 12px;
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    width: 12px;
}
.swiper-pagination-bullet-active {
    background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, #ee0f6f 0%, #f89482 100%) repeat scroll 0 0;
    background: rgba(0, 0, 0, 0) linear-gradient(to right, #ee0f6f 0%, #f89482 100%) repeat scroll 0 0;
    border: medium none;
    height: 12px;
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    width: 12px;
}

</style>

<title>Save The Pure | Home</title>

<?php 
	foreach ($products as $rows) {
		$product_id = $rows['id'];
		$product_name = $rows['product_name'];
		$picture = $rows['picture'];
		$desc = $rows['desc'];
		$price = $rows['price'];
		$url = $rows['url'];
		$type = $rows['type'];
		$title = $rows['title'];
		$cont_desc = $rows['deskripsi'];
	}
?>
<!-- profile section  -->
<!-- <div class="wrapper-container py2 profile-div animated fadeIn">
	<div class="card">
		<div class="img-card" href="">
			<?php if($type == 'video'){ ?>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="<?php echo $url; ?>"></iframe>
				</div>
			<?php }else if($type == 'photo'){ ?>
				<img src="<?php echo base_url() ?>assets/img/events/<?php echo $url; ?>" alt="">
			<?php } ?>
		</div>
		<br />
		<div class="card-content">
			<h4 class="card-title">
				<a href="">
					<?php echo $title; ?>
				</a>
			</h4>
			<div class="">
				<?php echo $cont_desc; ?>
			</div>
			<hr>
			<div class="col-6 mx-auto mt2">
				<div class=" btn btn-default btn-block bg-black" onclick="buy()">Buy Product</div>
			</div>
		</div>
	</div>
</div> -->



<!--product section  -->
<input type="hidden" id="id_product" value="<?php echo $product_id; ?>">
<div class="wrapper-container py2 product-div animated fadeInLeft"> 
	<div class="box-product px1">
		<div class="title-product center py1 col-12">
			<h2><?php echo str_replace(' ', '-', $product_name); ?></h2>
		</div>
		<div class="body-product col-12 overflow-hidden">
			<div class="col col-12 md-col-6 sm-col-12 lg-col-6 px1 py1 b-product-picture center overflow-hidden">
				<div class="products-photo">
					<?php foreach ($photos as $rows) { ?>
						<img src="<?php echo base_url() ?>assets/img/products/<?php echo $rows['url']; ?>" alt="">
					<?php } ?>
				</div>
			</div>
			<div class="col col-12 md-col-6 sm-col-12 lg-col-6 b-product-desc">
				<div class="price col-12 py1 px1">
					<h5>Price : IDR <span id="price"><?php echo $price; ?></span></h5> 
				</div>
				<hr class="mt0 mb0">
				<div class="size col-12 py1 px1">
					<h5 class="inline-block mr2">Color : </h5> 
					<div class="form-group">
						<select name="color" class="form-control" id="color" onchange="choose_color()">
							<?php foreach ($colors as $rows) { ?>
								<option value="<?php echo $rows['color']; ?>"><?php echo $rows['color']; ?></option>
							<?php } ?>
						</select>
					</div>
					<h5 class="inline-block mr2">Size : </h5> 
					<div class="form-group">
						<select name="size" class="form-control" id="size" onchange="choose_size()">
							<?php foreach ($sizes as $rows) { ?>
								<option value="<?php echo $rows['size']; ?>"><?php echo $rows['size']; ?></option>
							<?php } ?>
						</select>
					</div>
						<!-- <?php foreach ($sizes as $rows) { ?>
							<div class="form-group inline-block mr2">
								<input type="radio" name="size" onchange="choose_size()" value="<?php echo $rows['size']; ?>" checked><?php echo $rows['size']; ?>
							</div>
						<?php } ?> -->
					
				</div>
				<hr class="mt0">
				<div class="quantity col-12 py1 px1 relative">
					<h5 class="inline-block mr3 mt0 mb0">Quantity:</h5> 
					<div class="clearfix col-8 inline-block center mt3 qty-wrapper">
						<div class="col col-2 px1">
							<div class="quantity-control quantity-down">-</div>
						</div>
						<input class="col col-3 input-lg center" type="number" id="quantity"
						 min="0" name="quantity" value="1" min="0">
						<div class="col col-2 px1">
							<div class="quantity-control quantity-up">+</div>
						</div>
					</div>
				</div>
				<hr class="">
				<div class="description py1 px1">
					<p><?php echo $desc; ?></p>
				</div>
				<hr class="mt0 mb0">
				<div class="btn-cart center py1 px1">
					<div class="button large black ld-over-inverse" onclick="add_cart()" id="add-cart">Add to Cart
						<div class="ld ld-ball ld-flip"></div>
					</div>
				</div>
				<div class="col-12 px1">
					<div class="row">
				        <div class="slider-wrapper-2 col col-3">
				            <div class="slide one">
				                <div class="slider-image">
				                    <img src="<?php echo base_url() ?>assets/img/products/gabriel.jpg" alt="" class="img-responsive">
				                    <div class="preview-icon">
				                        <a href="<?php echo base_url() ?>assets/img/products/gabriel.jpg"><i class="icofont icofont-image"></i></a>
				                    </div>
				                </div>
				            </div>
				        </div>
				        <div class="slider-wrapper-2 col col-3">
				            <div class="slide one">
				                <div class="slider-image">
				                    <img src="<?php echo base_url() ?>assets/img/products/ray.jpg" alt="" class="img-responsive">
				                    <div class="preview-icon">
				                        <a href="<?php echo base_url() ?>assets/img/products/ray.jpg"><i class="icofont icofont-image"></i></a>
				                    </div>
				                </div>
				            </div>
				        </div>
				        <div class="slider-wrapper-2 col col-3">
				            <div class="slide one">
				                <div class="slider-image">
				                    <img src="<?php echo base_url() ?>assets/img/products/nadya.jpg" alt="" class="img-responsive">
				                    <div class="preview-icon">
				                        <a href="<?php echo base_url() ?>assets/img/products/nadya.jpg"><i class="icofont icofont-image"></i></a>
				                    </div>
				                </div>
				            </div>
				        </div>
				        <div class="slider-wrapper-2 col col-3">
				            <div class="slide one">
				                <div class="slider-image">
				                    <img src="<?php echo base_url() ?>assets/img/products/ghano.jpg" alt="" class="img-responsive">
				                    <div class="preview-icon">
				                        <a href="<?php echo base_url() ?>assets/img/products/ghano.jpg"><i class="icofont icofont-image"></i></a>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<div id="snackbar"><?php echo $product_name; ?> successfully added. <a href="<?php echo base_url() ?>cart">View cart</a></div>
<div id="snackbar_size">Please Choose Size...</a></div>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/slick/slick.min.js"></script>
<script>
	$('.products-photo').slick({
        arrows: false,
        dots: true,
        cssEase: 'ease',
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        responsive: [{
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

	function buy()
	{
		$('.product-div').removeClass('hidden');
		$('.profile-div').addClass('hidden');
	}

	$('#price').html(formatCurrency(<?php echo $price ?>));

	function formatCurrency (num) {
	    let newnum = num ? num.toString() : '0';
	    let i = newnum.length - 3;
	    while (i > 0) {
	      newnum = newnum.substr(0, i) + '.' + newnum.substr(i);
	      i -= 3;
	    }
	    return newnum;
  	}
</script>
<script>
	
	function choose_size() {
		size = $('[name="size"]').val();
		console.log(size);
	}

	function choose_color() {
		size = $('[name="color"]').val();
		console.log(color);
	}

	var qty = $("#quantity");
	var cur_qty = $('#quantity').val();

	$( ".quantity-down" ).click(function() {
		cur_qty--;
		if(cur_qty<1){
			cur_qty = 1;
		}
		qty.val(cur_qty);
	});

	$( ".quantity-up" ).click(function() {
		cur_qty++;
		if(cur_qty>30){
			cur_qty = 30;
		}
		qty.val(cur_qty);
	});

   function add_cart() {
		var id = $("#id_product").val();
		var cur_qty = $("#quantity").val();
		var size = $('[name="size"]').val();
		var color = $('[name="color"]').val();
		$("#add-cart").addClass('running');
		
		if (id != '' && cur_qty != '' && size != '')
		{

			$.ajax({
				url: '<?php echo base_url()?>cart/add',
				type: 'POST',
				data: {
					id: id, qty: cur_qty , size: size, color: color
				},
				success: function(data, textStatus, xhr) {
					if (data === 'ok') {
						$("#add-cart").removeClass('running');
						var x = document.getElementById("snackbar")
						x.className = "show";
						setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
					}    
				},
				error: function() {
					console.log('eror')
				}
			});
			$('#header-wrapper-global').load(document.URL +  ' #header-wrapper-global');
		}else{
			$("#id_product").removeClass('running');
			var y = document.getElementById("snackbar_size")
			y.className = "show";
			setTimeout(function(){ y.className = y.className.replace("show", ""); }, 3000);
		}
	};

	    /*! Magnific Popup - v1.1.0 - 2016-02-20
* http://dimsemenov.com/plugins/magnific-popup/
* Copyright (c) 2016 Dmitry Semenov; */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):window.jQuery||window.Zepto)}(function(a){var b,c,d,e,f,g,h="Close",i="BeforeClose",j="AfterClose",k="BeforeAppend",l="MarkupParse",m="Open",n="Change",o="mfp",p="."+o,q="mfp-ready",r="mfp-removing",s="mfp-prevent-close",t=function(){},u=!!window.jQuery,v=a(window),w=function(a,c){b.ev.on(o+a+p,c)},x=function(b,c,d,e){var f=document.createElement("div");return f.className="mfp-"+b,d&&(f.innerHTML=d),e?c&&c.appendChild(f):(f=a(f),c&&f.appendTo(c)),f},y=function(c,d){b.ev.triggerHandler(o+c,d),b.st.callbacks&&(c=c.charAt(0).toLowerCase()+c.slice(1),b.st.callbacks[c]&&b.st.callbacks[c].apply(b,a.isArray(d)?d:[d]))},z=function(c){return c===g&&b.currTemplate.closeBtn||(b.currTemplate.closeBtn=a(b.st.closeMarkup.replace("%title%",b.st.tClose)),g=c),b.currTemplate.closeBtn},A=function(){a.magnificPopup.instance||(b=new t,b.init(),a.magnificPopup.instance=b)},B=function(){var a=document.createElement("p").style,b=["ms","O","Moz","Webkit"];if(void 0!==a.transition)return!0;for(;b.length;)if(b.pop()+"Transition"in a)return!0;return!1};t.prototype={constructor:t,init:function(){var c=navigator.appVersion;b.isLowIE=b.isIE8=document.all&&!document.addEventListener,b.isAndroid=/android/gi.test(c),b.isIOS=/iphone|ipad|ipod/gi.test(c),b.supportsTransition=B(),b.probablyMobile=b.isAndroid||b.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),d=a(document),b.popupsCache={}},open:function(c){var e;if(c.isObj===!1){b.items=c.items.toArray(),b.index=0;var g,h=c.items;for(e=0;e<h.length;e++)if(g=h[e],g.parsed&&(g=g.el[0]),g===c.el[0]){b.index=e;break}}else b.items=a.isArray(c.items)?c.items:[c.items],b.index=c.index||0;if(b.isOpen)return void b.updateItemHTML();b.types=[],f="",c.mainEl&&c.mainEl.length?b.ev=c.mainEl.eq(0):b.ev=d,c.key?(b.popupsCache[c.key]||(b.popupsCache[c.key]={}),b.currTemplate=b.popupsCache[c.key]):b.currTemplate={},b.st=a.extend(!0,{},a.magnificPopup.defaults,c),b.fixedContentPos="auto"===b.st.fixedContentPos?!b.probablyMobile:b.st.fixedContentPos,b.st.modal&&(b.st.closeOnContentClick=!1,b.st.closeOnBgClick=!1,b.st.showCloseBtn=!1,b.st.enableEscapeKey=!1),b.bgOverlay||(b.bgOverlay=x("bg").on("click"+p,function(){b.close()}),b.wrap=x("wrap").attr("tabindex",-1).on("click"+p,function(a){b._checkIfClose(a.target)&&b.close()}),b.container=x("container",b.wrap)),b.contentContainer=x("content"),b.st.preloader&&(b.preloader=x("preloader",b.container,b.st.tLoading));var i=a.magnificPopup.modules;for(e=0;e<i.length;e++){var j=i[e];j=j.charAt(0).toUpperCase()+j.slice(1),b["init"+j].call(b)}y("BeforeOpen"),b.st.showCloseBtn&&(b.st.closeBtnInside?(w(l,function(a,b,c,d){c.close_replaceWith=z(d.type)}),f+=" mfp-close-btn-in"):b.wrap.append(z())),b.st.alignTop&&(f+=" mfp-align-top"),b.fixedContentPos?b.wrap.css({overflow:b.st.overflowY,overflowX:"hidden",overflowY:b.st.overflowY}):b.wrap.css({top:v.scrollTop(),position:"absolute"}),(b.st.fixedBgPos===!1||"auto"===b.st.fixedBgPos&&!b.fixedContentPos)&&b.bgOverlay.css({height:d.height(),position:"absolute"}),b.st.enableEscapeKey&&d.on("keyup"+p,function(a){27===a.keyCode&&b.close()}),v.on("resize"+p,function(){b.updateSize()}),b.st.closeOnContentClick||(f+=" mfp-auto-cursor"),f&&b.wrap.addClass(f);var k=b.wH=v.height(),n={};if(b.fixedContentPos&&b._hasScrollBar(k)){var o=b._getScrollbarSize();o&&(n.marginRight=o)}b.fixedContentPos&&(b.isIE7?a("body, html").css("overflow","hidden"):n.overflow="hidden");var r=b.st.mainClass;return b.isIE7&&(r+=" mfp-ie7"),r&&b._addClassToMFP(r),b.updateItemHTML(),y("BuildControls"),a("html").css(n),b.bgOverlay.add(b.wrap).prependTo(b.st.prependTo||a(document.body)),b._lastFocusedEl=document.activeElement,setTimeout(function(){b.content?(b._addClassToMFP(q),b._setFocus()):b.bgOverlay.addClass(q),d.on("focusin"+p,b._onFocusIn)},16),b.isOpen=!0,b.updateSize(k),y(m),c},close:function(){b.isOpen&&(y(i),b.isOpen=!1,b.st.removalDelay&&!b.isLowIE&&b.supportsTransition?(b._addClassToMFP(r),setTimeout(function(){b._close()},b.st.removalDelay)):b._close())},_close:function(){y(h);var c=r+" "+q+" ";if(b.bgOverlay.detach(),b.wrap.detach(),b.container.empty(),b.st.mainClass&&(c+=b.st.mainClass+" "),b._removeClassFromMFP(c),b.fixedContentPos){var e={marginRight:""};b.isIE7?a("body, html").css("overflow",""):e.overflow="",a("html").css(e)}d.off("keyup"+p+" focusin"+p),b.ev.off(p),b.wrap.attr("class","mfp-wrap").removeAttr("style"),b.bgOverlay.attr("class","mfp-bg"),b.container.attr("class","mfp-container"),!b.st.showCloseBtn||b.st.closeBtnInside&&b.currTemplate[b.currItem.type]!==!0||b.currTemplate.closeBtn&&b.currTemplate.closeBtn.detach(),b.st.autoFocusLast&&b._lastFocusedEl&&a(b._lastFocusedEl).focus(),b.currItem=null,b.content=null,b.currTemplate=null,b.prevHeight=0,y(j)},updateSize:function(a){if(b.isIOS){var c=document.documentElement.clientWidth/window.innerWidth,d=window.innerHeight*c;b.wrap.css("height",d),b.wH=d}else b.wH=a||v.height();b.fixedContentPos||b.wrap.css("height",b.wH),y("Resize")},updateItemHTML:function(){var c=b.items[b.index];b.contentContainer.detach(),b.content&&b.content.detach(),c.parsed||(c=b.parseEl(b.index));var d=c.type;if(y("BeforeChange",[b.currItem?b.currItem.type:"",d]),b.currItem=c,!b.currTemplate[d]){var f=b.st[d]?b.st[d].markup:!1;y("FirstMarkupParse",f),f?b.currTemplate[d]=a(f):b.currTemplate[d]=!0}e&&e!==c.type&&b.container.removeClass("mfp-"+e+"-holder");var g=b["get"+d.charAt(0).toUpperCase()+d.slice(1)](c,b.currTemplate[d]);b.appendContent(g,d),c.preloaded=!0,y(n,c),e=c.type,b.container.prepend(b.contentContainer),y("AfterChange")},appendContent:function(a,c){b.content=a,a?b.st.showCloseBtn&&b.st.closeBtnInside&&b.currTemplate[c]===!0?b.content.find(".mfp-close").length||b.content.append(z()):b.content=a:b.content="",y(k),b.container.addClass("mfp-"+c+"-holder"),b.contentContainer.append(b.content)},parseEl:function(c){var d,e=b.items[c];if(e.tagName?e={el:a(e)}:(d=e.type,e={data:e,src:e.src}),e.el){for(var f=b.types,g=0;g<f.length;g++)if(e.el.hasClass("mfp-"+f[g])){d=f[g];break}e.src=e.el.attr("data-mfp-src"),e.src||(e.src=e.el.attr("href"))}return e.type=d||b.st.type||"inline",e.index=c,e.parsed=!0,b.items[c]=e,y("ElementParse",e),b.items[c]},addGroup:function(a,c){var d=function(d){d.mfpEl=this,b._openClick(d,a,c)};c||(c={});var e="click.magnificPopup";c.mainEl=a,c.items?(c.isObj=!0,a.off(e).on(e,d)):(c.isObj=!1,c.delegate?a.off(e).on(e,c.delegate,d):(c.items=a,a.off(e).on(e,d)))},_openClick:function(c,d,e){var f=void 0!==e.midClick?e.midClick:a.magnificPopup.defaults.midClick;if(f||!(2===c.which||c.ctrlKey||c.metaKey||c.altKey||c.shiftKey)){var g=void 0!==e.disableOn?e.disableOn:a.magnificPopup.defaults.disableOn;if(g)if(a.isFunction(g)){if(!g.call(b))return!0}else if(v.width()<g)return!0;c.type&&(c.preventDefault(),b.isOpen&&c.stopPropagation()),e.el=a(c.mfpEl),e.delegate&&(e.items=d.find(e.delegate)),b.open(e)}},updateStatus:function(a,d){if(b.preloader){c!==a&&b.container.removeClass("mfp-s-"+c),d||"loading"!==a||(d=b.st.tLoading);var e={status:a,text:d};y("UpdateStatus",e),a=e.status,d=e.text,b.preloader.html(d),b.preloader.find("a").on("click",function(a){a.stopImmediatePropagation()}),b.container.addClass("mfp-s-"+a),c=a}},_checkIfClose:function(c){if(!a(c).hasClass(s)){var d=b.st.closeOnContentClick,e=b.st.closeOnBgClick;if(d&&e)return!0;if(!b.content||a(c).hasClass("mfp-close")||b.preloader&&c===b.preloader[0])return!0;if(c===b.content[0]||a.contains(b.content[0],c)){if(d)return!0}else if(e&&a.contains(document,c))return!0;return!1}},_addClassToMFP:function(a){b.bgOverlay.addClass(a),b.wrap.addClass(a)},_removeClassFromMFP:function(a){this.bgOverlay.removeClass(a),b.wrap.removeClass(a)},_hasScrollBar:function(a){return(b.isIE7?d.height():document.body.scrollHeight)>(a||v.height())},_setFocus:function(){(b.st.focus?b.content.find(b.st.focus).eq(0):b.wrap).focus()},_onFocusIn:function(c){return c.target===b.wrap[0]||a.contains(b.wrap[0],c.target)?void 0:(b._setFocus(),!1)},_parseMarkup:function(b,c,d){var e;d.data&&(c=a.extend(d.data,c)),y(l,[b,c,d]),a.each(c,function(c,d){if(void 0===d||d===!1)return!0;if(e=c.split("_"),e.length>1){var f=b.find(p+"-"+e[0]);if(f.length>0){var g=e[1];"replaceWith"===g?f[0]!==d[0]&&f.replaceWith(d):"img"===g?f.is("img")?f.attr("src",d):f.replaceWith(a("<img>").attr("src",d).attr("class",f.attr("class"))):f.attr(e[1],d)}}else b.find(p+"-"+c).html(d)})},_getScrollbarSize:function(){if(void 0===b.scrollbarSize){var a=document.createElement("div");a.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(a),b.scrollbarSize=a.offsetWidth-a.clientWidth,document.body.removeChild(a)}return b.scrollbarSize}},a.magnificPopup={instance:null,proto:t.prototype,modules:[],open:function(b,c){return A(),b=b?a.extend(!0,{},b):{},b.isObj=!0,b.index=c||0,this.instance.open(b)},close:function(){return a.magnificPopup.instance&&a.magnificPopup.instance.close()},registerModule:function(b,c){c.options&&(a.magnificPopup.defaults[b]=c.options),a.extend(this.proto,c.proto),this.modules.push(b)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&#215;</button>',tClose:"Close (Esc)",tLoading:"Loading...",autoFocusLast:!0}},a.fn.magnificPopup=function(c){A();var d=a(this);if("string"==typeof c)if("open"===c){var e,f=u?d.data("magnificPopup"):d[0].magnificPopup,g=parseInt(arguments[1],10)||0;f.items?e=f.items[g]:(e=d,f.delegate&&(e=e.find(f.delegate)),e=e.eq(g)),b._openClick({mfpEl:e},d,f)}else b.isOpen&&b[c].apply(b,Array.prototype.slice.call(arguments,1));else c=a.extend(!0,{},c),u?d.data("magnificPopup",c):d[0].magnificPopup=c,b.addGroup(d,c);return d};var C,D,E,F="inline",G=function(){E&&(D.after(E.addClass(C)).detach(),E=null)};a.magnificPopup.registerModule(F,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){b.types.push(F),w(h+"."+F,function(){G()})},getInline:function(c,d){if(G(),c.src){var e=b.st.inline,f=a(c.src);if(f.length){var g=f[0].parentNode;g&&g.tagName&&(D||(C=e.hiddenClass,D=x(C),C="mfp-"+C),E=f.after(D).detach().removeClass(C)),b.updateStatus("ready")}else b.updateStatus("error",e.tNotFound),f=a("<div>");return c.inlineElement=f,f}return b.updateStatus("ready"),b._parseMarkup(d,{},c),d}}});var H,I="ajax",J=function(){H&&a(document.body).removeClass(H)},K=function(){J(),b.req&&b.req.abort()};a.magnificPopup.registerModule(I,{options:{settings:null,cursor:"mfp-ajax-cur",tError:'<a href="%url%">The content</a> could not be loaded.'},proto:{initAjax:function(){b.types.push(I),H=b.st.ajax.cursor,w(h+"."+I,K),w("BeforeChange."+I,K)},getAjax:function(c){H&&a(document.body).addClass(H),b.updateStatus("loading");var d=a.extend({url:c.src,success:function(d,e,f){var g={data:d,xhr:f};y("ParseAjax",g),b.appendContent(a(g.data),I),c.finished=!0,J(),b._setFocus(),setTimeout(function(){b.wrap.addClass(q)},16),b.updateStatus("ready"),y("AjaxContentAdded")},error:function(){J(),c.finished=c.loadError=!0,b.updateStatus("error",b.st.ajax.tError.replace("%url%",c.src))}},b.st.ajax.settings);return b.req=a.ajax(d),""}}});var L,M=function(c){if(c.data&&void 0!==c.data.title)return c.data.title;var d=b.st.image.titleSrc;if(d){if(a.isFunction(d))return d.call(b,c);if(c.el)return c.el.attr(d)||""}return""};a.magnificPopup.registerModule("image",{options:{markup:'<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',cursor:"mfp-zoom-out-cur",titleSrc:"title",verticalFit:!0,tError:'<a href="%url%">The image</a> could not be loaded.'},proto:{initImage:function(){var c=b.st.image,d=".image";b.types.push("image"),w(m+d,function(){"image"===b.currItem.type&&c.cursor&&a(document.body).addClass(c.cursor)}),w(h+d,function(){c.cursor&&a(document.body).removeClass(c.cursor),v.off("resize"+p)}),w("Resize"+d,b.resizeImage),b.isLowIE&&w("AfterChange",b.resizeImage)},resizeImage:function(){var a=b.currItem;if(a&&a.img&&b.st.image.verticalFit){var c=0;b.isLowIE&&(c=parseInt(a.img.css("padding-top"),10)+parseInt(a.img.css("padding-bottom"),10)),a.img.css("max-height",b.wH-c)}},_onImageHasSize:function(a){a.img&&(a.hasSize=!0,L&&clearInterval(L),a.isCheckingImgSize=!1,y("ImageHasSize",a),a.imgHidden&&(b.content&&b.content.removeClass("mfp-loading"),a.imgHidden=!1))},findImageSize:function(a){var c=0,d=a.img[0],e=function(f){L&&clearInterval(L),L=setInterval(function(){return d.naturalWidth>0?void b._onImageHasSize(a):(c>200&&clearInterval(L),c++,void(3===c?e(10):40===c?e(50):100===c&&e(500)))},f)};e(1)},getImage:function(c,d){var e=0,f=function(){c&&(c.img[0].complete?(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("ready")),c.hasSize=!0,c.loaded=!0,y("ImageLoadComplete")):(e++,200>e?setTimeout(f,100):g()))},g=function(){c&&(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("error",h.tError.replace("%url%",c.src))),c.hasSize=!0,c.loaded=!0,c.loadError=!0)},h=b.st.image,i=d.find(".mfp-img");if(i.length){var j=document.createElement("img");j.className="mfp-img",c.el&&c.el.find("img").length&&(j.alt=c.el.find("img").attr("alt")),c.img=a(j).on("load.mfploader",f).on("error.mfploader",g),j.src=c.src,i.is("img")&&(c.img=c.img.clone()),j=c.img[0],j.naturalWidth>0?c.hasSize=!0:j.width||(c.hasSize=!1)}return b._parseMarkup(d,{title:M(c),img_replaceWith:c.img},c),b.resizeImage(),c.hasSize?(L&&clearInterval(L),c.loadError?(d.addClass("mfp-loading"),b.updateStatus("error",h.tError.replace("%url%",c.src))):(d.removeClass("mfp-loading"),b.updateStatus("ready")),d):(b.updateStatus("loading"),c.loading=!0,c.hasSize||(c.imgHidden=!0,d.addClass("mfp-loading"),b.findImageSize(c)),d)}}});var N,O=function(){return void 0===N&&(N=void 0!==document.createElement("p").style.MozTransform),N};a.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(a){return a.is("img")?a:a.find("img")}},proto:{initZoom:function(){var a,c=b.st.zoom,d=".zoom";if(c.enabled&&b.supportsTransition){var e,f,g=c.duration,j=function(a){var b=a.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),d="all "+c.duration/1e3+"s "+c.easing,e={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},f="transition";return e["-webkit-"+f]=e["-moz-"+f]=e["-o-"+f]=e[f]=d,b.css(e),b},k=function(){b.content.css("visibility","visible")};w("BuildControls"+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.content.css("visibility","hidden"),a=b._getItemToZoom(),!a)return void k();f=j(a),f.css(b._getOffset()),b.wrap.append(f),e=setTimeout(function(){f.css(b._getOffset(!0)),e=setTimeout(function(){k(),setTimeout(function(){f.remove(),a=f=null,y("ZoomAnimationEnded")},16)},g)},16)}}),w(i+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.st.removalDelay=g,!a){if(a=b._getItemToZoom(),!a)return;f=j(a)}f.css(b._getOffset(!0)),b.wrap.append(f),b.content.css("visibility","hidden"),setTimeout(function(){f.css(b._getOffset())},16)}}),w(h+d,function(){b._allowZoom()&&(k(),f&&f.remove(),a=null)})}},_allowZoom:function(){return"image"===b.currItem.type},_getItemToZoom:function(){return b.currItem.hasSize?b.currItem.img:!1},_getOffset:function(c){var d;d=c?b.currItem.img:b.st.zoom.opener(b.currItem.el||b.currItem);var e=d.offset(),f=parseInt(d.css("padding-top"),10),g=parseInt(d.css("padding-bottom"),10);e.top-=a(window).scrollTop()-f;var h={width:d.width(),height:(u?d.innerHeight():d[0].offsetHeight)-g-f};return O()?h["-moz-transform"]=h.transform="translate("+e.left+"px,"+e.top+"px)":(h.left=e.left,h.top=e.top),h}}});var P="iframe",Q="//about:blank",R=function(a){if(b.currTemplate[P]){var c=b.currTemplate[P].find("iframe");c.length&&(a||(c[0].src=Q),b.isIE8&&c.css("display",a?"block":"none"))}};a.magnificPopup.registerModule(P,{options:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',srcAction:"iframe_src",patterns:{youtube:{index:"youtube.com",id:"v=",src:"//www.youtube.com/embed/%id%?autoplay=1"},vimeo:{index:"vimeo.com/",id:"/",src:"//player.vimeo.com/video/%id%?autoplay=1"},gmaps:{index:"//maps.google.",src:"%id%&output=embed"}}},proto:{initIframe:function(){b.types.push(P),w("BeforeChange",function(a,b,c){b!==c&&(b===P?R():c===P&&R(!0))}),w(h+"."+P,function(){R()})},getIframe:function(c,d){var e=c.src,f=b.st.iframe;a.each(f.patterns,function(){return e.indexOf(this.index)>-1?(this.id&&(e="string"==typeof this.id?e.substr(e.lastIndexOf(this.id)+this.id.length,e.length):this.id.call(this,e)),e=this.src.replace("%id%",e),!1):void 0});var g={};return f.srcAction&&(g[f.srcAction]=e),b._parseMarkup(d,g,c),b.updateStatus("ready"),d}}});var S=function(a){var c=b.items.length;return a>c-1?a-c:0>a?c+a:a},T=function(a,b,c){return a.replace(/%curr%/gi,b+1).replace(/%total%/gi,c)};a.magnificPopup.registerModule("gallery",{options:{enabled:!1,arrowMarkup:'<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',preload:[0,2],navigateByImgClick:!0,arrows:!0,tPrev:"Previous (Left arrow key)",tNext:"Next (Right arrow key)",tCounter:"%curr% of %total%"},proto:{initGallery:function(){var c=b.st.gallery,e=".mfp-gallery";return b.direction=!0,c&&c.enabled?(f+=" mfp-gallery",w(m+e,function(){c.navigateByImgClick&&b.wrap.on("click"+e,".mfp-img",function(){return b.items.length>1?(b.next(),!1):void 0}),d.on("keydown"+e,function(a){37===a.keyCode?b.prev():39===a.keyCode&&b.next()})}),w("UpdateStatus"+e,function(a,c){c.text&&(c.text=T(c.text,b.currItem.index,b.items.length))}),w(l+e,function(a,d,e,f){var g=b.items.length;e.counter=g>1?T(c.tCounter,f.index,g):""}),w("BuildControls"+e,function(){if(b.items.length>1&&c.arrows&&!b.arrowLeft){var d=c.arrowMarkup,e=b.arrowLeft=a(d.replace(/%title%/gi,c.tPrev).replace(/%dir%/gi,"left")).addClass(s),f=b.arrowRight=a(d.replace(/%title%/gi,c.tNext).replace(/%dir%/gi,"right")).addClass(s);e.click(function(){b.prev()}),f.click(function(){b.next()}),b.container.append(e.add(f))}}),w(n+e,function(){b._preloadTimeout&&clearTimeout(b._preloadTimeout),b._preloadTimeout=setTimeout(function(){b.preloadNearbyImages(),b._preloadTimeout=null},16)}),void w(h+e,function(){d.off(e),b.wrap.off("click"+e),b.arrowRight=b.arrowLeft=null})):!1},next:function(){b.direction=!0,b.index=S(b.index+1),b.updateItemHTML()},prev:function(){b.direction=!1,b.index=S(b.index-1),b.updateItemHTML()},goTo:function(a){b.direction=a>=b.index,b.index=a,b.updateItemHTML()},preloadNearbyImages:function(){var a,c=b.st.gallery.preload,d=Math.min(c[0],b.items.length),e=Math.min(c[1],b.items.length);for(a=1;a<=(b.direction?e:d);a++)b._preloadItem(b.index+a);for(a=1;a<=(b.direction?d:e);a++)b._preloadItem(b.index-a)},_preloadItem:function(c){if(c=S(c),!b.items[c].preloaded){var d=b.items[c];d.parsed||(d=b.parseEl(c)),y("LazyLoad",d),"image"===d.type&&(d.img=a('<img class="mfp-img" />').on("load.mfploader",function(){d.hasSize=!0}).on("error.mfploader",function(){d.hasSize=!0,d.loadError=!0,y("LazyLoadError",d)}).attr("src",d.src)),d.preloaded=!0}}}});var U="retina";a.magnificPopup.registerModule(U,{options:{replaceSrc:function(a){return a.src.replace(/\.\w+$/,function(a){return"@2x"+a})},ratio:1},proto:{initRetina:function(){if(window.devicePixelRatio>1){var a=b.st.retina,c=a.ratio;c=isNaN(c)?c():c,c>1&&(w("ImageHasSize."+U,function(a,b){b.img.css({"max-width":b.img[0].naturalWidth/c,width:"100%"})}),w("ElementParse."+U,function(b,d){d.src=a.replaceSrc(d,c)}))}}}}),A()});


    // Magnific Popup js
    $('.video-play-icon a').magnificPopup({
        type: 'iframe',
        removalDelay: 300,
        mainClass: 'mfp-fade'
    });

    $('.preview-icon a').magnificPopup({
        type: 'image',
        removalDelay: 300,
        mainClass: 'mfp-fade',
        gallery: {
            enabled: true
        }
    });


</script>


<?php include('static/footer.php'); ?>
