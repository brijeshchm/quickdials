@extends('client.layouts.app')
@section('title')
	{{$client->business_name}} | Quick Dials
@endsection
@section('keyword')
	{{$client->business_name}} | Quick Dials
@endsection
@section('description')
	{{$client->business_name}} | Quick Dials
@endsection
@section('content')
	<div class="container">
		

	<style>
		.vertical-alignment-helper {
			display: table;
			height: 100%;
			width: 100%;
			pointer-events: none;
			/* This makes sure that we can still click outside of the modal to close it */
		}

		.vertical-align-center {
			/* To center vertically */
			display: table-cell;
			vertical-align: middle;
			pointer-events: none;
		}

		.modal-content {
			/* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
			width: inherit;
			height: inherit;
			/* To center horizontally */
			margin: 0 auto;
			pointer-events: all;
		}

		#smsEmailModal .modal-header,
		#smsEmailModal h4,
		#smsEmailModal .close {
			background-color: #fe610c;
			color: white !important;
			text-align: center;
			font-size: 22px;
		}

		#smsEmailModal .modal-footer,
		#login-button {
			background-color: #fe610c;
			border: 1px solid #fe610c;
		}

		#smsEmailModal .modal-header .close {
			margin-top: -9px;
			margin-right: -32px;
			color: #fff;
			opacity: 0.8;
		}

		#smsEmailModal .select2-container--bootstrap {
			width: inherit !important;
		}

		/* Always set the map height explicitly to define the size of the div
					* element that contains the map. */
		#map {
			width: 100%;
			height: 100%;
		}

		#floating-panel {
			position: absolute;
			top: 10px;
			left: 25%;
			z-index: 5;
			background-color: #fff;
			padding: 5px;
			border: 1px solid #999;
			text-align: center;
			font-family: 'Roboto', 'sans-serif';
			line-height: 30px;
			padding-left: 10px;
		}

		.ajax-suggest-lead-home {
			top: 381px;
			left: 52px;
			width: 78.3%;
			border-radius: 4px;
		}
	 
		.review_form .help-block strong {
			margin-top: 32px;
			margin-left: 167px;
		}

		.review_form .rating-box .help-block strong {
			margin-top: -5px;
			margin-left: 167px;
		}

		.review_form .area-box strong {
			margin-top: -9px;
			margin-left: 167px;
		}

		#intro {
			color: #474849;
		}

		#intro h1 {
			font-size: 24px;
		}

		#intro h3,
		#intro h1 {
			/*border-bottom:1px solid #ddd;*/
			padding-bottom: 8px;
			margin-top: 40px;
		}

		#intro h3:after,
		#intro h1:after {
			content: '';
			display: block;
			/*border-bottom: 1px solid #ddd;*/
			top: 6px;
			position: relative;
			box-shadow: 0 1px 0 #ddd;
		}

		#cvs+span {
			visibility: hidden !important;
		}

		#intro h1,
		#intro h2 {
			font-weight: 400;
			font-size: 18px;
			color: #314252;
			line-height: 14px;
			padding: 5px 0;
			margin-top: 3px;
			margin-bottom: 0px;
			font-family: 'Open Sans', Arial, sans-serif !important;
		}

		#intro .inner-intro {
			padding-bottom: 6px;
			margin-bottom: 13px;
			/* border-bottom: 1px solid #ddd; */
			font-family: 'Open Sans', Arial, sans-serif !important;
			line-height: 1.5em;

		}

		#intro h2 {
			margin-bottom: 10px;
		}
	 
		/* Container */
		.top-details {
			display: grid;
			grid-template-columns: 1.2fr 1fr;
			gap: 20px;
			background: #ffffff;
			padding: 20px;
			border-radius: 12px;
			box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
			margin-bottom: 25px;
		}

		/* Left Box */
		.top-details aside {
			/* background: #f9f9f9; */
			padding: 20px;
			border-radius: 10px;
		}

		/* Business Name */
		.details-txt {
			font-size: 22px;
			font-weight: 600;
			margin-bottom: 8px;
		}

		.details-txt a {
			color: #1a1a1a;
			text-decoration: none;
		}

		.details-txt a:hover {
			color: #0d6efd;
		}



		/* Right Box (Map) */
		.top-details>div {
			background: #f9f9f9;
			padding: 10px;
			border-radius: 10px;
		}

		/* Map iframe */
		.top-details iframe {
			width: 100%;
			height: 100%;
			min-height: 200px;
			border-radius: 10px;
			border: 0;
		}

		/* Responsive */
		@media (max-width: 768px) {
			.top-details {
				grid-template-columns: 1fr;
			}

			.top-details iframe {
				min-height: 100px;
			}
		}
	 
		.heading h3 {
			font-size: 20px;
			color: #0b4f6c;
			margin-bottom: 10px;
			border-bottom: 2px solid #0b4f6c;
			padding-bottom: 5px;
			text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.15);
		}

		.modal-header h3 {
			font-size: 20px;
			color: #0b4f6c;
			margin-bottom: 10px;
			border-bottom: 2px solid #0b4f6c;
			padding-bottom: 5px;
			text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.15);
		}

		.section h2 {
			font-size: 20px;
			color: #0b4f6c;
			margin-bottom: 10px;
			border-bottom: 2px solid #0b4f6c;
			padding-bottom: 5px;
			text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.15);
		}

		.sections {
			display: flex;
			gap: 10px;
			flex-wrap: wrap;
		}
	 
		.related-seach {
			padding: 0 0 10px;
			position: relative;
			width: 100%;
			margin-top: 30px;
		}

		.related-seach ul {
			list-style: outside none none;
			margin: 0 -7px;
			padding: 0;
		}

		.related-seach ul li {
			display: inline-grid;
			line-height: 17px;
		}

		.assign-city {
			padding: 0 0 10px;
			position: relative;
			width: 100%;
			margin-top: 30px;
		}

		.assign-city ul {
			list-style: outside none none;
			margin: 0 -7px;
			padding: 0;
		}

		.assign-city ul li {
			display: inline-grid;
			line-height: 17px;
		}



		.section {
			padding: 15px;
		}


		.services {
			display: flex;
			gap: 10px;
			flex-wrap: wrap;
		}

		.service {
			background: #eef3ff;
			padding: 8px 12px;
			border-radius: 20px;
			font-size: 13px;
			animation: slideUp .6s ease;
		}
	 
		.section {
			padding: 15px;
		}

		.heading h3 {
			font-size: 18px;
			margin-bottom: 12px;
			display: flex;
			align-items: center;
			gap: 8px;
		}

		.heading i {
			color: #0d6efd;
		}

		/* Gallery Grid */
		.gallery-grid {
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			gap: 12px;
		}

		/* Gallery Item */
		.gallery-item {
			position: relative;
			overflow: hidden;
			border-radius: 12px;
			background: #f5f7fb;
			animation: fadeUp 0.5s ease;
		}

		.gallery-item img {
			width: 100%;
			height: 110px;
			object-fit: cover;
			transition: transform 0.4s ease;
		}

		/* Hover Animation */
		.gallery-item:hover img {
			transform: scale(1.08);
		}

		/* Placeholder */
		.gallery-item.placeholder img {
			object-fit: contain;
			padding: 12px;
			opacity: 0.8;
		}

		/* Mobile Responsive */
		@media (max-width: 480px) {
			.gallery-grid {
				grid-template-columns: repeat(2, 1fr);
			}
		}

		/* Animation */
		@keyframes fadeUp {
			from {
				opacity: 0;
				transform: translateY(10px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
	 
		/* Certificate Item */
		.cert-item {
			border-radius: 12px;
			overflow: hidden;
			cursor: pointer;
		}

		.cert-item img {
			width: 100%;
			height: 120px;
			object-fit: cover;
			transition: transform 0.4s ease;
		}

		.cert-item:hover img {
			transform: scale(1.05);
		}

		/* LIGHTBOX */
		.lightbox-overlay {
			position: fixed;
			inset: 0;
			background: rgba(0, 0, 0, 0.85);
			display: none;
			justify-content: center;
			align-items: center;
			z-index: 9999;
			animation: fadeIn 0.3s ease;
		}

		.lightbox-overlay img {
			max-width: 90%;
			max-height: 90%;
			border-radius: 12px;
		}

		/* Close Button */
		.lightbox-close {
			position: absolute;
			top: 20px;
			right: 25px;
			font-size: 30px;
			color: #fff;
			cursor: pointer;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}
	 
						.section {
							padding: 20px;
						}

						.heading h3 {
							font-size: 18px;
							margin-bottom: 15px;
							display: flex;
							gap: 8px;
							align-items: center;
						}

						.heading i {
							color: #0d6efd;
						}

						/* Main Layout */
						.certificate-layout {
							display: grid;
							grid-template-columns: 1fr 1fr;
							gap: 20px;
						}

						/* Gallery Grid */
						.certificate-gallery {
							display: grid;
							grid-template-columns: repeat(3, 1fr);
							gap: 12px;
						}

						.cert-item {
							/* background: #f5f7fb; */
							border-radius: 12px;
							overflow: hidden;
							animation: fadeUp 0.4s ease;
						}

						.cert-item img {
							width: 100%;
							height: 120px;
							object-fit: cover;
							transition: transform 0.4s ease;
						}

						.cert-item:hover img {
							transform: scale(1.08);
						}

						.cert-item.placeholder img {
							object-fit: contain;
							padding: 14px;
							opacity: 0.8;
						}

						/* Form */
						.certificate-form {
							background: #fff8dc;
							padding: 20px;
							border-radius: 14px;
						}

						.lead-form {
							display: flex;
							flex-direction: column;
							gap: 12px;
						}

						.form-group {
							display: flex;
							flex-direction: column;
							gap: 4px;
						}

						.form-group label {
							font-size: 13px;
							font-weight: 500;
						}

						.form-group input,
						.form-group textarea {
							padding: 10px 12px;
							border-radius: 8px;
							border: 1px solid #ddd;
							font-size: 14px;
						}

						.submit-btn {
							margin-top: 10px;
							padding: 12px;
							border: none;
							border-radius: 10px;
							background: #0d6efd;
							color: #fff;
							font-size: 15px;
							cursor: pointer;
							transition: 0.3s;
						}

						.submit-btn:hover {
							background: #084298;
						}

						/* Mobile Responsive */
						@media (max-width: 768px) {
							.certificate-layout {
								grid-template-columns: 1fr;
							}

							.certificate-gallery {
								grid-template-columns: repeat(2, 1fr);
							}
						}

						/* Animation */
						@keyframes fadeUp {
							from {
								opacity: 0;
								transform: translateY(10px);
							}

							to {
								opacity: 1;
								transform: translateY(0);
							}
						}
					 

	 
							.video-section {
								padding: 6px;
								/* background: #f5f7fb; */
								text-align: center;
							}

							.video-title {
								font-size: 32px;
								margin-bottom: 30px;
								font-weight: 600;
							}



							.video-wrapper {
								position: relative;
								padding-bottom: 56.25%;
								/* 16:9 ratio */
								height: 0;
								overflow: hidden;
								border-radius: 10px;
								box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
							}

							.video-wrapper iframe {
								position: absolute;
								top: 0;
								left: 0;
								width: 100%;
								height: 100%;
							}
						 


						*,
						*::before,
						*::after {
							box-sizing: border-box;
							margin: 0;
							padding: 0;
						}

						:root {
							--crimson: #8B1A1A;
							--crimson-deep: #6B1212;
							--gold: #C9871C;
							--gold-light: #F0B429;
							--ivory: #FAF7F2;
							--warm-white: #FFFFFF;
							--warm-gray: #EDE9E3;
							--charcoal: #2C2A28;
							--muted: #7A7570;
							--border: rgba(139, 26, 26, 0.13);
						}

						body {
							font-family: 'DM Sans', sans-serif;
							background: var(--ivory);
							color: var(--charcoal);
						}

						/* ── SECTION ── */
						.section {
							padding: 64px 20px 80px;
						}

						.heading {
							text-align: center;
							margin-bottom: 50px;
						}

						 

						.heading h3::after {
							content: '';
							position: absolute;
							bottom: 0;
							left: 50%;
							transform: translateX(-50%);
							width: 56px;
							height: 3px;
							background: linear-gradient(90deg, var(--crimson), var(--gold));
							border-radius: 2px;
						}

						.heading h3 i {
							color: var(--gold);
						}

						 
						.gov-container {
							max-width: 1160px;
							margin: 0 auto;
							display: grid;
							grid-template-columns: 360px 1fr;
							gap: 36px;
							align-items: start;
						}

						/* ── LEFT LIST ── */
						.gov-left {
							display: flex;
							flex-direction: column;
							gap: 12px;
						}

						.gov-item {
							display: flex;
							align-items: center;
							gap: 15px;
							background: var(--crimson);
							color: #fff;
							padding: 15px 18px;
							border-radius: 10px;
							cursor: pointer;
							transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s;
							border: 2px solid transparent;
							position: relative;
							overflow: hidden;
							user-select: none;
							-webkit-tap-highlight-color: transparent;
						}

						.gov-item::before {
							content: '';
							position: absolute;
							inset: 0;
							background: linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, transparent 60%);
							pointer-events: none;
						}

						.gov-item.gold {
							background: var(--gold);
						}

						/* Desktop hover */
						@media (hover: hover) {
							.gov-item:hover {
								transform: translateX(6px);
								box-shadow: -4px 6px 20px rgba(139, 26, 26, 0.28);
							}

							.gov-item.gold:hover {
								box-shadow: -4px 6px 20px rgba(201, 135, 28, 0.35);
							}
						}

						.gov-item.active {
							border-color: var(--gold-light);
							box-shadow: -4px 6px 24px rgba(139, 26, 26, 0.38);
							transform: translateX(4px);
						}

						.gov-item.gold.active {
							border-color: #fff;
							box-shadow: -4px 6px 24px rgba(201, 135, 28, 0.45);
						}

						.gov-icon-wrap {
							width: 46px;
							height: 46px;
							border-radius: 8px;
							background: rgba(255, 255, 255, 0.18);
							display: flex;
							align-items: center;
							justify-content: center;
							flex-shrink: 0;
							overflow: hidden;
						}

						.gov-icon-wrap img {
							width: 34px;
							height: 34px;
							object-fit: contain;
							/* filter: brightness(0) invert(1); */
						}

						.gov-item-text {
							flex: 1;
						}

						.gov-item-text h4 {
							font-weight: 600;
							font-size: 0.93rem;
							margin-bottom: 3px;
						}

						.gov-item-text p {
							font-size: 0.77rem;
							opacity: 0.80;
							font-weight: 300;
							line-height: 1.4;
						}

						.gov-arrow {
							font-size: 0.75rem;
							opacity: 0.45;
							transition: opacity 0.2s, transform 0.2s;
							flex-shrink: 0;
						}

						.gov-item.active .gov-arrow {
							opacity: 1;
							transform: translateX(4px);
						}

						/* ── RIGHT PREVIEW (desktop) ── */
						.gov-right {
							background: var(--warm-white);
							border-radius: 16px;
							padding: 40px 36px;
							box-shadow: 0 10px 44px rgba(0, 0, 0, 0.09);
							border: 1px solid var(--border);
							text-align: center;
							position: sticky;
							top: 24px;
						}

						.cert-badge {
							display: inline-block;
							background: linear-gradient(135deg, var(--crimson), var(--crimson-deep));
							color: #fff;
							font-size: 0.70rem;
							font-weight: 600;
							letter-spacing: 0.13em;
							text-transform: uppercase;
							padding: 5px 14px;
							border-radius: 20px;
							margin-bottom: 14px;
						}

						#certTitle {
							font-family: 'Playfair Display', serif;
							font-size: clamp(1.3rem, 2.4vw, 1.8rem);
							color: var(--gold);
							margin-bottom: 24px;
							line-height: 1.3;
							transition: opacity 0.28s ease;
						}

						.cert-img-box {
							background: var(--warm-gray);
							border-radius: 12px;
							padding: 28px 20px;
							margin-bottom: 22px;
							min-height: 200px;
							display: flex;
							align-items: center;
							justify-content: center;
						}

						#certImage {
							max-width: 100%;
							max-height: 180px;
							object-fit: contain;
							border-radius: 6px;
							transition: opacity 0.28s ease, transform 0.35s ease;
						}

						#certImage.fade {
							opacity: 0;
							transform: scale(0.95);
						}

						.cert-divider {
							width: 38px;
							height: 2px;
							background: linear-gradient(90deg, var(--crimson), var(--gold));
							border-radius: 2px;
							margin: 0 auto 16px;
						}

						#certDesc {
							font-size: 0.91rem;
							color: var(--muted);
							line-height: 1.75;
							max-width: 420px;
							margin: 0 auto;
							transition: opacity 0.28s ease;
						}

						#certDesc.fade {
							opacity: 0;
						}
