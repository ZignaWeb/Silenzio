var MyFirstMoo = new Class({
     
    //implements
    Implements: [Options, Events, Chain],
    //options
    options: {
        transition: Fx.Transitions.Quad.easeIn,
        'delay1': 10000,
        opacityFull : 1,
        opacityNull : 0.4,
        images: '',
        imageId: 'background',
        containerId: 'bgContainer'
    },
 
//initialization
    initialize: function(el, options) {
        this.zindex = 4;
        this.startIndex = 0;
        this.setOptions(options);
 
        this.element = $(this.options.imageId);
 
        this.effect = new Fx.Tween(this.element, {
            'link': 'cancel',
            transition: this.options.transition,
            onStart: function(boo) {
                //boo.highlight(this.options.startColor);
            }.bind(this),
            onComplete: function(boo) {
                //boo.highlight(this.options.completeColor);
            }.bind(this),
            onCancel: function(boo) {
                //boo.highlight(this.options.cancelColor);
            }.bind(this)
 
        });
 
        this.switchImage.periodical(this.options.delay1, this);
 
    },
 

    switchImage: function(){
        if (this.options.images[this.startIndex] != null){
            var imageEl = this.injectImage(this.options.images[this.startIndex]);
            this.startIndex++;
        }else{
            this.startIndex=0;
            var imageEl = this.injectImage(this.options.images[this.startIndex]);
            this.startIndex++;
        }



    },
   
    injectImage: function (img){
        //var imageEl  = new Element('img', {id: this.options.imageId});
        var container  = $(this.options.containerId);
        var imageEl = img;
        imageEl.inject(container);
        imageEl.set('styles', {
                'z-index': this.zindex,
                'position': 'absolute',
                'width':'100%',
                'height':'100%',
                'opacity' :'0'
        });
        imageEl.set('id', 'point' + this.zindex);
        if (this.startIndex == 0){
        }else{
            var oldImageEl = $('point' + (this.zindex -1));
            //oldImageEl.fade(0.6);
            //console.log(oldImageEl + '???');
        }
        var myEffect = new Fx.Morph(imageEl, {duration: 1500});
        myEffect.start({
            'opacity': 1 //Morphs the height from the current to 100px.
        });

        if (this.startIndex != 0){
            //oldImageEl.destroy();
        }

        //imageEl.fade('in');
        this.zindex++;
        //console.log('z-index:' + this.zindex);

    },
    
    removeImage: function (img){
        // not used
        //console.log(this.startIndex);
        if (this.startIndex == 0){
            //console.log('huhu');
            var oldImageEl = $(this.options.images[this.startIndex]);
        }else{
            //console.log('hihi');
            var oldImageEl = $(this.options.images[this.startIndex -1]);
        }
        //console.log(oldImageEl);
        oldImageEl.fade('out');
        imageEl.fade('in');
        oldImageEl.destroy();
    },


    fadeIn: function() {
            this.effect.start('opacity', this.options.opacityFull);
    },
 
    fadeOut: function() {
            this.effect.start('opacity',this.options.opacityNull);
    }
});
 
//once the DOM is ready
window.addEvent('domready', function() {
    var arr2 = new Array("nene.jpg", "img/2.jpg", "img/3.jpg", "img/4.jpg", "img/5.jpg");
    var myImages = new Asset.images(arr2);
    //console.log(myImages);
    var MyPeriodicalEffect = new MyFirstMoo('bgContainer', {
        images: myImages
    });
 
});
