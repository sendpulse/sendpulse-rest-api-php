//https://twitter.com/One_div
//http://one-div.com <-- CSS3 single element database

jQuery(document).ready(function($){
	$('.fake-placeholder input').each(function(){
		if($(this).val()==""){
			$(this).addClass('empty');	
		}
	});

	$('.fake-placeholder input').on('change',function(){
		if($(this).val()==""){
			$(this).addClass('empty');	
		}else{
			$(this).removeClass('empty');	
		}
	});

	$('.fake-select-objects').on('click',function(event){
	  if( $(event.target).hasClass('fake-select-objects')){
	  	$(this).find('input[type=radio]').prop('checked',false);
	  }
  	});

	$('.js-toggle').on('click',function(e){
		var toggle = $(event.target).attr('toggle');
		console.log($('.js-toggle-target[toggle="'+toggle+'"]'));
		$('.js-toggle-target[toggle="'+toggle+'"]').toggle();
  	});
})