.mobile-panel{
	display: none;
}

						 
						@media (max-width: 899px) {
.mobile-panel{
	display: block;
}
							.section {
								padding: 40px 14px 56px;
							}

							.heading {
								margin-bottom: 32px;
							}

							/* Stack everything in one column */
							.gov-container {
								grid-template-columns: 1fr;
								gap: 0;
							}

							/* Hide desktop right panel */
							.gov-right {
								display: none;
							}

							/* Left list becomes full-width accordion */
							.gov-left {
								flex-direction: column;
								gap: 0;
								border-radius: 14px;
								overflow: hidden;
								box-shadow: 0 6px 28px rgba(0, 0, 0, 0.10);
							}

							.gov-item {
								border-radius: 0;
								border: none;
								border-bottom: 1px solid rgba(255, 255, 255, 0.12);
								padding: 16px 18px;
								transform: none !important;
								box-shadow: none !important;
							}

							.gov-item:last-of-type {
								border-bottom: none;
							}

							.gov-item.active {
								border-color: transparent;
							}

							/* Arrow rotates to point down when open */
							.gov-arrow {
								opacity: 0.6;
								transition: transform 0.3s ease, opacity 0.2s;
							}

							.gov-item.active .gov-arrow {
								transform: rotate(90deg);
								opacity: 1;
							}

							/* ── MOBILE INLINE PANEL ── */
							.mobile-panel {
								max-height: 0;
								overflow: hidden;
								transition: max-height 0.42s cubic-bezier(0.4, 0, 0.2, 1),
									opacity 0.35s ease,
									padding 0.35s ease;
								opacity: 0;
								background: var(--warm-white);
								padding: 0 20px;
							}

							.mobile-panel.open {
								max-height: 600px;
								opacity: 1;
								padding: 22px 20px 26px;
							}

							.mobile-panel-inner {
								display: flex;
								flex-direction: column;
								align-items: center;
								text-align: center;
								gap: 16px;
							}

							.mobile-panel .mp-img-box {
								background: var(--warm-gray);
								border-radius: 10px;
								padding: 20px;
								width: 100%;
								display: flex;
								align-items: center;
								justify-content: center;
								min-height: 150px;
							}

							.mobile-panel .mp-img-box img {
								max-height: 130px;
								max-width: 100%;
								object-fit: contain;
							}

							.mobile-panel .mp-title {
								font-family: 'Playfair Display', serif;
								font-size: 1.2rem;
								color: var(--gold);
								line-height: 1.3;
							}

							.mobile-panel .mp-divider {
								width: 34px;
								height: 2px;
								background: linear-gradient(90deg, var(--crimson), var(--gold));
								border-radius: 2px;
							}

							.mobile-panel .mp-desc {
								font-size: 0.88rem;
								color: var(--muted);
								line-height: 1.72;
							}

							.mobile-panel .mp-badge {
								display: inline-block;
								background: linear-gradient(135deg, var(--crimson), var(--crimson-deep));
								color: #fff;
								font-size: 0.68rem;
								font-weight: 600;
								letter-spacing: 0.12em;
								text-transform: uppercase;
								padding: 4px 12px;
								border-radius: 20px;
							}
						}

						@media (max-width: 480px) {
							.gov-item-text p {
								display: none;
							}
						}
					 
			.img-certified{
				display: flex;
			}
			 
							.slider-wrapper {
								display: flex;
								gap: 20px;
							}

							/* Vertical Slider */

							.vertical-slider {
								width: 50%;
								height: 300px;
								overflow: hidden;
								position: relative;
							}

							.v-slides {
								display: flex;
								flex-direction: column;
								transition: transform 0.6s ease;
							}

							.v-slide {
								min-height: 300px;
							}

							.v-slide img {
								width: 444px;
								height: 300px;
								object-fit: cover;
							}

							/* Horizontal Slider */

							.horizontal-slider {
								width: 50%;
								height: 300px;
								overflow: hidden;
								position: relative;
							}

							.h-slides {
								display: flex;
								transition: transform 0.6s ease;
							}

							.h-slide {
								min-width: 100%;
							}

							.h-slide img {
								width: 100%;
								height: 100%;
								object-fit: cover;
							}

							/* Mobile */

							@media(max-width:768px) {

								.slider-wrapper {
									flex-direction: column;
								}

								.vertical-slider,
								.horizontal-slider {
									width: 100%;
									height: 173px !important;
								}

							}
						 
				.photo-collage {
					display: grid;
					/* grid-template-columns: 2.2fr 1fr; */
					gap: 6px;
					height: auto;
					border-radius: 12px;
					overflow: hidden;
					background: #eee;
					margin-top: 82px;
				}

				/* Left big image */
				.photo.big {
					background-size: cover;
					background-position: center;
				}

				/* Right grid */
				.photo-grid {
					display: grid;
					grid-template-columns: repeat(5, 1fr);
					grid-auto-rows: 1fr;
					gap: 6px;
				}

				/* Image boxes */
				.photo {
					position: relative;
					background-size: cover;
					background-position: center;
					cursor: pointer;
				}

				/* Hover effect */
				.photo:hover {
					filter: brightness(0.9);
				}

				/* +More overlay */
				.more-overlay {
					position: relative;
					inset: 0;
					background: rgba(0, 0, 0, 0.55);
					color: #fff;
					font-size: 18px;
					font-weight: 600;
					display: flex;
					align-items: center;
					justify-content: center;
					text-align: center;
				}

				/* Add more photo box */
				.add-more {
					background: #111;
					color: #fff;
					display: flex;
					align-items: center;
					justify-content: center;
					font-size: 14px;
					text-align: center;
				}

				/* Mobile Responsive */
				@media (max-width: 768px) {
.list-social li a img {
    width: 24px !important;
    height: 24px !important;
    display: block;
    object-fit: contain;
}
.social-rights{
 
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: bold;
    margin-top: 10px;
	left: 6px;
}
.social-left{
    margin-bottom: 50px;
}
.list-social{
	margin-top: 50px !important;
}
					.photo-collage {
						grid-template-columns: 2fr 0fr;
						height: auto;
						margin-top: 53px;
					}

					.photo.big {
						height: 220px;
					}

					.photo-grid {
						grid-template-columns: repeat(5, 1fr);
					}
				}

				.social-left{
					display: flex;
					flex-wrap: inherit;
					gap: 10px;
					/* margin: 16px 0; */
				}

				.social-right{

				}

				/* Container styling */
.social-rights {
    /* display: flex;
    justify-content: center; 
    padding: 20px 0; */


	    position: absolute;
    /* top: 20px; */
    right: 20px;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: bold;
}

