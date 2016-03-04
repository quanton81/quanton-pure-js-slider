<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Pure simple javascript div slider">
        <meta name="keywords" content="javascript slider, javascript div slider, pure javascript div slider">
        <meta name="author" content="Dott. Anton Duoda">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JS Slider</title>
        <style>
            .container {
                border:1px solid #aaa; 
                width:100%; 
                margin:14px 0px; 
                font-family:'trebuchet MS'; 
                font-size:14px; 
                display: block;
                overflow: hidden;
                position: relative;
                height: 160px;
                white-space: nowrap;
            }
            
            .container div {
                position:relative;
                display: inline-block;
                -webkit-transition:all 0.5s ease-in-out;
                -moz-transition:all 0.5s ease-in-out;
                -o-transition:all 0.5s ease-in-out;
                -ms-transition:all 0.5s ease-in-out;
                transition:all 0.5s ease-in-out 0s;
                margin:0px;
                padding:0 24px;
                right:0px;
                height: calc(100% - 24px);
                white-space: normal;
                border:1px dashed #ccc;
                margin: 5px 48px;
                padding: 5px;
            }
            
            .container span {
                cursor:pointer;
                height:100%;
                position:absolute;
                width:48px;
                margin: 0;
                padding: 0;
            }
            
            .container span:hover {
                background-color:#eee;
            }
            
            .container span:active {
                background-color:#ddd;
            }
            
            .container span.prev {
                background-image:url("arrow-left.png");
                background-position:50% 50%;
                background-repeat:no-repeat;
                background-size:48px auto;
                left:0;
                top:0;
                z-index:101;
            }
            
            .container span.next {
                background-image:url("arrow-right.png");
                background-position:50% 50%;
                background-repeat:no-repeat;
                background-size:48px auto;
                right:0;
                top:0;
                z-index:101;
            }
        </style>
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
            helpers.returnStyle = function (el, styleProp) {
                var x = undefined;
                if (el.currentStyle) {
                    x = el.currentStyle[styleProp];
                } else if (window.getComputedStyle) {
                    x = document.defaultView.getComputedStyle(el,null).getPropertyValue(styleProp);
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
                this.divsBorderWidth = 0;
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
                    if(!self.infiniteLoop && ((self.divs.length - 2) * self.containerWidth) === r) { // siamo sul ultimo td
                        self.hideNext();
                    } else {
                        self.showNextPrev();
                    }
                    for (var i = 0; i < self.divs.length; i++) {
                        if(self.infiniteLoop && ((self.divs.length - 1) * self.containerWidth) === r) { // siamo al primo td sposta in cima
                            self.divs[i].style.right = '0px';
                        } else {
                            self.divs[i].style.right = r + self.containerWidth + 'px';
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
                    if(!self.infiniteLoop && r === self.containerWidth) { // siamo al primo td
                        self.hidePrev();
                    } else {
                        self.showNextPrev();
                    }
                    for (var i = 0; i < self.divs.length; i++) {
                        if(self.infiniteLoop && r === 0) {
                            self.divs[i].style.right = r + ((self.divs.length - 1) * self.containerWidth) + 'px'; // siamo al ultimo td
                        } else {
                            self.divs[i].style.right = r - self.containerWidth + 'px';
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
                    self.divs = self.container.getElementsByTagName("div");
                    self.divsMarginRight = helpers.returnStyle(self.divs[0], 'margin-right');
                    self.divsMarginLeft = helpers.returnStyle(self.divs[0], 'margin-left');
                    self.divsPaddingRight = helpers.returnStyle(self.divs[0], 'padding-right');
                    self.divsPaddingLeft = helpers.returnStyle(self.divs[0], 'padding-left');
                    self.divsBorderWidth = helpers.returnStyle(self.divs[0], 'border-width');
                    
                    self.deviation = parseInt(self.divsMarginRight) + parseInt(self.divsMarginLeft) + parseInt(self.divsPaddingRight) + parseInt(self.divsPaddingLeft) + parseInt(self.divsBorderWidth) * 2 + 4;
                    
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
            
            function getStyle(el,styleProp)
            {
                var x = document.getElementById(el);
                if (x.currentStyle)
                    var y = x.currentStyle[styleProp];
                else if (window.getComputedStyle)
                    var y = document.defaultView.getComputedStyle(x,null).getPropertyValue(styleProp);
                return y;
            }

            var jsSlider1 = new jsSlider();
            var jsSlider2 = new jsSlider();
            document.addEventListener( 'DOMContentLoaded', function () {
                jsSlider1.createSlider("c1", 1);
                jsSlider2.createSlider("c2", 0);
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
    </head>
    <body>
        <div id="c1" class="container">
            <div>
                1. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div>
                2. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div>
                3. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div>
                4. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div>
                5. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div>
                6. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
        </div>
        <div id="c2" class="container">
            <div>
                1. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div>
                2. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div>
                3. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div>
                4. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div>
                5. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div>
                6. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
        </div>
    </body>
</html>