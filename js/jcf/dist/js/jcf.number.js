/*!
 * JavaScript Custom Forms : Number Module
 *
 * Copyright 2014-2015 PSD2HTML - http://psd2html.com/jcf
 * Released under the MIT license (LICENSE.txt)
 *
 * Version: 1.2.3
 */
!function(e){e.addModule(function(e){"use strict";return{name:"Number",selector:'input[type="number"]',options:{realElementClass:"jcf-real-element",fakeStructure:'<span class="jcf-number"><span class="jcf-btn-inc"></span><span class="jcf-btn-dec"></span></span>',btnIncSelector:".jcf-btn-inc",btnDecSelector:".jcf-btn-dec",pressInterval:150},matchElement:function(e){return e.is(this.selector)},init:function(){this.initStructure(),this.attachEvents(),this.refresh()},initStructure:function(){this.page=e("html"),this.realElement=e(this.options.element).addClass(this.options.realElementClass),this.fakeElement=e(this.options.fakeStructure).insertBefore(this.realElement).prepend(this.realElement),this.btnDec=this.fakeElement.find(this.options.btnDecSelector),this.btnInc=this.fakeElement.find(this.options.btnIncSelector),this.initialValue=parseFloat(this.realElement.val())||0,this.minValue=parseFloat(this.realElement.attr("min")),this.maxValue=parseFloat(this.realElement.attr("max")),this.stepValue=parseFloat(this.realElement.attr("step"))||1,this.minValue=isNaN(this.minValue)?-(1/0):this.minValue,this.maxValue=isNaN(this.maxValue)?1/0:this.maxValue,isFinite(this.maxValue)&&(this.maxValue-=(this.maxValue-this.minValue)%this.stepValue)},attachEvents:function(){this.realElement.on({focus:this.onFocus}),this.btnDec.add(this.btnInc).on("jcf-pointerdown",this.onBtnPress)},onBtnPress:function(e){var t,s=this;this.realElement.is(":disabled")||(t=this.btnInc.is(e.currentTarget),s.step(t),clearInterval(this.stepTimer),this.stepTimer=setInterval(function(){s.step(t)},this.options.pressInterval),this.page.on("jcf-pointerup",this.onBtnRelease))},onBtnRelease:function(){clearInterval(this.stepTimer),this.page.off("jcf-pointerup",this.onBtnRelease)},onFocus:function(){this.fakeElement.addClass(this.options.focusClass),this.realElement.on({blur:this.onBlur,keydown:this.onKeyPress})},onBlur:function(){this.fakeElement.removeClass(this.options.focusClass),this.realElement.off({blur:this.onBlur,keydown:this.onKeyPress})},onKeyPress:function(e){38!==e.which&&40!==e.which||(e.preventDefault(),this.step(38===e.which))},step:function(e){var t=parseFloat(this.realElement.val()),s=t||0,i=this.stepValue*(e?1:-1),n=isFinite(this.minValue)?this.minValue:this.initialValue-Math.abs(s*this.stepValue),a=Math.abs(n-s)%this.stepValue;a?e?s+=i-a:s-=a:s+=i,s<this.minValue?s=this.minValue:s>this.maxValue&&(s=this.maxValue),s!==t&&(this.realElement.val(s).trigger("change"),this.refresh())},refresh:function(){var e=this.realElement.is(":disabled"),t=parseFloat(this.realElement.val());this.fakeElement.toggleClass(this.options.disabledClass,e),this.btnDec.toggleClass(this.options.disabledClass,t===this.minValue),this.btnInc.toggleClass(this.options.disabledClass,t===this.maxValue)},destroy:function(){this.realElement.removeClass(this.options.realElementClass).insertBefore(this.fakeElement),this.fakeElement.remove(),clearInterval(this.stepTimer),this.page.off("jcf-pointerup",this.onBtnRelease),this.realElement.off({keydown:this.onKeyPress,focus:this.onFocus,blur:this.onBlur})}}})}(jcf);