/* Remove default list styles */
.list-social {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 15px; /* Spacing between icons */
    align-items: center;
}

/* Link and Image styling */
.list-social li a {
    display: inline-block;
    transition: transform 0.3s ease, opacity 0.3s ease;
}

.list-social li a img {
    width: 32px;  /* Adjust size as needed */
    height: 32px;
    display: block;
    object-fit: contain;
}

/* Hover Effects */
.list-social li a:hover {
    transform: translateY(-5px); /* Lift effect */
    opacity: 0.8;
}

/* Optional: Grayscale to Color effect */
 

.list-social li a:hover img {
    filter: grayscale(0%); /* Returns color on hover */
}
			 
.btn-circle.btn-phone p {
  margin: 0;
  font-size: 12px;
  font-weight: 600;
  line-height: 1;
}
 

.btn-circle {
  width: 56px;                   
  height: 56px;
  border-radius: 50%;          
  border: none;
  font-size: 1.5rem;             
  cursor: pointer;
  transition: all 0.25s ease;
  box-shadow: 0 4px 10px rgba(0,0,0,0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
}

.btn-circle:hover {
  transform: scale(1.12);
  box-shadow: 0 6px 16px rgba(0,0,0,0.18);
}

.btn-circle:active {
  transform: scale(0.95);
}

/* Specific colors */
.btn-phone {
  background: #25D366;           
}

.btn-enquire {
  background: #1976d2;
}

.btn-whatsapp {
  background: #25D366;
}

.btn-share {
  background: #757575;
}

.btn-edit {
  background: #616161;
}

/* Mobile: make slightly smaller if needed */
@media (max-width: 500px) {
  .btn-circle {
    width: 40px;
    height: 40px;
    font-size: 1.4rem;
  }
  
}
.trust-line {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  gap: 20px;               
  margin: 12px 0;
  font-size: 0.95rem;
  font-weight: 500;
  color: #2e7d32;          
}

.trust-item {
  display: flex;
  align-items: center;
  gap: 6px;                
}

.trust-icon {
  width: 22px;
  height: 22px;
  object-fit: contain;
}

/* Optional: make icons slightly larger on hover */
.trust-item:hover .trust-icon {
  transform: scale(1.15);
  transition: transform 0.2s;
}

/* Mobile adjustment */
@media (max-width: 500px) {
  .trust-line {
    gap: 14px;
    font-size: 0.9rem;
  }
  .trust-icon {
    width: 20px;
    height: 20px;
  }
}

	.business-head{
	display: flex;
    flex-wrap: inherit;
    gap: 10px;
    margin: 1px 0;
	}
     .card {
     
      margin: 0 auto;
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    .header {
      padding: 20px;
      border-bottom: 1px solid #eee;
      position: relative;
    }

    .title {
      font-size: 1.6rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .badges {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 12px;
    }

    .badge {
      font-size: 0.85rem;
      padding: 4px 10px;
      border-radius: 4px;
      background: #e0f7fa;
      color: #006064;
      font-weight: 500;
    }

    .rating-box {
      display: inline-flex;
      align-items: center;
      gap: 6px;      
      color: white;
      padding: 6px 12px;
      border-radius: 6px;
      font-weight: bold;
      font-size: 1.3rem;
      margin-bottom: 12px;
    }

    .rating-box .star {
      color: #ffeb3b;  
      font-size: 1.4rem;
    }

    .trust-line {
      font-size: 0.95rem;
      color: #2e7d32;
      font-weight: 500;
      margin-bottom: 12px;
    }

    .meta {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.6;
      margin-bottom: 16px;
    }

    .location {
      font-weight: 500;
      color: #006064;
    }

    .actions {
      display: flex;
      flex-wrap: inherit;
      gap: 10px;
      /* margin: 16px 0; */
    }
	.actions a {
		color:#fff;
	}

    .btn {
      padding: 10px 18px;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.2s;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .btn-phone { background: #25D366; color: white; }
    .btn-enquire { background: #1976d2; color: white; }
    .btn-whatsapp { background: #25D366; color: white; }
    .btn-share, .btn-edit { background: #f0f0f0; color: #333; }

    .btn:hover { opacity: 0.9; }

    
    .content {
      padding: 20px;
    }

    .advertise {
      position: absolute;
      top: 20px;
      right: 20px;
     
      color: white;
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 0.8rem;
      font-weight: bold;
    }

    @media (max-width: 500px) {
      .header { padding: 16px; 
	        height: auto;
	}
      .actions { display: flex;}
     .advertise{
		display: none;
	 }
     .rating-box{
display: block;
	 }
    }
  </style>
		<?php
	$profile_pic = [];
	$profile_pic['large']['src'] = 'client/images/default_profile_pic.jpg';
	if (null != $client->profile_pic) {
		$profile_pic = unserialize($client->profile_pic);
	}
	if (!empty($client->pictures)) {
							?>

		<div class="photo-collage">
			
			<!-- Left Big Image -->
		 
			<?php 
				$pictures = unserialize($client->pictures); 

				?>
			<!-- Right Grid -->
			<div class="photo-grid">
				<?php foreach (array_slice($pictures, 1, 6) as $key => $img): 

							?>
				<div class="photo small" style="background-image:url('<?php echo asset($img['large']['src']); ?>');">
					<a href="javascript:void(0);" data-t_img="#<?php echo ($key + 1); ?>" class="lightBox"><span>
							<?php if ($img['large']['src']) {?>
							<img loading="lazy" src="<?php echo asset('' . $img['large']['src']); ?>"
								alt="{{ $img['large']['name'] }}" class="img-responsive">
							<?php } ?>
						</span></a>

					<?php if ($key == 3 && count($pictures) > 6): ?>
					<div class="more-overlay">
						<a href="javascript:void(0);" data-t_img="#<?php echo ($key + 1); ?>" class="lightBox"></a>
						+<?php echo count($pictures) - 5; ?><br>More
					</div>
					<?php endif; ?>

				</div>
				<?php endforeach; ?>
				<?php if (!Auth::guard('clients')->check()) { ?>

				<div class="photo add-more" id="loginPopup">
					<span>📷<br>
						<a href="javascript:void(0);">Add More Photo</a>
					</span>
				</div>
				<?php } else { ?>
				<div class="photo add-more">
					<span>📷<br>
						<a href="{{ url('business/gallery-pictures') }}">Add More Photo</a>
					</span>
				</div>


				<?php  } ?>
			</div>

		</div>



		<?php } else { ?>
		<div class="banner innerbanner"
			style="background-image:url(<?php echo asset('' . $profile_pic['large']['src']); ?>);">
			<div class="transbox"></div>
			<div class="row">
				<div class="col-sm-12 col-md-12 banner-details">


				</div>

			</div>
		</div>
		<?php  } ?>
	</div>

	<div class="container">
		 


		 <div class="card">
 <div class="header">
          <div class="advertise"><div class="btn btn-primary common_popup_form top-btn">Send Enquiry</div></div>
<div class="business-head">
      <div class="title"> 
		<h3 class="hdTitle">Explore full details of <span
			class="croma-txt">{{isset($client->business_name) && !empty($client->business_name) ? $client->business_name : ""}}
			@if($client->certified_status)
	
		<img src="{{asset('crs/verified-badge.png')}}" alt="Verified" width="20" />
		
	
			@endif</span> including services, contact and location
			</h3>


	  </div>

	  </div>

      <div class="rating-box">
      
		<span class="green">{{ $avgRating }}</span>

		<span class="starvote">
		<?php
		$whole = floor($avgRating);
		$fraction = $avgRating - $whole;
		$remain = 5 - $whole;
		for ($i = 0; $i < $whole; ++$i) {
			echo "<i class=\"fullStar\"></i>";
		}
		if ($fraction > 0 && $fraction < 1) {
			echo "<i class=\"hlfStar\"></i>";
			--$remain;
		}
		for ($i = 0; $i < $remain; ++$i) {
			echo "<i class=\"emptyStar1\"></i>";
		}
		?>
	</span>     
	<div class="trust-line">
	@if($client->gst_no)
	<div class="trust-item">
		<img src="{{asset('img/q_gst.gif')}}" alt="GST" class="trust-icon" />
		GST
	</div>
	@endif

	@if($client->trusted_status)
	<div class="trust-item">
		<img src="{{asset('crs/shield.png')}}" alt="Trust" class="trust-icon" />
		Trust
	</div>
	@endif

	@if($client->certified_status)
	<div class="trust-item">
		<img src="{{asset('crs/verified-badge.png')}}" alt="Verified" class="trust-icon" />
		Verified
	</div>
	@endif
 
	<div class="trust-item">
		<img src="{{asset('crs/checkmark--v1.png')}}" alt="Claimed" class="trust-icon" />
		Claimed
	</div>


</div>
      </div>

	  <div class="actions">
					<div class="social-left">
  <button class="btn-circle btn-phone" title="Call: 07041 738 658">
    <span><a href="tel:917559435943"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle cx="12" cy="12" r="12" fill=""/> <!-- White inner circle for contrast -->
      <path d="M6.62 10.79C8.06 13.62 10.38 15.94 13.21 17.38L15.41 15.18C15.69 14.9 16.08 14.82 16.43 14.93C17.55 15.36 18.76 15.59 20 15.59C20.55 15.59 21 16.04 21 16.59V20C21 20.55 20.55 21 20 21C10.61 21 3 13.39 3 4C3 3.45 3.45 3 4 3H7.41C7.96 3 8.41 3.45 8.41 4C8.41 5.24 8.64 6.45 9.07 7.57C9.18 7.92 9.1 8.31 8.82 8.59L6.62 10.79Z" fill="#fff"/> <!-- Green handset path -->
    </svg></a></span>

  </button>
 
  <button class="btn-circle btn-enquire common_popup_form" title="Enquire Now">
    <span>
		
	<!-- <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
    <rect x="2" y="4" width="20" height="16" rx="2"/>
    <polyline points="2 8 12 14 22 8"/>
  </svg> -->


 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
    <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
  </svg></span> 
  <!-- or use ? / enquiry icon -->
  </button>
  <button class="btn-circle btn-whatsapp" title="WhatsApp">
    <span><a href="https://wa.me/917559435943"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" fill="currentColor"></path>
                </svg></a></span>  
  </button>
  <button class="btn-circle btn-share" title="Share">
    <span><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="18" cy="5" r="3"/>
    <circle cx="6" cy="12" r="3"/>
    <circle cx="18" cy="19" r="3"/>
    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
  </svg></span>
  </button>
  <button class="btn-circle btn-edit" title="Edit">
    <span><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
  </svg></span>
  </button>

					</div>
					<div class="social-rights">
						<ul class="list-social"><li><a class="facebook" href="https://www.facebook.com/quickdialsofficial/" title="Like us on Facebook" target="_blank"><img src="{{ asset('client/Facebook_icon.svg')}}" alt="Facebook_icon"></a></li>
						<li><a class="twitter" href="https://x.com/Quickdials" title="Follow us on Twitter" target="_blank"><img src="{{ asset('client/twitter.svg')}}" alt="twitter"></a></li>
						<li><a class="linkedIn" href="https://www.linkedin.com/company/quickdialsofficial" title="Follow us on Linkedin" target="_blank">
							<img src="{{ asset('client/linkedin.svg') }}" alt="linkedin"></a></li>
						<li><a class="youTube"  href="https://www.youtube.com/@quickdialsofficial/" title="Follow us on youTube" target="_blank"><i class="fa fa-youtube-play"></i></a></li> 
						<li><a class="pinterest" href="https://www.pinterest.com/quickdialsofficial/" title="Follow us on Pinterest" target="_blank"><img src="{{ asset('client/pinterest.svg') }}" alt="pinterest"></a></li>
						<li><a class="instagram" href="https://www.instagram.com/quickdialsofficial/" title="Follow us on Instagram" target="_blank"><img src="{{ asset('client/instagram.svg')}}" alt="instagram"></a></li>                                    
                                </ul>
					</div>

</div>


  
    </div>
    </div>
	
	<div class="add-section">
			<div class="col-xs-12 col-sm-4 col-md-3  leftBlock">
				<aside>
					<div class="col-md-10 col-md-offset-1">
					<?php
					$image = '#';
					$imageName = 'logo';
					if (!empty($client->logo)) {
					$logo = unserialize($client->logo);
					if (!isset($logo['thumbnail'])) {
					$logo['thumbnail'] = $logo['large'];
					}
					$image = $logo['large']['src'];
					$imageName = $logo['large']['name'];
					?>
					<img loading="lazy" src="<?php echo asset('' . $image); ?>"
					style="margin-bottom:15px;border-radius:0" class="img-responsive" alt="{{ $imageName }}">
					<?php } ?>
					</div>

				</aside>
				<aside class="addressBlock">
					<ul>

						<?php
				if (!empty($addr->ispositiveresponse)) {
											?>
						<li><i class="fa fa-fw fa fa-building-o location-icon-1" aria-hidden="true"></i><span
								class="phone-txt-1">
								<?php if ($addr->issubstr): ?>
								{{ $addr->fullstr }}
								<a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom"
									title="{{ $addr->fullstr }}">more</a>
								<?php else: ?>
								{{ $addr->fullstr }}
								<?php endif; ?>
							</span></li>
						<?php
	}
											?>
						<li>
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
						<rect x="2" y="4" width="20" height="16" rx="2"/>
						<polyline points="2 8 12 14 22 8"/>
						</svg>
						<a
								href="{{isset($client->email) && !empty($client->email) ? "mailto:" . $client->email : "#"}}">Send
								Enquriy By Mail</a></li>
						<li>
						<img src="{{ asset('/img/map.png')}}" alt="office" loading="lazy" style="width:20px;height:20px">

							<a target="_blank"
								href="{{isset($client->website) && !empty($client->website) ? buildWebsiteURL($client->website) : '#'}}">


								{{isset($client->website) && !empty($client->website) ? $client->website : 'Website Not Available'}}
							</a>


						</li>
					</ul>
				</aside>

				<aside>
					<h4>Year Established <?php if (!empty($client->year_of_estb)) {
						echo $client->year_of_estb;
						}  ?></h4>
					 
				</aside>
				<?php if ($client->display_hofo) { ?>
				<aside>
					<h4>Business Hours of Operation </strong><small style="cursor:pointer"
							class="orangeColor pull-right max-min today">Maximize</small><small style="cursor:pointer"
							class="orangeColor pull-right hide otherday max-min">Minimize</small>
					</h4>
					<table class="table">
						<?php

		if (!empty($client->time)) {
			$times = json_decode($client->time);
			$today = strtolower(date('l'));
													?>
						<tr class="today">
							<td><?php echo "Today"; ?></td>
							<td><?php echo $times->$today->from . " - " . $times->$today->to?></td>
						</tr>
						<?php
			if ($times) {
				foreach ($times as $day => $time) {
													?>
						<tr class="hide otherday">
							<td><?php echo ucfirst($day); ?></td>
							<td><?php echo $time->from . " - " . $time->to; ?></td>
						</tr>
						<?php
				}
			}
		} else {
			echo "<tr><td>No working hours available</td></tr>";
		}
											?>

					</table>
				</aside>
				<?php } ?>
			 

	
				<aside>
					<div class="img-certified">
<?php
if (isset($client->certifications) && !empty($client->certifications)) { 				

										?>
				 
					<?php echo $client->certifications; ?>
<?php } ?>
		@if($client->certified_status)

		@if($client->certified_status)
		<img loading="lazy" src="{{ asset('img/q_verified.gif')}}">
		@endif 
		@endif
@if($client->trusted_status)
					 @if($client->trusted_status)
							<img loading="lazy" src="{{ asset('img/q_trust.gif')}}">
						@endif


					 
				@endif

			@if($client->gst_status)
			@if($client->gst_status)
			<img loading="lazy" src="{{ asset('img/q_gst.gif')}}">
			@endif  
			@endif
			</div>
				</aside>
				
			@if($client->cin_certificate)
			<aside>
			<h4>CIN no @if(!empty($client->cin_no))
			{{ $client->cin_no }}
			@endif </strong>

			<h5>
			@if($client->cin_certificate)
			<?php   

			$cin_certificate = json_decode($client->cin_certificate);
			$cin_certificate = $cin_certificate->large->src; ?>
			<img loading="lazy" src="<?php echo asset('/' . $cin_certificate); ?>" alt="Profile">
			@endif

			</h5>
			</h4>
			</aside>
			@endif
				@if($client->iso_certificate)
					<aside>
						<h4>ISO No @if(!empty($client->iso_no))
							{{ $client->iso_no }}
						@endif </strong>

							<h5>
								@if($client->iso_certificate)
								<?php 
								
								$iso_certificate = json_decode($client->iso_certificate);
								
								$iso_certificate = $iso_certificate->large->src; ?><img loading="lazy" src="<?php echo asset('/' . $iso_certificate); ?>" alt="Profile">
								@endif

							</h5>
						</h4>


					</aside>

				@endif
				@if($client->msme_no)
					<aside>
						<h4>MSME No @if(!empty($client->msme_no))
							{{ $client->msme_no }}
						@endif </strong>

							<h5>

							</h5>
						</h4>


					</aside>
				@endif
				@if(!empty($client->award_img1))
					<aside>
						<h4>Award </strong>

							<h5>
								@if($client->award_img1)
													<?php   

																																			$award_img1 = json_decode($client->award_img1);
									$award_name1 = $award_img1->large->src; ?>
													<img loading="lazy" src="<?php echo asset('/' . $award_name1); ?>" alt="Profile">
								@endif
							</h5>
						</h4>
					</aside>
				@endif
				@if(!empty($client->award_img2))
					<aside>
						<h4>Award </strong>

							<h5>
								@if($client->award_img2)
													<?php   

																																			$award_img2 = json_decode($client->award_img2);
									$award_img2 = $award_img2->large->src; ?>
													<img loading="lazy" src="<?php echo asset('/' . $award_img2); ?>" alt="Profile">
								@endif
							</h5>
						</h4>
					</aside>
				@endif
				@if(!empty($client->award_img3))
					<aside>
						<h4>Award </strong>

							<h5>
								@if($client->award_img3)
													<?php   

																																			$award_img3 = json_decode($client->award_img3);
									$award_img3 = $award_img3->large->src; ?>
													<img loading="lazy" src="<?php echo asset('/' . $award_img3); ?>" alt="Profile">
								@endif
							</h5>
						</h4>
					</aside>
				@endif

				@if(!empty($client->award_img4))
					<aside>
						<h4>Award </strong>

							<h5>
								@if($client->award_img4)
													<?php   

																										$award_img4 = json_decode($client->award_img4);
									$award_img4 = $award_img4->large->src; ?>
													<img loading="lazy" src="<?php echo asset('/' . $award_img4); ?>" alt="Profile">
								@endif
							</h5>
						</h4>
					</aside>
				@endif
				@if(!empty($client->award_img5))
					<aside>
						<h4>Award </strong>

							<h5>
								@if($client->award_img5)
													<?php   

																																			$award_img5 = json_decode($client->award_img5);
									$award_img5 = $award_img5->large->src; ?>
													<img loading="lazy" src="<?php echo asset('/' . $award_img5); ?>" alt="Profile">
								@endif
							</h5>
						</h4>
					</aside>
				@endif



			</div>
			<div class="col-xs-12 col-sm-8 col-md-9 aside-section">

				<div class="about-company">

					<div class="top-details">
						<aside>
							<h2 class="details-txt"><a target="_blank"
									href="{{isset($client->website) && !empty($client->website) ? buildWebsiteURL($client->website) : '#'}}">{{isset($client->business_name) && !empty($client->business_name) ? $client->business_name : ""}}</a>

							</h2>
						 

							<br>
							<?php
	$arr = [];
	if (!empty($client->address)) {
		$arr['address'] = $client->address;
	}
	if (!empty($client->landmark)) {
		$arr['landmark'] = $client->landmark;
	}
	if (!empty($client->city)) {
		$arr['city'] = $client->city;
	}
	if (!empty($client->state)) {
		$arr['state'] = $client->state;
	}
	if (!empty($client->country)) {
		$arr['country'] = $client->country;
	}
	$addr = getAddress($arr, 30);


	if ($addr->ispositiveresponse) {
											?>
						
							<div class="location-txt">
	<img src="{{ asset('/img/map.png')}}" alt="office" loading="lazy" width="18">
								<script>var clientAddr = "<?php echo $client->address; ?>";</script>
								<?php if ($addr->fullstr): ?>
								{{ $addr->fullstr }}
								<?php endif; ?>
							</div>
							<?php						
											}
										?>
							<br>
							<br>

						</aside>

						<div>
							<iframe style="width:100%;height:50px" frameborder="0" scrolling="no" style="border:0"
								width="520" height="50" frameborder="0" style="border:0;"
								src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAPFOcLOlCcBCtp764h9HflPfA56VlCFo0&q=<?php echo $client->address; ?>">
							</iframe>
						</div>
					</div>



					<div class="section">
						<div class="heading">

							<h3>About Company</h3>
						</div>
						<div id="intro">
							<h1><i class="fa fa-user fa-fw" style="margin-right:5px;"></i>{{ $client->business_name}}
								&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker fa-fw"
									style="margin-right:5px;"></i>{{ $client->city}}</h1>
							<div class="inner-intro">
								<p style="text-align:justify;margin-left: 27px;">


									@if($client->business_intro)
										{!! $client->business_intro !!}


									@endif


								</p>

							</div>
						</div>

						@if($client->about_video)
						<section class="video-section">
							<div class="container">
								<h2 class="video-title">Watch Our {{ $client->business_name }} Video</h2>

								<div class="video-wrapper">
									<iframe src="{{$client->about_video}}" title="Training Video" frameborder="0"
										allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
										allowfullscreen>
									</iframe>
								</div>
							</div>
						</section>
						@endif

						
					</div>


					<div class="section">


						<div class="heading">
							<h3><i class="fa fa-cog fa-fw" style="margin-right:5px;"></i>Services Offered</h3>
						</div>
						<div class="services">

							<?php

	$firstHalf = [];
	$secondHalf = [];
	$i = 1;
	$inPopupArr = [];


	foreach ($assignedKwds as $assignedKwd) {
		$inPopupArr[$assignedKwd->child_category_name][] = $assignedKwd->keyword;


		if ($i <= 40):


			echo "<span class='service'>
						<a href='" . url($assignedKwd->slug) . "' class='keystore'>
							" . $assignedKwd->keyword . "
						</a>
					  </span>";

		endif;
	}
						 ?>



						</div>



					</div>

					<div class="section">


						<div class="heading">
							<h3><i class="fa fa-map-marker fa-fw" style="margin-right:5px;"></i>Serving in City/Cities</h3>
						</div>
						<div class="services">

							@if(!empty($assignedCity))
								@foreach($assignedCity as $city)

									<span class='service'>{{ $city->city}}</span>
								@endforeach
							@endif



						</div>



					</div>



					<div class="section">

						<div class="heading">
							<h3><i class="fa fa-camera"></i> Gallery</h3>
						</div>

						<div class="gallery-grid">

							<?php
	$pictures = [];


	if (!empty($client->pictures)) {
		$pictures = unserialize($client->pictures);
		$pictures = is_array($pictures) ? $pictures : [];
	}

	$pictures = array_slice($pictures, 0, 15);
	$count = count($pictures);
						?>

							<!-- Uploaded Images -->
							<?php foreach ($pictures as $key => $picture):


							?>
							<div class="gallery-item">
								<a href="javascript:void(0);" class="lightBox" data-t_img="#<?= $key + 1 ?>">
									<img loading="lazy" src="<?= asset($picture['large']['src']) ?>"
										alt="<?= $picture['large']['name'] ?? 'Gallery Image' ?>">
								</a>
							</div>
							<?php endforeach; ?>

							<!-- Default Placeholder Images -->
							<?php for ($i = $count; $i < 9; $i++): ?>
							<div class="gallery-item placeholder">
								<a href="javascript:void(0);" class="lightBox">
									<img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>" alt="Add Photo">
								</a>
							</div>
							<?php endfor; ?>

						</div>
					</div>

					<div class="section">
						<div class="heading">
							<h3><i class="fa fa-map-marker fa-fw" style="margin-right:5px;"></i>Recently Service Provide Activity</h3>
						</div>

						<div class="slider-wrapper">

							<!-- Vertical Slider -->
							<div class="vertical-slider" id="verticalSlider">

								<div class="v-slides">

									<div class="v-slide">
										<img src="{{ asset('crs/AWS.png') }}">
									</div>

									<div class="v-slide">
										<img src="{{ asset('crs/digital.jpg') }}">
									</div>

									<div class="v-slide">
										<img src="{{ asset('crs/professional-programs.jpg') }}">
									</div>

								</div>

							</div>


							<!-- Horizontal Slider -->

							<div class="horizontal-slider" id="horizontalSlider">

								<div class="h-slides">

									<div class="h-slide">
										<img src="{{ asset('crs/AWS.png') }}">
									</div>

									<div class="h-slide">
										<img src="{{ asset('crs/digital.jpg') }}">
									</div>

									<div class="h-slide">
										<img src="{{ asset('crs/professional-programs.jpg') }}">
									</div>

								</div>

							</div>

						</div>

						
						<script>

							/* Vertical slider */

							let vIndex = 0;

							function verticalSlide() {

								let wrapper = document.querySelector("#verticalSlider .v-slides");
								let slides = document.querySelectorAll("#verticalSlider .v-slide");

								vIndex++;

								if (vIndex >= slides.length) {
									vIndex = 0;
								}

								wrapper.style.transform = "translateY(-" + (vIndex * 300) + "px)";

							}

							setInterval(verticalSlide, 3000);


							/* Horizontal slider */

							let hIndex = 0;

							function horizontalSlide() {

								let wrapper = document.querySelector("#horizontalSlider .h-slides");
								let slides = document.querySelectorAll("#horizontalSlider .h-slide");

								hIndex++;

								if (hIndex >= slides.length) {
									hIndex = 0;
								}

								wrapper.style.transform = "translateX(-" + (hIndex * 100) + "%)";

							}

							setInterval(horizontalSlide, 3000);

						</script>
					</div>


					<div class="section">

						<div class="heading">
							<h3><i class="fa fa-camera"></i> Certificate & Awards</h3>
						</div>

						<div class="certificate-layout">

							<!-- CERTIFICATE GALLERY -->
							<div class="certificate-gallery">
								  



								@if(!empty($client->other_certificate1))
									@php
									$other_certificate1 = json_decode($client->other_certificate1, true);
										$otherCertificateImage = $other_certificate1['large']['src'] ?? null;
									@endphp

									@if($otherCertificateImage)
										<div class="cert-item">
											<a href="javascript:void(0);" class="lightbox-trigger"
												data-image="{{ asset($otherCertificateImage) }}">

												<img loading="lazy" src="{{ asset($otherCertificateImage) }}" alt="ISO Certificate">
											</a>
										</div>
									@endif

								@else
									<div class="cert-item">
										<a href="javascript:void(0);" class="lightbox-trigger"
											data-image="<?= asset('client/images/photo-add.png') ?>">

											<img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>"
												alt="Add ISO Certificate">
										</a>
									</div>
								@endif


								@if(!empty($client->other_certificate2))
									@php
									$other_certificate2 = json_decode($client->other_certificate2, true);
										$otherCertificate2Image = $other_certificate2['large']['src'] ?? null;
									@endphp

									@if($otherCertificate2Image)
										<div class="cert-item">
											<a href="javascript:void(0);" class="lightbox-trigger"
												data-image="{{ asset($otherCertificate2Image) }}">

												<img loading="lazy" src="{{ asset($otherCertificate2Image) }}" alt="ISO Certificate">
											</a>
										</div>
									@endif

								@else
									<div class="cert-item">
										<a href="javascript:void(0);" class="lightbox-trigger"
											data-image="<?= asset('client/images/photo-add.png') ?>">

											<img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>"
												alt="Add ISO Certificate">
										</a>
									</div>
								@endif


								@if(!empty($client->other_certificate3))
									@php
									$other_certificate3 = json_decode($client->other_certificate3, true);
										$otherCertificate3Image = $other_certificate3['large']['src'] ?? null;
									@endphp

									@if($otherCertificate3Image)
										<div class="cert-item">
											<a href="javascript:void(0);" class="lightbox-trigger"
												data-image="{{ asset($otherCertificate3Image) }}">

												<img loading="lazy" src="{{ asset($otherCertificate3Image) }}" alt="ISO Certificate">
											</a>
										</div>
									@endif

								@else
									<div class="cert-item">
										<a href="javascript:void(0);" class="lightbox-trigger"
											data-image="<?= asset('client/images/photo-add.png') ?>">

											<img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>"
												alt="Add ISO Certificate">
										</a>
									</div>
								@endif

								@if(!empty($client->other_certificate4))
									@php
									$other_certificate4 = json_decode($client->other_certificate4, true);
										$otherCertificate4Image = $other_certificate4['large']['src'] ?? null;
									@endphp

									@if($otherCertificate4Image)
										<div class="cert-item">
											<a href="javascript:void(0);" class="lightbox-trigger"
												data-image="{{ asset($otherCertificate4Image) }}">

												<img loading="lazy" src="{{ asset($otherCertificate4Image) }}" alt="certificate 4">
											</a>
										</div>
									@endif

								@else
									<div class="cert-item">
										<a href="javascript:void(0);" class="lightbox-trigger"
											data-image="<?= asset('client/images/photo-add.png') ?>">

											<img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>"
												alt="Add ISO Certificate">
										</a>
									</div>
								@endif


								@if(!empty($client->award_img1))
									@php
										$award_img1 = json_decode($client->award_img1, true);
										$awardImg1 = $award_img1['large']['src'] ?? null;
									@endphp

									@if($awardImg1)
										<div class="cert-item">
											<a href="javascript:void(0);" class="lightbox-trigger"
												data-image="{{ asset($awardImg1) }}">

												<img loading="lazy" src="{{ asset($awardImg1) }}" alt="Award 1">
											</a>
										</div>
									@endif

								@else
									<div class="cert-item">
										<a href="javascript:void(0);" class="lightbox-trigger"
											data-image="<?= asset('client/images/photo-add.png') ?>">

											<img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>"
												alt="Add Award">
										</a>
									</div>
								@endif


								@if(!empty($client->award_img2))
									@php
										$awardimg2 = json_decode($client->award_img2, true);
										$award2Img = $awardimg2['large']['src'] ?? null;
									@endphp

									@if($award2Img)
										<div class="cert-item">
											<a href="javascript:void(0);" class="lightbox-trigger"
												data-image="{{ asset($award2Img) }}">

												<img loading="lazy" src="{{ asset($award2Img) }}" alt="Award 2">
											</a>
										</div>
									@endif

								@else
									<div class="cert-item">
										<a href="javascript:void(0);" class="lightbox-trigger"
											data-image="<?= asset('client/images/photo-add.png') ?>">

											<img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>"
												alt="Add Award">
										</a>
									</div>
								@endif

								@if(!empty($client->award_img3))
									@php
										$awardimg3 = json_decode($client->award_img3, true);
										$award3Img = $awardimg3['large']['src'] ?? null;
									@endphp

									@if($award3Img)
										<div class="cert-item">
											<a href="javascript:void(0);" class="lightbox-trigger"
												data-image="{{ asset($award3Img) }}">

												<img loading="lazy" src="{{ asset($award3Img) }}" alt="Award 3">
											</a>
										</div>
									@endif

								@else
									<div class="cert-item">
										<a href="javascript:void(0);" class="lightbox-trigger"
											data-image="<?= asset('client/images/photo-add.png') ?>">

											<img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>"
												alt="Add Award">
										</a>
									</div>
								@endif

								@if(!empty($client->award_img4))
									@php
										$awardimg4 = json_decode($client->award_img4, true);
										$award4Img = $awardimg4['large']['src'] ?? null;
									@endphp

									@if($award4Img)
										<div class="cert-item">
											<a href="javascript:void(0);" class="lightbox-trigger"
												data-image="{{ asset($award4Img) }}">

												<img loading="lazy" src="{{ asset($award4Img) }}" alt="Award 4">
											</a>
										</div>
									@endif

								@endif

								@if(!empty($client->award_img5))
									@php
										$awardimg5 = json_decode($client->award_img5, true);
										$award5Img = $awardimg5['large']['src'] ?? null;
									@endphp

									@if($award5Img)
										<div class="cert-item">
											<a href="javascript:void(0);" class="lightbox-trigger"
												data-image="{{ asset($award5Img) }}">

												<img loading="lazy" src="{{ asset($award5Img) }}" alt="Award 4">
											</a>
										</div>
									@endif

								@endif
 













							</div>

							<!-- ENQUIRY FORM -->
							<div class="certificate-form">
								<form class="formaling lead_form" action="" method="post"
									onsubmit="return homeController.saveEnquiry(this)">

									<input type="hidden" name="lead_form" value="1">
									<input type="hidden" name="city_id" class="cityList">
									<input type="hidden" name="terms" value="1">

									<input type="hidden" name="from_page" value="{{ request()->path() }}">

									<div class="fieldblock">
										<div class="col-xs-4 col-sm-4 col-md-4"><span class="form-txt">Interested in*</span>
										</div>
										<div class="col-xs-8 col-sm-8 col-md-8">
											<select name="kw_text" class="select2_service">
												<option value="">Select Service</option>
											</select>
										</div>
									</div>


									<div class="fieldblock">
										<div class="col-xs-4 col-sm-4 col-md-4"><span class="form-txt">Your Name*</span>
										</div>
										<div class="col-xs-8 col-sm-8 col-md-8">
											<input type="text" placeholder="Your Name" class=" form-control city-form"
												name="name">
										</div>
									</div>
									<div class="fieldblock">
										<div class="col-xs-4 col-sm-4 col-md-4"><span class="form-txt">Mobile*</span></div>
										<div class="col-xs-8 col-sm-8 col-md-8">
											<input type="tel" placeholder="Enter Mobile" class="form-control city-form"
												name="mobile">
										</div>
									</div>
									<div class="fieldblock">
										<div class="col-xs-4 col-sm-4 col-md-4"><span class="form-txt">Email*</span></div>
										<div class="col-xs-8 col-sm-8 col-md-8">
											<input type="text" placeholder="Email" class="form-control city-form"
												name="email">
										</div>
									</div>
									<div class="fieldblock">
										<div class="col-xs-4 col-sm-4 col-md-4"><span class="form-txt">Remarks</span></div>
										<div class="col-xs-8 col-sm-8 col-md-8">
											<textarea class="form-control city-form" id="exampleTextarea" rows="3"
												placeholder="Provide any specific details for your need"
												name="remark"></textarea>


											<input type="submit" class="btn btn-primary submit-btn-2" value="Get Quotes">
										</div>
									</div>
								</form>

							</div>

						</div>
					</div>

					









				</div>


				<div class="section">
					<div class="heading">
						<h3><i class="fa fa-map-marker fa-fw"></i>Government Recognition</h3>
					</div>

					<div class="gov-container">

						<!-- ═══ LEFT: ITEM LIST ═══ -->
						<div class="gov-left">

							@if($client->dpiit_no)
							<?php 
							$dpiit_certificate="";
							if($client->dpiit_certificate){
								$dpiit_certificate = json_decode($client->dpiit_certificate);
								
								$dpiit_certificate = $dpiit_certificate->large->src;
							}
								?>

							<!-- ITEM 1 -->
							<div class="gov-item active"
								data-img="<?php echo asset('/' . $dpiit_certificate); ?>"
								data-title="DPIIT Recognition" onclick="triggerCert(this)">
								<div class="gov-icon-wrap">
									@if($client->dpiit_certificate)
								<?php 
								$dpiit_certificate = json_decode($client->dpiit_certificate);
								
								$dpiit_certificate = $dpiit_certificate->large->src; ?><img loading="lazy" src="<?php echo asset('/' . $dpiit_certificate); ?>" alt="DPIIT">
								@endif
									 
								</div>
								<div class="gov-item-text">
									<h4>{{$client->dpiit_no}}</h4>
									<p>DPIIT recognized</p>
								</div>
								<i class="fa fa-chevron-right gov-arrow"></i>
							</div>
							<!-- Mobile panel for item 1 -->
							<div class="mobile-panel open">
								<div class="mobile-panel-inner">
									<span class="mp-badge">{{$client->dpiit_no}}</span>
			  						<div class="mp-title">DPIIT Recognition</div>
									<div class="mp-img-box">
										@if($client->dpiit_certificate)
										<?php 
										$dpiit_certificate = json_decode($client->dpiit_certificate);
										
										$dpiit_certificate = $dpiit_certificate->large->src; ?><img loading="lazy" src="<?php echo asset('/' . $dpiit_certificate); ?>" alt="DPIIT">
										@endif
										 
									</div>
									<div class="mp-divider"></div>
									 
								</div>
							</div>

							@endif


							@if($client->pan_no)
							<?php 
							$pan_certificate="";
							if($client->pan_certificate){
								$pan_certificate = json_decode($client->pan_certificate);
								
								$pan_certificate = $pan_certificate->large->src;
							}
								?>

							<!-- ITEM 1 -->
							<div class="gov-item gold"
								data-img="<?php echo asset('/' . $pan_certificate); ?>"
								data-title="PAN Recognition" onclick="triggerCert(this)">
								<div class="gov-icon-wrap">
									@if($client->pan_certificate)
								<?php 
								$pan_certificate = json_decode($client->pan_certificate);
								
								$pan_certificate = $pan_certificate->large->src; ?><img loading="lazy" src="<?php echo asset('/' . $pan_certificate); ?>" alt="DPIIT">
								@endif
									 
								</div>
								<div class="gov-item-text">
									<h4>{{$client->pan_no}}</h4>
									<p>DPIIT recognized</p>
								</div>
								<i class="fa fa-chevron-right gov-arrow"></i>
							</div>
							<!-- Mobile panel for item 1 -->
							<div class="mobile-panel open">
								<div class="mobile-panel-inner">
									<span class="mp-badge">{{$client->pan_no}}</span>
			  						<div class="mp-title">DPIIT Recognition</div>
									<div class="mp-img-box">
										@if($client->pan_certificate)
										 <img loading="lazy" src="<?php echo asset('/' . $pan_certificate); ?>" alt="DPIIT">
										@endif
										 
									</div>
									<div class="mp-divider"></div>
									 
								</div>
							</div>

							@endif



							<!-- ITEM 2 -->
							 
							@if(!empty($client->iso_no) && !empty($client->iso_certificate))
							<?php 

							$iso_certificate = "";
							if($client->iso_certificate){
								$iso_certificate = json_decode($client->iso_certificate);
								
								$iso_certificate = $iso_certificate->large->src; 
								
							}
								?>



							<div class="gov-item"
								data-img="<?php echo asset('/' . $iso_certificate); ?>"
								data-title="{{ $client->iso_no }}" onclick="triggerCert(this)">
								<div class="gov-icon-wrap">

								@if($client->iso_certificate)
								 <img loading="lazy" src="<?php echo asset('/' . $iso_certificate); ?>" alt="ISO">
								@endif
									 
								</div>
								<div class="gov-item-text">
									<h4>{{ $client->iso_no }}</h4>
									<p>Certified of ISO</p>
								</div>
								<i class="fa fa-chevron-right gov-arrow"></i>
							</div>

							<div class="mobile-panel">
								<div class="mobile-panel-inner">
									 <span class="mp-badge">Certified of ISO</span>
			  						<div class="mp-title">{{ $client->iso_no }}</div> 
									<div class="mp-img-box">
								@if($client->iso_certificate)
								 <img loading="lazy" src="<?php echo asset('/' . $iso_certificate); ?>" alt="ISO">
								@endif
										 
									</div>
									<div class="mp-divider"></div>
									 
								</div>
							</div>
							@endif

							@if(!empty($client->msme_no) && !empty($client->msme_certificate))
							<?php 
							$msme_certificate = "";
							if($client->msme_certificate){
								$msme_certificate = json_decode($client->msme_certificate);
								
								$msme_certificate = $msme_certificate->large->src; 
								
							}
								?>
							<!-- ITEM 3 -->
							<div class="gov-item gold"
								data-img="<?php echo asset('/' . $msme_certificate); ?>"
								data-title="{{ $client->msme_no }}" onclick="triggerCert(this)">
								<div class="gov-icon-wrap">
									<img src="<?php echo asset('/' . $msme_certificate); ?>"
										alt="MSME">
								</div>
								<div class="gov-item-text">
									<h4>{{ $client->msme_no }}</h4>
									<p>MCA Certified</p>
								</div>
								<i class="fa fa-chevron-right gov-arrow"></i>
							</div>
							<div class="mobile-panel">
								<div class="mobile-panel-inner">
									<span class="mp-badge">{{ $client->msme_no }}</span>
			  						<div class="mp-title">MCA Certification</div>
									<div class="mp-img-box">
										<img src="<?php echo asset('/' . $msme_certificate); ?>"
											alt="MCA">
									</div>
									<div class="mp-divider"></div>
								 
								</div>
							</div>
							@endif

							@if(!empty($client->coi_no) && !empty($client->coi_certificate))
							<?php 
							$coi_certificate = "";
							if($client->coi_certificate){
								$coi_certificate = json_decode($client->coi_certificate);
								
								$coi_certificate = $coi_certificate->large->src; 
								
							}
								?>
							<!-- ITEM 4 (gold) -->
							<div class="gov-item "
								data-img="<?php echo asset('/' . $coi_certificate); ?>"
								data-title="MSME India" onclick="triggerCert(this)">
								<div class="gov-icon-wrap">
									<img src="<?php echo asset('/' . $coi_certificate); ?>"
										alt="MSME">
								</div>
								<div class="gov-item-text">
									<h4>{{ $client->coi_no }}</h4>
									<p>COI registered under MSME</p>
								</div>
								<i class="fa fa-chevron-right gov-arrow"></i>
							</div>
							<div class="mobile-panel">
								<div class="mobile-panel-inner">
									 <span class="mp-badge">{{ $client->coi_no }}</span> 
			  						<div class="mp-title">COI registered under MSME</div>
									<div class="mp-img-box">
										<img src="<?php echo asset('/' . $coi_certificate); ?>"
											alt="coi">
									</div>
									<div class="mp-divider"></div>
									 
								</div>
							</div>
							@endif

						
							@if(!empty($client->gst_no) && !empty($client->coi_certificate))
							<?php 
							$gst_certificate = "";
							if($client->gst_certificate){
								$gst_certificate = json_decode($client->gst_certificate);
								
								$gst_certificate = $gst_certificate->large->src; 
								
							}
								?>

							<!-- ITEM 4 (gold) -->
							<div class="gov-item gold"
								data-img="<?php echo asset('/' . $gst_certificate); ?>"
								data-title="MSME India" onclick="triggerCert(this)">
								<div class="gov-icon-wrap">
									<img src="<?php echo asset('/' . $gst_certificate); ?>"
										alt="MSME">
								</div>
								<div class="gov-item-text">
									<h4>{{ $client->gst_no }}</h4>
									<p>COI registered under MSME</p>
								</div>
								<i class="fa fa-chevron-right gov-arrow"></i>
							</div>
							<div class="mobile-panel">
								<div class="mobile-panel-inner">
									 <span class="mp-badge">{{ $client->gst_no }}</span> 
			  						<div class="mp-title">COI registered under MSME</div>
									<div class="mp-img-box">
										<img src="<?php echo asset('/' . $gst_certificate); ?>"
											alt="coi">
									</div>
									<div class="mp-divider"></div>
									 
								</div>
							</div>
							@endif
						
							@if(!empty($client->cin_no) && !empty($client->cin_certificate))
							<?php 
							$cin_certificate = "";
							if($client->cin_certificate){
								$cin_certificate = json_decode($client->cin_certificate);
								
								$cin_certificate = $cin_certificate->large->src; 
								
							}
								?>

							<!-- ITEM 4 (gold) -->
							<div class="gov-item "
								data-img="<?php echo asset('/' . $cin_certificate); ?>"
								data-title="MSME India" onclick="triggerCert(this)">
								<div class="gov-icon-wrap">
									<img src="<?php echo asset('/' . $cin_certificate); ?>"
										alt="MSME">
								</div>
								<div class="gov-item-text">
									<h4>{{ $client->cin_no }}</h4>
									<p>COI registered under MSME</p>
								</div>
								<i class="fa fa-chevron-right gov-arrow"></i>
							</div>
							<div class="mobile-panel">
								<div class="mobile-panel-inner">
									 <span class="mp-badge">{{ $client->cin_no }}</span> 
			  						<div class="mp-title">COI registered under MSME</div>
									<div class="mp-img-box">
										<img src="<?php echo asset('/' . $cin_certificate); ?>"
											alt="cin_no">
									</div>
									<div class="mp-divider"></div>
									 
								</div>
							</div>
							@endif


						</div><!-- /gov-left -->

						<!-- ═══ RIGHT: DESKTOP PREVIEW ═══ -->
						@if(!empty($client->pan_no) && !empty($client->pan_certificate))
						<?php 
							$pan_certificate = "";
							if($client->pan_certificate){
								$pan_certificate = json_decode($client->pan_certificate);
								
								$pan_certificate = $pan_certificate->large->src; 
								
							}
								?>
						<div class="gov-right ">
							<div class="cert-badge">{{ $client->pan_no }}</div>
							<h2 id="certTitle">PAN Recognition</h2>
							<div class="cert-img-box">
								<img id="certImage"
									src="<?php echo asset('/' . $pan_certificate); ?>"
									alt="PAN">
							</div>
							<div class="cert-divider"></div>
							 
						</div>
						@else
						<div class="gov-right ">
						<div class="cert-badge">{{ $client->pan_no }}</div>
						<h2 id="certTitle">PAN Recognition</h2>
						<div class="cert-img-box">
						<img id="certImage"
						src="<?php echo asset('crs/company-pan-card.jpg'); ?>"
						alt="PAN">
						</div>
						<div class="cert-divider"></div>
							 
						</div>



						@endif



					</div>
					
					<!-- /gov-container -->

					

					<script>
						const isMobile = () => window.innerWidth < 900;

						function triggerCert(el) {
							const items = document.querySelectorAll('.gov-item');
							const panels = document.querySelectorAll('.mobile-panel');
							const idx = [...items].indexOf(el);

							// ── DESKTOP: update right panel ──
							if (!isMobile()) {
								const img = document.getElementById('certImage');
								const title = document.getElementById('certTitle');
								// const desc  = document.getElementById('certDesc');

								img.classList.add('fade');
								title.style.opacity = '0';
								// desc.style.opacity  = '0';

								setTimeout(() => {
									img.src = el.dataset.img;
									title.textContent = el.dataset.title;
									// desc.textContent  = el.dataset.desc;
									img.classList.remove('fade');
									title.style.opacity = '1';
									// desc.style.opacity  = '1';
								}, 260);

								items.forEach(i => i.classList.remove('active'));
								el.classList.add('active');
								return;
							}

							// ── MOBILE: accordion toggle ──
							const panel = panels[idx];
							const isOpen = panel.classList.contains('open');
							const wasActive = el.classList.contains('active');

							// Close all
							items.forEach(i => i.classList.remove('active'));
							panels.forEach(p => p.classList.remove('open'));

							// Open this one (unless tapping same open item = close)
							if (!wasActive || !isOpen) {
								el.classList.add('active');
								panel.classList.add('open');

								// Smooth scroll so panel is visible
								setTimeout(() => {
									panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
								}, 80);
							}
						}


						let resizeTimer;
						window.addEventListener('resize', () => {
							clearTimeout(resizeTimer);
							resizeTimer = setTimeout(() => {
								if (!isMobile()) {
									const active = document.querySelector('.gov-item.active');
									if (active) {
										document.getElementById('certImage').src = active.dataset.img;
										document.getElementById('certTitle').textContent = active.dataset.title;
									}

									document.querySelectorAll('.mobile-panel').forEach(p => p.classList.remove('open'));
								}
							}, 150);
						});
					</script>

				</div><!-- /section -->



				<div class="tab-content" style="padding-top: 20px;">


					<div class="heading">
						<h3>WRITE A REVIEW</h3>
					</div>
					<div id="c_trigger" class="tab-pane fade fade in active">

						<div>
							<div class="col-md-12 review-form ">
								<div class="col-md-6 removeLeftSpace">
									<p class="p-txt">Add Reviews</p>
								</div>

								<div class="clearfix">&nbsp;</div>
								<div class="commentform">
									<form class="review_form" method="post"
										onsubmit="return homeController.saveReview(this)">

										<div class="row">
											<label class="col-xs-12 col-sm-2 col-md-2 contlftspce review-txt">Rating
												<sup><i class="fa fa-fw fa-asterisk" aria-hidden="true"
														style="color:red;"></i></sup></label>
											<div class="rating-box">
												<i class="s_rating emptyStar" data-s_rating="1"></i>
												<i class="s_rating emptyStar" data-s_rating="2"></i>
												<i class="s_rating emptyStar" data-s_rating="3"></i>
												<i class="s_rating emptyStar" data-s_rating="4"></i>
												<i class="s_rating emptyStar" data-s_rating="5"></i>
												<input type="hidden" name="s_rating"
													class="col-xs-12 col-sm-5 col-md-5 txtfld jinp">

												<input type="hidden" name="currentClient" value="{{ $client->id }}">
											</div>
										</div>

										<div class="row">
											<label class="col-xs-12 col-sm-2 col-md-2 contlftspce review-txt">Name
												<sup><i class="fa fa-fw fa-asterisk" aria-hidden="true"
														style="color:red;"></i></sup></label>
											<input class="col-xs-12 col-sm-5 col-md-5 txtfld jinp" type="text"
												name="comment_author" placeholder="Enter Name">
										</div>
										<div class="row">
											<label class="col-xs-12 col-sm-2 col-md-2 contlftspce review-txt">Mobile
												<sup><i class="fa fa-fw fa-asterisk" aria-hidden="true"
														style="color:red;"></i></sup></label>
											<input class="col-xs-12 col-sm-5 col-md-5 txtfld jinp" type="text"
												name="comment_author_phone" placeholder="Enter phone">
										</div>
										<div class="row">
											<label class="col-xs-12 col-sm-2 col-md-2 contlftspce review-txt">Email Id
												<sup><i class="fa fa-fw fa-asterisk" aria-hidden="true"
														style="color:red;"></i></sup></label>
											<input class="col-xs-12 col-sm-5 col-md-5 txtfld jinp" type="text"
												name="comment_author_email" placeholder="Enter Email">
										</div>
										<div class="row">
											<div class="area-box">
												<label class="col-xs-12 col-sm-2 col-md-2 contlftspce review-txt">Comment
													Here</label>
												<textarea rows="4" name="comment_content" class="enter-txt jinp"
													placeholder="Enter text here..."></textarea>
											</div>
										</div>
										<div class="row">

											<input type="submit" class="btn btn-primary submit-btn-2" value="Submit"
												style="    width: 40%;margin-left: 15%;">
											<input type="reset" id="comment_reset" class="" value="Reset"
												style="visibility:hidden">
										</div>
									</form>
								</div>

								<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
									aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="vertical-alignment-helper">
										<div class="modal-dialog vertical-align-center modal-sm">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span
															aria-hidden="true">&times;</span><span
															class="sr-only">Close</span></button>
													<h4 class="modal-title" id="myModalLabel">Rating and Review Alert
													</h4>
												</div>
												<div class="modal-body">
													Please provide your <span class="orng"
														style="font-weight:normal">"Name", "Mobile", "Email" &amp;
														"Comment"</span> to submit your<br>review and
													rating.<br><br><br>
													<strong>
														Thanks,<br>
														Quick Dials- Team<br>
													</strong>
												</div>
												<!--div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			<button type="button" class="btn btn-primary">Save changes</button>
																		</div-->
											</div>
										</div>
									</div>
								</div>



							</div>
						</div>
					</div>


					<div id="" class="tab-pane fade fade in active">

						@if(!empty($comments))
							<div class="col-xs-12 col-sm-12 col-md-12" id="reviews-result-resp">
								@foreach($comments as $comment)
													<div class="reviews-box">
														<div class="alllearners_reviews clearfix">
															<div class="alllearners_reviews_img_box"><img loading="lazy"
																	src="<?php echo asset('client/images/user.png'); ?>" alt="user"> </div>
															<div class="alllearners_reviews_info_box">
																<h5><span style="color:#333;">{{ $comment->comment_author }} </span> <span
																		class="star-rating pull-right">
																		<?php
									$whole = floor($comment->rating);
									$fraction = $comment->rating - $whole;
									$remain = 5 - $whole;
									for ($i = 0; $i < $whole; ++$i) {
										echo "<a href=\"javascript:void(0)\" class=\"emptystar fullstar\"></a>";
									}
									if ($fraction > 0 && $fraction < 1) {
										echo "<a href=\"javascript:void(0)\" class=\"emptystar halfstar\"></a>";
										--$remain;
									}
									for ($i = 0; $i < $remain; ++$i) {
										echo "<a href=\"javascript:void(0)\" class=\"emptystar\"></a>";
									}
																																																?>

																	</span>
																</h5>
																<h6 class="reviewer_profession" style="color:#2874F0">
																	[{{ getStarCodedStr($comment->comment_author_email, 'email') }} |
																	{{ getStarCodedStr($comment->comment_author_phone, 'number') }}] <span
																		class="com-date pull-right">{{ date_format(date_create($comment->created_at), "dS-M\' Y") }}</span>
																</h6>
															</div>
														</div>
														<div class="reviewsquots_box">
															<?php
									$arr = [];
									if (!empty($comment->comment_content)) {
										$arr[] = $comment->comment_content;
									}
									$addr = getAddress($arr, 300);
									if ($addr->ispositiveresponse) {
																																														?>
															<?php if ($addr->issubstr): ?>
															<p class="reviewsquots_info reviewsquots_txt">{{ $addr->substr }} </p>
															<a data-content="{{ $addr->fullstr }}" class="r-more-info" type="button">More
																&gt;&gt;</a>
															<?php else: ?>
															<p class="reviewsquots_info reviewsquots_txt">{{ $addr->fullstr }}</p>
															<?php endif; ?>
															<?php
									}
																																														?>
														</div>
													</div>
								@endforeach

							</div>
						@endif
					</div>








				</div>
			</div>


			<div class="modal fade" id="g_MapsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				aria-hidden="true" style="height:98%;">
				<div class="vertical-alignment-helper">
					<div class="modal-dialog vertical-align-center" style="width:95%;">
						<div class="modal-content" style="min-height:100%;height:auto;">
							<div class="modal-header" style="background-color:#F2F2F2;color:#000;">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"
										style="color:#000">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">Google Maps</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-3">
										<div class="col-md-12">
											<div class="row">

												<ul style="list-style-type:none;margin-left:-30px;">
													<li><i class="fa fa-fw fa fa-institution location-icon-1"
															aria-hidden="true"></i><span class=""
															style="font-weight:bold;font-size:20px;"><strong>{{ $client->business_name }}</strong></span>
													</li>
													<li><i class="fa fa-fw fa-map-marker location-icon-1"
															aria-hidden="true"></i><span class="phone-txt"
															id="g_MapName">{{$client->address}}</span>
													</li>
													 
													<li><i class="fa fa-fw fa fa-envelope location-icon-1"
															aria-hidden="true"></i><a
															href="{{isset($client->email) && !empty($client->email) ? "mailto:" . $client->email : "#"}}">Send
															Enquriy By Mail</a></li>
													<li><i class="fa fa-fw fa fa-chrome location-icon-1"
															aria-hidden="true"></i><a
															href="{{isset($client->website) && !empty($client->website) ? $client->website : 'javascript:void(0)'}}">{{isset($client->website) && !empty($client->website) ? $client->website : 'Website Not Available'}}</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-md-9" style="height:570px">
										<!--<div id="map_canvas" style="width:100%;height:100%;background-color:#e3e3e3;"></div>-->

										<div class="map-area">
											<div style="wdith:100%" class="map-container">
												<?php if (!empty($client->address)) {?>
												<iframe style="width:100%;height:695px" frameborder="0" scrolling="no"
													style="border:0"
													src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAPFOcLOlCcBCtp764h9HflPfA56VlCFo0&q=<?php echo $client->address; ?>"
													allowfullscreen>
												</iframe>
												<?php } else { ?>
												<iframe style="width:100%;height:695px" frameborder="0" scrolling="no"
													style="border:0" src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAPFOcLOlCcBCtp764h9HflPfA56VlCFo0&q=<?php if ($client->city) {
			echo $client->city;
		} ?>" allowfullscreen>
												</iframe>

												<?php  } ?>
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


	<div class="container">
		<?php 

					if (!empty($assignedKwds) && isset($assignedKwds[0]->child_id)) {
								?>
		<div class="related-seach">

			<div class="col-xs-12">
				<h3>Related Searches</h3>
				<script>
					localStorage.getItem('keyword');

				</script>

				<ul>
					<?php


		$relKeywords = App\Models\Keyword::where(
			'child_category_id',
			$assignedKwds[0]->child_id
		)->pluck('keyword', 'slug');

		if ($relKeywords->isNotEmpty()) {
			foreach ($relKeywords as $slug => $keyword) {


								?>
					<li>
						<a href="{{ url($slug)}}" class="keystore">
							{{ $keyword }} |
						</a>
					</li>
					<?php
			}
		}


					?>



				</ul>

			</div>
		</div>
		<?php  } ?>

		<div class="col-xs-12">
			<article class="">

				<div class="">
					<div class="">
						<h2> <?php if ($client->business_name) {
		echo $client->business_name;
	} ?> located in
							<?php if ($client->area) {
		echo $client->area;
	} ?>,
							<?php if ($client->city) {
		echo $client->city;
	} ?>
						</h2>
						<p> <?php if ($client->business_name) {
		echo $client->business_name;
	} ?>, located in
							<?php if ($client->area) {
		echo $client->area;
	} ?>,
							<?php if ($client->city) {
		echo $client->city;
	} ?>, has been a leader in skill development since
							many years. The company specializes in providing a comprehensive range of training programs
							designed to equip individuals with the practical knowledge and expertise needed to excel in
							their chosen fields.
						</p>

						<h3>Overview of Business</h3>
						<p> <?php if ($client->business_name) {
		echo $client->business_name;
	} ?> located in
							<?php if ($client->area) {
		echo $client->area;
	} ?>,
							<?php if ($client->city) {
		echo $client->city;
	} ?> is a prominent training institute offering specialized programs in
							<?php 
				$firstHalf = [];
	$secondHalf = [];
	$i = 1;
	$inPopupArr = [];
	foreach ($assignedKwds as $assignedKwd) {
		$inPopupArr[$assignedKwd->child_category_name][] = $assignedKwd->keyword;


		if ($i <= 40):
			if ($i % 2 == 0) {
				$secondHalf[] = "<span>" . $assignedKwd->keyword . "</span>,";
			} else {
				$firstHalf[] = "<span>" . $assignedKwd->keyword . "</span>";
			}
			++$i;
		endif;
	}
	$common = array_intersect($secondHalf, $firstHalf);

	echo implode(", ", $firstHalf); 
				?>

							. The institute is dedicated to delivering skill-focused to meet the demands of today’s
							competitive job market.
						</p>
						<p>With flexible operating hours from
							<?php


	if (!empty($client->time)) {
		$times = json_decode($client->time);
		$today = strtolower(date('l'));

												?>
							<tr class="today">
								<td><?php echo "Today"; ?></td>
								<td><?php echo $times->$today->from . " - " . $times->$today->to?></td>
							</tr>
							<?php
		foreach ($times as $day => $time) {
												?>
							<tr class="hide otherday">
								<td><?php echo ucfirst($day); ?></td>
								<td><?php echo $time->from . " - " . $time->to; ?></td>
							</tr>
							<?php
		}
	} else {
		echo "<tr><td>No working hours available</td></tr>";
	}

							?>
							<?php if ($client->business_name) {
		echo $client->business_name;
	} ?> makes it easy for learners to upgrade their skills while balancing other commitments. The institute is backed by
							a team of highly experienced professionals who are committed to providing quality training and
							personalized attention to every participant.
							<?php if ($client->business_name) {
		echo $client->business_name;
	} ?> is committed to delivering
							high-quality training to each participant.
						</p>
						<p>Whether you're looking to improve your technical skills, leadership capabilities, or
							industry-specific knowledge, <?php if ($client->business_name) {
		echo $client->business_name;
	} ?>
							in <?php if ($client->area) {
		echo $client->area;
	} ?>,
							<?php if ($client->city) {
		echo $client->city;
	} ?> has the right program for you. With a wide
							range of offerings, including IT, management, soft skills, and vocational training,
							<?php if ($client->business_name) {
		echo $client->business_name;
	} ?> stands as a comprehensive
							solution for all your skill development needs.
						</p>
					</div>
				</div>

				<div class="mt-20 mb-20 pl-20 pr-20">
					<div class="jsx-5f2699f63e338e40 overview_content font16 fw400 color111">



					</div>
				</div>
			</article>



		</div>





	</div>


	<div class="modal fade" id="smsEmailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">
		<div class="vertical-alignment-helper">
			<div class="modal-dialog vertical-align-center">
				<div class="modal-content">
					<div class="modal-header" style="padding:8px 50px;border-radius:4px 4px 0 0">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><!--span class="glyphicon glyphicon-lock"></span--> Post Your
							Requirement</h4>
					</div>
					<div class="modal-body" style="padding:22px 50px;">
						<form action="" method="post" onsubmit="return homeController.saveEnquiry(this)" class="lead_form">
							{{csrf_field()}}
							<div class="form-group">
								<label for="name"><span class="glyphicon glyphicon-user"></span>
									Name</label>
								<input type="text" class="form-control" name="name" placeholder="Name">
							</div>
							<div class="form-group">
								<label for="mobile"><span class="glyphicon glyphicon-phone"></span>
									Mobile</label>
								<input type="tel" class="form-control" name="mobile" placeholder="Mobile Number">
							</div>
							<div class="form-group">
								<label for="email"><span class="glyphicon glyphicon-envelope"></span>
									Email</label>
								<input type="email" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="city_id"><span class="glyphicon glyphicon-envelope"></span>
									City</label>
								<select class="form-control select2-single location city" name="city_id">
									<option value="">Select City</option>
									@if(count($cities) > 0)
										@foreach($cities as $city)
											<option value="{{$city->city}}">{{$city->city}}</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="course"><span class="glyphicon glyphicon-list"></span> Service
									Interested</label>
								<input type="text" class="form-control home-search" name="kw_text"
									placeholder="Course Interested" autocomplete="off">
								<div class="ajax-suggest ajax-suggest-lead-home" style="display: none;">
									<ul></ul>
								</div>
							</div>
							<input type="reset" class="btn btn-primary hide reset_lead_form" value="reset" />
							<input type="submit" id="login-button" class="btn btn-info btn-block" name="lead_form"
								value="Request Information" />
						</form>
					</div>
				</div>
				<!--div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Form</h4>
				</div>
				<div class="modal-body">
				<form action="" method="POST">
				<p><label>Name</label><input type="text" class="form-control" required></p>
				<p><label>Mobile</label><input type="text" class="form-control" required></p>
				<p><label>Email</label><input type="text" class="form-control" required></p>
				<p><label>Course Interested</label><input type="text" class="form-control" required></p>
				<p><input type="submit" class="btn btn-info"></p>
				</form>
				</div>
				</div-->
			</div>
		</div>
	</div>



	<script>
		$(document).ready(function () {
			$('.proceedBtn').click(function () {
				$('.proceedBtn').hide();
				$('.stopprocess').show();
				$('.formDiv').slideDown();
			});

			$('.stopprocess').click(function () {
				$('.stopprocess').removeAttr("style");
				$('.proceedBtn').show();
				$('.formDiv').slideUp();
			});

			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
	<div class="galleryPopup">
		<div class="popwraper whiteBg">
			<button type="button" class="close closebtn" data-dismiss="modal">×</button>
			<div id="gallery" class="content">
				<div class="topinfo">
					<strong>{{(isset($client->business_name) && !empty($client->business_name)) ? $client->business_name . "," : ""}}</strong>
					<?php if ($addr->ispositiveresponse) { ?>
					<?php if ($addr->issubstr): ?>
					{{ $addr->substr }}
					<a href="javascript:void(0)" style="color:red" data-toggle="tooltip" data-placement="bottom" title=""
						data-original-title="{{ $addr->fullstr }}">more</a>
					<?php else: ?>
					{{ $addr->fullstr }}
					<?php endif; ?>
					<?php } ?>
					<span><small style="font-size:inherit" id="p_count"></small> of
						<?php echo (!empty($client->pictures)) ? count(unserialize($client->pictures)) : ""; ?></span>
				</div>
				<div id="controls" class="controls"></div>
				<div class="slideshow-container">
					<div id="loading" class="loader"></div>
					<div id="slideshow" class="slideshow"></div>
				</div>
				<div id="caption" class="caption-container">
					<strong>{{(isset($client->business_name) && !empty($client->business_name)) ? $client->business_name . "," : ""}}</strong>
					<?php if ($addr->ispositiveresponse) { ?>
					<?php if ($addr->issubstr): ?>
					{{ $addr->substr }}
					<a href="javascript:void(0)" style="color:red" data-toggle="tooltip" data-placement="bottom" title=""
						data-original-title="{{ $addr->fullstr }}">more</a>
					<?php else: ?>
					{{ $addr->fullstr }}
					<?php endif; ?>
					<?php } ?>
				</div>
			</div>

			<?php if (!empty($client->pictures)):
		$pictures = unserialize($client->pictures);
		$pictures = array_slice($pictures, 0);				
								?>
			<div id="thumbs" class="navigation">
				<ul class="thumbs noscript">
					<?php foreach ($pictures as $picture): ?>
					<li>
						<a class="thumb" href="<?php echo asset('' . $picture['large']['src']); ?>" title=""><img
								loading="lazy" src="<?php echo asset('' . $picture['large']['src']); ?>"
								style="height:75px;width:100px;" alt="<?php if ($picture['large']['name']) {
				echo $picture['large']['name'];
			} ?>" /></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>


		</div>
	</div>



	<script>
		$('.home-search').val(localStorage.getItem('keyword'));
	</script>



	<div class="lightbox-overlay" id="lightbox">
		<span class="lightbox-close">&times;</span>
		<img loading="lazy" src="" alt="Preview">
	</div>

	<script>
		document.querySelectorAll('.lightbox-trigger').forEach(item => {
			item.addEventListener('click', function () {
				const imageSrc = this.getAttribute('data-image');
				const lightbox = document.getElementById('lightbox');
				lightbox.querySelector('img').src = imageSrc;
				lightbox



					.style.display = 'flex';
			});
		});

		document.querySelector('.lightbox-close').addEventListener('click', () => {
			document.getElementById('lightbox').style.display = 'none';
		});

		document.getElementById('lightbox').addEventListener('click', e => {
			if (e.target.id === 'lightbox') {
				e.currentTarget.style.display = 'none';
			}
		});
	</script>



	<script src="{{ asset('client/js/jquery.galleriffic.js') }}" defer></script>

	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$('div.navigation').css({
				'width': '25%',
				'float': 'right'
			});
			$('div.content').css('display', 'block');

			var onMouseOutOpacity = 0.67;
			$('#thumbs ul.thumbs li').opacityrollover({
				mouseOutOpacity: onMouseOutOpacity,
				mouseOverOpacity: 1.0,
				fadeSpeed: 'fast',
				exemptionSelector: '.selected'
			});
			// Initialize Advanced Galleriffic Gallery
			if ($('#thumbs').length) {
				var gallery = $('#thumbs').galleriffic({
					delay: 2500,
					numThumbs: 15,
					preloadAhead: 10,
					enableTopPager: true,
					enableBottomPager: true,
					maxPagesToShow: 7,
					imageContainerSel: '#slideshow',
					controlsContainerSel: '#controls',
					captionContainerSel: '#caption',
					loadingContainerSel: '#loading',
					renderSSControls: true,
					renderNavControls: true,
					playLinkText: 'Play Slideshow',
					pauseLinkText: 'Pause Slideshow',
					prevLinkText: '&lsaquo; Previous Photo',
					nextLinkText: 'Next Photo &rsaquo;',
					nextPageLinkText: 'Next &rsaquo;',
					prevPageLinkText: '&lsaquo; Prev',
					enableHistory: false,
					autoStart: false,
					syncTransitions: true,
					defaultTransitionDuration: 900,
					onSlideChange: function (prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut: function (callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn: function () {
						this.fadeTo('fast', 1.0);
					}
				});
			}
		});




		var defaults = {
			mouseOutOpacity: 0.67,
			mouseOverOpacity: 1.0,
			fadeSpeed: 'fast',
			exemptionSelector: '.selected'
		};

		$.fn.opacityrollover = function (settings) {

			// Create config object properly
			var config = $.extend({}, defaults, settings);

			function fadeTo(element, opacity) {
				var $target = $(element);

				if (config.exemptionSelector) {
					$target = $target.not(config.exemptionSelector);
				}

				$target.stop(true, true).fadeTo(config.fadeSpeed, opacity);
			}

			return this.each(function () {

				$(this)
					.css('opacity', config.mouseOutOpacity)
					.hover(
						function () {
							fadeTo(this, config.mouseOverOpacity);
						},
						function () {
							fadeTo(this, config.mouseOutOpacity);
						}
					);
			});
		};

	</script>

	 @include('client.layouts.model_popup')
@endsection