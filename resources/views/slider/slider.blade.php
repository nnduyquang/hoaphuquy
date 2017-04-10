<div class="slider">
    {{--{{ Html::image('images/slider/slider_01.jpg','',array('class'=>'')) }}--}}
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            @foreach($slides as $key=>$slide)
            {{ Html::image('images/slider/'.$slide->anhslider,'',array('class'=>'')) }}
            @endforeach
        </div>
    </div>
</div>