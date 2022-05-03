<?php 

$classic_wedding_color_scheme_gradiant1 = get_theme_mod('classic_wedding_color_scheme_gradiant1');

$classic_wedding_color_scheme_css = "";

if($classic_wedding_color_scheme_gradiant1 != false ){

  $classic_wedding_color_scheme_css .='a,h1, h2, h3, h4, h5, h6,.banner-btn a, .pagemore a, .serv-btn a, .woocommerce ul.products li.product .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.button, .woocommerce button.button, .woocommerce #respond input#submit, #commentform input#submit,.postmeta a:hover,#sidebar .tagcloud a {';

  $classic_wedding_color_scheme_css .='color: '.esc_attr($classic_wedding_color_scheme_gradiant1).'';

  $classic_wedding_color_scheme_css .='}';

  $classic_wedding_color_scheme_css .='.toggle-nav button {';

  $classic_wedding_color_scheme_css .='color: '.esc_attr($classic_wedding_color_scheme_gradiant1).'!important';

  $classic_wedding_color_scheme_css .='}';

  $classic_wedding_color_scheme_css .='.rsvp_text hr,.listarticle, aside.widget,#sidebar select,#sidebar input[type="text"], #sidebar input[type="search"], #footer input[type="search"],#sidebar .tagcloud a,.main-nav ul ul li,nav.woocommerce-MyAccount-navigation ul li,.woocommerce .quantity .qty,.content-inner-box span:before, .content-inner-box span:after,.content-inner-box {';

  $classic_wedding_color_scheme_css .='border-color: '.esc_attr($classic_wedding_color_scheme_gradiant1).'!important';

  $classic_wedding_color_scheme_css .='}';

  $classic_wedding_color_scheme_css .='.rsvp_button a:hover,.pagemore a:hover, .serv-btn a:hover, .woocommerce ul.products li.product .button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, #commentform input#submit:hover,.copywrap,.scroll-box::-webkit-scrollbar-thumb,#sidebar input.search-submit, #footer input.search-submit, form.woocommerce-product-search button,nav.woocommerce-MyAccount-navigation ul li:hover,.catwrapslider .owl-prev:hover, .catwrapslider .owl-next:hover,.slide-btn a:hover{';

  $classic_wedding_color_scheme_css .='background: '.esc_attr($classic_wedding_color_scheme_gradiant1).'!important';

  $classic_wedding_color_scheme_css .='}';

} 