<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Pure simple javascript div slider">
        <meta name="keywords" content="javascript slider, javascript div slider, pure javascript div slider">
        <meta name="author" content="Dott. Anton Duoda">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quantum Javascript Div Slider</title>
        <style>
            .quantum-slider {
                border-top:1px solid #aaa;
                border-left:1px solid #aaa;
                border-right:3px solid #aaa;
                border-bottom:3px solid #aaa;
                border-radius:8px; 
                width:100%; 
                margin:14px 0; 
                color:#555; 
                font-size:1em; 
                display: block;
                overflow: hidden;
                position: relative;
                white-space: nowrap;
                padding: 24px 0;
            }
            
            .quantum-slider .container {
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
                width: calc(100% - 62px);
                white-space: normal;
                text-align: center;
                vertical-align: middle;
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
            
            .quantum-slider span.prev {
                background-image:url("arrow-left.png");
                background-position:50% 50%;
                background-repeat:no-repeat;
                background-size:24px auto;
                left:0;
                top:0;
                z-index:101;
            }
            
            .quantum-slider span.next {
                background-image:url("arrow-right.png");
                background-position:50% 50%;
                background-repeat:no-repeat;
                background-size:24px auto;
                right:0;
                top:0;
                z-index:101;
            }
        </style>
    </head>
    <body>
        <h1>Javascript pure div slider (No jQuery)</h1>
        <h2>Slider with auto scrolling</h2>
        <div id="s1" class="quantum-slider"><!-- 
            --><div class="container">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices velit ac pulvinar varius. Etiam vitae nisl posuere, mollis tortor nec, ullamcorper sapien. Quisque vulputate viverra mauris, sit amet hendrerit neque aliquam ut.</div><!--
            --><div class="container">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices velit ac pulvinar varius. Etiam vitae nisl posuere, mollis tortor nec, ullamcorper sapien. Quisque vulputate viverra mauris, sit amet hendrerit neque aliquam ut.</div><!--                                                         --><div class="container">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices velit ac pulvinar varius. Etiam vitae nisl posuere, mollis tortor nec, ullamcorper sapien. Quisque vulputate viverra mauris, sit amet hendrerit neque aliquam ut.</div><!--                                                         --><div class="container">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices velit ac pulvinar varius. Etiam vitae nisl posuere, mollis tortor nec, ullamcorper sapien. Quisque vulputate viverra mauris, sit amet hendrerit neque aliquam ut.</div><!--
            --><div class="container">5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices velit ac pulvinar varius. Etiam vitae nisl posuere, mollis tortor nec, ullamcorper sapien. Quisque vulputate viverra mauris, sit amet hendrerit neque aliquam ut.</div><!--
        --></div>
        <h2>Slider with manual scrolling</h2>
        <div id="s2" class="quantum-slider"><!-- 
            --><div class="container">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices velit ac pulvinar varius. Etiam vitae nisl posuere, mollis tortor nec, ullamcorper sapien. Quisque vulputate viverra mauris, sit amet hendrerit neque aliquam ut.</div><!--
            --><div class="container">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices velit ac pulvinar varius. Etiam vitae nisl posuere, mollis tortor nec, ullamcorper sapien. Quisque vulputate viverra mauris, sit amet hendrerit neque aliquam ut.</div><!--                                                         --><div class="container">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices velit ac pulvinar varius. Etiam vitae nisl posuere, mollis tortor nec, ullamcorper sapien. Quisque vulputate viverra mauris, sit amet hendrerit neque aliquam ut.</div><!--                                                         --><div class="container">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices velit ac pulvinar varius. Etiam vitae nisl posuere, mollis tortor nec, ullamcorper sapien. Quisque vulputate viverra mauris, sit amet hendrerit neque aliquam ut.</div><!--
            --><div class="container">5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices velit ac pulvinar varius. Etiam vitae nisl posuere, mollis tortor nec, ullamcorper sapien. Quisque vulputate viverra mauris, sit amet hendrerit neque aliquam ut.</div><!--
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
        
        var jsSlider = function() {
            var self = this;
            this.container = undefined;
            this.sliderInterval = undefined;
            this.tr = undefined;
            this.divs = undefined;
            this.numCallsInteval = 0;
            this.infiniteLoop = 0;
            this.containerWidth = 0;
            this.sliderIntervalTime = 4000;
            this.deviation = 0;
            this.divsMarginRight = 0;
            this.divsMarginLeft = 0;
            this.divsPaddingRight = 0;
            this.divsPaddingLeft = 0;
            this.divsBorderLeftWidth = 0;
            this.divsBorderRightWidth = 0;
            this.showNextPrev = function () {
                var spans = self.container.getElementsByTagName("span");
                for (var i = 0; i < spans.length; i++) {
                    spans[i].style.display = 'block';
                }
            };
            this.hideNext = function () {
                self.showNextPrev();
                var spans = self.container.getElementsByTagName("span");
                spans[1].style.display = 'none';
            };
            this.hidePrev = function () {
                self.showNextPrev();
                var spans = self.container.getElementsByTagName("span");
                spans[0].style.display = 'none';
            };
            this.showNextSlide = function () {
                var r = parseInt(self.divs[0].style.right);
                r = (isNaN(r) ? 0 : r);
                if(!self.infiniteLoop && ((self.divs.length - 2) * (self.containerWidth)) === r) {
                    self.hideNext();
                } else {
                    self.showNextPrev();
                }
                for (var i = 0; i < self.divs.length; i++) {
                    if(self.infiniteLoop && ((self.divs.length - 1) * (self.containerWidth)) === r) {
                        self.divs[i].style.right = '0px';
                    } else {
                        self.divs[i].style.right = r + (self.containerWidth) + 'px';
                    }
                }
            };
            this.showNextSlideStopInterval = function () {
                self.showNextSlide();
                self.stopSlider();
            };
            this.showPrevSlide = function () {
                var r = parseInt(self.divs[0].style.right);
                r = (isNaN(r) ? 0 : r);
                if(!self.infiniteLoop && r === (self.containerWidth)) {
                    self.hidePrev();
                } else {
                    self.showNextPrev();
                }
                for (var i = 0; i < self.divs.length; i++) {
                    if(self.infiniteLoop && r === 0) {
                        self.divs[i].style.right = r + ((self.divs.length - 1) * (self.containerWidth)) + 'px';
                    } else {
                        self.divs[i].style.right = r - (self.containerWidth) + 'px';
                    }
                }
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
                self.numCallsInteval--;
            };
            this.resetSlider = function () {
                if(self.infiniteLoop) {
                    self.stopSlider();
                } else {
                    self.hidePrev();
                }
                self.containerWidth = self.container.offsetWidth;
                for (var i = 0; i < self.divs.length; i++) {
                    self.divs[i].style.width = (self.containerWidth - self.deviation) + 'px';
                    self.divs[i].style.right =  '0px';
                }
            };
            this.createSlider = function (id, infiniteLoop) {
                self.infiniteLoop = infiniteLoop;  
                self.container = document.getElementById(id);
                self.containerWidth = self.container.offsetWidth;
                var span1 = document.createElement('span');
                span1.className = 'next';
                span1.innerHTML = '&nbsp;';
                span1.onclick = self.showNextSlideStopInterval;
                self.container.appendChild(span1);
                var span2 = document.createElement('span');
                span2.className = 'prev';
                span2.innerHTML = '&nbsp;';
                span2.onclick = self.showPrevSlideStopInterval;
                self.container.insertBefore(span2 ,self.container.firstChild);
                self.divs = self.container.getElementsByClassName("container");
                self.divsMarginRight = helpers.returnStyle(self.divs[0], 'margin-right');
                self.divsMarginLeft = helpers.returnStyle(self.divs[0], 'margin-left');
                self.divsPaddingRight = helpers.returnStyle(self.divs[0], 'padding-right');
                self.divsPaddingLeft = helpers.returnStyle(self.divs[0], 'padding-left');
                self.divsBorderLeftWidth = helpers.returnStyle(self.divs[0], 'border-left-width');
                self.divsBorderRightWidth = helpers.returnStyle(self.divs[0], 'border-right-width');
                
                self.deviation = 
                    parseInt(self.divsMarginRight) 
                    + parseInt(self.divsMarginLeft) 
                    + parseInt(self.divsPaddingRight) 
                    + parseInt(self.divsPaddingLeft) 
                    + parseInt(self.divsBorderLeftWidth) 
                    + parseInt(self.divsBorderRightWidth);
                for (var i = 0; i < self.divs.length; i++) {
                    self.divs[i].style.width = (self.containerWidth - self.deviation) + 'px';
                }
                self.numCallsInteval = self.divs.length - 1;
                if(self.infiniteLoop) {
                    self.sliderInterval = setInterval(function() {
                        self.startSlider();
                    }, self.sliderIntervalTime);
                } else {
                    self.hidePrev();
                }
            };
        };
        
        var jsSlider1 = new jsSlider();
        var jsSlider2 = new jsSlider();
        document.addEventListener( 'DOMContentLoaded', function () {
            jsSlider1.createSlider("s1", 1);
            jsSlider2.createSlider("s2", 0);
        }, false );
        
        var resizing;
        function resetSliders() {
            jsSlider1.resetSlider();
            jsSlider2.resetSlider();
        }
        
        window.addEventListener('resize', function() {
            clearTimeout(resizing);
            resizing = setTimeout(resetSliders, 100);
        }, false );
    </script>
</html>
