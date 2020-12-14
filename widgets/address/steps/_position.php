<script>

    function stepChange(step=0){
        console.log(step)
        $('[btn-back]')[step?'removeClass':'addClass']('hide')                             
        $($('.step').get(step)).removeClass('hide')   
       
    }

    function stepJump($el,step){
        $el.closest('.step').find('[step]').attr('step',step);
    }

    $(function(){
        var step=0;
        var prevStep=[];
        var totalSteps=$('.step').length;
        stepChange(step);
        $('[step]').on('click',function(){
            var targetStep=parseInt($(this).attr('step'));
            $($('.step').get(step)).addClass('hide');
            if(targetStep=='-1'){
                last=prevStep.pop();
                step=last;                
            }else{
                prevStep.push(step);
                step=step+ targetStep;                 
            }    
            console.log(step,totalSteps)
            if(step>=totalSteps){
                console.log($(this).closest('form'))
                $(this).closest('form').find('[type="submit"]').trigger('click')
            }else{
                stepChange(step);       
            }        
               
        })  
    
    })
</script>