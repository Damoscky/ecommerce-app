@extends('layouts.frontend.index-app')

@section('title', 'Reiss Edwards E-commerce Application')

@section('content')



    <div id="nt_content">

        <!-- main slide -->
        <div class="kalles-kids__wrap-slide kalles-section nt_section type_slideshow type_carousel">
            <div class="nt_full se_height_adapt nt_first">
                <div class="fade_flick_1 slideshow row no-gutters equal_nt nt_slider js_carousel prev_next_2 btn_owl_1 dot_owl_2 dot_color_1 btn_vi_2" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 8000,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": true,"pageDots": false, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
                    <div class="kalles-kids__slide-layout-01 col-12 slideshow__slide">
                        <div class="oh pr nt_img_txt bg-transparent">
                            <div class="js_full_ht4 img_slider_block dek_img_slide">
                                <div class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_zoom pa l__0 t__0 r__0 b__0" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/slide-bg-01.jpg"></div>
                            </div>
                            <div class="js_full_ht4 img_slider_block mb_img_slide">
                                <div class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_zoom pa l__0 t__0 r__0 b__0" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/mb-slide-bg-01.jpg"></div>
                            </div>
                            <div class="caption-wrap caption-w-1 pe_none z_100 tl_md tl">
                                <div class="pa_txts caption">
                                    <div class="right_left">
                                        <h4 class="kalles-kids__slide-layout-01__sup-title slt4_h4 mg__0 lh__1 f_body">FREE SHIPPING AVAILABLE</h4>
                                        <div class="kalles-kids__slide-layout-01__br-01 slt4_space"></div>
                                        <h3 class="kalles-kids__slide-layout-01__big-title slt4_h3 lh__1 mg__0">BIG SAVE ON<br/>FASHION BONANZA
                                        </h3>
                                        <div class="kalles-kids__slide-layout-01__br-02 slt4_space"></div>
                                        <p class="kalles-kids__slide-layout-01__desc slt4_p mg__0 dn db_md">Flannel lightweight line overall collection</p>
                                        <div class="kalles-kids__slide-layout-01__br-03 slt4_space"></div>
                                        <a class="kalles-kids__slide-layout-01__button slt4_btn button pe_auto round_true btn_icon_false" href="shop-filter-options.html">Explore Now</a>
                                    </div>
                                </div>
                            </div>
                            <a href="shop.html" class="pa t__0 l__0 b__0 r__0 pe_none"></a>
                        </div>
                    </div>
                    <div class="kalles-kids__slide-layout-01 col-12 slideshow__slide">
                        <div class="oh pr nt_img_txt bg-transparent">
                            <div class="js_full_ht4 img_slider_block dek_img_slide">
                                <div class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_zoom pa l__0 t__0 r__0 b__0" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/slide-bg-02.jpg"></div>
                            </div>
                            <div class="js_full_ht4 img_slider_block mb_img_slide">
                                <div class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_zoom pa l__0 t__0 r__0 b__0" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/mb-slide-bg-02.jpg"></div>
                            </div>
                            <div class="caption-wrap caption-w-1 pe_none z_100 tl_md tl">
                                <div class="pa_txts caption">
                                    <div class="right_left">
                                        <h4 class="kalles-kids__slide-layout-01__sup-title slt4_h4 mg__0 lh__1 f_body">60% DISCOUNT AVAILABLE</h4>
                                        <div class="kalles-kids__slide-layout-01__br-01 slt4_space"></div>
                                        <h3 class="kalles-kids__slide-layout-01__big-title slt4_h3 lh__1 mg__0">SALE ON BOYS<br/>& GIRL’S CLOTHING
                                        </h3>
                                        <div class="kalles-kids__slide-layout-01__br-02 slt4_space"></div>
                                        <p class="kalles-kids__slide-layout-01__desc slt4_p mg__0 dn db_md">Lightweight collection of apparels now!</p>
                                        <div class="kalles-kids__slide-layout-01__br-03 slt4_space"></div>
                                        <a class="kalles-kids__slide-layout-01__button slt4_btn button pe_auto round_true btn_icon_false" href="#">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                            <a href="shop.html" class="pa t__0 l__0 b__0 r__0 pe_none"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main slide -->

        <!--banner section-->
        <div class="kalles-section nt_section type_banner2 type_packery">
            <div class="kalles-kids__wrap-banners container">
                <div class="mt__30 nt_banner_holder row fl_center js_packery hoverz_false cat_space_20" data-packery='{ "itemSelector": ".cat_space_item","gutter": 0,"percentPosition": true,"originLeft": true }'>
                    <div class="grid-sizer"></div>
                    <div class="kalles-kids__banner-element cat_space_item col-lg-6 col-md-6 col-12 pr_animated done">
                        <div class="banner_hzoom nt_promotion oh pr">
                            <div class="nt_bg_lz pr_lazy_img lazyload item__position" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/banner-01.png"></div>
                            <a href="shop.html" class="pa t__0 l__0 r__0 b__0"></a>
                            <div class="nt_promotion_html pa t__0 l__0 tl pe_none">
                                <h4 class="kalles-kids__banner-element__sup-title mb__10 fs__16 mg__0 cw">50% DISCOUNT AVAILABLE</h4>
                                <h3 class="kalles-kids__banner-element__big-title mg__0 lh__1 cw mb__10">WARM WINNTER<br/>COLLECTION 2021
                                </h3>
                                <a class="kalles-kids__banner-element__btn mt__15 slt4_btn button round_true" href="#">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="kalles-kids__banner-element cat_space_item col-lg-6 col-md-6 col-12 pr_animated done">
                        <div class="banner_hzoom nt_promotion oh pr">
                            <div class="nt_bg_lz pr_lazy_img lazyload item__position" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/banner-02.png"></div>
                            <a href="shop.html" class="pa t__0 l__0 r__0 b__0"></a>
                            <div class="nt_promotion_html pa t__0 l__0 tl pe_none">
                                <h4 class="kalles-kids__banner-element__sup-title mb__10 fs__16 mg__0 cw">FREE SHIPPING NOW</h4>
                                <h3 class="kalles-kids__banner-element__big-title mg__0 lh__1 cw mb__10">BABY SITTER<br/>TROLLY COSATTO
                                </h3>
                                <a class="kalles-kids__banner-element__btn mt__15 slt4_btn button round_true" href="#">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end banner section-->

        <!--deal of to day section-->
        <div class="kalles-section nt_section type_prs_countd_deal type_carousel tp_se_cdt">
            <div class="kalles-kids__deal-of-to-day container">
                <div class="medizin_laypout">
                    <div class="product-cd-header in_flex wrap al_center fl_center tc">
                        <h6 class="product-cd-heading section-title">Daily Deal Of The Day</h6>
                        <div class="countdown-wrap in_flex fl_center al_center wrap pr_deal_dt">
                            <div class="countdown-label">End in:</div>
                            <div class="countdown pr_coun_dt" data-date="2021/12/20"></div>
                        </div>
                    </div>
                    <div class="products nt_products_holder row fl_center row_pr_1 js_carousel nt_slider nt_cover ratio_nt position_8 space_ prev_next_3 btn_owl_1 dot_owl_1 dot_color_1 btn_vi_1 flickity_prev_disable flickity_next_disable" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                        <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__10 pr_grid_item product nt_pr desgin__1">
                            <div class="product-inner pr">
                                <div class="product-info mb__15">
                                    <h3 class="product-title pr fs__14 mg__0 fwm">
                                        <a class="cd chp" href="product-detail-layout-01.html">Glitter Pink Mini Backpack</a>
                                    </h3>
                                    <span class="price dib mb__5"><span class="money">$29.00</span> </span>
                                    <div class="kalles-rating-result">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                        </span>
                                        <span class="kalles-rating-result__number">(5)</span>
                                    </div>
                                </div>
                                <div class="product-image pr oh lazyload">

                                    <a class="db" href="product-detail-layout-01.html">
                                        <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-09.jpg"></div>
                                    </a>
                                    <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                        <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-10.jpg"></div>
                                    </div>
                                    <div class="nt_add_w ts__03 pa">
                                        <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                            <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                        </a>
                                    </div>
                                    <div class="hover_button op__0 tc pa flex column ts__03">
                                        <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                            <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                        </a>
                                        <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                            <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="loop-product-stock">
                                    <div class="status-bar">
                                        <div class="sold-bar w-75"></div>
                                    </div>
                                    <div class="product-stock-status flex wrap">
                                        <div class="sold">
                                            <span class="label">Sold: </span> <span class="value">30<span></span></span>
                                        </div>
                                        <div class="available">
                                            <span class="label">Available: </span>
                                            <span class="value">46<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__10 pr_grid_item product nt_pr desgin__1">
                            <div class="product-inner pr">
                                <div class="product-info mb__15">
                                    <h3 class="product-title pr fs__14 mg__0 fwm">
                                        <a class="cd chp" href="product-detail-layout-01.html">Low Blush Beanie</a>
                                    </h3>
                                    <span class="price dib mb__5"><span class="money">$24.00</span> </span>
                                    <div class="kalles-rating-result">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                            <span class="kalles-rating-result__start"></span>
                                        </span>
                                        <span class="kalles-rating-result__number">(6)</span>
                                    </div>
                                </div>
                                <div class="product-image pr oh lazyload">

                                    <a class="db" href="product-detail-layout-01.html">
                                        <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-11.jpg"></div>
                                    </a>
                                    <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                        <div class="pr_lazy_img back-img pa nt_bg_lz lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-12.jpg"></div>
                                    </div>
                                    <div class="nt_add_w ts__03 pa">
                                        <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                            <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                        </a>
                                    </div>
                                    <div class="hover_button op__0 tc pa flex column ts__03">
                                        <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                            <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                        </a>
                                        <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                            <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="loop-product-stock">
                                    <div class="status-bar">
                                        <div class="sold-bar w-25"></div>
                                    </div>
                                    <div class="product-stock-status flex wrap">
                                        <div class="sold">
                                            <span class="label">Sold: </span> <span class="value">25<span></span></span>
                                        </div>
                                        <div class="available">
                                            <span class="label">Available: </span>
                                            <span class="value">75<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__10 pr_grid_item product nt_pr desgin__1">
                            <div class="product-inner pr">
                                <div class="product-info mb__15">
                                    <h3 class="product-title pr fs__14 mg__0 fwm">
                                        <a class="cd chp" href="product-detail-layout-01.html">Little Princess Rose Gold</a>
                                    </h3>
                                    <span class="price dib mb__5"><span class="money">$8.00</span> </span>
                                    <div class="kalles-rating-result">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                        </span>
                                        <span class="kalles-rating-result__number">(9)</span>
                                    </div>
                                </div>
                                <div class="product-image pr oh lazyload">
                                    <a class="db" href="product-detail-layout-01.html">
                                        <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-13.jpg"></div>
                                    </a>
                                    <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                        <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-14.jpg"></div>
                                    </div>
                                    <div class="nt_add_w ts__03 pa">
                                        <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                            <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                        </a>
                                    </div>
                                    <div class="hover_button op__0 tc pa flex column ts__03">
                                        <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                            <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                        </a>
                                        <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                            <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="loop-product-stock">
                                    <div class="status-bar">
                                        <div class="sold-bar w-50"></div>
                                    </div>
                                    <div class="product-stock-status flex wrap">
                                        <div class="sold">
                                            <span class="label">Sold: </span> <span class="value">52<span></span></span>
                                        </div>
                                        <div class="available">
                                            <span class="label">Available: </span>
                                            <span class="value">48<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__10 pr_grid_item product nt_pr desgin__1">
                            <div class="product-inner pr">
                                <div class="product-info mb__15">
                                    <h3 class="product-title pr fs__14 mg__0 fwm">
                                        <a class="cd chp" href="product-detail-layout-01.html">Striped Polo T-shirt</a>
                                    </h3>
                                    <span class="price dib mb__5"><del><span class="money">$19.99</span></del><ins><span class="money">$12.00</span></ins></span>
                                    <div class="kalles-rating-result">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                            <span class="kalles-rating-result__start"></span>
                                        </span>
                                        <span class="kalles-rating-result__number">(12)</span>
                                    </div>
                                </div>
                                <div class="product-image pr oh lazyload">
                                    <span class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span>-40%</span></span></span>
                                    <a class="db" href="product-detail-layout-01.html">
                                        <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-15.jpg"></div>
                                    </a>
                                    <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                        <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-16.jpg"></div>
                                    </div>
                                    <div class="nt_add_w ts__03 pa">
                                        <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                    </div>
                                    <div class="hover_button op__0 tc pa flex column ts__03">
                                        <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                            <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                        </a>
                                        <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                            <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="loop-product-stock">
                                    <div class="status-bar">
                                        <div class="sold-bar w-50"></div>
                                    </div>
                                    <div class="product-stock-status flex wrap">
                                        <div class="sold">
                                            <span class="label">Sold: </span> <span class="value">32<span></span></span>
                                        </div>
                                        <div class="available">
                                            <span class="label">Available: </span>
                                            <span class="value">36<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end deal of to day section-->

        <!--product deal section-->
        <div class="kalles-section nt_section type_featured-product js_fetpr_se bg-transparent">
            <div class="featured_product_se kalles-kids__deal-box container">
                <div class="row thumb_bottom thumb_col_4">
                    <div class="col-12 col-md-6 pr product-images img_action_zoom pr_sticky_img">
                        <div class="row theiaStickySidebar">
                            <div class="col-12 col_thumb">
                                <div class="p-thumb p-thumb001 images sp-pr-gallery equal_nt nt_contain ratio_imgtrue position_8 nt_slider pr_carousel" data-flickity='{"initialIndex": ".media_id_001","fade":true,"draggable":">1","cellSelector": ".p-item:not(.is_varhide)","cellAlign": "center","wrapAround": true,"autoPlay": false,"prevNextButtons":true,"adaptiveHeight": true,"imagesLoaded": false, "lazyLoad": 0,"dragThreshold" : 6,"pageDots": false,"rightToLeft": false }'>
                                    <div class="img_ptw p_ptw js-sl-item p-item sp-pr-gallery__img w__100 nt_bg_lz lazyload padding-top__100 media_id_001" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-01.jpg"></div>
                                    <div class="img_ptw p_ptw js-sl-item p-item sp-pr-gallery__img w__100 nt_bg_lz lazyload padding-top__100 media_id_002" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-02.jpg"></div>
                                    <div class="img_ptw p_ptw js-sl-item p-item sp-pr-gallery__img w__100 nt_bg_lz lazyload padding-top__100 media_id_003" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-03.jpg"></div>
                                    <div class="img_ptw p_ptw js-sl-item p-item sp-pr-gallery__img w__100 nt_bg_lz lazyload padding-top__100 media_id_004" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-04.jpg"></div>
                                    <div class="img_ptw p_ptw js-sl-item p-item sp-pr-gallery__img w__100 nt_bg_lz lazyload padding-top__100 media_id_005" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-05.jpg"></div>
                                    <div class="img_ptw p_ptw js-sl-item p-item sp-pr-gallery__img w__100 nt_bg_lz lazyload padding-top__100 media_id_006" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-06.jpg"></div>
                                </div>
                                <span class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span>-21%</span></span></span>
                            </div>
                            <div class="col-12 col_nav nav_medium">
                                <div class="p-nav p-nav-ready ratio_imgtrue row equal_nt nt_cover ratio_imgtrue position_8 nt_slider pr_carousel" data-flickity='{"initialIndex": ".media_id_001","cellSelector": ".n-item:not(.is_varhide)","cellAlign": "left","asNavFor": ".p-thumb001","wrapAround": true,"draggable": ">1","autoPlay": 0,"prevNextButtons": 0,"percentPosition": 1,"imagesLoaded": 0,"pageDots": 0,"groupCells": false,"rightToLeft": false,"contain":  1,"freeScroll": 0}'>
                                    <div class="col-3 n-item">
                                        <span class="nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-01-nav.jpg"></span>
                                    </div>
                                    <div class="col-3 n-item">
                                        <span class="nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-02-nav.jpg"></span>
                                    </div>
                                    <div class="col-3 n-item">
                                        <span class="nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-03-nav.jpg"></span>
                                    </div>
                                    <div class="col-3 n-item">
                                        <span class="nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-04-nav.jpg"></span>
                                    </div>
                                    <div class="col-3 n-item">
                                        <span class="nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-05-nav.jpg"></span>
                                    </div>
                                    <div class="col-3 n-item">
                                        <span class="nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/thumb-06-nav.jpg"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="summary entry-summary">
                            <div class="summary entry-summary">
                                <h3 class="h1 product_title entry-title fs__24">
                                    <a href="#">Cosatto Baby Fleece Troller</a>
                                </h3>
                                <div class="flex wrap fl_between al_center price-review">
                                    <p class="price">
                                        <span class="price_varies"><span class="money">$145.00</span></span></p>
                                    <div class="rating_sp_kl dib pe_none"></div>
                                </div>
                                <div class="pr_flash_sold cb d-block">
                                    <i class="cd mr__5 fading_true fs__20 las la-fire"></i><span class="nt_pr_sold clc fwm">6</span> sold in last
                                    <span class="nt_pr_hrs clc fwm">8</span> hours
                                </div>
                                <div class="nt_stock_page tl">
                                    <p class="message d-block cb mb__10 lh__1 fwm fs__16">
                                        <i class="cd mr__5 fading_true fs__20 las la-hourglass-half"></i>HURRY! ONLY
                                        <span class="count cp bg-white">15</span> LEFT IN STOCK.
                                    </p>
                                    <div class="progressbar progress_bar pr oh dn bg_light-pink w-100">
                                        <div class="bgcp w-25"></div>
                                    </div>
                                </div>
                                <div class="pr_short_des">
                                    <p class="mg__0">Fully removable seat unit for easy cleaning and self-standing capability. One-hand recline with 4 recline...</p>
                                </div>
                                <div class="btn-atc atc-slide btn_des_1 btn_txt_3">
                                    <div class="nt_stripe-lines nt1_ nt2_">
                                        <form method="post" action="#" class="nt_cart_form variations_form">
                                            <div class="variations mb__40 style__circle size_medium style_color des_color_1">
                                                <div class="swatch is-color kalles_swatch_js">
                                                    <h4 class="swatch__title">Color:
                                                        <span class="nt_name_current user_choose_js">Brown</span></h4>
                                                    <ul class="swatches-select swatch__list_pr">
                                                        <li data-index="1" class="ttip_nt tooltip_top_right nt-swatch swatch_pr_item bg_css_stripe-lines" data-escape="Stripe Lines">
                                                            <span class="tt_txt">Stripe Lines</span><span class="swatch__value_pr pr bg_color_stripe-lines lazyload"></span>
                                                        </li>
                                                        <li data-index="2" class="ttip_nt tooltip_top nt-swatch swatch_pr_item bg_css_green" data-escape="Green">
                                                            <span class="tt_txt">Green</span><span class="swatch__value_pr pr bg_color_green lazyload"></span>
                                                        </li>
                                                        <li data-index="3" class="ttip_nt tooltip_top nt-swatch swatch_pr_item bg_css_nude" data-escape="Nude">
                                                            <span class="tt_txt">Nude</span><span class="swatch__value_pr pr bg_color_nude lazyload"></span>
                                                        </li>
                                                        <li data-index="4" class="ttip_nt tooltip_top nt-swatch swatch_pr_item" data-escape="Grey">
                                                            <span class="tt_txt">Grey</span><span class="swatch__value_pr pr bg_color_grey lazyload"></span>
                                                        </li>
                                                        <li data-index="5" class="ttip_nt tooltip_top nt-swatch swatch_pr_item bg_css_dark-blue" data-escape="Dark Blue">
                                                            <span class="tt_txt">Dark Blue</span><span class="swatch__value_pr pr bg_color_dark-blue lazyload"></span>
                                                        </li>
                                                        <li data-index="6" class="ttip_nt tooltip_top nt-swatch swatch_pr_item bg_css_brown is-selected" data-escape="Brown">
                                                            <span class="tt_txt">Brown</span><span class="swatch__value_pr pr bg_color_brown lazyload"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="variations_button in_flex column w__100">
                                                <div class="flex wrap">
                                                    <div class="quantity pr mr__10 order-1 qty__true">
                                                        <input type="number" class="input-text qty text tc qty_pr_js" step="1" min="1" max="9999" name="quantity" value="1" inputmode="numeric"/>
                                                        <div class="qty tc fs__14">
                                                            <button type="button" class="plus db cb pa pd__0 pr__15 tr r__0">
                                                                <i class="facl facl-plus"></i>
                                                            </button>
                                                            <button type="button" class="minus db cb pa pd__0 pl__15 tl l__0">
                                                                <i class="facl facl-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="nt_add_w ts__03 pa order-3">
                                                        <a href="#" class="wishlistadd cb chp ttip_nt tooltip_top_left"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                                    </div>
                                                    <button type="submit" class="single_add_to_cart_button button truncate js_frm_cart w__100 mt__20 order-4">
                                                        <span class="txt_add">Add to cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="pr_trust_seal tl">
                                    <img class="img_tr_s1 lazyload w-75" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%202244%20285%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" data-srcset="{{ asset('frontend') }}/assets/images/home-kids/trust_img.png" alt=""/>
                                </div>
                                <div class="social-share tc">
                                    <div class="nt-social">
                                        <a href="https://www.facebook.com/" class="facebook cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Share on Facebook</span>
                                            <i class="facl facl-facebook"></i>
                                        </a>
                                        <a href="https://twitter.com/" class="twitter cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Share on Twitter</span>
                                            <i class="facl facl-twitter"></i>
                                        </a>
                                        <a href="#" class="email cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Share on Email</span>
                                            <i class="facl facl-mail-alt"></i>
                                        </a>
                                        <a href="https://www.pinterest.com/" class="pinterest cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Share on Pinterest</span>
                                            <i class="facl facl-pinterest"></i>
                                        </a>
                                        <a href="#" class="tumblr cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Share on Tumblr</span>
                                            <i class="facl facl-tumblr"></i>
                                        </a>
                                        <a href="#" class="telegram cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Share on Telegram</span>
                                            <i class="facl facl-telegram"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="pr_counter d-block cd">
                                    <i class="cd mr__5 fading_true fs__20 las la-eye"></i><span class="count clc fwm cd">85</span>
                                    <span class="cd fwm">People</span> are viewing this right now
                                </div>
                                <div class="prt_delivery d-block cd ">
                                    <i class="las la-truck fading_true fs__20 mr__5"></i>Order in the next
                                    <span class="h_delivery clc">15 hours 13 minutes</span> to get it between
                                    <span class="start_delivery fwm txt_under">Friday, 29th January</span> and
                                    <span class="end_delivery fwm txt_under">Wednesday, 3rd February</span>
                                    <span class="dn hr">hours</span><span class="dn min">minutes</span>
                                </div>
                                <a href="#" class="btn fwsb detail_link">View full details<i class="facl facl-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end product deal section-->

        <!--pinmap banner-->
        <div class="kalles-section type_lookbook_img js_lbcl bg-white">
            <div class="kalles-kids__pin-map-banner nt_full">
                <div class="pin__maker pr">
                    <div class="pin__image nt_bg_lz lazyload padding-top__42_857" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pin-map-banner.jpg"></div>
                    <div class="pin__type pin__type__position-01 pa op__0 pe_none pin__type_pr pin__size--medium pin_ic_1">
                        <span class="zoompin"></span><span class="pin_tt pin_tt_js dn db_mb"><i class="nav_link_icon"></i></span>
                        <span data-opennt="#pin_mfp_01" data-ani="none" data-class="mfp__pin" class="pin_tt mfp_js dn_md"><i class="nav_link_icon"></i></span>
                        <div id="pin_mfp_01">
                            <div class="pin_lazy_js pin__popup--top pin__popup--fade lazyload">
                                <div class="pin__popup op__0 pa">
                                    <div class="col-lg- col-md- col-12 tc mt__30 pr_grid_item product nt_pr desgin__2 tc">
                                        <div class="product-inner pr">
                                            <div class="product-image pr oh lazyload">
                                                <span class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span>-40%</span></span></span>
                                                <a class="db" href="product-detail-layout-01.html">
                                                    <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-15.jpg"></div>
                                                </a>
                                                <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                    <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-16.jpg"></div>
                                                </div>
                                                <div class="nt_add_w ts__03 pa">
                                                    <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                                </div>
                                                <div class="hover_button op__0 tc pa flex column ts__03">
                                                    <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                        <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                    </a>
                                                    <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                        <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info mt__15">
                                                <h3 class="product-title pr fs__14 mg__0 fwm">
                                                    <a class="cd chp" href="product-detail-layout-01.html">Striped Polo T-shirt</a>
                                                </h3>
                                                <span class="price dib mb__5"><del><span class="money">$19.99</span></del><ins><span class="money">$12.00</span></ins></span>
                                                <div class="kalles-rating-result justify-content-center">
                                                    <span class="kalles-rating-result__pipe">
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start active"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                    </span>
                                                    <span class="kalles-rating-result__number cp">(12)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pin__type pin__type__position-02 pa op__0 pe_none pin__type_pr pin__size--medium pin_ic_1">
                        <span class="zoompin"></span><span class="pin_tt pin_tt_js dn db_mb"><i class="nav_link_icon"></i></span>
                        <span data-opennt="#pin_mfp_02" data-ani="none" data-class="mfp__pin" class="pin_tt mfp_js dn_md"><i class="nav_link_icon"></i></span>
                        <div id="pin_mfp_02">
                            <div class="pin_lazy_js pin__popup--top pin__popup--fade lazyload">
                                <div class="pin__popup op__0 pa">
                                    <div class="col-lg- col-md- col-12 tc mt__30 pr_grid_item product nt_pr desgin__2 tc">
                                        <div class="product-inner pr">
                                            <div class="product-image pr oh lazyload">
                                                <a class="db" href="product-detail-layout-01.html">
                                                    <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-03.jpg"></div>
                                                </a>
                                                <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                    <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-04.jpg"></div>
                                                </div>
                                                <div class="nt_add_w ts__03 pa">
                                                    <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                                </div>
                                                <div class="hover_button op__0 tc pa flex column ts__03">
                                                    <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                        <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                    </a>
                                                    <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                        <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info mt__15">
                                                <h3 class="product-title pr fs__14 mg__0 fwm">
                                                    <a class="cd chp" href="product-detail-layout-01.html">Baby Pajamas</a>
                                                </h3>
                                                <span class="price dib mb__5"><span class="money">$18.00</span> </span>
                                                <div class="kalles-rating-result justify-content-center">
                                                    <span class="kalles-rating-result__pipe">
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start active"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                    </span>
                                                    <span class="kalles-rating-result__number cp">(8)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pin__type pin__type__position-03 pa op__0 pe_none pin__type_pr pin__size--medium pin_ic_1">
                        <span class="zoompin"></span><span class="pin_tt pin_tt_js dn db_mb"><i class="nav_link_icon"></i></span>
                        <span data-opennt="#pin_mfp_03" data-ani="none" data-class="mfp__pin" class="pin_tt mfp_js dn_md"><i class="nav_link_icon"></i></span>
                        <div id="pin_mfp_03">
                            <div class="pin_lazy_js pin__popup--top pin__popup--fade lazyload">
                                <div class="pin__popup op__0 pa">
                                    <div class="col-lg- col-md- col-12 tc mt__30 pr_grid_item product nt_pr desgin__2 tc">
                                        <div class="product-inner pr">
                                            <div class="product-image pr oh lazyload">
                                                <a class="db" href="product-detail-layout-01.html">
                                                    <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-04.jpg"></div>
                                                </a>
                                                <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                    <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-17.jpg"></div>
                                                </div>
                                                <div class="nt_add_w ts__03 pa">
                                                    <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                                </div>
                                                <div class="hover_button op__0 tc pa flex column ts__03">
                                                    <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                        <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                    </a>
                                                    <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                        <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info mt__15">
                                                <h3 class="product-title pr fs__14 mg__0 fwm">
                                                    <a class="cd chp" href="product-detail-layout-01.html">Baby Pajamas</a>
                                                </h3>
                                                <span class="price dib mb__5"><span class="money">$18.00</span> </span>
                                                <div class="kalles-rating-result justify-content-center">
                                                    <span class="kalles-rating-result__pipe">
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start active"></span>
                                                    </span>
                                                    <span class="kalles-rating-result__number cp">(6)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pin__type pin__type__position-04 pa op__0 pe_none pin__type_pr pin__size--medium pin_ic_1">
                        <span class="zoompin"></span><span class="pin_tt pin_tt_js dn db_mb"><i class="nav_link_icon"></i></span>
                        <span data-opennt="#pin_mfp_04" data-ani="none" data-class="mfp__pin" class="pin_tt mfp_js dn_md"><i class="nav_link_icon"></i></span>
                        <div id="pin_mfp_04">
                            <div class="pin_lazy_js pin__popup--top pin__popup--fade lazyload">
                                <div class="pin__popup op__0 pa">
                                    <div class="col-lg- col-md- col-12 tc mt__30 pr_grid_item product nt_pr desgin__2 tc">
                                        <div class="product-inner pr">
                                            <div class="product-image pr oh lazyload">
                                                <a class="db" href="product-detail-layout-01.html">
                                                    <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-13.jpg"></div>
                                                </a>
                                                <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                    <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-14.jpg"></div>
                                                </div>
                                                <div class="nt_add_w ts__03 pa">
                                                    <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                                </div>
                                                <div class="hover_button op__0 tc pa flex column ts__03">
                                                    <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                        <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                    </a>
                                                    <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                        <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info mt__15">
                                                <h3 class="product-title pr fs__14 mg__0 fwm">
                                                    <a class="cd chp" href="product-detail-layout-01.html">Little Princess Rose Gold</a>
                                                </h3>
                                                <span class="price dib mb__5"><span class="money">$8.00</span> </span>
                                                <div class="kalles-rating-result">
                                                    <span class="kalles-rating-result__pipe justify-content-center">
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start active"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                    </span>
                                                    <span class="kalles-rating-result__number">(9)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pin__type pin__type__position-05 pa op__0 pe_none pin__type_pr pin__size--medium pin_ic_1">
                        <span class="zoompin"></span><span class="pin_tt pin_tt_js dn db_mb"><i class="nav_link_icon"></i></span>
                        <span data-opennt="#pin_mfp_05" data-ani="none" data-class="mfp__pin" class="pin_tt mfp_js dn_md"><i class="nav_link_icon"></i></span>
                        <div id="pin_mfp_05">
                            <div class="pin_lazy_js pin__popup--top pin__popup--fade lazyload">
                                <div class="pin__popup op__0 pa">
                                    <div class="col-lg- col-md- col-12 tc mt__30 pr_grid_item product nt_pr desgin__2 tc">
                                        <div class="product-inner pr">
                                            <div class="product-image pr oh lazyload">
                                                <a class="db" href="product-detail-layout-01.html">
                                                    <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-18.jpg"></div>
                                                </a>
                                                <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                    <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-19.jpg"></div>
                                                </div>
                                                <div class="nt_add_w ts__03 pa">
                                                    <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                                </div>
                                                <div class="hover_button op__0 tc pa flex column ts__03">
                                                    <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                        <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                    </a>
                                                    <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                        <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info mt__15">
                                                <h3 class="product-title pr fs__14 mg__0 fwm">
                                                    <a class="cd chp" href="product-detail-layout-01.html">Jean Shorts With Flower</a>
                                                </h3>
                                                <span class="price dib mb__5"><span class="money">$26.00</span> </span>
                                                <div class="kalles-rating-result">
                                                    <span class="kalles-rating-result__pipe justify-content-center">
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                        <span class="kalles-rating-result__start active"></span>
                                                        <span class="kalles-rating-result__start"></span>
                                                    </span>
                                                    <span class="kalles-rating-result__number">(9)</span>
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
        </div>
        <!--end pinmap banner-->

        <!--second banner section-->
        <div class="kalles-section nt_section type_banner2 type_packery">
            <div class="kalles-kids__second-banner-section container">
                <div class="mt__30 nt_banner_holder row fl_center js_packery hoverz_false cat_space_30" data-packery='{ "itemSelector": ".cat_space_item","gutter": 0,"percentPosition": true,"originLeft": true }'>
                    <div class="grid-sizer"></div>
                    <div class="kalles-kids__banner-style-04 cat_space_item col-lg-6 col-md-6 col-12 pr_animated done">
                        <div class="banner_hzoom nt_promotion oh pr">
                            <div class="nt_bg_lz pr_lazy_img lazyload item__position" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/banner-04.png"></div>
                            <a href="shop.html" class="pa t__0 l__0 r__0 b__0"></a>
                            <div class="nt_promotion_html pa t__0 l__0 tl pe_none">
                                <h4 class="bn-title--sup mb__10 fs__16 mg__0 cw">50% DISCOUNT AVAILABLE</h4>
                                <h3 class="bn-title--primary mg__0 lh__1 cw mb__10">FLANNEL-LINED<br/>CLOTHINGS</h3>
                                <a class="mt__15 slt4_btn button round_true" href="#">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="kalles-kids__banner-style-04 cat_space_item col-lg-6 col-md-6 col-12 pr_animated done">
                        <div class="banner_hzoom nt_promotion oh pr">
                            <div class="nt_bg_lz pr_lazy_img lazyload item__position" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/banner-05.png"></div>
                            <a href="shop.html" class="pa t__0 l__0 r__0 b__0"></a>
                            <div class="nt_promotion_html pa t__0 l__0 tl pe_none">
                                <h4 class="bn-title--sup mb__10 fs__16 mg__0 cw">FREE SHIPPING NOW</h4>
                                <h3 class="bn-title--primary mg__0 lh__1 cw mb__10">HEATHERED TOE<br/>TEADYBEAR</h3>
                                <a class="mt__15 slt4_btn button round_true" href="#">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end second banner section-->

        <!--product tabs-->
        <div class="kalles-section nt_section type_tab type_tab_collection tp_se_cdt">
            <div class="kalles-kids__product-tab container">
                <div class="wrap_title des_title_9">
                    <h3 class="section-title tc pr flex fl_center al_center fs__24 title_9">
                        <span class="mr__10 ml__10">Handpicked Products</span></h3>
                    <span class="dn tt_divider"><span></span><i class="dn clprfalse title_9 la-gem"></i><span></span></span>
                    <span class="section-subtitle db tc">Buy High Quality Products To Ensure The Best Quality For Your Health</span>
                </div>
                <div class="tab_se_wrap">
                    <div class="tab_se_header tc mt__30">
                        <ul class="tab_cat_title ul_none des_tab_11">
                            <li class="dib">
                                <a class="js_t4_tab tt_active" data-bid="best-seller-products" href="#"><span>Best Seller</span></a>
                            </li>
                            <li class="dib">
                                <a class="js_t4_tab" data-bid="featured-products" href="#"><span>Featured</span></a>
                            </li>
                            <li class="dib">
                                <a class="js_t4_tab" data-bid="sale-of-products" href="#"><span>Sale Off</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab_se_content">
                        <div class="tab_se_element tab__best-seller-products ct_active" id="best-seller-products">
                            <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30">
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-21.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-22.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Monkey Cutie Toy for Baby</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$26.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(5)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">

                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-29.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-30.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Baby Pajamas</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$18.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(8)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-23.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-24.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Summer My Fun Sticker Potty</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$20.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(4)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <span class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span>-16%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-25.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-26.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa ">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Quick Shop</span><i class="iccl iccl-cart"></i><span>Quick Shop</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Baby Stroller - Grey</a>
                                            </h3>
                                            <span class="price dib mb__5"><del><span class="money">$589.00</span></del><ins><span class="money">$495.00</span></ins></span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(4)</span>
                                            </div>
                                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-25.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Grey</span><span class="swatch__value bg_color_grey lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-07.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-26.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Brown</span><span class="swatch__value bg_color_brown lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-08.jpg"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-27.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-28.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Multi Color Sailboat Toy</a></h3>
                                            <span class="price dib mb__5"><span class="money">$6.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(1)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload"><span class="tc nt_labels pa pe_none cw">
                                            <span class="onsale nt_label"><span>-40%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-15.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-16.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Striped Polo T-shirt</a></h3>
                                            <span class="price dib mb__5"><del><span class="money">$19.99</span></del><ins><span class="money">$12.00</span></ins></span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(1)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload"><span class="tc nt_labels pa pe_none cw">
                                            <span class="onsale nt_label"><span>-40%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-13.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-14.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Little Princess Rose Gold</a></h3>
                                            <span class="price dib mb__5"><span class="money">$8.00</span></span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(1)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <span class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span>-21%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-stripe-lines.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-nude.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Quick Shop</span><i class="iccl iccl-cart"></i><span>Quick Shop</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Cosatto Baby Fleece Troller</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$99.00</span> – <span class="money">$145.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(4)</span>
                                            </div>
                                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-stripe-lines.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Stripe Lines</span><span class="swatch__value bg_color_stripe-lines lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/dot-01.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-green.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Green</span><span class="swatch__value bg_color_green lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/green-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-nude.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Nude</span><span class="swatch__value bg_color_nude lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/color-nude-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-grey.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Grey</span><span class="swatch__value bg_color_grey lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/grey-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-dark-blue.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Dark Blue</span><span class="swatch__value bg_color_dark-blue lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/dark-blue-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-brown" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Brown</span><span class="swatch__value bg_color_brown lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/brown-dot.jpg"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_se_element tab__featured-products" id="featured-products">
                            <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30">
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">

                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-29.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-30.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Baby Pajamas</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$18.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(8)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-21.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-22.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Monkey Cutie Toy for Baby</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$26.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(5)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-23.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-24.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Summer My Fun Sticker Potty</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$20.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(4)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <span class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span>-21%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-stripe-lines.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-nude.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Quick Shop</span><i class="iccl iccl-cart"></i><span>Quick Shop</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Cosatto Baby Fleece Troller</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$99.00</span> – <span class="money">$145.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(4)</span>
                                            </div>
                                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-stripe-lines.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Stripe Lines</span><span class="swatch__value bg_color_stripe-lines lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/dot-01.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-green.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Green</span><span class="swatch__value bg_color_green lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/green-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-nude.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Nude</span><span class="swatch__value bg_color_nude lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/color-nude-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-grey.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Grey</span><span class="swatch__value bg_color_grey lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/grey-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-dark-blue.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Dark Blue</span><span class="swatch__value bg_color_dark-blue lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/dark-blue-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-brown" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Brown</span><span class="swatch__value bg_color_brown lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/brown-dot.jpg"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload"><span class="tc nt_labels pa pe_none cw">
                                            <span class="onsale nt_label"><span>-40%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-15.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-16.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Striped Polo T-shirt</a></h3>
                                            <span class="price dib mb__5"><del><span class="money">$19.99</span></del><ins><span class="money">$12.00</span></ins></span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(1)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload"><span class="tc nt_labels pa pe_none cw">
                                            <span class="onsale nt_label"><span>-40%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-13.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-14.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Little Princess Rose Gold</a></h3>
                                            <span class="price dib mb__5"><span class="money">$8.00</span></span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(1)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <span class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span>-16%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-25.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-26.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa ">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Quick Shop</span><i class="iccl iccl-cart"></i><span>Quick Shop</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Baby Stroller - Grey</a>
                                            </h3>
                                            <span class="price dib mb__5"><del><span class="money">$589.00</span></del><ins><span class="money">$495.00</span></ins></span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(4)</span>
                                            </div>
                                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-25.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Grey</span><span class="swatch__value bg_color_grey lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-07.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-26.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Brown</span><span class="swatch__value bg_color_brown lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-08.jpg"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-27.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-28.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Multi Color Sailboat Toy</a></h3>
                                            <span class="price dib mb__5"><span class="money">$6.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(1)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab_se_element tab__sale-of-products" id="sale-of-products">
                            <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30">
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-23.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-24.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Summer My Fun Sticker Potty</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$20.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(4)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-21.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-22.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Monkey Cutie Toy for Baby</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$26.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(5)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">

                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-29.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-30.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Baby Pajamas</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$18.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(8)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <span class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span>-21%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-stripe-lines.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-nude.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Quick Shop</span><i class="iccl iccl-cart"></i><span>Quick Shop</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Cosatto Baby Fleece Troller</a>
                                            </h3>
                                            <span class="price dib mb__5"><span class="money">$99.00</span> – <span class="money">$145.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(4)</span>
                                            </div>
                                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-stripe-lines.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Stripe Lines</span><span class="swatch__value bg_color_stripe-lines lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/dot-01.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-green.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Green</span><span class="swatch__value bg_color_green lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/green-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-nude.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Nude</span><span class="swatch__value bg_color_nude lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/color-nude-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-grey.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Grey</span><span class="swatch__value bg_color_grey lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/grey-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-dark-blue.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Dark Blue</span><span class="swatch__value bg_color_dark-blue lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/dark-blue-dot.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/tab-dot-brown" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Brown</span><span class="swatch__value bg_color_brown lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/brown-dot.jpg"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload"><span class="tc nt_labels pa pe_none cw">
                                            <span class="onsale nt_label"><span>-40%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-15.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-16.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Striped Polo T-shirt</a></h3>
                                            <span class="price dib mb__5"><del><span class="money">$19.99</span></del><ins><span class="money">$12.00</span></ins></span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(1)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-27.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-28.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Multi Color Sailboat Toy</a></h3>
                                            <span class="price dib mb__5"><span class="money">$6.00</span> </span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(1)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload"><span class="tc nt_labels pa pe_none cw">
                                            <span class="onsale nt_label"><span>-40%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-13.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-14.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                    <span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i>
                                                </a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js_addtc cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Add to cart</span><i class="iccl iccl-cart"></i><span>Add to cart</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Little Princess Rose Gold</a></h3>
                                            <span class="price dib mb__5"><span class="money">$8.00</span></span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(1)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                    <div class="product-inner pr">
                                        <div class="product-image pr oh lazyload">
                                            <span class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span>-16%</span></span></span>
                                            <a class="db" href="product-detail-layout-01.html">
                                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-25.jpg"></div>
                                            </a>
                                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__100" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-26.jpg"></div>
                                            </div>
                                            <div class="nt_add_w ts__03 pa ">
                                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                            </div>
                                            <div class="hover_button op__0 tc pa flex column ts__03">
                                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                    <span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span>
                                                </a>
                                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left">
                                                    <span class="tt_txt">Quick Shop</span><i class="iccl iccl-cart"></i><span>Quick Shop</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info mt__15">
                                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                                <a class="cd chp" href="product-detail-layout-01.html">Baby Stroller - Grey</a>
                                            </h3>
                                            <span class="price dib mb__5"><del><span class="money">$589.00</span></del><ins><span class="money">$495.00</span></ins></span>
                                            <div class="kalles-rating-result">
                                                <span class="kalles-rating-result__pipe">
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                    <span class="kalles-rating-result__start active"></span>
                                                    <span class="kalles-rating-result__start"></span>
                                                </span>
                                                <span class="kalles-rating-result__number">(4)</span>
                                            </div>
                                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-25.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Grey</span><span class="swatch__value bg_color_grey lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-07.jpg"></span></span>
                                                <span data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-26.jpg" class="nt_swatch_on_bg swatch__list--item pr ttip_nt tooltip_top_right"><span class="tt_txt">Brown</span><span class="swatch__value bg_color_brown lazyload" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/pr-08.jpg"></span></span>
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
        <!--end product tabs-->

        <!--blog post-->
        <div class="kalles-section nt_section type_featured_blog type_carousel bg-white">
            <div class="kalles-kids__blog-post container">
                <div class="wrap_title mb__30 des_title_9">
                    <h3 class="section-title tc pr flex fl_center al_center fs__24 title_9">
                        <span class="mr__10 ml__10">LATES FROM BLOG</span>
                    </h3>
                    <span class="dn tt_divider"><span></span><i class="dn clprfalse title_9 la-pencil-alt"></i><span></span></span>
                    <span class="section-subtitle db tc">The freshest and most exciting news</span>
                </div>
                <div class="articles art_des1 nt_products_holder row nt_cover ratio4_3 position_8 equal_nt js_carousel nt_slider prev_next_1 btn_owl_1 dot_owl_1 dot_color_1 btn_vi_1" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 1, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": false,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                    <article class="post_nt_loop post_1 col-lg-4 col-md-4 col-12 pr_animated done mb__40">
                        <a class="mb__15 db pr oh" href="blog-left-sidebar.html">
                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/blog-post-01.jpg"></div>
                        </a>
                        <div class="post-info mb__10">
                            <h4 class="mg__0 fs__16 mb__5 ls__0">
                                <a class="cd chp open" href="blog-left-sidebar.html">Why February Babies Are Extra Special</a>
                            </h4>
                        </div>
                        <div class="post-content">Applying The Kids Design Guide Internet technology such as online retailers and social media platforms have given...</div>
                    </article>
                    <article class="post_nt_loop post_1 col-lg-4 col-md-4 col-12 pr_animated done mb__40">
                        <a class="mb__15 db pr oh" href="blog-left-sidebar.html">
                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/blog-post-02.jpg"></div>
                        </a>
                        <div class="post-info mb__10">
                            <h4 class="mg__0 fs__16 mb__5 ls__0">
                                <a class="cd chp open" href="blog-left-sidebar.html">The End Result Was Absolutely Amazing</a>
                            </h4>
                        </div>
                        <div class="post-content">Consumption as a share of gross domestic product in China has fallen for six decades, from 76 percent in 1952 to 28...</div>
                    </article>
                    <article class="post_nt_loop post_1 col-lg-4 col-md-4 col-12 pr_animated done mb__40">
                        <a class="mb__15 db pr oh" href="blog-left-sidebar.html">
                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/blog-post-03.jpg"></div>
                        </a>
                        <div class="post-info mb__10">
                            <h4 class="mg__0 fs__16 mb__5 ls__0">
                                <a class="cd chp open" href="blog-left-sidebar.html">The Surprising Way Motherhood Changed Me</a>
                            </h4>
                        </div>
                        <div class="post-content">The End Result Was Absolutely Amazing As we undergo a global economic downturn, the “Spend now, think later” belief...</div>
                    </article>
                    <article class="post_nt_loop post_1 col-lg-4 col-md-4 col-12 pr_animated done mb__40">
                        <a class="mb__15 db pr oh" href="blog-left-sidebar.html">
                            <div class="lazyload nt_bg_lz pr_lazy_img" data-bgset="{{ asset('frontend') }}/assets/images/home-kids/blog-post-04.jpg"></div>
                        </a>
                        <div class="post-info mb__10">
                            <h4 class="mg__0 fs__16 mb__5 ls__0">
                                <a class="cd chp open" href="blog-left-sidebar.html">How Aromatherapy Can Impact NICU Babies</a>
                            </h4>
                        </div>
                        <div class="post-content">Machine vision technology has been developed to track how fashions spread through society. The industry can now see...</div>
                    </article>
                </div>
            </div>
        </div>
        <!--end blog post-->

@endsection
