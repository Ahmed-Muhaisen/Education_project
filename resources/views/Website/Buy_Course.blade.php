@extends('Website/master')
@section('title', 'Buy page | '.env('APP_NAME'))
@section('content')


 <!--search overlay start-->
 <div class="search-wrap">
    <div class="overlay">
        <form action="" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <h3>Search Your keyword</h3>
                        <input type="text" class="form-control" placeholder="Search..."/>
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <img class="search-close" src="assets/images/close.png" srcset="assets/images/close@2x.png 2x" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--search overlay end-->


<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>Checkout</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  Checkout
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>

    <main class="site-main woocommerce single single-product page-wrapper">
        <!--shop category start-->
        <section class="space-3">
            <div class="container">
                <div class="row">
                    <section id="primary" class="content-area col-lg-12">
                        <main id="main" class="site-main" role="main">
                            <article id="post-8" class="post-8 page type-page status-publish hentry">
                                <div class="entry-content d-flex">


                                            <div class="col-md-7">
                                                <div class="col2-set" id="customer_details">
                                                    <div class="col-12">
                                                        <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$checkoutId}}"></script>

                                                        <form action="{{ route('Website.Buy_course_thanks',$Course->id) }}" class="paymentWidgets" data-brands="VISA MASTER AMEX RUPAY"></form>



                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div id="order_review" class="woocommerce-checkout-review-order w-100">
                                                    <h3 id="order_review_heading">Your order</h3>
                                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                                        <thead>
                                                        <tr>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-total">Total</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                              {{$Course->L_Name}}
                                                                                                                                                            </td>
                                                            <td class="product-total">
                                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$&nbsp;</span> {{$Course->price}}</span>						</td>
                                                        </tr>
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                               descount
                                                                                                                                                            </td>
                                                            <td class="product-total">
                                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>                      {{$Course->descount}}%
                                                                <span>						</td>
                                                        </tr>
                                                        </tbody>
                                                        <tfoot>


                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$&nbsp;</span>{{  $total=$Course->price-($Course->descount/100 *$Course->price); }}</span></strong> </td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>



                                                </div>
                                            </div>



                                    </div>
                                </div><!-- .entry-content -->

                            </article><!-- #post-## -->

                        </main><!-- #main -->
                    </section>
                </div>
            </div>
        </section>
        <!--shop category end-->
    </main>

    @endsection
