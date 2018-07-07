<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Pure simple javascript div slider">
        <meta name="keywords" content="javascript slider, javascript div slider, pure javascript div slider">
        <meta name="author" content="Quanton81">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quantum Javascript Div Slider</title>
        <style>
            img {
                vertical-align: middle;
                text-align: center
            }
            .quantum-slider {
                border:solid #aaa;
                border-width:1px;
                border-radius:5px; 
                width:auto; 
                margin:14px 10px; 
                color:#555; 
                font-size:1em; 
                display: block;
                overflow: hidden;
                position: relative;
                white-space: nowrap;
                padding: 24px 10px;
            }
            .quantum-slider .element {
                position:relative;
                display: inline-block;
                -webkit-transition:all 0.5s ease-in-out;
                -moz-transition:all 0.5s ease-in-out;
                -o-transition:all 0.5s ease-in-out;
                -ms-transition:all 0.5s ease-in-out;
                transition:all 0.5s ease-in-out 0s;
                margin: 0 24px;
                padding: 0 5px;
                right:0;
                width: auto;
                white-space: normal;
                text-align: center;
                vertical-align: middle;
            }
            .quantum-slider .lena {
                border: 1px solid #aaa; 
                padding: 10px 0;
            }
            .quantum-slider span {
                cursor:pointer;
                height:100%;
                position:absolute;
                width:24px;
                margin: 0;
                padding: 0;
                background-color:#eee;
            }
            .quantum-slider span:hover {
                background-color:#ddd;
            }
            .quantum-slider span:active {
                background-color:#ccc;
            }
            .quantum-slider span#prev {
                background-image:url("arrow-left.png");
                background-position:50% 50%;
                background-repeat:no-repeat;
                background-size:24px auto;
                left:0;
                top:0;
                z-index:101;
            }
            .quantum-slider span#next {
                background-image:url("arrow-right.png");
                background-position:50% 50%;
                background-repeat:no-repeat;
                background-size:24px auto;
                right:0;
                top:0;
                z-index:101;
            }
            
            .pager {
                position: relative;
                width: 100%;
                display: block;
                height: auto;
                text-align: center;
                margin: 10px 0 -10px 0;
                padding: 0;
            }
            
            .pager span {
                width: 1em;
                position: relative;
                display: inline-block;
                text-align: center;
                margin: 0 1em;
                padding: 0.2em;
                border-radius: 25%;
            }
            
            .pager span.activated{
                background-color:#ddd;
                cursor:default;
            }
        </style>
    </head>
    <body>
        <h1>Javascript pure div slider (No jQuery)</h1>
        <p>
            You can apply every style you want to the slider container and the slider can contain only divs.<br> 
            You must apply to all the element divs inside the slider the same style for the slider to work correctly.<br>
            The elements divs inside the slider will adapt based on the style you apply.<br> 
            If something visual is wrong with the slider when you put it inside the html pages written by you, verify if there are conflicts between the slider styles and your styles.
        </p>
        <h2>Slider with auto scrolling</h2>
        <h3>Slider with only 1 visible div, scrolls till last div</h3>
        <div id="sa1" class="quantum-slider"><!-- 
            --><div class="element">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare lacinia ligula vel vehicula. Phasellus.</div><!--
            --><div class="element">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--                                                         
            --><div class="element">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor suscipit enim, eu bibendum leo. Praesent sit amet lectus vitae dolor ornare dictum. Pellentesque accumsan, urna in facilisis tincidunt, felis diam euismod augue, ac mollis tortor nibh quis diam. Duis semper tincidunt aliquam. Nam malesuada.</div><!--
            --><div class="element">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor suscipit enim, eu bibendum leo. Praesent sit amet lectus vitae dolor ornare dictum. Pellentesque accumsan, urna in facilisis tincidunt, felis diam euismod augue, ac mollis tortor nibh quis diam. Duis semper tincidunt aliquam. Nam malesuada.</div><!--
            --><div class="element">5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
            --><div class="element">6. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--
        --></div>
        <h3>Slider with 2 visible divs, scrolls infinitely</h3>
        <div id="sa2" class="quantum-slider"><!-- 
            --><div class="element lena">1. <img src="lena.gif" width="150" height="150"/></div><!--
            --><div class="element lena">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--                                                         
            --><div class="element lena">3. <img src="lena.gif" width="150" height="150"/></div><!--
            --><div class="element lena">4. <img src="lena.gif" width="150" height="150"/></div><!--
            --><div class="element lena">5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
        --></div>
        <h3>Slider with 3 visible divs, scrolls till last div</h3>
        <div id="sa3" class="quantum-slider"><!-- 
            --><div class="element">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare lacinia ligula vel vehicula. Phasellus.</div><!--
            --><div class="element">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--                                                         
            --><div class="element">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
            --><div class="element">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor suscipit enim, eu bibendum leo. Praesent sit amet lectus vitae dolor ornare dictum. Pellentesque accumsan, urna in facilisis tincidunt, felis diam euismod augue, ac mollis tortor nibh quis diam. Duis semper tincidunt aliquam. Nam malesuada.</div><!--
            --><div class="element">5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
            --><div class="element">6. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--
            --><div class="element">7. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
        --></div>
        <h2>Slider with manual scrolling</h2>
        <h3>Slider with only 1 visible div</h3>
        <div id="sm1" class="quantum-slider"><!-- 
            --><div class="element">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare lacinia ligula vel vehicula. Phasellus.</div><!--
            --><div class="element">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--                                                         
            --><div class="element">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
            --><div class="element">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor suscipit enim, eu bibendum leo. Praesent sit amet lectus vitae dolor ornare dictum. Pellentesque accumsan, urna in facilisis tincidunt, felis diam euismod augue, ac mollis tortor nibh quis diam. Duis semper tincidunt aliquam. Nam malesuada.</div><!--
            --><div class="element">5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
            --><div class="element">6. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--
        --></div>
        <h3>Slider with only 1 visible div and custom arrows</h3>
        <div id="sm1_a" class="quantum-slider"><!-- 
            --><span id="prev" class="ctrl-selector"></span><!-- 
            --><div class="element">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare lacinia ligula vel vehicula. Phasellus.</div><!--
            --><div class="element">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--                                                         
            --><div class="element">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
            --><div class="element">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor suscipit enim, eu bibendum leo. Praesent sit amet lectus vitae dolor ornare dictum. Pellentesque accumsan, urna in facilisis tincidunt, felis diam euismod augue, ac mollis tortor nibh quis diam. Duis semper tincidunt aliquam. Nam malesuada.</div><!--
            --><div class="element">5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
            --><div class="element">6. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--
            --><span id="next" class="ctrl-selector"></span><!-- 
        --></div>
        <h3>Slider with 2 visible divs</h3>
        <div id="sm2" class="quantum-slider"><!-- 
            --><div class="element">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare lacinia ligula vel vehicula. Phasellus.</div><!--
            --><div class="element">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--                                                         
            --><div class="element">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
            --><div class="element">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor suscipit enim, eu bibendum leo. Praesent sit amet lectus vitae dolor ornare dictum. Pellentesque accumsan, urna in facilisis tincidunt, felis diam euismod augue, ac mollis tortor nibh quis diam. Duis semper tincidunt aliquam. Nam malesuada.</div><!--
            --><div class="element">5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
        --></div>
        <h3>Slider with 3 visible div</h3>
        <div id="sm3" class="quantum-slider"><!-- 
            --><div class="element">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare lacinia ligula vel vehicula. Phasellus.</div><!--
            --><div class="element">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--                                                         
            --><div class="element">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
            --><div class="element">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor suscipit enim, eu bibendum leo. Praesent sit amet lectus vitae dolor ornare dictum. Pellentesque accumsan, urna in facilisis tincidunt, felis diam euismod augue, ac mollis tortor nibh quis diam. Duis semper tincidunt aliquam. Nam malesuada.</div><!--
            --><div class="element">5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis id velit sed accumsan. Mauris sodales eros nec justo semper sagittis. Praesent nisl mauris, lacinia ac laoreet quis, posuere sed enim. Vestibulum quis congue nisl.</div><!--
            --><div class="element">6. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--
            --><div class="element">7. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel blandit nisi. Sed id magna mattis dolor convallis vulputate. Aenean justo leo, laoreet id est.</div><!--
        --></div>
    </body>
    <script>
        var helpers = {};
        helpers.once = function (fn, context) { 
            var result;
            return function() { 
                if(fn) {
                    result = fn.apply(context || this, arguments);
                    fn = null;
                }
                return result;
            };
        };
        helpers.isset = function () {
            var a = arguments, l = a.length, i = 0, undef;
            if (l === 0) {
                throw new Error('Empty isset');
            }
            while (i !== l) {
                if (a[i] === undef || a[i] === null) {
                    return false;
                }
                i++;
            }
            return true;
        };
        helpers.empty = function (mixed_var) {
            var undef, key, i, len;
            var emptyValues = [undef, null, false, 0, '', '0'];
            for (i = 0, len = emptyValues.length; i < len; i++) {
                if (mixed_var === emptyValues[i]) {
                    return true;
                }
            }
            if (typeof mixed_var === 'object') {
                for (key in mixed_var) {
                    return false;
                }   
                return true;
            }
            return false;
        };
        helpers.returnStyle = function (el, styleProp) {
            var x = undefined;
            if (this.isset(el.currentStyle)) {
                x = el.currentStyle[styleProp];
            } else if (this.isset(window.getComputedStyle)) {
                x = document.defaultView.getComputedStyle(el,null).getPropertyValue(styleProp);
            }
            if(this.empty(x)) {
                x = '0px';
            }
            return x;
        };
        helpers.resetSliders = function (sliders) {
            for (var i = 0; i < sliders.length; i++) {
                sliders[i].resetSlider();
            }
        };
        
        // int - id to apply, 
        // loop - loop or not, 
        // sliderIntervalTime - milisecconds between loops, 
        // divsNumberShow - number of divs inside container, 
        // infiniteLoops - loop infinitely or not,
        // customArrows - should it create arrows or find them
        var jsSlider = function(id, loop, sliderIntervalTime, divsNumberShow, infiniteLoops, customArrows) {
            var self = this;
            this.container = undefined;
            this.containerMarginRight = 0;
            this.containerMarginLeft = 0;
            this.containerPaddingRight = 0;
            this.containerPaddingLeft = 0;
            this.containerBorderLeftWidth = 0;
            this.containerBorderRightWidth = 0;
            this.sliderInterval = undefined;
            this.tr = undefined;
            this.divs = undefined;
            this.numCallsInteval = 0;
            this.infiniteLoops = 0;
            this.loop = 0;
            this.containerWidth = 0;
            this.containerInner = 0;
            this.sliderIntervalTime = 4000;
            this.deviation = 0;
            this.divsNumberShow = 1;
            this.divsMarginRight = 0;
            this.divsMarginLeft = 0;
            this.divsPaddingRight = 0;
            this.divsPaddingLeft = 0;
            this.divsBorderLeftWidth = 0;
            this.divsBorderRightWidth = 0;
            this.pager = undefined;
            this.pagerCounter = 0;
            this.customArrows = 0;
            this.hideNext = function () {
                self.showNextPrev();
                var ctrlSelectors = self.container.getElementsByClassName("ctrl-selector");
                ctrlSelectors[1].style.display = 'none';
            };
            this.hidePrev = function () {
                self.showNextPrev();
                var ctrlSelectors = self.container.getElementsByClassName("ctrl-selector");
                ctrlSelectors[0].style.display = 'none';
            };
            this.showNextPrev = function () {
                var ctrlSelectors = self.container.getElementsByClassName("ctrl-selector");
                for (var i = 0; i < ctrlSelectors.length; i++) {
                    ctrlSelectors[i].style.display = 'block';
                }
            };
            this.showHideNextPrev = function () {
                var currentPagerLength = ((Math.ceil(self.divs.length / self.divsNumberShow)) - 1);
                if(!self.loop && (self.pagerCounter === currentPagerLength)) {
                    self.hideNext();
                } else if(!self.loop && self.pagerCounter === 0) {
                    self.hidePrev();
                } else {
                    self.showNextPrev();
                }
            };
            this.pagerReset = function () {
                var pagerElements = self.pager.getElementsByClassName("pager-element");
                for (var i = 0; i < pagerElements.length; i++) {
                    if(pagerElements[i].className === 'pager-element activated') {
                        pagerElements[i].className = 'pager-element';
                        break;
                    }
                }
                pagerElements[0].className += ' activated';
            };
            this.pagerMove = function () {
                var pagerElements = self.pager.getElementsByClassName("pager-element");
                var activatedElement = 0;
                for (var i = 0; i < pagerElements.length; i++) {
                    if(pagerElements[i].className === 'pager-element activated') {
                        pagerElements[i].className = 'pager-element';
                        activatedElement = self.pagerCounter;
                    }
                }
                var activatedCounter = activatedElement < 0 ? pagerElements.length - 1 : activatedElement % pagerElements.length;
                pagerElements[activatedCounter].className = 'pager-element activated';
            };
            this.showPagerSlide = function (counter) {
                var currentPagerLength = ((Math.ceil(self.divs.length / self.divsNumberShow)) - 1);
                self.pagerCounter = (counter < 0 ? currentPagerLength : (counter > currentPagerLength ? 0 : counter));
                self.showHideNextPrev();
                for (var i = 0; i < self.divs.length; i++) {
                    if(self.loop && self.pagerCounter === 0) {
                        self.divs[i].style.right = '0px';
                    } else if(self.loop && self.pagerCounter === (self.divs.length - 1)) {
                        self.divs[i].style.right = (currentPagerLength * (self.containerInner)) + 'px';
                    } else {
                        self.divs[i].style.right = (self.pagerCounter * self.containerInner) + 'px';
                    }
                }
                self.pagerMove();
            };
            this.showPagerSlideStopInterval = function (counter) {
                self.showPagerSlide(counter);
                self.stopSlider();
            };
            this.showNextSlide = function () {
                self.pagerCounter++;
                self.showPagerSlide(self.pagerCounter);
            };
            this.showNextSlideStopInterval = function () {
                self.showNextSlide();
                self.stopSlider();
            };
            this.showPrevSlide = function () {
                self.pagerCounter--;
                self.showPagerSlide(self.pagerCounter);
            };
            this.showPrevSlideStopInterval = function () {
                self.showPrevSlide();
                self.stopSlider();
            };
            this.stopSlider = helpers.once(function() {
                clearInterval(self.sliderInterval);
            });
            this.startSlider = function () {
                if(self.numCallsInteval > 0) {
                    self.showNextSlide();
                }
                else {
                    self.stopSlider();
                }
                if(!self.infiniteLoops) {
                    self.numCallsInteval--;
                }
            };
            this.resetSlider = function () {
                if(self.loop) {
                    self.stopSlider();
                } else {
                    self.hidePrev();
                }
                self.recalcConainer();
                self.recalcDeviation();
                for (var i = 0; i < self.divs.length; i++) {
                    self.divs[i].style.width = ((self.containerInner - self.deviation) / self.divsNumberShow) + 'px';
                    self.divs[i].style.right =  '0px';
                }
                self.pagerReset();
            };
            this.recalcConainer = function () {
                self.containerMarginRight = helpers.returnStyle(self.container, 'margin-right');
                self.containerMarginLeft = helpers.returnStyle(self.container, 'margin-left');
                self.containerPaddingRight = helpers.returnStyle(self.container, 'padding-right');
                self.containerPaddingLeft = helpers.returnStyle(self.container, 'padding-left');
                self.containerBorderLeftWidth = helpers.returnStyle(self.container, 'border-left-width');
                self.containerBorderRightWidth = helpers.returnStyle(self.container, 'border-right-width');
                self.containerWidth = self.container.offsetWidth;
                
                self.containerInner = 
                    self.containerWidth 
                    - parseInt(self.containerPaddingRight) 
                    - parseInt(self.containerPaddingLeft) 
                    - parseInt(self.containerBorderLeftWidth) 
                    - parseInt(self.containerBorderRightWidth);
            };
            this.recalcDeviation = function () {
                self.deviation = 
                    (parseInt(self.divsMarginRight)
                    + parseInt(self.divsMarginLeft)
                    + parseInt(self.divsPaddingRight)
                    + parseInt(self.divsPaddingLeft)
                    + parseInt(self.divsBorderLeftWidth)
                    + parseInt(self.divsBorderRightWidth)) * self.divsNumberShow;
            };
            this.createSlider = function (id, loop, sliderIntervalTime, divsNumberShow, infiniteLoops, customArrows) {
                if(helpers.isset(id)) {
                    self.loop = helpers.isset(loop) ? loop : 1;  
                    self.sliderIntervalTime = helpers.isset(sliderIntervalTime) ? sliderIntervalTime : 4000;
                    self.divsNumberShow = helpers.isset(divsNumberShow) ? divsNumberShow : 1;
                    self.container = document.getElementById(id);
                    self.customArrows = helpers.isset(customArrows) ? customArrows : 0;
                    if (customArrows === 1) {
                        var ctrlSelectorNext = document.querySelector('.ctrl-selector#next');
                        ctrlSelectorNext.onclick = self.showNextSlideStopInterval;
                    } else {
                        var ctrlSelectorNext = document.createElement('span');
                        ctrlSelectorNext.id = 'next';
                        ctrlSelectorNext.className = 'ctrl-selector';
                        ctrlSelectorNext.innerHTML = '&nbsp;';
                        ctrlSelectorNext.onclick = self.showNextSlideStopInterval;
                        self.container.appendChild(ctrlSelectorNext);
                    }
                    if (customArrows === 1) {
                        var ctrlSelectorPrev = document.querySelector('.ctrl-selector#prev');
                        ctrlSelectorPrev.onclick = self.showPrevSlideStopInterval;
                    } else {
                        var ctrlSelectorPrev = document.createElement('span');
                        ctrlSelectorPrev.id = 'prev';
                        ctrlSelectorPrev.className = 'ctrl-selector';
                        ctrlSelectorPrev.innerHTML = '&nbsp;';
                        ctrlSelectorPrev.onclick = self.showPrevSlideStopInterval;
                        self.container.insertBefore(ctrlSelectorPrev ,self.container.firstChild);
                    }
                    self.pager = document.createElement('div');
                    self.pager.className = 'pager';
                    self.container.appendChild(self.pager);
                    self.divs = self.container.getElementsByClassName("element");
                    self.divsMarginRight = helpers.returnStyle(self.divs[0], 'margin-right');
                    self.divsMarginLeft = helpers.returnStyle(self.divs[0], 'margin-left');
                    self.divsPaddingRight = helpers.returnStyle(self.divs[0], 'padding-right');
                    self.divsPaddingLeft = helpers.returnStyle(self.divs[0], 'padding-left');
                    self.divsBorderLeftWidth = helpers.returnStyle(self.divs[0], 'border-left-width');
                    self.divsBorderRightWidth = helpers.returnStyle(self.divs[0], 'border-right-width');
                    self.infiniteLoops = helpers.isset(infiniteLoops) ? infiniteLoops : 0;
                    self.recalcConainer();
                    self.recalcDeviation();
                    for (var i = 0; i < self.divs.length; i++) {
                        self.divs[i].style.width = ((self.containerInner - self.deviation) / self.divsNumberShow) + 'px';
                    }
                    for (var i = 0; i < Math.ceil(self.divs.length / self.divsNumberShow); i++) {
                        var pagerElement = document.createElement('span');
                        pagerElement.className = 'pager-element';
                        pagerElement.innerHTML = i + 1;
                        if (typeof window.addEventListener === 'function'){
                            (function (_i) {
                                pagerElement.addEventListener('click', function(){
                                    self.showPagerSlideStopInterval(_i);
                                });
                            })(i);
                        }
                        self.pager.appendChild(pagerElement);
                    }
                    self.numCallsInteval = Math.ceil(self.divs.length / self.divsNumberShow) - 1;
                    if(self.loop) {
                        self.sliderInterval = setInterval(function() {
                            self.startSlider();
                        }, self.sliderIntervalTime);
                    } else {
                        self.hidePrev();
                    }
                    self.pagerReset();
                }
            };
            this.createSlider(id, loop, sliderIntervalTime, divsNumberShow, infiniteLoops, customArrows);
        };
        
        var sliders = [];
        var resizing;
        
        document.addEventListener( 'DOMContentLoaded', function () {
            sliders.push(new jsSlider("sa1", 1, 4000, 1, 0));
            sliders.push(new jsSlider("sa2", 1, 4000, 2, 1));
            sliders.push(new jsSlider("sa3", 1, 4000, 3, 0));
            sliders.push(new jsSlider("sm1", 0, 4000, 1));
            sliders.push(new jsSlider("sm1_a", 0, 4000, 1, 0, 1));
            sliders.push(new jsSlider("sm2", 0, 4000, 2));
            sliders.push(new jsSlider("sm3", 0, 4000, 3));
        }, false );
        
        window.addEventListener('resize', function () {
            clearTimeout(resizing);
            resizing = setTimeout(function () {
                helpers.resetSliders(sliders);}, 100);
        }, false );
    </script>
</html>
