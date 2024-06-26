<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="{{asset('assets')}}/assets/imgs/shop/product-16-2.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('assets')}}/assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('assets')}}/assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('assets')}}/assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('assets')}}/assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('assets')}}/assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('assets')}}/assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                <div><img src="{{asset('assets')}}/assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                <div><img src="{{asset('assets')}}/assets/imgs/shop/thumbnail-4.jpg" alt="product image" /></div>
                                <div><img src="{{asset('assets')}}/assets/imgs/shop/thumbnail-5.jpg" alt="product image" /></div>
                                <div><img src="{{asset('assets')}}/assets/imgs/shop/thumbnail-6.jpg" alt="product image" /></div>
                                <div><img src="{{asset('assets')}}/assets/imgs/shop/thumbnail-7.jpg" alt="product image" /></div>
                                <div><img src="{{asset('assets')}}/assets/imgs/shop/thumbnail-8.jpg" alt="product image" /></div>
                                <div><img src="{{asset('assets')}}/assets/imgs/shop/thumbnail-9.jpg" alt="product image" /></div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Sale Off </span>
                            <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of Change Organic Quinoa, Brown</a></h3>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div>
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <span class="qty-val">1</span>
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a href="">About Us</a></li>
                            @if(auth()->check())
                                <li>
                                    <a href="{{ route('pages.userProfile') }}">My Account</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('register') }}">My Account</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>100% Secure delivery</li>
                                <li>Super Value Deals - Save tk.50 with SuperDeal50 </li>
                                <li>Unlimited Discounts, Save tk.120 with SuperSave120 !!!</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>Need help? Call Us: <strong class="text-brand">+880-38881</strong></li>
                            <li>
                                <a class="language-dropdown-active" href="#">English </a>
                                
                            </li>
                            <li>
                                <a class="language-dropdown-active" href="#">Payment<i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="#">COD</a>
                                    </li>
                                    <li>
                                        <a href="#">Bkash</a>
                                    </li>
                                    <li>
                                        <a href="#">Cards</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{route('pages.shop-grid-left')}}"><img src="{{asset('assets')}}/assets/imgs/theme/logo.svg" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-1">
                        <form method="POST" action="{{ route('product.search')}}">
                            @csrf  
                            <input type="text" name="name" placeholder="Search for items..." />
                            <button type="submit">
                                <i class="fi-rs-search"></i> 
                            </button>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.html">
                                    <img class="svgInject" alt="Nest" src="{{asset('assets')}}/assets/imgs/theme/icons/icon-heart.svg" />
                                    <span class="pro-count blue">6</span>
                                </a>
                                <a href="shop-wishlist.html"><span class="lable">Wishlist</span></a>
                            </div>
                            @php
                                use App\Models\Cart;
                                use App\Models\Product;
                                use App\Models\Image;
                                    if(auth()->check()){
                                        $user_id= auth()->user()->id;
                                        $cartItems = Cart::where('user_id', $user_id)->whereNull('order_id')->get();
                                        $totalItem= count($cartItems);
                                        
                                    }else{
                                        $ip_address = request()->ip();
                                        $cartItems = Cart::where('ip_address', $ip_address)->whereNull('user_id')->whereNull('order_id')->get();
                                        $totalItem= count($cartItems);
                                        }
                            @endphp
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{route('pages.cart')}}">
                                    <img alt="Nest" src="{{asset('assets')}}/assets/imgs/theme/icons/icon-cart.svg" />
                                    <span class="pro-count blue">{{$totalItem}}</span>
                                </a>
                                <a href="{{route('pages.cart')}}"><span class="lable">Cart</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            @if ($cartItems->isEmpty())
                                            <div class="empty-cart-message">
                                                <p>Your shopping cart is empty.</p>
                                                <a href="{{ route('pages.shop-grid-left') }}">Continue shopping</a>
                                            </div>
                                            @else
                                                <ul>
                                                    
                                                    @foreach($cartItems as $cartItem)
                                                    @php
                                                        
                                                        $product = \App\Models\Product::firstWhere('id', $cartItem->product_id);
                                                    @endphp
                                                    <li>
                                                        <div class="">
                                                            <a href=""><img src="{{ asset('assets/images/' . $product->images->first()->image) }}" alt="Image" width="50" height="50"></a>
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4><a href="shop-product-right.html">{{$product->name}}</a></h4>
                                                            <h4><span>{{ $cartItem->quantity }} × </span>Tk.{{ $cartItem->unit_price }}</h4>
                                                        </div>
                                                        <div class="shopping-cart-delete">
                                                            <form action="{{ route('carts.destroy', $cartItem->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-xs "style="color: grey; background-color: transparent; border: 1px solid white; "><i class="fi-rs-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    @php
                                                    $totalPrice = 0;
                                                    foreach ($cartItems as $item) {
                                                                $totalPrice += $item->unit_price * $item->quantity;}
                                                    @endphp
                                                    <h4>Total <span>Tk. {{$totalPrice}}</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="{{route('pages.cart')}}" class="outline">View cart</a>
                                                    <a href="{{route('pages.checkout')}}">Checkout</a>
                                                </div>
                                            </div>
                                        @endif
                                  </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest" src="{{asset('assets')}}/assets/imgs/theme/icons/icon-user.svg" />
                                </a>
                                @if(auth()->check())
                                <a href="{{ route('pages.userProfile') }}"><span class="lable ml-0">Account</span></a>
                                @else
                                <a href="{{ route('register') }}"><span class="lable ml-0">Account</span></a>
                                @endif
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        @if(auth()->check())
                                            <li>
                                                <a href="{{ route('pages.userProfile') }}"><i class="fi fi-rs-user mr-10"></i>{{ auth()->user()->name }}</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('register') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                        </li>
                                        <li>
                                            <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                        </li>
                                        <li>
                                            <div class="sidebar-custom">
                                                @if(auth()->check())
                                                <form method="POST" action="{{ route('logout') }}">
                                                  @csrf
                                              
                                                  <x-dropdown-link :href="route('logout')" class="btn btn-info" onclick="event.preventDefault(); this.closest('form').submit();">
                                                      {{ __('Log Out') }}
                                                  </x-dropdown-link>
                                                </form>
                                                @else
                                                    <a href="{{ route('login') }}" class="btn btn-info">{{ __('Log In') }}</a>
                                                @endif

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{asset('assets')}}/assets/imgs/theme/logo.svg" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @php
                                    use App\Models\Category;
                                    use App\Models\SubCategory;
                                    
                                    $categories = Category::with('subcategories')->get()
                                    @endphp

                                    @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('product.search.byCategory', ['category' => $category->id]) }}" class="search-link">
                                            <img src="{{asset('assets')}}/assets/imgs/theme/icons/category-1.svg" alt="" />
                                            {{$category->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-hot.svg" alt="hot deals" /><a href="shop-grid-right.html">Deals</a></li>
                                <li>
                                    <a class="active" href="/">Home </a>
                                    
                                </li>
                                <li>
                                    <a href="">About</a> <!--Make an about us page--->
                                </li>
                                <li>
                                    <a href="{{route('pages.shop-grid-left')}}">Shop </a>
                                    
                                </li>
                                <li class="position-static">
                                    <a href="#">Mega menu <i class="fi-rs-angle-down"></i></a> <!---POPULATE MEGAMENU---->
                                    <ul class="mega-menu">
                                        @foreach($categories as $category)
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                             <a href="{{ route('product.search.byCategory', ['category' => $category->id]) }}" class="menu-title">
                                                 {{$category->name}}
                                             </a>
                                             <ul>
                                                 @foreach($category->subcategories as $subcategory)
                                                     <li>
                                                         <a href="{{ route('product.search.byCategory', ['subcategory' => $subcategory->id]) }}" class="search-link">
                                                             {{$subcategory->name}}
                                                         </a>
                                                     </li>
                                                 @endforeach
                                             </ul>
                                         </li>
                                        @endforeach                                   
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-headphone.svg" alt="hotline" />
                    <p>+880-38881<span>Emergency Call</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Nest" src="{{asset('assets')}}/assets/imgs/theme/icons/icon-heart.svg" />
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{route('pages.cart')}}">
                                <img alt="Nest" src="{{asset('assets')}}/assets/imgs/theme/icons/icon-cart.svg" />
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest" src="{{asset('assets')}}/assets/imgs/shop/thumbnail-3.jpg" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest" src="{{asset('assets')}}/assets/imgs/shop/thumbnail-4.jpg" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="{{route('pages.cart')}}">View cart</a>
                                        <a href="{{route('pages.checkout')}}">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="index.html"><img src="{{asset('assets')}}/assets/imgs/theme/logo.svg" alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="/">Home</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('pages.shop-grid-left')}}">shop</a>
                            <ul class="dropdown">
                                <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Single Product</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                        <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                        <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                        <li><a href="shop-product-vendor.html">Product – Vendor Infor</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-filter.html">Shop – Filter</a></li>
                                <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                <li><a href="shop-cart.html">Shop – Cart</a></li>
                                <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                <li><a href="shop-compare.html">Shop – Compare</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop Invoice</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-invoice-1.html">Shop Invoice 1</a></li>
                                        <li><a href="shop-invoice-2.html">Shop Invoice 2</a></li>
                                        <li><a href="shop-invoice-3.html">Shop Invoice 3</a></li>
                                        <li><a href="shop-invoice-4.html">Shop Invoice 4</a></li>
                                        <li><a href="shop-invoice-5.html">Shop Invoice 5</a></li>
                                        <li><a href="shop-invoice-6.html">Shop Invoice 6</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    
                        <li class="menu-item-has-children">
                            <a href="#">Mega menu</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="#">Women's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Dresses</a></li>
                                        <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                        <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="shop-product-right.html">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Men's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Jackets</a></li>
                                        <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                        <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                        <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                        <li><a href="shop-product-right.html">Tablets</a></li>
                                        <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                        <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="blog-category-fullwidth.html">Blog</a>
                            <ul class="dropdown">
                                <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                <li><a href="blog-category-list.html">Blog Category List</a></li>
                                <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Single Product Layout</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                        <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                        <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{route('register')}}"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                <a href="#"><img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                <a href="#"><img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                <a href="#"><img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                <a href="#"><img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
        </div>
    </div>
</div>