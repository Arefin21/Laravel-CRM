@extends('frontend.app')

@section('title','Sablin Properties')

@section('slider')
    <section class="top-banner-wrap slider-revolution-wrap">
        
			
			
	
			
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
       @foreach($sliders as $slider) 
    <div class="carousel-item active">
      <img style="height:400px" class="d-block w-100" src="{{(@$slider->image)?url('uploads/slider/'.$slider->image):''}}" alt="First slide">
    </div>
    
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
			
			
			

            </section><!-- slider-revolution-wrap -->
    

@endsection

@section('welcome')
    <section class="content-wrap">
    		<div data-elementor-type="wp-page" data-elementor-id="17303" class="elementor elementor-17303" data-elementor-settings="[]">
						<div class="elementor-inner">
							<div class="elementor-section-wrap">
							<section class="elementor-section elementor-top-section elementor-element elementor-element-61437f34 elementor-section-content-middle elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="61437f34" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
							<div class="elementor-background-overlay"></div>
							<div class="elementor-container elementor-column-gap-wide">
							<div class="elementor-row">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1d3c0343" data-id="1d3c0343" data-element_type="column">
			<div class="elementor-column-wrap elementor-element-populated">
							<div class="elementor-widget-wrap">
						<div class="elementor-element elementor-element-5d35ca78 elementor-widget elementor-widget-houzez_elementor_space" data-id="5d35ca78" data-element_type="widget" data-widget_type="houzez_elementor_space.default">
				<div class="elementor-widget-container">
			        <div class="houzez-spacer">
            <div class="houzez-spacer-inner"></div>
        </div>
        		</div>
				</div>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-3014e5fb elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3014e5fb" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
							<div class="elementor-row">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-1ea6ea4f" data-id="1ea6ea4f" data-element_type="column">
			<div class="elementor-column-wrap elementor-element-populated">
							<div class="elementor-widget-wrap">
						<div class="elementor-element elementor-element-7a813aec animated-slow elementor-invisible elementor-widget elementor-widget-houzez_elementor_section_title" data-id="7a813aec" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}" data-widget_type="houzez_elementor_section_title.default">
				<div class="elementor-widget-container">
			            <div class="houzez_section_title_wrap section-title-module">
                                    <h2 class="houzez_section_title">Our Latest project</h2>
                
                            </div>
            		</div>
				</div>
				<div class="elementor-element elementor-element-609930f5 elementor-widget elementor-widget-houzez_elementor_space" data-id="609930f5" data-element_type="widget" data-widget_type="houzez_elementor_space.default">
				<div class="elementor-widget-container">
			        <div class="houzez-spacer">
            <div class="houzez-spacer-inner"></div>
        </div>
        		</div>
				</div>
				<div class="elementor-element elementor-element-73ef2ab0 elementor-widget elementor-widget-houzez_elementor_property-card-v6" data-id="73ef2ab0" data-element_type="widget" data-widget_type="houzez_elementor_property-card-v6.default">
				<div class="elementor-widget-container">
					
		<div id="properties_module_section" class="property-cards-module property-cards-module-v1 property-cards-module-3-cols">
			<div id="module_properties" class="listing-view grid-view card-deck grid-view-3-cols">
				@foreach($service as $newshome)

				<div class="item-listing-wrap hz-item-gallery-js item-listing-wrap-v6 card" >
	<div class="item-wrap item-wrap-v6 h-100">
		<div class="d-flex align-items-center h-100">
			<div class="item-header">

				<div class="labels-wrap labels-right"> 



</div>

				<a href="{{route('service.details',$newshome->slug)}}">
				<img width="584" height="438" src="{{ asset('uploads/service/'.$newshome->image) }}" class="img-fluid wp-post-image" alt="" loading="lazy" srcset="wp-content/uploads/img/A - 01-04.png 584w,wp-content/uploads/img/A - 01-04.png 300w, wp-content/uploads/img/A - 01-04.png 1024w, wp-content/uploads/img/A - 01-04.png 768w, wp-content/uploads/img/A - 01-04.png 1170w,wp-content/uploads/img/A - 01-04.png 592w, wp-content/uploads/img/A - 01-04.png 800w,wp-content/uploads/img/A - 01-04.png 496w" sizes="(max-width: 584px) 100vw, 584px" /></a><!-- hover-effect -->

				<ul class="item-tools">



    </ul><!-- item-tools -->

			</div><!-- item-header -->	
			<div class="item-body flex-grow-1">
				<h2 class="item-title">
	<a href="{{route('service.details',$newshome->slug)}}">{{$newshome->title}}</a>
</h2><!-- item-title -->


			</div><!-- item-body -->
		</div><!-- d-flex -->
	</div><!-- item-wrap -->
</div><!-- item-listing-wrap -->

				@endforeach




			</div><!-- listing-view -->

							
					</div><!-- property-grid-module -->

				</div>
				</div>
				<div class="elementor-element elementor-element-18eb36b1 elementor-widget elementor-widget-spacer" data-id="18eb36b1" data-element_type="widget" data-widget_type="spacer.default">
				<div class="elementor-widget-container">
					<div class="elementor-spacer">
			<div class="elementor-spacer-inner"></div>
		</div>
				</div>
				</div>
						</div>
					</div>
		</div>
								</div>
					</div>
		</section>
						</div>
					</div>
		</div>
								</div>
					</div>
		</section>
					
			
		
						</div>
						</div>
					</div>
		</section>

@endsection
