$(function(){ 
    $("b a").click(function(){ 
        var love = $(this); 
        var id = love.attr("rel"); //对应id 
       // love.fadeOut(300); //渐隐效果 
        $.ajax({ 
            type:"POST", 
            url:"love.php", 
            data:"id="+id, 
			
            cache:false, //不缓存此页面 
            success:function(data){ 
                love.html(data); 
                //love.fadeIn(300); //渐显效果 
            } 
        }); 
        return false; 
    }); 
}); 